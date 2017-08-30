<!DOCTYPE>
<?php 

session_start();
include("functions/functions.php");

?>
<html>
	<head>
		<title>My Online Shop</title>
		
		
	<link rel="stylesheet" href="styles/results.css" media="all" /> 
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
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title"><h2>Kategorier</h2></div>
				
				<ul id="cats">
				
				<?php getCats(); ?>
				
                </ul>
					
				<div id="sidebar_title"><h2>Merker</h2></div>
				
				<ul id="cats">
					
					<?php getBrands(); ?>
				
                </ul>
			
			</div>
		
			<div id="content_area">
			
				<div id="single_product">
	<?php 
	
	if(isset($_GET['search'])){
	
	$search_query = $_GET['user_query'];
	
	$get_pro = "select * from products where product_keywords like '%$search_query%'";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
            <a href='details.php?pro_id=$pro_id'>
				<div id='single_product'>

					<img src='admin_area/product_images/$pro_image' width='200' height='200' />
                    
					<div id='titleogpris'>        
                        <h3 style='float:left;'>$pro_title</h3>
                        <h3 style='float:right; color: #f5ab00;'>$pro_price,-</h3>
					</div>
                    
                        
				</div>
            </a>
		
		";
	
	}
	}
	?>
				
				</div>
			
			</div>
		</div>
		<!--Content wrapper ends-->
		

	
	</div> 
<!--Main Container ends here-->


</body>
</html>