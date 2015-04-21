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
            <li class="active">Carrinho</li>
		</ol>

		<!-- Conteudo -->
		<div class="panel-default" style="padding:10px; margin-top:10px;">

            <!-- Cart -->
        	
            		<h3>SHOPPING CART</h3>
            
	            <div class="col-lg-12 col-sm-12 hero-feature">
					<table class="table table-bordered tbl-cart">
						<thead>
                            <tr>
                                <td class="hidden-xs">Image</td>
                                <td>Product Name</td>
                                <td>Size</td>
                                <td>Color</td>
                                <td class="td-qty">Quantity</td>
                                <td>Unit Price</td>
                                <td>Sub Total</td>
                                <td>Remove</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="hidden-xs">
                                    <a href="detail.html">
                                        <img src="images/product-2.jpg" alt="Age Of Wisdom Tan Graphic Tee" title="" width="47" height="47" />
                                    </a>
                                </td>
                                <td><a href="detail.html">Age Of Wisdom Tan Graphic Tee</a>
                                </td>
                                <td>
                                    <select name="">
                                        <option value="" selected="selected">S</option>
                                        <option value="">M</option>
                                    </select>
                                </td>
                                <td>-</td>
                                <td>
                                    <input type="text" name="" value="1" class="input-qty form-control text-center" />
                                </td>
                                <td class="price">$ 122.21</td>
                                <td>$ 122.21</td>
                                <td class="text-center">
                                    <a href="#" class="remove_cart" rel="2">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs">
                                    <a href="detail.html">
                                        <img src="images/product-12.jpg" alt="Adidas Men Red Printed T-shirt" title="" width="47" height="47" />
                                    </a>
                                </td>
                                <td><a href="detail.html">Adidas Men Red Printed T-shirt</a>
                                </td>
                                <td>
                                    <select name="">
                                        <option value="">S</option>
                                        <option value="" selected="selected">M</option>
                                    </select>
                                </td>
                                <td>
                                	<select name="">
                                        <option value="" selected="selected">Red</option>
                                        <option value="">Blue</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="" value="2" class="input-qty form-control text-center" />
                                </td>
                                <td class="price">$ 20.63</td>
                                <td>$ 41.26</td>
                                <td class="text-center">
                                    <a href="#" class="remove_cart" rel="1">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right">Total</td>
                                <td class="total" colspan="2"><b>$ 163.47</b>
                                </td>
                            </tr>
                        </tbody>
					</table>
					<div class="btn-group btns-cart">
						<button type="button" class="btn btn-primary" onclick="window.location='catalogue.html'"><i class="fa fa-arrow-circle-left"></i> Continue Shopping</button>
						<button type="button" class="btn btn-primary">Update Cart</button>
						<button type="button" class="btn btn-primary" onclick="window.location='checkout.html'">Checkout <i class="fa fa-arrow-circle-right"></i></button>
					</div>

	            </div>
        	</div>
        	<!-- End Cart -->
            
            
            </div>
		<!-- Acaba o conteudo -->
		
	</div>
	
	<!-- RODAPÉ!! -->
	<?php include "inc-rodape.php" ?>
	<!-- Acaba RODAPÉ!! -->

</body>
</html>