<?php

require_once("../../../conexao.php"); 

$categoria = $_POST['txtCat'];


echo "<select class='sm-width form-control form-control-sm' name='sub_cat' id='sub_cat'>";

$res = $pdo->query("SELECT * FROM sub_categorias where id_categoria = '$categoria' order by nome asc");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
for ($i=0; $i < count($dados); $i++) { 
foreach ($dados[$i] as $key => $value) {
}

echo "<option value='" . $dados[$i]['id'] . "'>" . $dados[$i]['nome'] . "</option>";

}
echo "</select>";

?>