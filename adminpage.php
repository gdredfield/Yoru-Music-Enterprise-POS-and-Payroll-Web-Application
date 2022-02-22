<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="styles/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
    function load_employee() {
      document.getElementById("maina").innerHTML = '<iframe src="table.php" style="width:100%; height:101%; overflow-y: scroll; border:none;"  seamless="seamless"></iframe>';
    }
    function load_payroll() {
      document.getElementById("maina").innerHTML = '<iframe src="payrolltable.php" style="width:100%; height:101%; overflow: hidden; border:none;" seamless="seamless"></iframe>';
    }
    function load_emproll(){
      document.getElementById("maina").innerHTML = '<iframe src="payrollreport.php" style="width:100%; height:101%; overflow: hidden; border:none;" seamless="seamless"></iframe>';
    }
    function load_posa() {
      document.getElementById("maina").innerHTML = '<iframe src="page1.php" style="width:100%; height:101%; overflow: hidden; border:none;" seamless="seamless"></iframe>';
    }
    function load_sposa() {
      document.getElementById("maina").innerHTML = '<iframe src="salespos1.php" style="width:100%; height:101%; overflow: hidden; border:none;" seamless="seamless"></iframe>';
    }
    function load_posb() {
        document.getElementById("maina").innerHTML = '<iframe src="page3.php" style="width:100%; height:101%; overflow: hidden; border:none;" seamless="seamless"></iframe>';
    }
     function load_sposb() {
        document.getElementById("maina").innerHTML = '<iframe src="salespos2.php" style="width:100%; height:101%; overflow: hidden; border:none;" seamless="seamless"></iframe>';
    }
    function load_user() {
        document.getElementById("maina").innerHTML = '<iframe src="usertable.php" style="width:100%; height:101%; overflow: hidden; border:none;" seamless="seamless"></iframe>';
    }

    function logout(){
      window.location.href = "login.php";
    }

    
  </script>
</head>
<body>
<div class="sidenav">
  <h1 style="position: relative; display:flex; justify-content: center;">ADMIN<span>PAGE</span></h1>
 
  <a href="adminpage.php">Home</a>
 
  <a href="#" onclick="load_employee()">Employee</a>
  
  <a href="#" onclick="load_payroll()">Payroll</a>
 
  <a href="#" onclick="load_emproll()">Employee Payroll Report</a>
 
  <a href="#" onclick="load_posa()">Point of Sale A</a>
  
  <a href="#" onclick="load_sposa()">Sales of Point of Sale A</a>
 
  <a href="#" onclick="load_posb()">Point of Sale B</a>

  <a href="#" onclick="load_sposb()">Sales of Point of Sale B</a>

  <a href="#" onclick="load_user()">User Account</a>

  <a href="#" onclick="logout()">Logout</a>

  </div>
<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="maina">
  <div class="image-con"><img src="img/LOGO.png"></div>
  <div class="disp">
  <h2>Play without holding back</h2>
  <h3>Bring out your passion to the fullest</h3>
  </div>
</div>
</body>
</html>