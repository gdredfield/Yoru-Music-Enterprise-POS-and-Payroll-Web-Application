<?php  
	include 'db_connection.php';
	$con = OpenCon();

	if(isset($_GET['empnum'])){
		$emp=$_GET['empnum'];
		$sql = "select * from pos2 where pos2_id='$emp'";
		$result = mysqli_query($con, $sql);
	}
	else{
		$sql = "select * from pos2";
		$result = mysqli_query($con, $sql);
	
	}
		
	

	if($_SERVER["REQUEST_METHOD"]=="POST"){

			if(isset($_POST['ser'])){
				$emps = $_POST['empsearch'];
				if(empty($emps)){
					header("Location: salespos2.php");
				}
				else{
					header("Location: salespos2.php?empnum=$emps");
				}
			}
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Employee Payroll List</title>
		<link href="styles/tablestyle.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
		<script src="js/jquery-3.6.0.min.js"></script>
	</head>
	<body></br></br></br>
			<div id="main">
			<h1>SALES SUMMARY OF POS B <span>LIST</span></h1>
			<div class="sea">
			<form method="POST">
			<label for="search" class="lp">Sales Number:</label>
			<input type="text" name="empsearch" id="empsearch" class="ttbox" value="">
			<input type="submit" name="ser" id="ser" class="arbut" value="Search"></div>
			</form>
			<table>
				<thead>
				<tr>
					<th>Sales Number</th>
					<th>Item Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Discount Amount</th>
					<th>Discounted Amount</th>
					<th>Total Quantity</th>
					<th>Total Discount</th>
					<th>Total Discounted Price</th>
					<th>Cash Paid</th>
					<th>Change Given</th>
				<tr>
				<thead>

				
					<?php  if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
					?>
				<tbody>
								<tr>
									<td style="border-left:none; cursor:auto;" class="td2"><?php echo $row['pos2_id']; ?></td>
									<td style="cursor:auto;"><?php echo $row['item_name']; ?></td>
									<td style="cursor:auto;"><?php echo $row['price']; ?></td>
									<td style="cursor:auto;"><?php echo $row['quantity']; ?></td>
									<td style="cursor:auto;"><?php echo $row['discount_amount']; ?></td>
									<td style="cursor:auto;"><?php echo $row['discounted_amount']; ?></td>
									<td style="cursor:auto;"><?php echo $row['total_quantity']; ?></td>
									<td style="cursor:auto;"><?php echo $row['total_discount']; ?></td>
									<td style="cursor:auto;"><?php echo $row['total_discounted']; ?></td>
									<td style="cursor:auto;"><?php echo $row['cash']; ?></td>
									<td style="border-right:none; cursor:auto;" class="td2"><?php echo $row['change2']; ?></td>

								</tr>
				</tbody>

					<?php
						}
						
						
					}
					else {
							echo "<script> alert('No Results!'); </script>";
							
						}
						mysqli_close($con);
					
				  	?>
			</table>
			</div>
		
	</body>
</html>