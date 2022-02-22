<?php

$target=""; 

if(isset($_GET['row_id'])){
	$id = $_GET['row_id'];

	include "db_connection.php";
	$con = OpenCon();

	$sql = "select * from personal_info where emp_id='$id'";
	$result = $con->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$emp_num = $row['emp_num'];
			$fname = $row['fname'];
			$mname = $row['mname'];
			$lname = $row['lname'];
			$c_status = $row['civil'];
			$dep = $row['department'];
			$designation = $row['designation'];
			$n_dep = $row['quadep'];
			$emp_status = $row['empstatus'];
			$paydate = $row['pdate'];
			$picpath = $row['picpath'];
		}
	}
}

//basic income
$brateh=0;
$bnum_hours=0;
$bincome=0;

//honorarium
$hrateh=0;
$hnum_hours=0;
$hincome=0;

//other
$orateh=0;
$onum_hours=0;
$oincome=0;

//regular deductions
$ssscon=0;
$philcon=0;
$pagcon=100;
$tax=0;

//loans
$sssloan=0;
$pagloan=0;
$facdep=0;
$facloan=0;
$saloan=0;
$other=0;

$total_deduc=0;


$gross="";
$net="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

		//calculate
		if (isset($_POST['calculate'])){

			$brateh=($_POST['brateh']);
			$bnum_hours=($_POST['bnum_hours']);
			$bincome= $brateh*$bnum_hours;

			$hrateh=($_POST['hrateh']);
			$hnum_hours=($_POST['hnum_hours']);
			$hincome= $hrateh*$hnum_hours;

			$orateh=($_POST['orateh']);
			$onum_hours=($_POST['onum_hours']);
			$oincome= $orateh*$onum_hours;

			$gross= $bincome+$hincome+$oincome;

			//sss
			if ($gross<3250){
				$ssscon=135;
			}
			else if ($gross>=3250 && $gross<=3749.99){
				$ssscon=157.50;
			}
			else if ($gross>=3750 && $gross<=4249.99){
				$ssscon=180;
			}
			else if ($gross>=4250 && $gross<=4749.99){
				$ssscon=202.50;
			}
			else if ($gross>=4750 && $gross<=5249.99){
				$ssscon=225;
			}
			else if ($gross>=5250 && $gross<=5749.99){
				$ssscon=247.50;
			}
			else if ($gross>=5750 && $gross<=6249.99){
				$ssscon=270;
			}
			else if ($gross>=6250 && $gross<=6749.99){
				$ssscon=292.50;
			}
			else if ($gross>=6750 && $gross<=7249.99){
				$ssscon=315;
			}
			else if ($gross>=7250 && $gross<=7749.99){
				$ssscon=337.50;
			}
			else if ($gross>=7750 && $gross<=8249.99){
				$ssscon=360;
			}
			else if ($gross>=8250 && $gross<=8749.99){
				$ssscon=382.50;
			}
			else if ($gross>=8750 && $gross<=9249.99){
				$ssscon=405;
			}
			else if ($gross>=9250 && $gross<=9749.99){
				$ssscon=427.50;
			}
			else if ($gross>=9750 && $gross<=10249.99){
				$ssscon=450;
			}
			else if ($gross>=10250 && $gross<=10749.99){
				$ssscon=472.50;
			}
			else if ($gross>=10750 && $gross<=11249.99){
				$ssscon=495;
			}
			else if ($gross>=11250 && $gross<=11749.99){
				$ssscon=517.50;
			}
			else if ($gross>=11750 && $gross<=12249.99){
				$ssscon=540;
			}
			else if ($gross>=12250 && $gross<=12749.99){
				$ssscon=562.50;
			}
			else if ($gross>=12750 && $gross<=13249.99){
				$ssscon=585;
			}
			else if ($gross>=13250 && $gross<=13749.99){
				$ssscon=607.50;
			}
			else if ($gross>=13750 && $gross<=14249.99){
				$ssscon=630;
			}
			else if ($gross>=14250 && $gross<=14749.99){
				$ssscon=652.50;
			}
			else if ($gross>=14750 && $gross<=15249.99){
				$ssscon=675;
			}
			else if ($gross>=15250 && $gross<=15749.99){
				$ssscon=697.50;
			}
			else if ($gross>=15750 && $gross<=16249.99){
				$ssscon=720;
			}
			else if ($gross>=16250 && $gross<=16749.99){
				$ssscon=742.50;
			}
			else if ($gross>=16750 && $gross<=17249.99){
				$ssscon=765;
			}
			else if ($gross>=17250 && $gross<=17749.99){
				$ssscon=787.50;
			}
			else if ($gross>=17750 && $gross<=18249.99){
				$ssscon=810;
			}
			else if ($gross>=18250 && $gross<=18749.99){
				$ssscon=832.50;
			}
			else if ($gross>=18750 && $gross<=19249.99){
				$ssscon=855;
			}
			else if ($gross>=19250 && $gross<=19749.99){
				$ssscon=877.50;
			}
			else if ($gross>=19750 && $gross<=20249.99){
				$ssscon=900;
			}
			else if ($gross>=20250 && $gross<=20749.99){
				$ssscon=922.50;
			}
			else if ($gross>=20750 && $gross<=21249.99){
				$ssscon=945;
			}
			else if ($gross>=21250 && $gross<=21749.99){
				$ssscon=967.50;
			}
			else if ($gross>=21750 && $gross<=22249.99){
				$ssscon=990;
			}
			else if ($gross>=22250 && $gross<=22749.99){
				$ssscon=1012.50;
			}
			else if ($gross>=22750 && $gross<=23249.99){
				$ssscon=1035;
			}
			else if ($gross>=23250 && $gross<=23749.99){
				$ssscon=1057.50;
			}
			else if ($gross>=23750 && $gross<=24249.99){
				$ssscon=1080;
			}
			else if ($gross>=24250 && $gross<=24749.99){
				$ssscon=1102.50;
			}
			else if ($gross>=24750 && $gross<=25249.99){
				$ssscon=1125;
			}

			//philhealth
			if ($gross<=10000) {
				$philcon=137;
			}
			else if ($gross>10000 && $gross<=11000) {
				$philcon=151.25;
			}
			else if ($gross>11000 && $gross<=12000) {
				$philcon=165;
			}
			else if ($gross>12000 && $gross<=13000) {
				$philcon=178.75;
			}
			else if ($gross>13000 && $gross<=14000) {
				$philcon=192.50;
			}
			else if ($gross>14000 && $gross<=15000) {
				$philcon=206.25;
			}
			else if ($gross>15000 && $gross<=16000) {
				$philcon=220;
			}
			else if ($gross>16000 && $gross<=17000) {
				$philcon=233.75;
			}
			else if ($gross>17000 && $gross<=18000) {
				$philcon=247.50;
			}
			else if ($gross>18000 && $gross<=19000) {
				$philcon=261.25;
			}
			else if ($gross>19000 && $gross<=20000) {
				$philcon=275;
			}
			else if ($gross>20000 && $gross<=21000) {
				$philcon=288.75;
			}
			else if ($gross>21000 && $gross<=22000) {
				$philcon=302.50;
			}
			else if ($gross>22000 && $gross<=23000) {
				$philcon=316.25;
			}
			else if ($gross>23000 && $gross<=24000) {
				$philcon=330;
			}
			else if ($gross>24000 && $gross<=25000) {
				$philcon=343.75;
			}
			else if ($gross>25000 && $gross<=26000) {
				$philcon=357.50;
			}
			else if ($gross>26000 && $gross<=27000) {
				$philcon=371.25;
			}
			else if ($gross>27000 && $gross<=28000) {
				$philcon=385;
			}
			else if ($gross>28000 && $gross<=29000) {
				$philcon=398.75;
			}
			else if ($gross>29000 && $gross<=30000) {
				$philcon=412.50;
			}
			else if ($gross>30000 && $gross<=31000) {
				$philcon=426.25;
			}
			else if ($gross>31000 && $gross<=32000) {
				$philcon=440;
			}
			else if ($gross>32000 && $gross<=33000) {
				$philcon=453.75;
			}
			else if ($gross>33000 && $gross<=34000) {
				$philcon=467.50;
			}
			else if ($gross>34000 && $gross<=35000) {
				$philcon=481.25;
			}
			else if ($gross>35000 && $gross<=36000) {
				$philcon=495;
			}
			else if ($gross>36000 && $gross<=37000) {
				$philcon=508.75;
			}
			else if ($gross>37000 && $gross<=38000) {
				$philcon=522.50;
			}
			else if ($gross>38000 && $gross<=39000) {
				$philcon=536.25;
			}
			else if ($gross>39000 && $gross<=39999.99) {
				$philcon=543.13;
			}
			else if ($gross>=40000) {
				$philcon=550;
			}

			//income tax
			if ($gross<=3500){
				$tax=0;
			}
			else if ($gross>=4000 && $gross<5000){
				$tax=15;
			}
			else if ($gross>=5000 && $gross<6000){
				$tax=45;
			}
			else if ($gross>=6000 && $gross<8000){
				$tax=145;
			}
			else if ($gross>=8000 && $gross<9000){
				$tax=345;
			}
			else if ($gross>=9000 && $gross<10000){
				$tax=545;
			}
			else if ($gross>=10000 && $gross<12000){
				$tax=745;
			}
			else if ($gross>=10000 && $gross<12000){
				$tax=745;
			}
			else if ($gross>=12000 && $gross<15000){
				$tax=1145;
			}
			else if ($gross>=15000 && $gross<19000){
				$tax=1870;
			}
			else if ($gross>=19000 && $gross<20000){
				$tax=2870;
			}
			else if ($gross>=20000 && $gross<38600){
				$tax=3120;
			}
			else if ($gross>=38600 && $gross<50000){
				$tax=7775;
			}
			else if ($gross>=50000 && $gross<70000){
				$tax=11195;
			}
			else if ($gross>=70000 && $gross<100000){
				$tax=17770;
			}
			else if ($gross>=100000 && $gross<110000){
				$tax=29920;
			}
			else if ($gross>=110000 && $gross<120000){
				$tax=34420;
			}
			else if ($gross>=120000){
				$tax=38920;
			}

		}//calculate

		else if (isset($_POST['calcunet'])){
			$brateh=($_POST['brateh']);
			$bnum_hours=($_POST['bnum_hours']);
			$bincome= $brateh*$bnum_hours;

			$hrateh=($_POST['hrateh']);
			$hnum_hours=($_POST['hnum_hours']);
			$hincome= $hrateh*$hnum_hours;

			$orateh=($_POST['orateh']);
			$onum_hours=($_POST['onum_hours']);
			$oincome= $orateh*$onum_hours;

			$gross= $bincome+$hincome+$oincome;

			$sssloan=($_POST['sssloan']);
			$pagloan=($_POST['pagloan']);
			$facdep=($_POST['facdep']);
			$facloan=($_POST['facloan']);
			$saloan=($_POST['saloan']);
			$other=($_POST['other']);

			//sss
			if ($gross<3250){
				$ssscon=135;
			}
			else if ($gross>=3250 && $gross<=3749.99){
				$ssscon=157.50;
			}
			else if ($gross>=3750 && $gross<=4249.99){
				$ssscon=180;
			}
			else if ($gross>=4250 && $gross<=4749.99){
				$ssscon=202.50;
			}
			else if ($gross>=4750 && $gross<=5249.99){
				$ssscon=225;
			}
			else if ($gross>=5250 && $gross<=5749.99){
				$ssscon=247.50;
			}
			else if ($gross>=5750 && $gross<=6249.99){
				$ssscon=270;
			}
			else if ($gross>=6250 && $gross<=6749.99){
				$ssscon=292.50;
			}
			else if ($gross>=6750 && $gross<=7249.99){
				$ssscon=315;
			}
			else if ($gross>=7250 && $gross<=7749.99){
				$ssscon=337.50;
			}
			else if ($gross>=7750 && $gross<=8249.99){
				$ssscon=360;
			}
			else if ($gross>=8250 && $gross<=8749.99){
				$ssscon=382.50;
			}
			else if ($gross>=8750 && $gross<=9249.99){
				$ssscon=405;
			}
			else if ($gross>=9250 && $gross<=9749.99){
				$ssscon=427.50;
			}
			else if ($gross>=9750 && $gross<=10249.99){
				$ssscon=450;
			}
			else if ($gross>=10250 && $gross<=10749.99){
				$ssscon=472.50;
			}
			else if ($gross>=10750 && $gross<=11249.99){
				$ssscon=495;
			}
			else if ($gross>=11250 && $gross<=11749.99){
				$ssscon=517.50;
			}
			else if ($gross>=11750 && $gross<=12249.99){
				$ssscon=540;
			}
			else if ($gross>=12250 && $gross<=12749.99){
				$ssscon=562.50;
			}
			else if ($gross>=12750 && $gross<=13249.99){
				$ssscon=585;
			}
			else if ($gross>=13250 && $gross<=13749.99){
				$ssscon=607.50;
			}
			else if ($gross>=13750 && $gross<=14249.99){
				$ssscon=630;
			}
			else if ($gross>=14250 && $gross<=14749.99){
				$ssscon=652.50;
			}
			else if ($gross>=14750 && $gross<=15249.99){
				$ssscon=675;
			}
			else if ($gross>=15250 && $gross<=15749.99){
				$ssscon=697.50;
			}
			else if ($gross>=15750 && $gross<=16249.99){
				$ssscon=720;
			}
			else if ($gross>=16250 && $gross<=16749.99){
				$ssscon=742.50;
			}
			else if ($gross>=16750 && $gross<=17249.99){
				$ssscon=765;
			}
			else if ($gross>=17250 && $gross<=17749.99){
				$ssscon=787.50;
			}
			else if ($gross>=17750 && $gross<=18249.99){
				$ssscon=810;
			}
			else if ($gross>=18250 && $gross<=18749.99){
				$ssscon=832.50;
			}
			else if ($gross>=18750 && $gross<=19249.99){
				$ssscon=855;
			}
			else if ($gross>=19250 && $gross<=19749.99){
				$ssscon=877.50;
			}
			else if ($gross>=19750 && $gross<=20249.99){
				$ssscon=900;
			}
			else if ($gross>=20250 && $gross<=20749.99){
				$ssscon=922.50;
			}
			else if ($gross>=20750 && $gross<=21249.99){
				$ssscon=945;
			}
			else if ($gross>=21250 && $gross<=21749.99){
				$ssscon=967.50;
			}
			else if ($gross>=21750 && $gross<=22249.99){
				$ssscon=990;
			}
			else if ($gross>=22250 && $gross<=22749.99){
				$ssscon=1012.50;
			}
			else if ($gross>=22750 && $gross<=23249.99){
				$ssscon=1035;
			}
			else if ($gross>=23250 && $gross<=23749.99){
				$ssscon=1057.50;
			}
			else if ($gross>=23750 && $gross<=24249.99){
				$ssscon=1080;
			}
			else if ($gross>=24250 && $gross<=24749.99){
				$ssscon=1102.50;
			}
			else if ($gross>=24750 && $gross<=25249.99){
				$ssscon=1125;
			}

			//philhealth
			if ($gross<=10000) {
				$philcon=137;
			}
			else if ($gross>10000 && $gross<=11000) {
				$philcon=151.25;
			}
			else if ($gross>11000 && $gross<=12000) {
				$philcon=165;
			}
			else if ($gross>12000 && $gross<=13000) {
				$philcon=178.75;
			}
			else if ($gross>13000 && $gross<=14000) {
				$philcon=192.50;
			}
			else if ($gross>14000 && $gross<=15000) {
				$philcon=206.25;
			}
			else if ($gross>15000 && $gross<=16000) {
				$philcon=220;
			}
			else if ($gross>16000 && $gross<=17000) {
				$philcon=233.75;
			}
			else if ($gross>17000 && $gross<=18000) {
				$philcon=247.50;
			}
			else if ($gross>18000 && $gross<=19000) {
				$philcon=261.25;
			}
			else if ($gross>19000 && $gross<=20000) {
				$philcon=275;
			}
			else if ($gross>20000 && $gross<=21000) {
				$philcon=288.75;
			}
			else if ($gross>21000 && $gross<=22000) {
				$philcon=302.50;
			}
			else if ($gross>22000 && $gross<=23000) {
				$philcon=316.25;
			}
			else if ($gross>23000 && $gross<=24000) {
				$philcon=330;
			}
			else if ($gross>24000 && $gross<=25000) {
				$philcon=343.75;
			}
			else if ($gross>25000 && $gross<=26000) {
				$philcon=357.50;
			}
			else if ($gross>26000 && $gross<=27000) {
				$philcon=371.25;
			}
			else if ($gross>27000 && $gross<=28000) {
				$philcon=385;
			}
			else if ($gross>28000 && $gross<=29000) {
				$philcon=398.75;
			}
			else if ($gross>29000 && $gross<=30000) {
				$philcon=412.50;
			}
			else if ($gross>30000 && $gross<=31000) {
				$philcon=426.25;
			}
			else if ($gross>31000 && $gross<=32000) {
				$philcon=440;
			}
			else if ($gross>32000 && $gross<=33000) {
				$philcon=453.75;
			}
			else if ($gross>33000 && $gross<=34000) {
				$philcon=467.50;
			}
			else if ($gross>34000 && $gross<=35000) {
				$philcon=481.25;
			}
			else if ($gross>35000 && $gross<=36000) {
				$philcon=495;
			}
			else if ($gross>36000 && $gross<=37000) {
				$philcon=508.75;
			}
			else if ($gross>37000 && $gross<=38000) {
				$philcon=522.50;
			}
			else if ($gross>38000 && $gross<=39000) {
				$philcon=536.25;
			}
			else if ($gross>39000 && $gross<=39999.99) {
				$philcon=543.13;
			}
			else if ($gross>=40000) {
				$philcon=550;
			}

			//income tax
			if ($gross<=3500){
				$tax=0;
			}
			else if ($gross>=4000 && $gross<5000){
				$tax=15;
			}
			else if ($gross>=5000 && $gross<6000){
				$tax=45;
			}
			else if ($gross>=6000 && $gross<8000){
				$tax=145;
			}
			else if ($gross>=8000 && $gross<9000){
				$tax=345;
			}
			else if ($gross>=9000 && $gross<10000){
				$tax=545;
			}
			else if ($gross>=10000 && $gross<12000){
				$tax=745;
			}
			else if ($gross>=10000 && $gross<12000){
				$tax=745;
			}
			else if ($gross>=12000 && $gross<15000){
				$tax=1145;
			}
			else if ($gross>=15000 && $gross<19000){
				$tax=1870;
			}
			else if ($gross>=19000 && $gross<20000){
				$tax=2870;
			}
			else if ($gross>=20000 && $gross<38600){
				$tax=3120;
			}
			else if ($gross>=38600 && $gross<50000){
				$tax=7775;
			}
			else if ($gross>=50000 && $gross<70000){
				$tax=11195;
			}
			else if ($gross>=70000 && $gross<100000){
				$tax=17770;
			}
			else if ($gross>=100000 && $gross<110000){
				$tax=29920;
			}
			else if ($gross>=110000 && $gross<120000){
				$tax=34420;
			}
			else if ($gross>=120000){
				$tax=38920;
			}

			$total_deduc=($ssscon+$pagcon+$tax+$philcon+$sssloan+$pagloan+$facdep+$facloan+$saloan+$other);
			$net=($gross-$total_deduc);		

		}

		else if (isset($_POST['exit'])){
			if(isset($_GET['access'])){
				$access=$_GET['access'];
				if($access=="user"){
					echo "<script>window.location.href='http://localhost/Doctor/login.php'; </script>'";
				}
			
			}
		}

		else if (isset($_POST['new'])){
				echo "<script>window.location.href='http://localhost/Doctor/payrolltable.php'; </script>'";
			
		}

		else if (isset($_POST['save'])){
			$brateh=($_POST['brateh']);
			$bnum_hours=($_POST['bnum_hours']);
			$bincome= ($_POST['bincome']);
			$hrateh=($_POST['hrateh']);
			$hnum_hours=($_POST['hnum_hours']);
			$hincome= ($_POST['hincome']);
			$orateh=($_POST['orateh']);
			$onum_hours=($_POST['onum_hours']);
			$oincome= ($_POST['oincome']);

			$gross= ($_POST['gross']);

			$ssscon = ($_POST['ssscon']);
			$philcon = ($_POST['philcon']);
			$pagcon = ($_POST['pagcon']);
			$tax = ($_POST['tax']);

			$sssloan=($_POST['sssloan']);
			$pagloan=($_POST['pagloan']);
			$facdep=($_POST['facdep']);
			$facloan=($_POST['facloan']);
			$saloan=($_POST['saloan']);
			$other=($_POST['other']);

			$total_deduc=($_POST['total_deduc']);
			$net=($_POST['net']);
			$n_dep = ($_POST['n_dep']);
			$paydate = ($_POST['paydate']);

			if($net==0||$gross==0||$total_deduc==0){
				echo "<script> alert('Please finish all processes before saving!'); </script>";
				echo "<script>window.location.href='http://localhost/Doctor/page2.php?row_id='+'$id'; </script>'";
			}
			else{
				$sql = "INSERT INTO `payroll`(`employee_no`, `b_rate_hour`, `b_num_hours`, `b_income`, `h_rate_hour`, `hnum_hours`, `h_income`, `o_rate_hour`, `o_num_hours`, `o_income`, `gross`, `net`, `ssscon`, `philcon`, `pagcon`, `tax`, `sssloan`, `pagloan`, `fs_deposit`, `fs_loan`, `salary_loan`, `other_loan`, `total_deduction`, `dependents`, `payroll_date`) VALUES ('$emp_num','$brateh','$bnum_hours','$bincome','$hrateh','$hnum_hours','$hincome','$orateh','$onum_hours','$oincome','$gross','$net','$ssscon','$philcon','$pagcon','$tax','$sssloan','$pagloan','$facdep','$facloan','$saloan','$other','$total_deduc','$n_dep','$paydate')";
				if ($con->query($sql) === TRUE) {
						echo "<script> alert('Record Saved Successfully!') </script>";
						echo "<script>window.location.href='http://localhost/Doctor/payrolltable.php'; </script>'";
					}
					else {
						echo "Error: " . $sql . "<br>" . $con->error;
					}

					$con->close();
			}

			
		}

		else if (isset($_POST['cancel'])){
				echo "<script>window.location.href='http://localhost/Doctor/payrolltable.php'; </script>'";
			
		}//calcunet

}




?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Yoru Music</title>
	<link href="styles/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	</head>
<body>
	
	<div class="main2body">
	<form action="" method="POST">
		<div class="main2body1">
			<div class="main2body1left">
			<h2 style="margin-left: 20px;">BASIC EMPLOYEE DETAILS</h2>
			<label class="mainlleft">Employee Number</label>
			<input type="text" name="emp_num" class="tbox" value="<?php echo $emp_num ?>" readonly>
			
			<label class="mainlleft">First Name</label>
			<input type="text" name="fname" class="tbox" value="<?php echo $fname ?>" readonly>
			
			<label class="mainlleft">Middle Name</label>
			<input type="text" name="mname" class="tbox" value="<?php echo $mname ?>" readonly>

			<label class="mainlleft">Surname</label>
			<input type="text" name="lname" class="tbox" value="<?php echo $lname ?>" readonly>

			

			</div>

			<div class="main2body1middle">
				
				<label class="mainlleft">Civil Status</label>
				<input type="text" name="c_status" class="tboxm" value="<?php echo $c_status ?>" readonly>

				<label class="mainlleft">Designation</label>
				<input type="text" name="designation" class="tboxm" value="<?php echo $designation ?>" readonly>
				
				<label class="mainlleft">Qualified Dependents Status</label>
				<input type="text" name="n_dep" class="tboxm" value="<?php echo $n_dep ?>" readonly>

				<label class="mainlleft">Paydate</label>
				<input type="date" name="paydate" class="tboxm" value="<?php echo $paydate ?>" readonly>

				<label class="mainlleft">Employee Status</label>
				<input type="text" name="emp_status" class="tboxm" value="<?php echo $emp_status ?>" readonly>

				<label class="mainlleft">Department</label>
				<input type="text" name="dep" class="tboxm" value="<?php echo $dep ?>" readonly>

			</div>

			<div class="main2body1right">
				<div class="main2body1imgbox">
					<img src="<?php echo $picpath ?>">
				</div>
			</div>
			</div>

				<div class="main2body2">
					<div class="main2body2left">
						<div class="main2body2left1">
						<h2>BASIC PAY</h2>
						<label class="main2lleft">Rate Hour</label>
						<input type="text" name="brateh" class="tbox2" value="<?php echo $brateh ?>">

						<label class="main2lleft">Number of Hours/Cut Off</label>
						<input type="text" name="bnum_hours" class="tbox2" value="<?php echo $bnum_hours ?>">

						<label class="main2lleft">Income Per Cut Off</label>
						<input type="text" name="bincome" class="tbox2" value="<?php echo $bincome ?>" readonly>
						</div>

						<div class="main2body2left2">
						<h2>HONORARIUM</h2>
						<label class="main2lleft">Rate Hour</label>
						<input type="text" name="hrateh" class="tbox2" value="<?php echo $hrateh ?>">

						<label class="main2lleft">Number of Hours/Cut Off</label>
						<input type="text" name="hnum_hours" class="tbox2" value="<?php echo $hnum_hours ?>">

						<label class="main2lleft">Income Per Cut Off</label>
						<input type="text" name="hincome" class="tbox2" value="<?php echo $hincome ?>" readonly>
						</div>

						<div class="main2body2left3">
						<h2>OTHER INCOME</h2>
						<label class="main2lleft">Rate Hour</label>
						<input type="text" name="orateh" class="tbox2" value="<?php echo $orateh ?>">

						<label class="main2lleft">Number of Hours/Cut Off</label>
						<input type="text" name="onum_hours" class="tbox2" value="<?php echo $onum_hours ?>">

						<label class="main2lleft">Income Per Cut Off</label>
						<input type="text" name="oincome" class="tbox2" value="<?php echo $oincome ?>" readonly>
						</div>

						<div class="main2body2left4">
						<h2>INCOME SUMMARY</h2>
						<label class="main2lleft">GROSS INCOME</label>
						<input type="text" name="gross" class="tbox2" value="<?php echo $gross; ?>" readonly>

						<label class="main2lleft">NET INCOME</label>
						<input type="text" name="net" class="tbox2" value="<?php echo $net; ?>"readonly>

						</div>

					</div>

					<div class="main2body2right">
						<div class="main2body2right">
							<div class="main2body2right1">
							<h2>REGULAR CONTRIBUTIONS</h2>
							<label class="main2lleft">SSS Contribution</label>
							<input type="text" name="ssscon" class="tbox3" value="<?php echo $ssscon; ?>" readonly>

							<label class="main2lleft">PhilHealth Contribution</label>
							<input type="text" name="philcon" class="tbox3" value="<?php echo $philcon; ?>" readonly>

							<label class="main2lleft">Pagibig Contribution</label>
							<input type="text" name="pagcon" class="tbox3" value="<?php echo $pagcon; ?>" readonly>

							<label class="main2lleft">Tax</label>
							<input type="text" name="tax" class="tbox3" value="<?php echo $tax; ?>" readonly>
							</div>

							<div class="main2body2right2">
							<h2>OTHER DEDUCTIONS</h2>
							<label class="main2lleft">SSS Loan</label>
							<input type="text" name="sssloan" class="tbox3" value="<?php echo $sssloan; ?>">

							<label class="main2lleft">PAGIBIG Loan</label>
							<input type="text" name="pagloan" class="tbox3" value="<?php echo $pagloan; ?>">

							<label class="main2lleft">Faculty Savings Deposit</label>
							<input type="text" name="facdep" class="tbox3" value="<?php echo $facdep; ?>">

							<label class="main2lleft">Faculty Savings Loan</label>
							<input type="text" name="facloan" class="tbox3" value="<?php echo $facloan; ?>">

							<label class="main2lleft">Salary Loan</label>
							<input type="text" name="saloan" class="tbox3" value="<?php echo $saloan; ?>">

							<label class="main2lleft">Others</label>
							<input type="text" name="other" class="tbox3" value="<?php echo $other; ?>">
							
  							</select>
							</div>

							<div class="main2body2right3">
								<h2>DEDUCTION SUMMARY</h2>
								<label class="main2lleft">Total Deductions</label>
								<input type="text" name="total_deduc" class="tbox3" value="<?php echo $total_deduc; ?>" readonly>
							</div>
					</div>
				</div>


			</div>
				<div class="main2body3bottom">
								<div class="arry2">
								<input type="submit" name="calculate" class="but2" value="Calculate Gross Income">
								<input type="submit" name="calcunet" class="but2" value="Calculate Net Income">
								<input type="submit" name="new" class="but2" value="New">
								<input type="submit" name="cancel" class="but2" value="Cancel">
								</div>
								<div class="arry3">
								<input type="submit" name="save" class="but3" value="Save Transaction">
								<input type="submit" name="exit" class="but3" value="Exit">
								</div>
				</div>
</div>
</form>
</body>
</html>