<?php  
	include 'db_connection.php';
	$con = OpenCon();

	if(isset($_GET['empnum'])){
		$emp=$_GET['empnum'];
		$sql = "select payroll.employee_no,personal_info.fname,personal_info.mname,personal_info.lname,personal_info.suffix,payroll.b_income,payroll.h_income,payroll.o_income,payroll.total_deduction,payroll.gross,payroll.net,payroll.payroll_date from payroll inner join personal_info on payroll.employee_no=personal_info.emp_num where payroll.employee_no='$emp'";
		$result = mysqli_query($con, $sql);
	}
	else{
		$sql = "select payroll.employee_no,personal_info.fname,personal_info.mname,personal_info.lname,personal_info.suffix,payroll.b_income,payroll.h_income,payroll.o_income,payroll.total_deduction,payroll.gross,payroll.net,payroll.payroll_date from payroll inner join personal_info on payroll.employee_no=personal_info.emp_num";
		$result = mysqli_query($con, $sql);
	
	}
		
	

	if($_SERVER["REQUEST_METHOD"]=="POST"){

			if(isset($_POST['ser'])){
				$emps = $_POST['empsearch'];
				if(empty($emps)){
					header("Location: payrollreport.php");
				}
				else{
					header("Location: payrollreport.php?empnum=$emps");
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
			<h1>PAYROLL REPORT <span>LIST</span></h1>
			<div class="sea">
			<form method="POST">
			<label for="search" class="lp">Employee Number:</label>
			<input type="text" name="empsearch" id="empsearch" class="ttbox" value="">
			<input type="submit" name="ser" id="ser" class="arbut" value="Search"></div>
			</form>
			<table>
				<thead>
				<tr>
					<th>Employee Number</th>
					<th>Employee Name</th>
					<th>Basic Income</th>
					<th>Honorarium Income</th>
					<th>Other Income</th>
					<th>Total Deductions</th>
					<th>Gross Income</th>
					<th>Net Income</th>
					<th>Paydate</th>
				<tr>
				<thead>

				
					<?php  if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
					?>
				<tbody>
								<tr>
									<td style="border-left:none; cursor:auto;"><?php echo $row['employee_no']; ?></td>
									<td style="cursor:auto;"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?> <?php echo $row['suffix'];?></td>
									<td style="cursor:auto;"><?php echo $row['b_income']; ?></td>
									<td style="cursor:auto;"><?php echo $row['h_income']; ?></td>
									<td style="cursor:auto;"><?php echo $row['o_income']; ?></td>
									<td style="cursor:auto;"><?php echo $row['total_deduction']; ?></td>
									<td style="cursor:auto;"><?php echo $row['gross']; ?></td>
									<td style="cursor:auto;"><?php echo $row['net']; ?></td>
									<td style="border-right:none; cursor:auto;"><?php echo $row['payroll_date']; ?></td>

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