<?php 
session_start(); 

if(!isset($_SESSION['user_email'])){
	}
else {

?>

<!DOCTYPE> 

<html>
	<head>
        <title>Admin Panel</title> 

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>


<body> 

	<div class="main_wrapper">

		<div id="right">
		<h3 style="color: white;font-family: 'Raleway', sans-serif;"><i class="fa fa-list"></i> Meny</h3>
			
			<a href="index.php?insert_product"><i class="fa fa-plus"></i> Nytt produkt</a>
			<a href="index.php?view_products"><i class="fa fa-list-ul"></i> Alle produkter</a>
			<a href="index.php?insert_cat"><i class="fa fa-plus"></i> Ny kategori</a>
			<a href="index.php?view_cats"><i class="fa fa-list-ul"></i> Alle kategorier</a>
			<a href="index.php?insert_brand"><i class="fa fa-plus"></i> Nytt merke</a>
			<a href="index.php?view_brands"><i class="fa fa-list-ul"></i> Alle merker</a>
			<a href="index.php?view_customers"><i class="fa fa-users"></i> Brukere</a>
			<a href="index.php?view_orders"><i class="fa fa-shopping-cart"></i> Bestillinger</a>
			<a href="index.php?view_payments"><i class="fa fa-paypal"></i> Betalinger</a>
			<a href="logout.php"><i class="fa fa-power-off"></i> Logg ut</a>
		
		</div>
		
		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php 
		if(isset($_GET['insert_product'])){
		
		include("insert_product.php"); 
		
		}
		if(isset($_GET['view_products'])){
		
		include("view_products.php"); 
		
		}
		if(isset($_GET['edit_pro'])){
		
		include("edit_pro.php"); 
		
		}
		if(isset($_GET['insert_cat'])){
		
		include("insert_cat.php"); 
		
		}
		
		if(isset($_GET['view_cats'])){
		
		include("view_cats.php"); 
		
		}
		
		if(isset($_GET['edit_cat'])){
		
		include("edit_cat.php"); 
		
		}
		
		if(isset($_GET['insert_brand'])){
		
		include("insert_brand.php"); 
		
		}
		
		if(isset($_GET['view_brands'])){
		
		include("view_brands.php"); 
		
		}
		if(isset($_GET['edit_brand'])){
		
		include("edit_brand.php"); 
		
		}
		if(isset($_GET['view_customers'])){
		
		include("view_customers.php"); 
		
		}
		
		?>
		</div>

	</div>


</body>
</html>

<?php } ?>