<?php $target=""; 
session_start();
if(isset($_GET['row_id'])){
	$id = $_GET['row_id'];
	$_SESSION['row_id']=$id;
	include "db_connection.php";
	$con = OpenCon();

	$sql = "select users.*,personal_info.*,users.empl_id from users join personal_info on users.empl_id=personal_info.emp_num where users.user_id='$id'";
	$result = $con->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$name = $row['fname'];
			$mname = $row['mname'];
			$lname = $row['lname'];
			$suffix = $row['suffix'];
			$department = $row['department'];
			$designation = $row['designation'];
			$empnum = $row['emp_num'];
			$user = $row['user'];
			$pass = $row['pass'];
			$cpass = $row['cpass'];
			$usertype = $row['user_type'];
			$userstatus = $row['user_status'];
			$picpath = $row['picpath'];
		}
	}
	else {
		echo "<script> alert('No Results!'); </script>";
	}
}






?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Update User</title>
	<link href="styles/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript">
			$(document).ready(function(){


			$("#uploadfile").change(function(e){
			 var formData = new FormData($('#pupload')[0]);
			 //codes in AJAX for uploading of picture
			 $.ajax({
			 type: 'POST',
			 url: 'upload_pic.php',
			 data: formData,
			 contentType: false,
			 processData: false,
			 dataType: 'json',
			 success: function(result){
			 if(result.ok){
						 $('#uploadimg').attr("src", result.temp_path);
						 $('#picpath').val(result.temp_path);
			 } else {
			 			alert('Error encountered while trying to upload the picture!');
			 		}
			 	}
			 });
			 return false;
			 });/*
			 var x = URL.createObjectURL(e.target.files[0]);
			 $("#uploadimg").attr("src",x);
			 $("#picpath").val(x);
			 console.log(e);*/
			});
			

		</script>
	</head>
<body>
	<div class="main2body">

		<div class="mainsbody1">
				<div class="mainsbody1p0">
					<h2>Update User Account</h2>
					<p>Personal Information</p>
				</div>
				<form id="pupload" method="POST" class="a-form" enctype="multipart/form-data">
				<div class="mainsbody1p1">
					<div id="mainsbody1cont">
						<img src="<?php echo $picpath ?>" id="uploadimg">
					</div>
					<label for="uploadfile" class="lp2">Choose File</label>
					<input type="file" id="uploadfile" class="uploadfile" name="uploadfile" value="">
				</div>
				</form>
				<form action="userupdate.php" id="emp_signup" method="POST">
				<div class="mainsbody1p2up">
					<div class="upp">
					<label class="lp">Name</label>
					<input type="text" name="name" id="name" class="ttbox" value="<?php echo $name ?>" readonly>
					<label class="lp">Designation</label>
					<input type="text" name="designation" id="designation" class="ttbox" value="<?php echo $designation ?>" readonly></div>
					<div class="upp">
					<label class="lp">Middle Name</label>
					<input type="text" name="mname" id="mname" class="ttbox" value="<?php echo $mname ?>" readonly>
					<label for="gender" class="lp">Department</label>
					<input type="text" name="department" id="department" class="ttbox" value="<?php echo $department ?>" readonly></div>

					<div class="upp">
					<label class="lp">Last Name</label>
					<input type="text" name="lname" id="lname" class="ttbox" value="<?php echo $lname ?>" readonly>
					<label class="lp">Image Path</label>
					<input type="text" name="picpath" id="picpath" class="ttbox" value="<?php echo $picpath; ?>" readonly></div>
					<div class="upp">
					<label class="lp">Suffix</label>
					<input type="text" name="suffix" id="suffix" class="ttbox" value="<?php echo $suffix ?>" readonly>
					</div>
					</div>

				<div class="mainsbody1p2down">
					<div class="upp2">
					<label class="lp">Username</label>
					<input type="text" name="user" id="user" class="ttbox2" value="<?php echo $user ?>">
					<label class="lp">User Type</label>
					<select name="usertype" id="usertype" class="ttbox2">
   							 <option value="Cashier1" <?php if ($usertype=="Casher1"){echo "selected";} ?>>Cashier1</option>
    						 <option value="Cashier2" <?php if ($usertype=="Cashier2"){echo "selected";} ?>>Cashier2</option>
    						 <option value="Accounting_Staff" <?php if ($usertype=="Accounting_Staff"){echo "selected";} ?>>Accounting Staff</option>
    						 <option value="Administrator" <?php if ($usertype=="Administrator"){echo "selected";} ?>>Administrator</option>
    				</select></div>
					<div class="upp2">
					<label class="lp">Password</label>
					<input type="password" name="pass" id="pass" class="ttbox2" value="<?php echo $pass ?>">
					<label class="lp">User Status</label>
					<select name="userstatus" id="userstatus" class="ttbox2">
   								 <option value="Active" <?php if ($userstatus=="Active"){echo "selected";} ?>>Active</option>
    							 <option value="Inactive" <?php if ($userstatus=="Inactive"){echo "selected";} ?>>Inactive</option>
    				</select></div>
					<div class="upp2">
					<label for="quadep" class="lp">Confirm Password</label>
					<input type="password" name="cpass" id="cpass" class="ttbox2" value="<?php echo $cpass ?>">
					<label class="lp">Employee Number</label>
					<input type="text" name="empnum" id="empnum" class="ttbox2" value="<?php echo $empnum ?>" readonly></div>
				</div>

				<div class="mainsbody1p42">
					<div class="arry3">
							<input type="submit" name="save" id="save" class="arbut" value="Save">
							<input type="submit" name="delete" id="delete" class="arbut" value="Delete">
							<input type="submit" name="cancel" id="cancel" class="arbut" value="Cancel">
						</div>
					</form>
				</div>

			</div>

	</div>
</body>