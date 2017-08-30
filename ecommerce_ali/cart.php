<!DOCTYPE>

<?php 

session_start(); 
include("functions/functions.php");
include("includes/db.php");

?>

<html>
	<head>
		<title>Handlevogn - Dingser.no</title>
        
        <script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous">
        </script>
        <script src="js/functions.js"></script>
        
	<link rel="stylesheet" href="styles/cart.css" media="all" /> 
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
		
			<div id="content_area">
			
			<?php cart(); ?>

				<div id="products_box">
				
			<form action="" method="post" enctype="multipart/form-data">
			
				<table align="center" width="1200px">
					<div class="produktogpris">
                        <tr align="center">
                            <th><h2>Fjern</h2></th>
                            <th><h2>Produkt(er)</h2></th>
                            <th><h2>Pris</h2></th>
                        </tr>
                    </div>
					
		<?php 
		$total = 0;
		
		global $con; 
		
		$ip = getIp(); 
		
		$sel_price = "select * from cart where ip_add='$ip'";
		
		$run_price = mysqli_query($con, $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id']; 
			
			$pro_price = "select * from products where product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($con,$pro_price); 
			
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($pp_price['product_price']);
			
			$product_title = $pp_price['product_title'];
			
			$product_image = $pp_price['product_image']; 
			
			$single_price = $pp_price['product_price'];
			
			$values = array_sum($product_price); 
			
			$total += $values; 
                
					?>
                    
            <tr align="center">
                <div class="product">
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
                    <td><h1><?php echo $product_title; ?></h1><br>
                    <img src="admin_area/product_images/<?php echo $product_image;?>" width="80" height="80"/></td>
                    <td><h1><?php echo $single_price; ?>,-</h1></td>
                </div>
            </tr>
                    
                    
					
				<?php } } ?>
                    
                    <tr align="center">
						<td></td>
						<td></td>
					<td align="right">
                        <h1>Pris: <?php echo $total;?>,-</h1>
                        <h1>Frakt: 79,-</h1>
                        <h1>Totalpris: <?php echo $total+(79); ?></h1>
                    </td>
					</tr>
                    
					<tr align="center">
						<td><input type="submit" name="update_cart" value="Update Cart"/></td>
						<td><input type="submit" name="continue" value="Continue Shopping" /></td>
						<td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button>
                        </td>
					</tr>
				</table> 
			</form>
                    
                    
                    
                    
	<?php 
		
	function updatecart(){
		
		global $con; 
		
		$ip = getIp();
		
		if(isset($_POST['update_cart'])){
		
			foreach($_POST['remove'] as $remove_id){
			
			$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
			
			$run_delete = mysqli_query($con, $delete_product); 
			
			if($run_delete){
			
			echo "<script>window.open('cart.php','_self')</script>";
			
			}
			
			}
		
		}
		if(isset($_POST['continue'])){
		
		echo "<script>window.open('index.php','_self')</script>";
		
		}
	
	}
	echo @$up_cart = updatecart();
	
	?>

				
				</div>
			</div>
		</div>
        
		<!--Content wrapper ends-->
    </div>
    <!--Main Container ends here-->


</body>
</html>