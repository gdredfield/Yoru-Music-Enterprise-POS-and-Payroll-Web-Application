<?php  
	include 'db_connection.php';
	$con = OpenCon();
	if(isset($_GET['empnum'])){
		$emp=$_GET['empnum'];
		$sql = "select users.user_id,users.empl_id,users.user_type,users.user_status,users.user,personal_info.fname,personal_info.mname,personal_info.lname,personal_info.suffix,personal_info.department,personal_info.designation from users inner join personal_info on users.empl_id=personal_info.emp_num where users.empl_id='$emp';";
		$result = mysqli_query($con, $sql);
	}
	else{
		$sql = "select users.user_id,users.empl_id,users.user_type,users.user_status,users.user,personal_info.fname,personal_info.mname,personal_info.lname,personal_info.suffix,personal_info.department,personal_info.designation from users inner join personal_info on users.empl_id=personal_info.emp_num;";
		$result = mysqli_query($con, $sql);
	}

	if($_SERVER["REQUEST_METHOD"]=="POST"){

			//if(isset($_POST['new'])){
			//	    header("Location: usertable.php");
			//	}
			 if(isset($_POST['ser'])){
				$emps = $_POST['empsearch'];
				if(empty($emps)){
					header("Location: usertable.php");
				}
				else{
					header("Location: usertable.php?empnum=$emps");
				}
			}
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>User List</title>
		<link href="styles/tablestyle.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
		<script src="js/jquery-3.6.0.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('table tr').click(function(){
					var id = $(this).attr('row_id');
					//window.open("updateuser.php?row_id="+id);
					window.location.href = "updateuser.php?row_id="+id;
				});

			});
		</script>
	</head>
	<body></br></br></br>
			<div id="main" style="margin-left:50px;">
			<h1>USER<span>LIST</span></h1>
			<div class="sea">
			<form method="POST">
			<label for="search" class="lp">Employee Number:</label>
			<input type="text" name="empsearch" id="empsearch" class="ttbox" value="">
			<input type="submit" name="ser" id="ser" class="arbut" value="Search">
			<!--<input type="submit" name="new" id="new" class="arbut" value="New">--></div>
			</form>
			<table>
				<thead>
				<tr>
					<th>Employee ID</th>
					<th>Employee Name</th>
					<th>Department</th>
					<th>Designation</th>
					<th>Username</th>
					<th>User Type</th>
					<th>User Status</th>

				<tr>
				<thead>

			
					<?php  if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
					?>
			<tbody>
								<tr row_id="<?php echo $row['user_id']; ?>">
									<td style="border-left:none;"><?php echo $row['empl_id']; ?></td>
									<td><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?> <?php echo $row['suffix'];?></td>
									<td><?php echo $row['department']; ?></td>
									<td><?php echo $row['designation']; ?></td>
									<td><?php echo $row['user']; ?></td>
									<td><?php echo $row['user_type']; ?></td>
									<td style="border-right:none;"><?php echo $row['user_status']; ?></td>

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