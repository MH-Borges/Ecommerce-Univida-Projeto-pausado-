<?php 
    require_once("header.php");
    require_once("config.php");
?>

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Telefone</h4>
                        <p><?php echo $telefone ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                    <div class="contact__widget">
                        <span class="fa fa-whatsapp"></span>
                        <h4>WhatsApp</h4>
                        <p><?php echo $whatsapp ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p><?php echo $email ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form">
        <div class="container">
            <div class="row">
                <div id="Bbox_form">
                    <div class="col-lg-12">
                        <div class="form__title">
                            <h2>Informações para Contato</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <form class="formBox" method="post">
                            <div class="BlockBox w50">
                                <input type="text" name="nome" id="nome" required>
                                <span>Nome Completo</span>
                            </div>
                            <div class="BlockBox w50">
                                <input type="text" name="email" id="email" required>
                                <span>E-mail</span>
                            </div>
                            <div class="BlockBox w50">
                                <input type="text" name="telefone" id="telefone" required>
                                <span>Telefone</span>
                            </div>
                            <div class="BlockBox w50">
                                <textarea type="text" name="mensagem" id="mensagem" required></textarea>
                                <span>Como podemos te ajudar??</span>
                            </div>
                            <div class="BlockBox w50" id="submit_form">
                                <button name="btn_envia" id="btn_envia" type="button" class="BT_envia">Enviar</button>
                            </div>
                            <div class="col-md-12 text-center" id="Alertmsg"></div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->

<?php 
    require_once("footer.php");
?>

<!-- Script Email -->
<script type="text/javascript">
    $('#btn_envia').click(function(e){
        event.preventDefault();
        //mensagem de "enviando" para resposta de usuario
        $('#Alertmsg').removeClass('text-danger');
        $('#Alertmsg').removeClass('text-success');
        $('#Alertmsg').addClass('text-info');
        $('#Alertmsg').text('Enviando');
        $.ajax({
            url:"enviar.php", 
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(Alert){
                
                if(Alert.trim() === 'Enviado com Sucesso!' ){
                    $('#Alertmsg').removeClass('text-info');
                    $('#Alertmsg').addClass('text-success');
                    $('#Alertmsg').text(Alert);
                    $('#nome').val('');
                    $('#email').val('');
                    $('#telefone').val('');
                    $('#mensagem').val('');
                }
                //mensagem de alertas para preencher
                else if(Alert.trim() == 'Preencha o Campo de Nome'){
                    $('#Alertmsg').addClass('text-danger');
                    $('#Alertmsg').text(Alert);
                }

                else if(Alert.trim() == 'Preencha o Campo do Email'){
                    $('#Alertmsg').addClass('text-danger');
                    $('#Alertmsg').text(Alert);
                }

                else if(Alert.trim() == 'Preencha o Campo de Mensagem'){
                    $('#Alertmsg').addClass('text-danger');
                    $('#Alertmsg').text(Alert);
                }
                //mensagem de alertas para preencher
                //mensagem de erro
                else{
                    $('#Alertmsg').addClass('text-danger');
                    $('#Alertmsg').text('Erro ao enviar o formulario, provaveis problemas com o servidor local, ou com o servidor de hospedagem');
                    //$('#Alertmsg').text(Alert);
                }
            }
        })
    });
</script>
