<!DOCTYPE>
<?php 

session_start();

include("functions/functions.php");

?>
<html>
	<head>
		<title>My Online Shop</title>
		
		
	<link rel="stylesheet" href="styles/details.css" media="all" /> 
    <link href="http://designers.hubspot.com/hs-fs/hub/327485/file-2054199286-css/font-awesome.css" rel="stylesheet">
	</head>
	
<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
        <div class="loginreg" style="text-align: center;">
            <ul>
                <li>
                
                <?php
					if(isset($_SESSION['customer_email'])){
					   echo '<p><a href="customer/my_account.php">'. $_SESSION['customer_email']. '</a></p>';
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
		<!--Navigation Bar ends-->
	
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
		
			<div id="content_area">
                
				<div id="products_box">
                    
	<?php 
                    
	if(isset($_GET['pro_id'])){
	
	$product_id = $_GET['pro_id'];
	
	$get_pro = "select * from products where product_id='$product_id'";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		$pro_desc = $row_pro['product_desc'];
	
		echo "
				<div id='single_product'>
				
					<h1>$pro_title</h1>
                    
                    <div id='bilde'>
                    <img src='admin_area/product_images/$pro_image' width='400' height='400' />
                    </div>
					
                    <div id='prisogleggdesc'>
                        <div id='prishoyre'>
                            <p><b> $pro_price,- </b></p>
                        </div>		

                        <div id='leggivognhoyre'>
                            <a href='index.php?add_cart=$pro_id'><button id='leggihandlevogn'><i class='fa fa-shopping-cart' aria-hidden='true'></i> &emsp; Legg i handlevogn</button></a>
                        </div>	

                        <div id='hoyre'>
                            <h3>Produktinfo</h3>
                            <p>$pro_desc </p>
                        </div>
                    </div>
				</div>
		
		
		      ";
	
	       }
	   }
                    ?>
				
				</div>
			
			</div>
            
            <h2>- Andre produkter -</h2>
                <div id="products_box_small">
                    <?php getProSmall(); ?>
                    <?php getCatPro(); ?>
                    <?php getBrandPro(); ?>
                </div>
            </div>
		</div>
		<!--Content wrapper ends-->
<!--Main Container ends here-->


</body>
</html>