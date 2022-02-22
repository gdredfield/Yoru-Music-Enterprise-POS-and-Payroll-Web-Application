<?php 
$target="";
$pic_filename="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST['signup'])){
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
		$empnum = $_POST['empnum'];
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
		$picpath = $_POST['picpath'];

		if(file_exists($picpath)){
		$pic_filename = explode('temp/', $picpath)[1];
		rename($picpath, 'uploads/' . $pic_filename);
		$picpath = 'uploads/' . $pic_filename;
		}


		include 'db_connection.php';
		$con = Opencon();

		$sql = "insert into personal_info(emp_num,fname,mname,lname,suffix,bday,gender,nation,civil,department,designation,quadep,empstatus,pdate,contactnum,email,othsoc,idnum,addline1,addline2,municipality,country,sprovince,zip,picpath,picfilename) 
				values('$empnum','$name','$mname','$lname','$suffix','$bday','$gender','$nation','$civil','$department','$designation','$quadep','$empstatus','$pdate','$contactnum','$email','$othsoc','$idnum','$addline1','$addline2','$municipality','$country','$sprovince','$zip','$picpath','$pic_filename')";
		$sql2 = "insert into users(empl_id) values('$empnum')";
		$con->query($sql2);

		if ($con->query($sql) === TRUE) {
			echo "<script> alert('Employee Profile Created Successfully!') </script>";
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