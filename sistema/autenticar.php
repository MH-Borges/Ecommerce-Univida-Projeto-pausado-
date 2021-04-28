<?php
require_once("../conexao.php");

@session_start(); //iniciando a sessão de usuario

$email = $_POST['emailLogin'];      // validando cadastro login 
$senha = md5($_POST['senhaLogin']);     

$res = $pdo->query("SELECT * FROM usuarios where (email = '$email' or cpf = '$email') and senha_crip = '$senha'");
  $dados  = $res->fetchAll(PDO::FETCH_ASSOC);
if(@count($dados) > 0){
    $_SESSION['id_usuario'] = $dados[0]['id']; // recuperando informações de usuario/banco de dados
    $_SESSION['nome_usuario'] = $dados[0]['nome']; // recuperando informações de usuario/banco de dados
    $_SESSION['email_usuario'] = $dados[0]['email']; // recuperando informações de usuario/banco de dados
    $_SESSION['cpf_usuario'] = $dados[0]['cpf']; // recuperando informações de usuario/banco de dados
    $_SESSION['senha_usuario'] = $dados[0]['senha'];
    $_SESSION['nivel_usuario'] = $dados[0]['nivel']; // recuperando informações de usuario/banco de dados
    

    if($_SESSION['nivel_usuario'] == 'Admin'){
        echo "<script language='javascript'>window.location='painel-admin'</script>";
    }
    if ($_SESSION['nivel_usuario'] == 'Cliente'){
        echo "<script language='javascript'>window.location='painel-client'</script>";
    }
}else{
    echo "<script language='javascript'>window.alert('Dados Incorretos!') </script>";
    echo "<script language='javascript'>window.location='index.php'</script>";
}
?>