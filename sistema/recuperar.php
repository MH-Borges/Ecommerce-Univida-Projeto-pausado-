<?php
require_once("../conexao.php");

$email = $_POST['emailRecupera'];   

if($email == ""){
    echo 'Preencha o campo Email!';
    exit();
}

$res = $pdo->query("SELECT * FROM usuarios where email = '$email' ");
$dados  = $res->fetchAll(PDO::FETCH_ASSOC);
if(@count($dados) > 0){
    $senha = $dados[0]['senha'];
    // email com senha
    $destinatario = $email;
    $assunto = $nome_loja . 'Recuperação de senha';

    // corpo do email
    $mensagem = utf8_decode('Sua senha é' .$senha);

    $cabecalhoemail = "From: " .$email;

    mail($destinatario, $assunto, $mensagem, $cabecalhoemail); // comando q envia email para o usuario
    echo 'Senha enviada para o Email';
}
else{
    echo 'Email não encontrado!'; 
}

?>