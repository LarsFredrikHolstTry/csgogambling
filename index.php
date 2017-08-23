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
            <a href="#"><img src="images/banner.jpg"></a>
        </div>
        
        

        <!--
		<div class="menubar">
			
			<ul id="menu">
				<li><a href="index.php">LOGO</a></li>
				<li><a href="#">produkter</a></li>
                <li><img class="img" src="images/logo.png"></li>

				<li>
                    <a href="customer/my_account.php">Hei, 
                    <?php 
/*
                $user = $_SESSION['customer_email'];
				
				$get_img = "select * from customers where customer_email='$user'";
				
				$run_img = mysqli_query($con, $get_img); 
				
				$row_img = mysqli_fetch_array($run_img); 
				
				$c_image = $row_img['customer_image'];
				
				$c_name = $row_img['customer_name'];
*/
				    if(isset($_SESSION['customer_email'])){
					   echo "$c_name";
                    } else {
					   echo "<b>Gjest</b>";
					}
					?>
                    </a>
                </li>
                
				<li><a href="checkout.php">handlekurv: <?php total_price(); ?>
                    </a>
                </li>
			
			</ul>

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
		<!--Content wrapper ends-->
		

	
	</div> 
    <!--Main wrapper ends here-->


</body>
</html>