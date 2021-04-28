<?php

require_once("../../../conexao.php"); 
@session_start();

$id = @$_SESSION['id_usuario'];

//SCRIPT PARA SUBIR FOTO NO BANCO
$caminho = '../../../img/ProfilePics/' .@$_FILES['imagem']['name'];
if (@$_FILES['imagem']['name'] == ""){
  $imagem = "sem-foto.jpg";
}else{
  $imagem = @$_FILES['imagem']['name']; 
}

$imagem_temp = @$_FILES['imagem']['tmp_name']; 

$ext = pathinfo($imagem, PATHINFO_EXTENSION);   
if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida!';
	exit();
}

if($imagem == ""){
	$res = $pdo->prepare("INSERT INTO usuarios (imagem) VALUES ('sem-foto.jpg')");
}else{
    if($imagem == "Sem-foto.jpg"){
        $res = $pdo->prepare("UPDATE usuarios SET imagem = '$imagem' WHERE id = '$id'");
    }else{
        $res = $pdo->prepare("UPDATE usuarios SET imagem = '$imagem' WHERE id = '$id'");
    }
}
$res->execute();

echo 'Salvo com Sucesso!!';

?>