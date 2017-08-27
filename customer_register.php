<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");
include("includes/db.php"); 
?>
<html>
	<head>
		<title>My Online Shop</title>
		
		
	<link rel="stylesheet" href="styles/customer_register.css" media="all" /> 
	</head>
	
<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
        <!-- support - logg inn -->
        <div class="loginreg" style="text-align: center;">
            <ul>
                <li><a href="customer_login.php">Logg inn / registrer</a></li>
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
            <div class="register_form">
				<form action="customer_register.php" method="post" enctype="multipart/form-data">
					<table id="register_form_design">
                        
						<tr align="center">
							<h3>REGISTRER DEG</h3>
						</tr>
						
                        <!-- NAVN -->
						<tr>
                            <td align="left"><b>Navn:</b></td>
                        </tr>
                        <tr>
							<td><input type="text" name="c_name" placeholder="Ola Nordmann" required/></td>
						</tr>
						
                        <!-- EMAIL -->
						<tr>
                            <td align="left"><b>Email:</b></td>
						</tr>
                        <tr>
                            <td><input type="text" name="c_email"  placeholder="email@eksempel.no" required/></td>
                        </tr>
                        
                        <!-- PASSORD -->
						<tr>
                            <td align="left"><b>Passord:</b></td>
                        </tr>
                        <tr>
							<td><input type="password" name="c_pass"  placeholder="••••••••••••••" required/></td>
						</tr>
                        
                        <!-- ADDRESSE -->
						<tr>
                            <td align="left"><b>Adresse:</b></td>
                        </tr>
                        <tr>
							<td><input type="text" name="c_address" placeholder="Norgesgate 2" required/></td>
                        </tr>
                        
                        <!-- Post Nummer -->
						<tr>
                            <td align="left"><b>Post Nummer:</b></td>
                        </tr>
                        <tr>
							<td><input type="text" name="c_city" placeholder="0123 Oslo" required/></td>
						</tr>
						
                        <!-- TLF -->
						<tr>
                            <td align="left"><b>Tlf nummer:</b></td>
                        </tr>
                        <tr>
							<td><input type="text" name="c_contact" placeholder="+47 12 34 56 78" required/></td>
						</tr>
					
					</table>
                    
                    <div class="trrr">
						<td ><input type="submit" name="register" class="registrerher" value="registrer" /></td>
                    </div>
				</form>
                
                <?php 
	if(isset($_POST['register'])){
	
		
		$ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
		
		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		
		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	
		$run_c = mysqli_query($con, $insert_c); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
	}

?>
			</div>
		</div>
		<!--Content wrapper ends-->
	</div> 
<!--Main Container ends here-->
</body>
</html>











