<?php 
  require_once("../conexao.php");

  //verificação de cadastro no banco, caso contrario, usuario zera sera cadastrado como ADM
  $res = $pdo->query("SELECT * FROM usuarios");
  $dados  = $res->fetchAll(PDO::FETCH_ASSOC);
  $senha_cripto = md5('54321');
if(@count($dados) == 0){
    $res = $pdo->query("INSERT into usuarios (nome, cpf, email, senha, senha_crip, nivel, imagem) 
    values ('Administrador', '000.000.000-00', '$email','54321', '$senha_cripto', 'Admin', 'Sem-foto.jpg')");
}
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Matheus Henrique || https://mhborges.com.br">
  <meta name="description" content="Loja Univida || Vendas de sacos de lixo 100% reciclados e Produtos de limpeza para toda Curitiba">
  <meta name="keywords" content="Univida, unica, Loja, Loja Univida, Saco de lixo, Produtos de limpeza">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">



  <link rel="icon" href="../img/iconUni.ico" type="image/x-icon">
	<title>Login Univida</title>
   

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</head>

<body>
  
<div class="container">
	<div class="d-flex justify-content-center h-100 ">
		<div class="card">
			<div class="card-header">
				<h3>Login</h3>
			</div>
			<div class="card-body">
				<form action="autenticar.php" method="post" name="login">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Email ou CPF" name="emailLogin" id="emailLogin">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="senhaLogin" id="senhaLogin" placeholder="Senha">
            <button type="button" id="mostraSenha" class="eye"><i id="eye" class="fas fa-eye"></i></button>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Lembrar de mim
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Não tem uma Conta?<a href="#" data-toggle="modal" data-target="#ModalCadastro">Cadastre-se</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#" data-toggle="modal" data-target="#ModalRecuperar">Esqueceu a senha?</a>
				</div>
			</div>
            <div id="voltarTela"><a href="../index.php">Voltar para tela inicial</a></div>
        </div>        
	</div>
</div>

<!-- Modal Cadastro -->
<div class="modal fade" id="ModalCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre - se</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post">

            <div class="form-group">
                <label for="exampleInputEmail1">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira seu nome Completo">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Seu CPF">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Seu Email">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Inserir Senha">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirmar Senha</label>
                        <input type="password" class="form-control" id="confirmasenha" name="confirmasenha" placeholder="Confirme sua Senha">
                    </div>
                </div>
            </div>
      </div>
        <div class="modal-footer">
          <strong><div class="col-md-7 text-center" id="Alertmsg"></div></strong>
          <button type="button" id="btn-fecha-cadastro" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" id="btn-cadastrar" class="btn btn-info">Cadastrar</button>
        </div>
      
      </form>
    </div>

  </div>
</div>

<!-- Modal Recupera -->
<div class="modal fade" id="ModalRecuperar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="emailRecupera" name="emailRecupera" placeholder="Seu Email">
          </div>
      </div>
      <strong><div class="col-md-12 text-center" id="AlertmsgRecupera"></div></strong>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" id="btn-recuperar" class="btn btn-info">Recuperar</button>
      </div>
        </form>
    </div>
  </div>
</div> 





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="../js/mascara.js"></script>

</body>
</html>

<script type="text/javascript">

//mostrar Senha
document.getElementById("mostraSenha").onclick = function() {showPass()};

function showPass(){  
  var tipagem = document.getElementById('senhaLogin');
  if(tipagem.type === "password"){
    tipagem.type = "text";
  }else{
    tipagem.type = "password";
  }
}

// MODAL CADASTRO //
$('#btn-cadastrar').click(function(e){
    event.preventDefault();
    $.ajax({
        url:"cadastrar.php", 
        method:"post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(Alert){
            
            if(Alert.trim() === 'Cadastrado com Sucesso!' ){
                $('#btn-fecha-cadastro').click();
                $('#emailLogin').val(document.getElementById('#email').value);
                $('#nome').val('');
                $('#email').val('');
                $('#cpf').val('');
                $('#senha').val('');
                $('#confirmasenha').val('');
            }
            
            //mensagem de erro
            else{
                $('#Alertmsg').addClass('text-danger');
                $('#Alertmsg').text(Alert);
                
            }
        }
    })
});
// MODAL CADASTRO //

// MODAL RECUPERAR // 
$('#btn-recuperar').click(function(e){
    event.preventDefault();
    $.ajax({
        url:"recuperar.php", 
        method:"post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(Alert){
            
            if(Alert.trim() === 'Senha enviada para o Email!' ){
                $('#AlertmsgRecupera').addClass('text-success');
                $('#AlertmsgRecupera').text(Alert);   
            }
            else if(Alert.trim() === 'Preencha o campo Email!'){
              $('#AlertmsgRecupera').addClass('text-danger');
                $('#AlertmsgRecupera').text(Alert);
            }
            else if(Alert.trim() === 'Email não encontrado!'){
              $('#AlertmsgRecupera').addClass('text-danger');
                $('#AlertmsgRecupera').text(Alert);
            }
            //mensagem de erro
            else{
                $('#AlertmsgRecupera').addClass('text-danger');
                $('#AlertmsgRecupera').text('Erro ao enviar o formulario, provaveis problemas com o servidor local, ou com o servidor de hospedagem');
                
            }
        }
    })
});
// MODAL RECUPERAR //
</script>
