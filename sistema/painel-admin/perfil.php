<?php
    $pag = "perfil";
    require_once("../../conexao.php");
    
    @session_start();
    //verificação de autenticação do usuario
    if(@$_SESSION['id_usuario'] == null || @$_SESSION ['nivel_usuario'] != 'Admin'){
        echo "<script language='javascript'>window.location='../index.php'</script>";
    }

    $res = $pdo->query("SELECT * FROM usuarios where id = '$_SESSION[id_usuario]'"); 
    $dados  = $res->fetchAll(PDO::FETCH_ASSOC);
    $nomeUserEdit = @$dados[0]['nome'];
    $emailUserEdit = @$dados[0]['email'];    
    $cpfUserEdit = @$dados[0]['cpf'];    
    $senhaUserEdit = @$dados[0]['senha'];  
    $imagemUserEdit = @$dados[0]['imagem'];
    $idUser = @$dados[0]['id'];
 
?>

<div class="container ">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="col-md-12">
                <h5 class="modal-title" id="exampleModalLabel">Suas Informações</h5>
            </div>
        
            <div class="modal-body col-md-12 ml-5 ">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome Completo</label>
                            <div class="ml-3"><?php echo @$nomeUserEdit?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">CPF</label>
                            <div class="ml-3"><?php echo @$cpfUserEdit?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Email</label>
                            <div class="ml-3"><?php echo @$emailUserEdit?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <div><input type="password" id="senhaInfo" value="<?php echo @$senhaUserEdit ?>" class="ml-3">
                            <button type="button" id="mostraSnUser" class="eye"><i id="eye" class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nivel de Usuario</label>
                            <div class="ml-3"><?php echo @$_SESSION['nivel_usuario']?></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" href="" data-toggle="modal" data-target="#ModalPerfil" id="btn-Mudar" class="btn btn-info">Alterar Informações</button>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mt-5">
            <div class="row d-flex justify-content-center align-items-center"><button type="button" href="" data-toggle="modal" data-target="#ModalIMG" id="btn-MudarIMG" class="btn btn-info">Trocar a foto</button></div>
            <div class="col-md-12 d-flex justify-content-center align-items-center h-90">    
                <?php if(@$imagemUserEdit != ""){ ?>
                    <img src="../../img/ProfilePics/<?php echo $imagemUserEdit ?>" width="300px">
                <?php }else{ ?>
                    <img src="../../img/sem-foto.jpg" width="250px" id="UserIMG">
                <?php }?>
            </div>
        </div>
    </div>
</div>

<!--  Modal Perfil-->
<div class="modal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <form id="form-perfil" method="POST" enctype="multipart/form-data">
            
            <div class="modal-body">
                <div class="form-group">
                    <label >Nome</label>
                    <input value="<?php echo @$nomeUserEdit ?>" type="text" class="form-control" id="nomeuser" name="nomeuser" placeholder="Nome">
                </div>

                <div class="form-group">
                    <label >CPF</label>
                    <input value="<?php echo @$cpfUserEdit ?>" type="text" class="form-control" id="cpfuser" name="cpfuser" placeholder="CPF">
                </div>

                <div class="form-group">
                    <label >Email</label>
                    <input value="<?php echo @$emailUserEdit ?>" type="email" class="form-control" id="emailuser" name="emailuser" placeholder="Email">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Senha</label>
                            <input id="senhaInfoEdit" value="<?php echo @$senhaUserEdit ?>" type="password" class="form-control" id="senha" name="senha" placeholder="Nova Senha">
                            <button type="button" id="mostraSnEdit" class="eye mt-1 ml-4"><i id="eye" class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                            <label >Confirmar Senha</label>
                            <input id="ConfmostraSn" value="<?php echo @$senhaUserEdit ?>" type="password" class="form-control" id="conf-senha" name="conf-senha" placeholder="Confirmar Senha">
                            <button type="button" id="ConfsenhaInfo" class="eye mt-1 ml-4"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div id="Alertmsg" class="mr-2"></div>
                <input value="<?php echo $_SESSION['id_usuario'] ?>" type="hidden" name="txtid" id="txtid">
                <input value="<?php echo $_SESSION['cpf_usuario'] ?>" type="hidden" name="antigo" id="antigo">

                <button type="button" id="btn-fechar-perfil" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="btn-salvar-perfil" id="btn-salvar-perfil" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal foto -->
<div class="modal fade" id="ModalIMG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form id="form" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label >Imagem</label>
                        <input type="file" value="<?php echo @$imagemUserEdit ?>"  class="form-control-file" id="imagem" name="imagem" onChange="carregarImg();">
                    </div>

                    <?php if(@$imagemUserEdit != ""){ ?>
                    	<div class="row dflex justify-content-center aling-item-center">
                            <img src="../../img/ProfilePics/<?php echo $imagemUserEdit ?>" width="250" id="target">
                        </div>
                 	<?php  }else{ ?>
                    <img src="../../img/sem-foto.jpg" width="200" height="200" id="target">
                	<?php } ?>
                    
                </div>

                <div class="modal-footer">
                    <strong><div class="col-md-7 text-center" id="Alertmsg2"></div></strong>
                    <input value="<?php echo @$idUser ?>" type="hidden" name="id" id="id">

                    <button type="button" id="btn-fecharIMG" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">

    function carregarImg() {
        var target = document.getElementById('target');
        var file = document.querySelector("input[type=file]").files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }else {
            target.src = "";
        }
    }

    $(document).ready(function () {
    $('#dataTable').DataTable();
    });

    $("#dataTable").dataTable({
        "ordering": false,
        "bJQueryUI": true,
    "oLanguage": {
        "sProcessing":   "Processando...",
        "sLengthMenu":   "Mostrar _MENU_ registros",
        "sZeroRecords":  "Não foram encontrados resultados",
        "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
        "sInfoFiltered": "",
        "sInfoPostFix":  "",
        "sSearch":       "Buscar:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "Primeiro",
            "sPrevious": "Anterior",
            "sNext":     "Seguinte",
            "sLast":     "Último"
        }
    }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script>
    $(document).ready(function(){
        $('#cpfuser').mask('000.000.000-00');
    });

    //mostrar Senha
    document.getElementById("mostraSnUser").onclick = function() {showPass()};

    function showPass(){  
    var tipagem = document.getElementById('senhaInfo');
    if(tipagem.type === "password"){
        tipagem.type = "text";
    }else{
        tipagem.type = "password";
    }  
    }

    document.getElementById("mostraSnEdit").onclick = function() {showPassEdit()};

    function showPassEdit(){  
        var tipagem = document.getElementById('senhaInfoEdit');
    if(tipagem.type === "password"){
        tipagem.type = "text";
    }else{
        tipagem.type = "password";
    }
    }
    document.getElementById("ConfsenhaInfo").onclick = function() {showPassConf()};

    function showPassConf(){  
        var tipagem = document.getElementById('ConfmostraSn');
    if(tipagem.type === "password"){
        tipagem.type = "text";
    }else{
        tipagem.type = "password";
    }
    }


    $('#btn-salvar-perfil').click(function(e){
        event.preventDefault();
        $.ajax({
            url:"editUser.php", 
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(Alert){
                
                if(Alert.trim() === 'Salvo com Sucesso!'){
                    $('#btn-fechar-perfil').click();
                    window.location='index.php?pag=perfil';
                }
                else{
                    $('#Alertmsg').addClass('text-danger');
                    $('#Alertmsg').text(Alert); 
                }
            }
        })
    });


    $("#form").submit(function () {
        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/inserir.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#Alertmsg2').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!!") {
                    $('#btn-fecharIMG').click();
                    window.location = "index.php?pag="+pag;
                } else {

                    $('#Alertmsg2').addClass('text-danger')
                }

                $('#Alertmsg2').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });
</script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="../../js/mascara.js"></script>

