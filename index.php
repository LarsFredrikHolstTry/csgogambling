<!DOCTYPE>

<?php 

session_start();
include("functions/functions.php");

?>

<html>
	<head>
		<title>My Online Shop</title>
		
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>
	
<body>

	<!--Main Container starts here-->
	<div class="main_wrapper">
        
            <!-- support - logg inn -->
        <div class="loginreg" style="text-align: center;">
            <ul>
                <li>
                
                <?php
					if(isset($_SESSION['customer_email'])){
                        echo '<p><a href="customer/my_account.php">'. $_SESSION['customer_email']. '</a></p> ';

					} else {
                        echo '<li><a href="customer_login.php">Logg inn / registrer</a></li>';
					}
				?>

                </li>
                
            </ul>
        </div>
        
        <!-- header med søkebar -->
        <header>
            <ul class="nav">
                <li><a id="dingser" href="index.php">dingser.no</a></li>

                <li><a href="cart.php">Handlevogn <a style="color: black;"><?php total_price(); ?></a></a></li>
                
                <!-- søkebar -->
                <div id="form">
                    <form method="get" action="results.php" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Søk her..."/ > 
                    <input type="submit" id="searchsubmit" name="search" value="." />
                    </form>
                </div>
            </ul>
        </header>
        
        <!-- strek -->
        <hr>
        
        <!-- produkt - salg - nye produkter -->
        <div class="alt" style="text-align: center;">
            <ul>
                <li><a href="#">produkter</a></li>
                <li><a href="#">salg</a></li>
                <li><a href="#">nye produkter</a></li>
            </ul>
        </div>
        
        <!-- bannerbilde -->
        <div class="banner" style="text-align: center;">
            <a href="#"><img src="images/banner.png"></a>
            <a href="#"><img src="images/face.png"></a>
        </div>
        
		<!--Content wrapper starts-->
		<div class="content_wrapper">

			<div id="content_area">
			
			<?php cart(); ?>
 
				<div id="products_box" style="text-align: center;">
				
				<?php getPro(); ?>
				<?php getCatPro(); ?>
				<?php getBrandPro(); ?>
				
				</div>
			</div>
		</div>
        
    <div class="footer">
        <h1 align="center">FOOOOOOOTER</h1>
            <li><a href="admin_area/login.php">Admin login</a></li>
            <li><a href="#">Kundeservice</a></li>
            <li><a href="#">Kontakt</a></li>
            <li><a href="#">Noe annet</a></li>
        <h1 align="center">kopyright 2018</h1>
    </div>
        
	</div>

</body>
</html>