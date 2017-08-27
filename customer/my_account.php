<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");

?>
<html>
	<head>
		<title>Min side - Dingser.no</title>
		
		
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
                        echo '<p><a href="my_account.php">'. $_SESSION['customer_email']. '</a></p> ';

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
                <li><a id="dingser" href="../index.php">dingser.no</a></li>

                <li><a href="../cart.php">Handlevogn <a style="color: black;"><?php total_price(); ?></a></a></li>
                
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
        
    </div>
    <!--Navigation Bar ends-->
	
    <!--Content wrapper starts-->
    <div class="content_wrapper">

        <div id="sidebar">

            <div id="sidebar_title">Min side</div>

            <ul id="cats">
            <?php 
            $user = $_SESSION['customer_email'];

            $get_img = "select * from customers where customer_email='$user'";

            $run_img = mysqli_query($con, $get_img); 

            $row_img = mysqli_fetch_array($run_img); 

            $c_name = $row_img['customer_name'];


            ?>
            <li><a href="my_account.php?my_orders">Mine ordre</a></li>
            <li><a href="my_account.php?edit_account">Endre bruker</a></li>
            <li><a href="my_account.php?change_pass">Endre passord</a></li>
            <li><a href="logout.php">Logg ut</a></li>

            </ul>

        </div>


        <div id="content_area">

        <?php cart(); ?>


            <div id="products_box">

            <?php 
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['edit_account'])){
                    if(!isset($_GET['change_pass'])){
                        if(!isset($_GET['delete_account'])){

            echo "
            <div id='velkommennavn'><h2>Velkommen, $c_name!</h2></div>";
                        }
                    }
                }
            }
            ?>

            <?php 
            if(isset($_GET['edit_account'])){
            include("edit_account.php");
            }
            if(isset($_GET['change_pass'])){
            include("change_pass.php");
            }
            if(isset($_GET['delete_account'])){
            include("delete_account.php");
            }


            ?>

            </div>

        </div>

    </div>
    <!--Content wrapper ends-->



</body>
</html>