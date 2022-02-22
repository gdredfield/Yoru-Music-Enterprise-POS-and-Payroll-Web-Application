<?php 

$price=0;
$quantity=0;
$dc=.25;
$discount=0;
$dprice=0;
$totala=0;
$totalq=0;
$cash=0;
$change=0;
$tarea="";

if($_SERVER["REQUEST_METHOD"]==="POST"){

		//calculate
			if (isset($_POST['save'])){
			$cash = ($_POST['cash']);
			$change = ($_POST['change']);
			$quantity = ($_POST['quantity']);
			$price = ($_POST['price']);
			$tarea = ($_POST['txtare']);
			$discount=($_POST['discount']);
			$dprice=($_POST['dprice']);
			$totalq=$_POST['totalq'];
			$totala=$_POST['totala'];
				if($cash==0 || $cash=="" and $change==0 || $change==""){
					echo "<script> alert('Please complete the transaction before saving!'); </script>";
					echo "<script>window.location.href='http://localhost/Doctor/page1.php?access=user'; </script>'";
				}
				elseif($change<0){
					echo "<script> alert('Please enter a valid amount!'); </script>";
					echo "<script>window.location.href='http://localhost/Doctor/page1.php?access=user'; </script>'";
				}
				else{
					include "db_connection.php";
					$con = OpenCon();
					$sql = "insert into pos1(price,quantity,discount_amount,discounted_amount,total_bill,total_quantity,cash,change1,order_summary) values('$price','$quantity','$discount','$dprice','$totala','$totalq','$cash','$change','$tarea');";
					if ($con->query($sql) === TRUE) {
								echo "<script> alert('Transaction Saved Successfully!') </script>";
								echo "<script>window.location.href='http://localhost/Doctor/page1.php?access=user'; </script>'";
							}
							else {
								echo "Error: " . $sql . "<br>" . $con->error;
							}

							$con->close();
						}
			
		}

		else if(isset($_POST['exit'])){
			if(isset($_GET['access'])){
				$access=$_GET['access'];
				if($access=="user"){
					echo "<script>window.location.href='http://localhost/Doctor/login.php'; </script>'";
				}
			
			}
		}

		else if(isset($_POST['cancel'])){
					echo "<script>window.location.href='http://localhost/Doctor/salespos1.php'; </script>'";
		}
	}


?>


<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Yoru Ordering</title>
	<link href="styles/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript">
		let pro=["","Gibson","Takamine","Ahamay","Ovation","Ibañez","Fender","Hofner","Schecter","Master Craft","Taylor","Swift","Martin"];
		let pri=[0,5000,6000,7000,8000,9000,10000,11000,12000,12500,11500,8500,9500];
		let muci1=[5000,350,5000,500,1500];
		let muci11=["Global Guitar","Guitar Strap","Amplifier","Cord","Generic Pedals"];
		let muci2=[7000,350,8000,500,4000];
		let muci22=["RJ Guitar","Strap + Pick","Marshall Amp","Cord","Digital Pedals"];

		let accesss = window.location.href.split('=');
		let access = accesss[accesss.length -1];

		$(document).ready(function(){
			$('.cbox').click(function(){
				var prod="";
				var pric=0;

			//uncheck all music package
				//package 1
				$('#muc').prop("checked",false);
				$('.mucu').each(function(){
					$(this).prop( "checked", $('#muc').prop("checked"));
				});
				//package 2
				$('#muc1').prop("checked",false);
				$('.mucu1').each(function(){
					$(this).prop( "checked", $('#muc1').prop("checked"));
				});

				$('.cbox:checked').each(function(){
							prod+=pro[$(this).val()]+"\n";
							pric+=pri[$(this).val()];
					});
					/*prod+=$(this).val()+ "\n";*/
					$('#price').val(pric);
					$('#txtare').val(prod);			
				});

			
			//package 1
			//select all function
			$('#muc').click(function(){

				//left checkboxes uncheck
				$('.cbox').each(function(){
					$(this).prop( "checked",false);
				});

				//package2 uncheck
				$('#muc1').prop("checked",false);
				$('.mucu1').each(function(){
					$(this).prop( "checked", $('#muc1').prop("checked"));
				});

				var pac="";
				var prit=0;
				$('.mucu').each(function(){
					$(this).prop( "checked", $('#muc').prop("checked"));

				});
				$('.mucu:checked').each(function(){
						pac+=muci11[$(this).val()]+"\n";
						prit+=muci1[$(this).val()];


					});

				$('#txtare').val(pac);
				$('#price').val(prit);
			});

			//select for each package inclusion
			$('.mucu').click(function(){
				var pac="";
				var prit=0;
								//uncheck package 2
								$('#muc1').prop("checked",false);
								$('.mucu1').each(function(){
									$(this).prop( "checked", $('#muc1').prop("checked"));
								});
					$('.mucu:checked').each(function(){
						pac+=muci11[$(this).val()]+"\n";
						prit+=muci1[$(this).val()];
					});
				$('#txtare').val(pac);
				$('#price').val(prit);
				});

			//package 2
			$('#muc1').click(function(){
				var pac="";
				var prit=0;

				//left checkboxes uncheck
				$('.cbox').each(function(){
					$(this).prop( "checked",false);

				});

				// package 1 uncheck
				$('#muc').prop("checked",false);
				$('.mucu').each(function(){
					$(this).prop( "checked", $('#muc').prop("checked"));
				});

				$('.mucu1').each(function(){
					$(this).prop( "checked", $('#muc1').prop("checked"));
				});
				$('.mucu1:checked').each(function(){
						pac+=muci22[$(this).val()]+"\n";
						prit+=muci2[$(this).val()];
					});

				$('#txtare').val(pac);
				$('#price').val(prit);
			});

			$('.mucu1').click(function(){
				var pac="";
				var prit=0;
								//package 1 uncheck
								$('#muc').prop("checked",false);
								$('.mucu').each(function(){
									$(this).prop( "checked", $('#muc').prop("checked"));
								});
					$('.mucu1:checked').each(function(){
						pac+=muci22[$(this).val()]+"\n";
						prit+=muci2[$(this).val()];
					});
				$('#txtare').val(pac);
				$('#price').val(prit);
				});
				

			$('#calculet').click(function(e){
				e.preventDefault();
				var price, quantity, dc=.25, discount, dprice, totala, totalq, cash, change;
				price=$('#price').val()-0;
				quantity=$('#quantity').val()-0;
				discount=(price*quantity)*dc;
				dprice=(price*quantity)-discount;
				totala=($('#totala').val()-0)+dprice;
				totalq=($('#totalq').val()-0)+quantity;

				$('#price').val(price);
				$('#quantity').val(quantity);
				$('#discount').val(discount);
				$('#dprice').val(dprice);
				$('#totala').val(totala);
				$('#totalq').val(totalq);
			});


			$('#changer').click(function(e){
				e.preventDefault();
				var price, quantity, dc=.25, discount, dprice, totala, totalq, cash, change;
				price=$('#price').val()-0;
				quantity=$('#quantity').val()-0;
				discount=(price*quantity)*dc;
				dprice=(price*quantity)-discount;
				totala=($('#totala').val()-0);
				totalq=($('#totalq').val()-0);
				cash=$('#cash').val()-0;
				change=cash-totala;

				$('#price').val(price);
				$('#quantity').val(quantity);
				$('#discount').val(discount);
				$('#dprice').val(dprice);
				$('#totala').val(totala);
				$('#totalq').val(totalq);
				$('#cash').val(cash);
				$('#change').val(change);
			});

			$('#new').click(function(e){
				e.preventDefault();
				$('#price').val("");
				$('#quantity').val("");
				$('#discount').val("");
				$('#dprice').val("");
				$('#totala').val("");
				$('#totalq').val("");
				$('#cash').val("");
				$('#change').val("");
				$('#txtare').val("");

				$('.cbox:checked').each(function(){
					$(this).prop( "checked", false );
				//package 1
				$('#muc').prop("checked",false);
				$('.mucu').each(function(){
					$(this).prop( "checked", $('#muc').prop("checked"));
				});
				//package 2
				$('#muc1').prop("checked",false);
				$('.mucu1').each(function(){
					$(this).prop( "checked", $('#muc1').prop("checked"));
				});
				});
			});

			$('#exit').click(function(e){
				if (access==="user"){
					window.location.href = "http://localhost/Doctor/login.php";
				}

			});

			$('#cancel').click(function(e){
					window.location.href = "http://localhost/Doctor/login.php";
			});
			});
	</script>
	</head>
<body>
		<div id="main">
		<h1>YORU<span>MUSIC</span></h1>
		<h2>Order details</h2>
		<form method="POST">
				<label class="leftlabel">Price</label>
				 <input type="text" id="price" name="price" class="text" value="" readonly>
					<br><center><hr></center><br>
				<label class="leftlabel">Quantity</label>
				 <input type="text" id="quantity" name="quantity" class="text2" value="">
					<br><center><hr></center><br>
				<label class="leftlabel">Discount</label>
				 <input type="text" id="discount" name="discount" class="text" value="" readonly>
				 	<br><center><hr></center><br>
				<label class="leftlabel">Discounted price</label>
				 <input type="text" id="dprice" name="dprice" class="text" value="" readonly>
				 	<br><center><hr></center><br>
				 <label class="leftlabel">Total amount</label>
				 <input type="text" id="totala" name="totala" class="text" value="" readonly>
				 	<br><center><hr></center><br>
				 <label class="leftlabel">Total Quantity</label>
				 <input type="text" id="totalq" name="totalq" class="text" value="" readonly>
				 	<br><center><hr></center><br>
				 <label class="leftlabel">Cash Paid</label>
				 <input type="text" id="cash" name="cash" class="text2" value="">
				 	<br><center><hr></center><br>
				 <label class="leftlabel">Change</label>
				 <input type="text" id="change" name="change" class="text" value="" readonly>
				 	<br><center><hr></center><br>

						 
		
		</div>

		<div id="submain">
			<div class="pcontainer">
				<p class="price2" style="position:relative; margin-top: 55px;">Musical Package 1</p>
				<div class="package"><input type="checkbox" class="muc" id="muc" name="muc1">
				</div>
        		<div class="lebel2">
        		<input type="checkbox" class="mucu" id="instru" name="instru" value="0" readonly>
        		<label for="a" class="detail">Global Guitar</label>
        		</div>
        		<div class="lebel2">
        		<input type="checkbox" class="mucu" id="strap" value="1" style="position:relative; bottom: 15px;">
        		<label for="a" class="detail" style="position:relative; bottom: 13px;">Guitar Strap</label>
        		</div>
        		<div class="lebel2">
        		<input type="checkbox" class="mucu" id="amplif" value="2" style="position:relative; bottom: 27px;">
        		<label for="a" class="detail" style="position:relative; bottom: 25px;">Amplifier</label>
        		</div>
        		<div class="lebel2">
        		<input type="checkbox" class="mucu" id="cord" value="3" style="position:relative; bottom: 39px;">
        		<label for="a" class="detail" style="position:relative; bottom: 37px;">Cord</label>
        		</div>
        		<div class="lebel2">
        		<input type="checkbox" class="mucu" id="peds" value="4" style="position:relative; bottom: 51px;">
        		<label for="a" class="detail" style="position:relative; bottom: 49px;">Generic Pedals</label>
        		</div> 		
			</div>

			<div class="pcontainer">
				<p class="price2" style="position:relative; margin-top: 55px;">Musical Package 2</p>
				<div class="package"><input type="checkbox" class="muc" id="muc1" name="muc2">
				</div>
        		<div class="lebel2">
        		<input type="checkbox" class="mucu1" id="instru1" name="instru1" value="0" readonly>
        		<label for="a" class="detail">RJ Guitar</label>
        		</div>
        		<div class="lebel2">
        		<input type="checkbox" class="mucu1" id="strap1" value="1" style="position:relative; bottom: 15px;">
        		<label for="a" class="detail" style="position:relative; bottom: 13px;">Strap + Pick</label>
        		</div>
        		<div class="lebel2">
        		<input type="checkbox" class="mucu1" id="amplif1" value="2" style="position:relative; bottom: 27px;">
        		<label for="a" class="detail" style="position:relative; bottom: 25px;">Marshall Amp</label>
        		</div>
        		<div class="lebel2">
        		<input type="checkbox" class="mucu1" id="cord" value="3" style="position:relative; bottom: 39px;">
        		<label for="a" class="detail" style="position:relative; bottom: 37px;">Cord</label>
        		</div>
        		<div class="lebel2">
        		<input type="checkbox" class="mucu1" id="peds" value="4" style="position:relative; bottom: 51px;">
        		<label for="a" class="detail" style="position:relative; bottom: 49px;">Digital Pedals</label>
        		</div> 			
			</div>
			<h2>Order Summary</h2>
			<div class="picboxmid" style="position: relative; left:22px;">
				<textarea id="txtare" name="txtare" rows="10" cols="30" value="<?php echo $tarea; ?>"readonly></textarea>
			</div>
		</div>
	
		<div class="container">
		<ul>
			<li> 
				<div class="boxes">
				<p class="time">Guitar</p>
				<div class="img-box">
				<img src="img/1.png">
				</div>
      			<!--<p class="price"></p>-->
    			
      			<div class="lebel">
        		<input type="checkbox" class="cbox" id="cbox1" value="1">
        		<label for="a" class="detail">Gibson</label>
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
        		<input type="checkbox" class="cbox" id="cbox2" value="2">
        		<label for="a" class="detail">Takamine</label>
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
        		<input type="checkbox" class="cbox" id="cbox3" value="3">
        		<label for="a" class="detail">Ahamay</label>
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
        		<input type="checkbox" class="cbox" id="cbox4" value="4">
        		<label for="a" class="detail">Ovation</label>
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
        		<input type="checkbox" class="cbox" id="cbox5" value="5">
        		<label for="a" class="detail">Ibañez</label>
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
        		<input type="checkbox" class="cbox" id="cbox6" value="6">
        		<label for="a" class="detail">Fender</label>
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
        		<input type="checkbox" class="cbox" id="cbox7" value="7">
        		<label for="a" class="detail">Hofner</label>
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
        		<input type="checkbox" class="cbox" id="cbox8" value="8">
        		<label for="a" class="detail">Schecter</label>
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
        		<input type="checkbox" class="cbox" id="cbox9" value="9">
        		<label for="a" class="detail">Master Craft</label>
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
        		<input type="checkbox" class="cbox" id="cbox10" value="10">
        		<label for="a" class="detail">Taylor</label>
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
        		<input type="checkbox" class="cbox" id="cbox11" value="11">
        		<label for="a" class="detail">Swift</label>
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
        		<input type="checkbox" class="cbox" id="cbox12" value="12">
        		<label for="a" class="detail">Martin</label>
        		</div>
        	</div>
			</li>
		</ul>
			<div class="arryy">
			<button type="submit" name="calculet" id="calculet" class="sub1" value="">Calculate Bill</button>
			<button type="submit" name="changer" id="changer" class="sub1" value="">Change</button>
			<button type="submit" name="save" id="save" class="sub1" value="">Save Transaction</button>
			<button type="submit" name="new" id="new" class="sub1" value="">New</button>
			<button type="submit" name="cancel" id="cancel" class="sub1" value="">Cancel</button>
			<button type="submit" name="exit" id="exit" class="sub1" value="">Exit</button>
			</div>
	</form>	
</div>
</body>
</html>