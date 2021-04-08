<?php
ob_start();
session_start();
require "header.php";
?>
  <div class="section">
    <div class="container">
      <div class="row">
        <!-- shop -->
        <div class="col-md-4 col-xs-6">
          <div class="shop">
            <div class="shop-img">
              <img src="../img/shop01.png" alt="">
            </div>
            <div class="shop-body">
              <h3>Colección<br>Laptops</h3>
              <a href="laptops.php" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /shop -->
        <div class="col-md-4 col-xs-6">
          <div class="shop">
            <div class="shop-img">
              <img src="../img/shop03.png" alt="">
            </div>
            <div class="shop-body">
              <h3>Colección<br>Accesorios</h3>
              <a href="accesorios.php" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-xs-6">
          <div class="shop">
            <div class="shop-img">
              <img src="../img/shop02.png" alt="">
            </div>
            <div class="shop-body">
              <h3>Colección<br>Camaras</h3>
              <a href="camaras.php" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h3 class="title">Nuevos Productos</h3>
            <div class="section-nav">
              <ul class="section-tab-nav tab-nav">
                <li><a href="laptops.php">Laptops</a></li>
                <li><a href="smartphones.php">Smartphones</a></li>
                <li><a href="camaras.php">Cameras</a></li>
                <li><a href="accesorios.php">Accessories</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="products-tabs">
              <div id="tab1" class="tab-pane active">
                <div class="products-slick" data-nav="#slick-nav-1" id="listIndex">
                </div>
                <div id="slick-nav-1" class="products-slick-nav"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="hot-deal" class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hot-deal">
            <ul class="hot-deal-countdown">
              <li>
                <div>
                  <h3>02</h3>
                  <span>Days</span>
                </div>
              </li>
              <li>
                <div>
                  <h3>10</h3>
                  <span>Hours</span>
                </div>
              </li>
              <li>
                <div>
                  <h3>34</h3>
                  <span>Mins</span>
                </div>
              </li>
              <li>
                <div>
                  <h3>60</h3>
                  <span>Secs</span>
                </div>
              </li>
            </ul>
            <h2 class="text-uppercase">SUPER OFERTA DE ESTA SEMANA</h2>
            <p>NUEVA COLECCIÓN HASTA 50% DE DESCUENTO</p>
            <a class="primary-btn cta-btn" href="#">Compra ahora</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h3 class="title">MÁS VENDIDOS</h3>
            <div class="section-nav">
              <ul class="section-tab-nav tab-nav">
                <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                <li><a href="smartphones.php">Smartphones</a></li>
                <li><a href="camaras.php">Camaras</a></li>
                <li><a href="accesorios.php">Accessories</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="products-tabs">
              <div id="tab2" class="tab-pane fade in active">
                <div class="products-slick" data-nav="#slick-nav-2">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
require "footer.php";
ob_end_flush();