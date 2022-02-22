<?php 
$target="";
$pic_filename="";

include "db_connection.php";
	$con = OpenCon();



if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST['save'])){

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

		$name = $_POST['name'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$suffix = $_POST['suffix'];
		$bday = $_POST['bday'];
		$gender = $_POST['gender'];
		$nation = $_POST['nation'];
		$civil = $_POST['civil'];
		$department = $_POST['department'];
		$designation = $_POST['designation'];
		$quadep = $_POST['quadep'];
		$empstatus = $_POST['empstatus'];
		$pdate = $_POST['pdate'];
		
		$contactnum = $_POST['contactnum'];
		$email = $_POST['email'];
		$othsoc = $_POST['othsoc'];
		$idnum = $_POST['idnum'];
		$addline1 = $_POST['addline1'];
		$addline2 = $_POST['addline2'];
		$municipality = $_POST['municipality'];
		$country = $_POST['country'];
		$sprovince = $_POST['sprovince'];
		$zip = $_POST['zip'];
		

		$sql = "update personal_info set fname = '$name', mname = '$mname', lname = '$lname', suffix = '$suffix', bday = '$bday', gender = '$gender', nation = '$nation', civil = '$civil', department = '$department', designation = '$designation', quadep = '$quadep', empstatus = '$empstatus', pdate = '$pdate', contactnum = '$contactnum', email = '$email', othsoc = '$othsoc', idnum = '$idnum', addline1 = '$addline1', addline2 = '$addline2', municipality = '$municipality', country = '$country', sprovince = '$sprovince', zip = '$zip', picpath = '$picpath', picfilename = '$pic_filename' where emp_num = '$empnum'";

		if ($con->query($sql) === TRUE) {
			echo "<script> alert('Employee Profile Updated Successfully!'); </script>";
			echo "<script>window.location.href='http://localhost/Doctor/table.php'; </script>'";
		}
		else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}

		$con->close();
	}

		else if (isset($_POST['delete'])){
			$empnum = $_POST['empnum'];


			$sql = "delete from personal_info where emp_num='$empnum'";
			if ($con->query($sql) === TRUE) {
			echo "<script> alert('Employee Profile Deleted Successfully!'); </script>";
			echo "<script>window.location.href='http://localhost/Doctor/table.php'; </script>'";
			}
			else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}

			$con->close();


	}

		else if(isset($_POST['cancel'])){
			echo "<script>window.location.href='http://localhost/Doctor/table.php'; </script>'";
	}




}


?>