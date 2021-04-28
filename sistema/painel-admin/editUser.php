<?php
    require_once("../../conexao.php");

    $nome = $_POST['nomeuser'];
    $email = $_POST['emailuser'];
    $cpf = $_POST['cpfuser'];
    $senha = $_POST['senha'];
    $senha_crip = md5($_POST['senha']);

    $antigo = $_POST['antigo'];
    $iduser = $_POST ['txtid'];

    if($nome == ""){
        echo "Preencha o Nome!";
        exit();
    }
    if($email == ""){
        echo "Preencha o Email!";
        exit();
    }
    if($cpf == ""){
        echo "Preencha o CPF!";
        exit();
    }
    if($senha == ""){
        echo "Preencha a Senha!";
        exit();
    }
    if($senha != $_POST['conf-senha']){
        echo "Preencha a Senha!";
        exit();
    }
    
    if($cpf != $antigo){
        $res = $pdo->query("SELECT * FROM usuarios where cpf = '$cpf'"); 
        $dados  = $res->fetchAll(PDO::FETCH_ASSOC);

        if(@count($dados) > 0){
            echo 'CPF Ja cadastrado no Banco!';
            exit();
        }
    }

    $res = $pdo->prepare("UPDATE usuarios SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, senha_crip = :senha_crip
    WHERE id = :id"); // dados inseridos na tabela

    $res->bindValue(":nome", $nome);
    $res->bindValue(":cpf", $cpf);
    $res->bindValue(":email", $email);
    $res->bindValue(":senha", $senha);
    $res->bindValue(":senha_crip", $senha_crip);
    $res->bindValue(":id", $iduser);
    $res->execute();      

    echo 'Salvo com Sucesso!';
?>