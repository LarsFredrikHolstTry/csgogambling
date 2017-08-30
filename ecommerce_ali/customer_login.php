<!DOCTYPE>

<?php 

session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<html>
	<head>
		<title>My Online Shop</title>
		
	<link rel="stylesheet" href="styles/customer_login.css" media="all" /> 
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
            <div class="login_form">
                <form method="post" action=""> 
                    <table id="login_form_design"> 

                        <tr>
                            <h3>Logg inn eller registrer</h3>
                        </tr>

                        <tr>
                        <td align="left"><b>Brukernavn (epost):</b></td>
                        </tr>
                        
                        <tr>
                            <td><input type="text" 
                            name="email" 
                            oninvalid="this.setCustomValidity('Vennligst fyll inn')" oninput="setCustomValidity('')" 
                            placeholder="eksempel@epost.no" required/></td>
                        </tr>

                        <tr id='passordlogin'>
                            <td align="left"><b>Passord: </b><a style="float:right;" href="checkout.php?forgot_pass" class="glemtpassord">Glemt passord?</a></td>
                        </tr>
                        <tr>
                            <td><input type="password" 
                            name="pass" 
                            oninvalid="this.setCustomValidity('Vennligst fyll inn')" 
                            oninput="setCustomValidity('')"
                            placeholder="Passord" required/></td>
                        </tr>
                    </table> 
                    
                    <div class="trrr">
                            <td><input type="submit" class="loginbutton" name="login" value="LoGg InN" /></td>
                            <td><a href="customer_register.php" style="text-decoration:none;" class="registrerher">Registrer her</a></td>
                    </div>
                </form>


                <?php 
                if(isset($_POST['login'])){

                    $c_email = $_POST['email'];
                    $c_pass = $_POST['pass'];

                    $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";

                    $run_c = mysqli_query($con, $sel_c);

                    $check_customer = mysqli_num_rows($run_c); 

                    if($check_customer==0){

                        echo "<h5>Passord eller Email er feil, prøv igjen.</h5>";
                        exit();

                    }
                    $ip = getIp(); 

                    $sel_cart = "select * from cart where ip_add='$ip'";

                    $run_cart = mysqli_query($con, $sel_cart); 

                    $check_cart = mysqli_num_rows($run_cart); 

                    if($check_customer>0 AND $check_cart==0){

                        $_SESSION['customer_email']=$c_email; 

                        echo "<script>window.open('customer/my_account.php','_self')</script>";

                    } else {
                        $_SESSION['customer_email']=$c_email; 

                        echo "<script>window.open('customer/my_account.php','_self')</script>";

                    }
                }

                ?>
            </div>
		</div>
		<!--Content wrapper ends-->
		</div>
    <!--Main wrapper ends here-->


</body>
</html>