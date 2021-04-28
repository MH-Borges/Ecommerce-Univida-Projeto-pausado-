<?php

require_once("conexao.php");
// verificações para preenchimentos de campos do form
if($_POST['nome'] == ""){
    echo 'Preencha o Campo de Nome';
    exit();
}
if($_POST['email'] == ""){
    echo 'Preencha o Campo do Email';
    exit();
}
if($_POST['mensagem'] == ""){    
    echo 'Preencha o Campo de Mensagem';
    exit();
}
// verificações para preenchimentos de campos do form

$destinatario = $email;
$assunto = $nome_loja . 'Email de formulario de contato'; // assunto a receber no email

// corpo do email
$mensagem = utf8_decode('Nome:' . $_POST['nome']. "\r\n"."\r\n".
                        'Telefone:'.$_POST['telefone']. "\r\n"."\r\n".
                        'Mensagem:'. "\r\n"."\r\n". $_POST['mensagem']);

$cabecalhoemail = "From: " .$_POST['email'];

mail($destinatario, $assunto, $mensagem, $cabecalhoemail); // comando q envia email para o usuario

echo 'Enviado com Sucesso!';

// enviar para o banco de dados = email e nome

            //metodo query usado para consulta no banco carregando os dados do usuarios
$res = $pdo->query("SELECT * FROM emails where email = '$_POST[email]'"); //--> verificação para ver se ja existe o usuario na tabela
$dados  = $res->fetchAll(PDO::FETCH_ASSOC); // se encontrar, apenas ignora o processo

// se o numero de linhas = 0 coloca um novo id na tabela
if(@count($dados) == 0){

            //metodo prepare usado para consulta no banco de forma rapida (evita sql Inject), com metodo prepare é preciso passar os vaores a ser consultado (values)
$res = $pdo->prepare("INSERT into emails (nome, email, ativo) values (:nome, :email, :ativo)"); // dados inseridos na tabela

$res->bindValue(":nome", $_POST['nome']);
$res->bindValue(":email", $_POST['email']);
$res->bindValue(":ativo", "Sim");
$res->execute();

}

//query é usado para verificação e consulta no banco de dados.
//prepare é usado para inserção direta de informação no banco de dados.
?>