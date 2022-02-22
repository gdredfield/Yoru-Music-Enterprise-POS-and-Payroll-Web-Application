<?php 
session_start();
$host="localhost";
$user="root";
$password="";
$db="yorumusicdb";

	$con = mysqli_connect($host,$user,$password);
		   mysqli_select_db($con, $db);

if($_SERVER["REQUEST_METHOD"]=="POST"){

	if(isset($_POST['login'])){
		if(isset($_POST['user']) && isset($_POST['pass'])){
			function validate($data){
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
									}
			$username = validate($_POST['user']);
			$password = validate($_POST['pass']);

			if (empty($username) && empty($password)){
				echo "<script> alert('Username and Password fields are blank!'); </script>";
				//header("Location: login.php?error=Username and Password fields are blank");
			}

			else if (empty($password)){
				echo "<script> alert('Password field is blank!'); </script>";
				//header("Location: login.php?error=Password field is blank");
			}

			else if (empty($username)){
				echo "<script> alert('Username field is blank!'); </script>";
				//header("Location: login.php?error=Username field is blank");
			}

			else{	
				$sql = "SELECT * FROM users where user='$username'";
				$sql1 = "SELECT * FROM users where user='$username' AND pass='$password'";
				$result = mysqli_query($con, $sql);
				$result1 = mysqli_query($con, $sql1);

						if (mysqli_num_rows($result)===0){
						//header("Location: login.php?error=User does not exist");
							echo "<script> alert('User does not exist!'); </script>";
						}
						else if (mysqli_num_rows($result1)>0){
						$row = mysqli_fetch_assoc($result1);//capitalization
						if($row['user']==$username && $row['pass']==$password){
							//$_SESSION['username']=$row['username'];
							//$_SESSION['id']=$row['id'];
							//$_SESSION['auth_code']=$row1['auth_code'];
							//$_SESSION['timestamp']=time();
							if($row['user_status']=="Inactive"){
								echo "<script> alert('This user account is no longer available.'); </script>";
								echo "<script>window.location.href='http://localhost/Doctor/login.php'; </script>'";
							}
							else{
								if($row['user_type']=="Cashier1"){
									$_SESSION['access']="user";
									echo "<script>window.location.href='http://localhost/Doctor/page1.php?access=user'; </script>'";
								}
								else if($row['user_type']=="Cashier2"){
									$_SESSION['access']="user";
									echo "<script>window.location.href='http://localhost/Doctor/page3.php?access=user'; </script>'";
								}
								else if($row['user_type']=="Accounting_Staff"){
									$_SESSION['access']="user";
									echo "<script>window.location.href='http://localhost/Doctor/page2.php?access=user'; </script>'";
								}
								else if($row['user_type']=="Administrator"){
									$_SESSION['access']="admin";
									echo "<script>window.location.href='http://localhost/Doctor/adminpage.php?access=admin'; </script>'";
								}
							}
							
							
						}
						else {
							echo "<script> alert('Incorrect username or password!'); </script>";
						}
					}
					else{
						echo "<script> alert('Incorrect username or password!'); </script>";
					}
		}
	}
}


}



?>

<!DOCTYPE html>
<html>
	<head>
		<title>Yoru Login</title>
		<link href="styles/loginstyle.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
		
	</head>
	<body></br></br></br>
		<center>
			<div id="main">
				
			<h1>YORU<span>MUSIC</span></h1>
			<div class="image-con"><img src="img/LOGO.png"></div>
			<form action="" method="POST">
			<!--<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>-->
				 <input type="text" id= "user" name="user" class="text" placeholder="Enter username">
				 <br><br>
				 <input type="password" id= "pass" name="pass" class="text" placeholder="Enter password">

				 <br><br>
				<input type="Submit" name="login" id="sub" value="login">
				<a href = "registration.php"class="ba">Sign Up</a>
			</form>
			</div>
		
			</center>
	</body>
</html>
