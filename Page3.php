<?php
session_start();
$access=$_SESSION['access'];

//initialization
$item="";
$quantity="";
$price="";
$total_discount=0;
$total_quantity=0;
$total_damount=0;
$discount=0;
$disam=0.00;
$change=0.00;
$cash=0.00;


	if($_SERVER["REQUEST_METHOD"]==="POST"){

		//calculate
			if (isset($_POST['calcule'])){
			$item = ($_POST['item']);
			$quantity = ($_POST['quantity']);
			$price = ($_POST['price']);

			if($quantity==""||$price==""){
				echo "<script> alert('Please input quantity or price!'); </script>";
				echo "<script>window.location.href='http://localhost/Doctor/page3.php?access=user'; </script>'";
			}
			else{
				//formula
				$radioval = $_POST['cbx'];
				if ($radioval==1){
					$dc = 0.30;
					$discount=($price*$quantity)*$dc;
					$disam=(($quantity*$price)-$discount);
				}
				else if ($radioval==2){
					$dc = 0.20;
					$discount=($price*$quantity)*$dc;
					$disam=(($quantity*$price)-$discount);
				}
				else if ($radioval==3){
					$dc = 0.10;
					$discount=($price*$quantity)*$dc;
					$disam=(($quantity*$price)-$discount);
				}
				else if ($radioval==4){
					$dc = 1;
					$discount= 0;
					$disam=($quantity*$price);
				}
				$total_discount=$_POST['total_discount']+$discount;
				$total_quantity=$_POST['total_quantity']+$quantity;
				$total_damount=$_POST['total_damount']+$disam;
		}
			}

		
		//change
			else if (isset($_POST['change'])){
			if (($_POST['cash'])==0 || ($_POST['cash'])<0 || (($_POST['cash'])<($_POST['total_damount']))){
					$item = ($_POST['item']);
					$quantity = ($_POST['quantity']);
					$price = ($_POST['price']);
					$cash = ($_POST['cash']);

					$discount= ($_POST['discount']);
					$disam= ($_POST['disam']);

					$total_discount=$_POST['total_discount'];
					$total_quantity=$_POST['total_quantity'];
					$total_damount=$_POST['total_damount'];
					$change= 0;
					}

				else{
					$item = ($_POST['item']);
					$quantity = ($_POST['quantity']);
					$price = ($_POST['price']);
					$cash = ($_POST['cash']);

					$discount= ($_POST['discount']);
					$disam= ($_POST['disam']);

					$total_discount=$_POST['total_discount'];
					$total_quantity=$_POST['total_quantity'];
					$total_damount=$_POST['total_damount'];
					$change= ($cash-$total_damount);
					}
		}
		//new button
		else if (isset($_POST['new'])){
			$item="";
			$quantity="";
			$price="";
			$discount="";
			$disam="";
			$cash=0;
			$change=0;
			$total_discount=0;
			$total_damount=0;
			$total_damount=0;
		}

		else if (isset($_POST['save'])){
			if (($_POST['cash'])==0 || ($_POST['cash'])<0){
				
				echo "<script> alert('Please complete the transaction before saving!'); </script>";
				echo "<script>window.location.href='http://localhost/Doctor/page3.php?access=user'; </script>'";
				$item = ($_POST['item']);
				$quantity = ($_POST['quantity']);
				$price = ($_POST['price']);
				$cash = ($_POST['cash']);

				$discount= ($_POST['discount']);
				$disam= ($_POST['disam']);

				$total_discount=$_POST['total_discount'];
				$total_quantity=$_POST['total_quantity'];
				$total_damount=$_POST['total_damount'];
				$change= 0;

			}	
			else{
				$item = ($_POST['item']);
				$quantity = ($_POST['quantity']);
				$price = ($_POST['price']);
				$cash = ($_POST['cash']);

				$discount= ($_POST['discount']);
				$disam= ($_POST['disam']);

				$total_discount=$_POST['total_discount'];
				$total_quantity=$_POST['total_quantity'];
				$total_damount=$_POST['total_damount'];
				$change= $_POST['change2'];
				include "db_connection.php";
				$con = OpenCon();
				$sql = "insert into pos2(item_name,quantity,price,discount_amount,discounted_amount,total_quantity,total_discount,total_discounted,cash,change2) values('$item','$quantity','$price','$discount','$disam','$total_quantity','$total_discount','$total_damount','$cash','$change');";
					if ($con->query($sql) === TRUE) {
						echo "<script> alert('Transaction Saved Successfully!') </script>";
						echo "<script>window.location.href='http://localhost/Doctor/page3.php?access=user'; </script>'";
					}
					else {
						echo "Error: " . $sql . "<br>" . $con->error;
					}

					$con->close();
			}

	}


		else if (isset($_POST['exit'])){
			if(isset($_GET['access'])){
				$access=$_GET['access'];
				if($access=="user"){
					echo "<script>window.location.href='http://localhost/Doctor/login.php'; </script>'";
				}
			
			}
		}

	}
?>


<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Yoru POS</title>
	<link href="styles/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript">
		let pro=["","Gibson","Takamine","Ahamay","Ovation","Ibañez","Fender","Hofner","Schecter","Master Craft","Taylor","Swift","Martin"];
		let pri=[0,5000,6000,7000,8000,9000,10000,11000,12000,12500,11500,8500,9500];

		$(document).ready(function(){
			
				$('#lbl1').click(function(){
					$('#price').val(5000);
					$('#name').val("Gibson");
				});
				$('#lbl2').click(function(){
					$('#price').val(6000);
					$('#name').val("Takamine");
				});
				$('#lbl3').click(function(){
					$('#price').val(7000);
					$('#name').val("Ahamay");
				});
				$('#lbl4').click(function(){
					$('#price').val(8000);
					$('#name').val("Ovation");
				});
				$('#lbl5').click(function(){
					$('#price').val(9000);
					$('#name').val("Ibañez");
				});
				$('#lbl6').click(function(){
					$('#price').val(10000);
					$('#name').val("Fender");
				});
				$('#lbl7').click(function(){
					$('#price').val(11000);
					$('#name').val("Hofner");
				});
				$('#lbl8').click(function(){
					$('#price').val(12000);
					$('#name').val("Schecter");
				});
				$('#lbl9').click(function(){
					$('#price').val(12500);
					$('#name').val("Taylor");
				});
				$('#lbl10').click(function(){
					$('#price').val(11500);
					$('#name').val("Swift");
				});
				$('#lbl11').click(function(){
					$('#price').val(8500);
					$('#name').val("Master Craft");
				});
				$('#lbl12').click(function(){
					$('#price').val(9500);
					$('#name').val("Martin");
				});


		});
	</script>
	</head>
<body>
		<form action = "" method="POST">
		<div id="main3">
		<h1>YORU<span>MUSIC</span></h1>
		<h2>Point of Sale</h2>
		<div class="main3body"><br>
		<label class="leftlabel3">Item Name</label>
		<input type="text" id="name" name="item" class="text33" value="<?php echo $item; ?>">
		<br><br>
		<label class="leftlabel3">Quantity</label>
		<input type="text" id="cpass" name="quantity" class="text3" value="<?php echo $quantity; ?>">
		<label class="leftlabel4">Senior Citizen</label>
		<input type="radio" id="cbx" name="cbx" class="cboxright" value="1">
		<br><br>
		<label class="leftlabel3">Price</label>
		<input type="text" id="price" name="price" class="text3" value="<?php echo $price; ?>">
		<label class="leftlabel4">Discount Card</label>
		<input type="radio" id="cbx" name="cbx" class="cboxright" value="2">
		<br><br>
		<label class="leftlabel3">Discount</label>
		<input type="text" id="cpass" name="discount" class="text3" value="<?php echo $discount; ?>" readonly>
		<label class="leftlabel4">Employee Discount</label>
		<input type="radio" id="cbx" name="cbx" class="cboxright" value="3">
		<br><br>
		<label class="leftlabel3">Discounted Amount</label>
		<input type="text" id="cpass" name="disam" class="text3" value="<?php echo $disam; ?>" readonly>
		<label class="leftlabel4">No Discount</label>
		<input type="radio" id="cbx" name="cbx" class="cboxright" value="4" checked>
		<br><br>
		<label class="leftlabel3">Cash</label>
		<input type="text" id="cash" name="cash" class="text33" value="<?php echo $cash; ?>">
		<br><br>
		<label class="leftlabel3">Change</label>
		<input type="text" id="change2" name="change2" class="text33" value="<?php echo $change; ?>" readonly>
		<br><br>
		</div>
		<div class="main3body2">
			<h2>Summary</h2>
			<label class="leftlabel3">Total Quantity</label>
			<input type="text" id="total_quantity" name="total_quantity" class="text34" value="<?php echo $total_quantity ?>" readonly>
			<br><br>
			<label class="leftlabel3">Total Discount</label>
			<input type="text" id="total_discount" name="total_discount" class="text34" value="<?php echo $total_discount; ?>" readonly>
			<br><br>
			<label class="leftlabel3">Total Discounted Amount</label>
			<input type="text" id="total_damount" name="total_damount" class="text34" value="<?php echo $total_damount; ?>" readonly>
			<br><br>
		</div>

		<div class="main3body3">

			<div class="arry">
		<input type="submit" name="calcule" id="button3" value="Calculate">
		<input type="submit" name="change" id="button3" value="Change">
		<input type="submit" name="new" id="button3" value="New">
		<input type="submit" name="save" id="button3" value="Save">
		<input type="submit" name="exit" id="button3" value="Exit">
			</div>
			
		<!--<div class="calcu1">
			<input type="button" name="btn" id="button4" value="/">
			<input type="button" name="btn" id="button4" value="*">
			<input type="button" name="btn" id="button4" value="-">
			<input type="button" name="btn" id="button4" value="+">

		</div>
		<div class="calcu2">
			<input type="button" name="btn" id="button4" value="9">
			<input type="button" name="btn" id="button4" value="8">
			<input type="button" name="btn" id="button4" value="7">
			<input type="button" name="btn" id="button4" value="6">
		</div>
		<div class="calcu3">
			<input type="button" name="btn" id="button4" value="5">
			<input type="button" name="btn" id="button4" value="4">
			<input type="button" name="btn" id="button4" value="3">
			<input type="button" name="btn" id="button4" value="2">
		</div>
		<div class="calcu4">
			<input type="button" name="btn" id="button4" value="1">
			<input type="button" name="btn" id="button4" value=".">
			<input type="button" name="btn" id="button5" value="0">
		</div>
			<input type="button" name="btn" id="enterbutton" value="Enter">-->



		</div>
		</div>
	</form>

		<div class="main3right">
			<h2><span>Item display</span></h2>
			<ul>
			<li> 
				<div class="boxes3">
				<p class="time">Guitar</p>
				<div class="img-box3">
				<img src="img/1.png">
				</div>
      			<div class="lebel">
        		<label class="detail" id="lbl1">Gibson</label>
        		</div>
        	</div>
			</li>

			<li> 
				<div class="boxes">
				<p class="time">Guitar</p>
				<div class="img-box">
				<img src="img/23.png">
				</div>
      			<div class="lebel">
        		<label class="detail" id="lbl2">Takamine</label>
        		</div>
        	</div>
			</li>

			<li> 
				<div class="boxes">
				<p class="time">Guitar</p>
				<div class="img-box">
				<img src="img/3.png">
				</div>
    			
      			<div class="lebel">
        		<label class="detail" id="lbl3">Ahamay</label>
        		</div>
        	</div>
			</li>

			<li> 
				<div class="boxes">
				<p class="time">Guitar</p>
				<div class="img-box">
				<img src="img/4.png">
				</div>

      			<div class="lebel">
        		<label class="detail" id="lbl4">Ovation</label>
        		</div>
        	</div>
			</li>

			<li> 
				<div class="boxes">
				<p class="time">Bass</p>
				<div class="img-box">
				<img src="img/bass1.png">
				</div>
    			
      			<div class="lebel">
        		<label class="detail" id="lbl5">Ibañez</label>
        		</div>
        	</div>
			</li>

			<li> 
				<div class="boxes">
				<p class="time">Bass</p>
				<div class="img-box">
				<img src="img/bass2.png">
				</div>
    			
      			<div class="lebel">
        		<label class="detail" id="lbl6">Fender</label>
        		</div>
        	</div>
			</li>

			<li> 
				<div class="boxes">
				<p class="time">Bass</p>
				<div class="img-box">
				<img src="img/bass3.png">
				</div>

      			<div class="lebel">
        		<label  class="detail" id="lbl7">Hofner</label>
        		</div>
        	</div>
			</li>

			<li> 
				<div class="boxes">
				<p class="time">Bass</p>
				<div class="img-box">
				<img src="img/bass4.png">
				</div>
      			<div class="lebel">
        		<label class="detail" id="lbl8">Schecter</label>
        		</div>
        	</div>
			</li> 

			<li> 
				<div class="boxes">
				<p class="time">Acoustic</p>
				<div class="img-box">
				<img src="img/jj.png">
				</div>
      			<div class="lebel">
        		<label class="detail" id="lbl9">Taylor</label>
        		</div>
        	</div>
			</li> 


			<li> 
				<div class="boxes">
				<p class="time">Acoustic</p>
				<div class="img-box">
				<img src="img/jj2.png">
				</div>
      			<div class="lebel">
        		<label class="detail" id="lbl10">Swift</label>
        		</div>
        	</div>
			</li> 


			<li> 
				<div class="boxes">
				<p class="time">Acoustic</p>
				<div class="img-box">
				<img src="img/jj3.png">
				</div>
      			<div class="lebel">
        		<label class="detail" id="lbl11">Master Craft</label>
        		</div>
        	</div>
			</li> 


			<li> 
				<div class="boxes">
				<p class="time">Acoustic</p>
				<div class="img-box">
				<img src="img/2.png">
				</div>
      			<div class="lebel">
        		<label class="detail" id="lbl12">Martin</label>
        		</div>
        	</div>
			</li> 
		</ul>
		</div>
</body>
</html>


