<?php 
session_start();
$rid = $_SESSION['row_id'];
$target="";
$pic_filename="";
include "db_connection.php";
	$con = OpenCon();



if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST['save'])){

		$pass1 = $_POST['pass'];
		$cpass1 = $_POST['cpass'];

		if ($pass1!=$cpass1){
			echo "<script> alert('Passwords do not match!'); </script>";
			echo "<script>window.location.href='http://localhost/Doctor/updateuser.php?row_id='+$rid; </script>'";
			//echo "<script> window.location.reload(); </script>'";
		}

		else{
		$empnum = $_POST['empnum'];
		$picpath = $_POST['picpath'];
		$sql = "select * from personal_info where emp_num='$empnum' AND picpath='$picpath'";
		$result = $con->query($sql);
		if (mysqli_num_rows($result)===0){
				if(file_exists($picpath)){
				$pic_filename = explode('temp/', $picpath)[1];
				rename($picpath, 'uploads/' . $pic_filename);
				$picpath = 'uploads/' . $pic_filename;
			}
		}
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$cpass = $_POST['cpass'];
			$usertype = $_POST['usertype'];
			$userstatus = $_POST['userstatus'];
		
		$sql2 = "update users set user='$user',pass='$pass',user_type='$usertype',user_status='$userstatus',cpass='$cpass' where empl_id = '$empnum'";
		$result22=mysqli_query($con,"update personal_info set picpath='$picpath',picfilename='$pic_filename' where emp_num='$empnum'");


		if ($con->query($sql2) === TRUE) {
			echo "<script> alert('User Profile Updated Successfully!'); </script>";
			echo "<script>window.location.href='http://localhost/Doctor/usertable.php'; </script>'";

		}
		else {
			echo "Error: " . $sql2 . "<br>" . $con->error;
		}

		$con->close();
		}
	}

		else if (isset($_POST['delete'])){
			$empnum = $_POST['empnum'];

			$sql = "delete from users where empl_id='$empnum'";
			if ($con->query($sql) === TRUE) {
			echo "<script> alert('User Profile Deleted Successfully!'); </script>";
			echo "<script>window.location.href='http://localhost/Doctor/usertable.php'; </script>'";
			}
			else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}

			$con->close();


	}

		else if(isset($_POST['cancel'])){
			echo "<script>window.location.href='http://localhost/Doctor/usertable.php'; </script>'";
	}




}


?>