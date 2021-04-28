<?php

require_once("../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);

if($nome == ""){
    echo 'Preencha o Campo nome!';
    exit();
}
if($cpf == ""){
    echo 'Preencha o Campo CPF!';
    exit();
}
if($email == ""){
    echo 'Preencha o Campo email!';
    exit();
}
if($senha == ""){
    echo 'Preencha o Campo senha!';
    exit();
}
if($senha != $_POST['confirmasenha']){
    echo 'As Senhas são diferentes';
    exit();
}

// enviar para o banco de dados  cadastro completo

$res = $pdo->query("SELECT * FROM usuarios where cpf = '$_POST[cpf]'"); 
$dados  = $res->fetchAll(PDO::FETCH_ASSOC);


if(@count($dados) == 0){

$res = $pdo->prepare("INSERT into usuarios (nome, cpf, email, senha, senha_crip, nivel) values (:nome, :cpf, :email, :senha, :senha_crip, :nivel)"); // dados inseridos na tabela

$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":email", $email);
$res->bindValue(":senha", $senha);
$res->bindValue(":senha_crip", $senha_crip);
$res->bindValue(":nivel", 'Cliente');
$res->execute();           

$res = $pdo->prepare("INSERT into clientes (nome, cpf, email) values (:nome, :cpf, :email)"); 

$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":email", $email);
$res->execute(); 


$res = $pdo->query("SELECT * FROM emails where email = '$email'"); 
$dados  = $res->fetchAll(PDO::FETCH_ASSOC); 
if(@count($dados) == 0){

$res = $pdo->prepare("INSERT into emails (nome, email, ativo) values (:nome, :email, :ativo)"); 

$res->bindValue(":nome", $nome);
$res->bindValue(":email", $email);
$res->bindValue(":ativo", "Sim");
$res->execute();

}


echo 'Cadastrado com Sucesso!';
}else{
    echo 'CPF já Cadastrado!';
}
            
?>