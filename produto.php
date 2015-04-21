<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Museu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/bootstrap.min.js"></script>
</head>

<body>
	<!-- MENU!! -->
   <?php 
        $pagina = "loja";
        include "inc-cabecalho.php" ?>
	<!-- Acaba MENU!! -->

	<!-- /conteudo -->
	<div class="container theme-showcase" role="main">

		<div class="jumbotron" style="margin:1px; padding-bottom:1px;">
			<img src="./imagens/logotipo-banner.png" alt="logotipo">
		</div>
		<!-- /banner -->
		
		 <!-- BREADCRUMB -->
		<ol class="breadcrumb" style="margin-bottom:1px;">
			<li><a href="loja.php">Loja</a> 
			</li>
            <li class="active">Produto xpto</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel-default" style="padding:10px; margin-top:10px;">

           <div class="container">
    <!-- details-photo -->
    <div class="details-photo col-sm-5">
        <a href="#"><img class="img-responsive" src="http://placehold.it/350x400"></a>  
        <br>
        <div>
            <a href=""><img src="http://placehold.it/85x84" alt=""></a>
            <a href=""><img src="http://placehold.it/85x84" alt=""></a>
            <a href=""><img src="http://placehold.it/85x84" alt=""></a>
            <a href=""><img src="http://placehold.it/85x84" alt=""></a>
        </div>
    </div><!-- .details-photo -->
            



        <!-- Sidebar Grid -->
        <div class="col-sm-6 details-right">

        <div class="col-md-6 pull-left">
          <h3 class="h3"><a href="#"><strong>Denim Jacket</strong></a></h3>
          <p class="product-code">Product code: <strong>ECOM1204</strong></p>
        </div>
                    
        <div class="col-md-6 pull-right text-right">
        <h1 class="big-price"><strong>€34</strong></h1>
        </div>

        <div class="clearfix"></div>
        <hr />

                <div class="col-md-12">
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="quantity" class="col-sm-2 control-label">Quantity</label>
              <div class="col-xs-9">
                <input id="quantity"
                           type="text"
                           value="1"
                           name="quantity"
                           data-bts-min="0"
                           data-bts-max="100"
                           data-bts-init-val=""
                           data-bts-step="1"
                           data-bts-decimal="0"
                           data-bts-step-interval="100"
                           data-bts-force-step-divisibility="round"
                           data-bts-step-interval-delay="500"
                           data-bts-prefix=""
                           data-bts-postfix=""
                           data-bts-prefix-extra-class=""
                           data-bts-postfix-extra-class=""
                           data-bts-booster="true"
                           data-bts-boostat="10"
                           data-bts-max-boosted-step="false"
                           data-bts-mousewheel="true"
                           data-bts-button-down-class="btn btn-default"
                           data-bts-button-up-class="btn btn-default"
                            />
              </div>
          </div>

        </form>
        </div>
        <hr>

        <div class="col-md-12 text-center">
        <button id="loadToSuccess" class="btn btn-primary-custom btn-lg"><i class="fa fa-shopping-cart"></i> Adicionar ao Carrinho</button>
        </div>
       

      <div class="col-md-12">
      
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#details">Details</a></li>
          <li><a data-toggle="tab" href="#shipping">Shipping</a></li>
        </ul>
               

          <div class="tab-content">
          <div class="tab-pane active" id="details">
            <h4>Product Informartion</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. Aliquam in felis sit amet augue.</p>
          </div>
                              

                              
          <div class="tab-pane" id="shipping">
          <p>Standard 1-5 business days $7.95</p>
            <p>Two Day 2 business days $15</p>
            <p>Next Day  1 business day  $30</p>

          </div>
        </div><!-- tab-content-->

      </div><!-- col-md-12 -->
                </div><!--col-sm-6 -->
                <!-- /Sidebar Grid -->


<div class="clearfix"></div>

</div><!-- /container -->
<!-- /content -->
            
            </div>
		<!-- Acaba o conteudo -->
		
	</div>
	
	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>
</html>