<?php 
require_once("config.php");

date_default_timezone_set('America/Sao_Paulo'); // time zone do cadastro (guarda o momento q o usuario se cadastrou)

try{
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha"); // conexão com o banco de dados
}
catch(Exception $e){
    echo "Erro ao conectar com o banco de dados! " . $e;
}

?>