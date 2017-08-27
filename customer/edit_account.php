		<?php 	
				include("includes/db.php"); 
				
				$user = $_SESSION['customer_email'];
				
				$get_customer = "select * from customers where customer_email='$user'";
				
				$run_customer = mysqli_query($con, $get_customer); 
				
				$row_customer = mysqli_fetch_array($run_customer); 
				
				$c_id = $row_customer['customer_id'];
				$name = $row_customer['customer_name'];
				$email = $row_customer['customer_email'];
				$pass = $row_customer['customer_pass'];
				$country = $row_customer['customer_country'];
				$city = $row_customer['customer_city'];
				$contact = $row_customer['customer_contact'];
				$address= $row_customer['customer_address'];
				$image = $row_customer['customer_image'];
		?>
			
					
            <div id="endrebruker">
                <form action="" method="post" enctype="multipart/form-data">

                        <table id="endrebruker_form">

                            <tr>
                                <h2>Endre din bruker</h2>
                            </tr>

                            <tr>
                                <td align="left">Navn:</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="c_name" value="<?php echo $name;?>" required/></td>
                            </tr>

                            <tr>
                                <td align="left">Email:</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="c_email" value="<?php echo $email;?>" required/></td>
                            </tr>

                            <tr>
                                <td align="left">Adresse:</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="c_address" value="<?php echo $address;?>"/></td>
                            </tr>

                            <tr>
                                <td align="left">Post Nummer:</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="c_city" value="<?php echo $city;?>"/></td>
                            </tr>

                            <tr>
                                <td align="left">Tlf nummer:</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="c_contact" value="<?php echo $contact;?>"/></td>
                            </tr>


                        <tr>
                            <td colspan="6"><input type="submit" name="update" class="endrebrukerknapp" value="endre bruker" /></td>
                        </tr>

                        </table>
                    </form>
				</div>
            
		
		
		
	
<?php 
	if(isset($_POST['update'])){
	
		
		$ip = getIp();
		
		$customer_id = $c_id;
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
		
		move_uploaded_file($c_image_tmp,"customer_images/$c_image");
		
		 $update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass',customer_city='$c_city', customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$customer_id'";
	
		$run_update = mysqli_query($con, $update_c); 
		
		if($run_update){
		
		echo "<script>alert('Your account successfully Updated')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
		
		}
	}





?>










