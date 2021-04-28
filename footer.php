<?php 
    require_once("config.php");
?>
  <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li><?php echo $telefone ?></li>
                            <li><?php echo $email ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Links Úteis</h6>
                        <ul>
                            <li><a href="#">Sobre Nós</a></li>
                            <li><a href="#">Mias Vendidos</a></li>
                            <li><a href="#">Combos</a></li>
                            <li><a href="#">Lista de Produtos</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Ainda não possi cadastro?</h6>
                        <p>Insira seu Email para se cadastrar em nosso site</p>
                        <form action="#">
                            <input type="email" placeholder="Insira seu Email" required>
                            <button type="submit" class="site-btn">Cadastre-se</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="https://www.facebook.com/Univida-109334817482510" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/univida_produtos/" target="_blank" title="Instagram"><i class="fa fa-instagram" ></i></a>
                            <a href="https://wa.me/<?php echo $whatsapp_link?>" target="_blank" title="<?php echo $whatsapp ?>"><i class="fa fa-whatsapp" ></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>Univida &copy; 2021. Todos direitos reservedos || Desenvolvido por <a target="_blank" href="https://mhborges.com.br"><img src="img\MH_logo.svg"></a></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

     <!-- Js Plugins -->
     <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="js/mascara.js"></script>



</body>

</html>