<?php 
    $pag = "produtos";
    require_once("../../conexao.php");
    
    @session_start();
    //verificação de autenticação do usuario
    if(@$_SESSION['id_usuario'] == null || @$_SESSION ['nivel_usuario'] != 'Admin'){
        echo "<script language='javascript'>window.location='../index.php'</script>";
    }

?>

<div class="container">
    <div class="row">
        <div class="mt-4 mb-4 mr-5">
            <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag?>&funcao=novo">Novo Produtos</a>
            <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag?>&funcao=novo">+</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Estoque (Qntd)</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            $query = $pdo->query("SELECT * FROM produtos order by id desc ");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);

                            for ($i=0; $i < count($res); $i++) { 
                            foreach ($res[$i] as $key => $value) {
                            }

                            $imagem = $res[$i]['imagem'];
                            $nome = $res[$i]['nome'];
                            $valor = $res[$i]['valor'];
                            $estoque = $res[$i]['estoque'];
                            $sub_cat = $res[$i]['sub_categoria'];
                            $ativo = $res[$i]['ativo'];

                            $id = $res[$i]['id'];

                            //recupera nome de categoria 

                            $query2 = $pdo->query("SELECT * from sub_categorias where id = '$sub_cat'");
                            $res2= $query2->fetchAll(PDO::FETCH_ASSOC);
                            
                            $nome_cat = $res2[0]['nome'];
                            
                        ?>
                        <tr>
                            <td>
                                <?php if(@$imagem != ""){ ?>
                                    <img src="../../img/product/<?php echo $imagem ?>" width="50">
                                <?php  }else{ ?>
                                    <img src="../../img/sem-img.jpg" width="50">
                                <?php } ?>
                            </td>
                            <td><?php echo $nome ?></td>
                            <td><?php echo $valor ?></td>
                            <td><?php echo $estoque ?></td>
                            <td><?php echo $nome_cat ?></td>
                            <td>
                                <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class="text-primary mr-2" title="Editar Dados"><i class="far fa-edit"></i></a>
                                <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class="text-danger mr-2" title="Apagar Registro"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php 
                    if (@$_GET['funcao'] == 'editar') {
                        $titulo = "Editar Registro";
                        $id2 = $_GET['id'];

                        $query = $pdo->query("SELECT * FROM produtos where id = '" . $id2 . "' ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        $nome2 = $res[0]['nome'];
                        $imagem2 = $res[0]['imagem'];
                        $sub_cat2 = $res[0]['sub_categoria'];
                        $valor2 = $res[0]['valor'];
                        $estoque2 = $res[0]['estoque'];
                        $descricao2 = $res[0]['descricao'];
                        $desc_longa2 = $res[0]['descricao_longa'];
                        $tipo_envio2 = $res[0]['tio_envio'];
                        $palavras2 = $res[0]['palavras'];
                        $ativo2 = $res[0]['ativo'];
                        $peso2 = $res[0]['peso'];
                        $largura2 = $res[0]['largura'];
                        $altura2 = $res[0]['altura'];
                        $comprimento2 = $res[0]['comprimento'];
                        $modelo2 = $res[0]['modelo'];
                        $valor_frete2 = $res[0]['valor_frete'];
                        $nome_cat2 = $res[0]['categoria'];

                    } else {
                        $titulo = "Inserir Registro";
                    }
                ?>
                
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form id="form" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label >Nome</label>
                                <input value="<?php echo @$nome2 ?>" type="text" class="form-control form-control-sm" id="nome-cat" name="nome-cat" placeholder="Nome">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label >Categoria</label>
                                <select name="categoria" id="categoria" class="form-control form-control-sm">
                                    <?php 
                                        if (@$_GET['funcao'] == 'editar') {
                                            $query = $pdo->query("SELECT * from categorias where id = '$nome_cat2'");
                                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            $nomeCat = $res[0]['nome'];
                                            echo "<option value='".$nome_cat2."'>" .$nomeCat. "</option>";
                                        }
                                            $query2 = $pdo->query("SELECT * from categorias order by nome asc");
                                            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            for ($i=0; $i < count($res2); $i++) { 
                                                foreach ($res2[$i] as $key => $value){}
                                                
                                                if(@$nomeCat != $res2[$i]['nome']){
                                                    echo "<option value='".$res2[$i]['id']."'>" .$res2[$i]['nome']. "</option>";
                                                }

                                            }

                                    ?>
                                </select>
                                <input type="hidden" id="txtCat" name="txtCat">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label >Sub Categorias</label>
                                <span id="listar-subcat"></span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label >Valor (R$)</label>
                                <input value="<?php echo @$valor2 ?>" type="text" class="form-control form-control-sm" id="valor" name="valor" placeholder="Valor">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Descrição Curta <small>(800 caracteres)</small></label>
                        <textarea maxlength="800" class="form-control form-control-sm" id="descricao" name="descricao" placeholder="Descricão com minimo de 100 caracteres e maximo de 800."><?php echo @$descricao2 ?></textarea>
                    </div>
                    <div class="form-group">
                        <label >Descrição Longa</small></label>
                        <textarea class="form-control form-control-sm" id="descr_longa" name="descr_longa" placeholder="Descreva o produto com o máximo de detalhes possível"><?php echo @$desc_longa2 ?></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Estoque <small>(Qntd)</small></label>
                                <input value="<?php echo @$estoque2 ?>" type="text" class="form-control form-control-sm" id="estoque" name="estoque" placeholder="Quantidade">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Tipo Envio</label>
                                <select name="tipo_envio" id="tipo_envio" class="form-control form-control-sm">
                                    <?php 
                                        if (@$_GET['funcao'] == 'editar') {
                                            $query = $pdo->query("SELECT * from tipo_envios where id = '$tipo_envio2'");
                                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            $nomeTipo = $res[0]['nome'];
                                            echo "<option value='".$tipo_envio2."'>" .$nomeTipo. "</option>";
                                        }
                                            $query2 = $pdo->query("SELECT * from tipo_envios order by nome asc");
                                            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            for ($i=0; $i < count($res2); $i++) { 
                                                foreach ($res2[$i] as $key => $value){}
                                                
                                                if(@$nomeTipo != $res2[$i]['nome']){
                                                    echo "<option value='".$res2[$i]['id']."'>" .$res2[$i]['nome']. "</option>";
                                                }
                                            }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label >Ativo</label>
                                <select name="tipo_envio" id="tipo_envio" class="form-control form-control-sm">
                                    <?php 
                                        if (@$_GET['funcao'] == 'editar') {
                                            echo "<option value='".$ativo2."'>" .$ativo2. "</option>";
                                        }
                                         
                                        if(@$ativo2 != "Sim"){
                                            echo "<option value='Sim'>Sim</option>";
                                        }

                                        if(@$ativo2 != "Não"){
                                            echo "<option value='Não'>Não</option>";
                                        }
                                    
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Imagem</label>
                        <input type="file" value="<?php echo @$imagem2 ?>"  class="form-control-file" id="imagem" name="imagem" onChange="carregarImg();">
                    </div>
                    <?php if(@$imagem2 != ""){ ?>
                    	<div class=" row dflex justify-content-center aling-item-center">
                            <img src="../../img/sub-categories/<?php echo $imagem2 ?>" width="250" id="target"></div>
                 	<?php  }else{ ?>
                    <img src="../../img/sem-img.jpg" width="200" height="200" id="target">
                	<?php } ?>
                    
                </div>

                <div class="modal-footer">
                    <strong><div class="col-md-7 text-center" id="Alertmsg"></div></strong>
                    <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                    <input value="<?php echo @$nome2 ?>" type="hidden" name="antigo" id="antigo">

                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal excluir -->
<div class="modal" id="modal-delet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Deseja realmente Excluir este Registro?</p>
                <div id="mensagem_excluir" class="d-flex justify-content-center aling-item-center"></div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">

                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    //chamada de modal de novo registro
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
        echo "<script>$('#modalDados').modal('show');</script>";
    }
    // na chamada da 'funcao' por get se for diferente de vazio ou igual a 'novo' inicia o script da modal

    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
        echo "<script>$('#modalDados').modal('show');</script>";
    }

    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
        echo "<script>$('#modal-delet').modal('show');</script>";
    }
?>


<script type="text/javascript">

    //AJAX DE RECUPERAÇÃO DE LISTA DE SUB-CATEGORIAS
    $(document).ready(function () {
        document.getElementById('txtCat').value = document.getElementById('categoria').value;
        listarSubCat();
    })

    function listarSubCat() {
        var pag = "<?=$pag?>";
        $.ajax({
            url: pag + "/listar-subcat.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "html",
            success: function (result) {

                $('#listar-subcat').html(result);
            }
        })
    }

    $('#categoria').change(function () {
        document.getElementById('txtCat').value = $(this).val();
        listarSubCat();
    })


    //AJAX DE INSERÇÃO DE IMAGEM
    $("#form").submit(function () {
        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/inserir.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#Alertmsg').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!!") {
                    $('#btn-fechar').click();
                    window.location = "index.php?pag="+pag;
                } else {
                    $('#Alertmsg').addClass('text-danger')
                }
                $('#Alertmsg').text(mensagem)

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
        
    //AJAX PARA EXCLUSÃO DE ITEM
    $(document).ready(function () {
        var pag = "<?=$pag?>";
        $('#btn-deletar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/excluir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Excluído com Sucesso!!') {
                        $('#btn-cancelar-excluir').click();
                        window.location = "index.php?pag=" + pag;
                    }

                    $('#mensagem_excluir').text(mensagem)
                },
            })
        })
    });

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

