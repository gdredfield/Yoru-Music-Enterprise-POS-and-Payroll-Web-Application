<?php $target=""; 

if(isset($_GET['row_id'])){
	$id = $_GET['row_id'];

	include "db_connection.php";
	$con = OpenCon();

	$sql = "select * from personal_info where emp_id='$id'";
	$result = $con->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$name = $row['fname'];
			$mname = $row['mname'];
			$lname = $row['lname'];
			$suffix = $row['suffix'];
			$bday = $row['bday'];
			$gender = $row['gender'];
			$nation = $row['nation'];
			$civil = $row['civil'];
			$department = $row['department'];
			$designation = $row['designation'];
			$quadep = $row['quadep'];
			$empstatus = $row['empstatus'];
			$pdate = $row['pdate'];
			$empnum = $row['emp_num'];
			$contactnum = $row['contactnum'];
			$email = $row['email'];
			$othsoc = $row['othsoc'];
			$idnum = $row['idnum'];
			$addline1 = $row['addline1'];
			$addline2 = $row['addline2'];
			$municipality = $row['municipality'];
			$country = $row['country'];
			$sprovince = $row['sprovince'];
			$zip = $row['zip'];
			$picpath = $row['picpath'];
		}
	}
}






?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Update Profile</title>
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
					<h2>Update Profile</h2>
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
				<form action="emp_update.php" id="emp_signup" method="POST">
				<div class="mainsbody1p2up">
					<div class="upp">
					<label class="lp">Name</label>
					<input type="text" name="name" id="name" class="ttbox" value="<?php echo $name ?>">
					<label class="lp">Date of Birth</label>
					<input type="date" name="bday" id="bday" class="ttbox" value="<?php echo $bday ?>"></div>
					<div class="upp">
					<label class="lp">Middle Name</label>
					<input type="text" name="mname" id="mname" class="ttbox" value="<?php echo $mname ?>">
					<label for="gender" class="lp">Gender</label>
					<select name="gender" id="gender" class="ttbox" value="">
   								 <option value="M" <?php if ($gender=="M"){echo "selected";} ?>>Male</option>
    							 <option value="F" <?php if ($gender=="F"){echo "selected";} ?>>Female</option>
    							 </select></div>

					<div class="upp">
					<label class="lp">Last Name</label>
					<input type="text" name="lname" id="lname" class="ttbox" value="<?php echo $lname ?>">
					<label for="nation" class="lp">Nationality</label>
					<select name="nation" id="nation" class="ttbox">
    							 	 <option value="Afghan" <?php if ($nation=="Afghan"){echo "selected";} ?>>Afghan</option>
									 <option value="Albanian" <?php if ($nation=="Albanian"){echo "selected";} ?>>Albanian</option>
									 <option value="Algerian" <?php if ($nation=="Algerian"){echo "selected";} ?>>Algerian</option>
									 <option value="American" <?php if ($nation=="American"){echo "selected";} ?>>American</option>
									 <option value="Andorran" <?php if ($nation=="Andorran"){echo "selected";} ?>>Andorran</option>
									 <option value="Angolan" <?php if ($nation=="Angolan"){echo "selected";} ?>>Angolan</option>
									 <option value="Antiguans" <?php if ($nation=="Antiguans"){echo "selected";} ?>>Antiguans</option>
									 <option value="Argentinean"<?php if ($nation=="Argentinean"){echo "selected";} ?>>Argentinean</option>
									 <option value="Armenian"<?php if ($nation=="Armenian"){echo "selected";} ?>>Armenian</option>
									 <option value="Australian"<?php if ($nation=="Australian"){echo "selected";} ?>>Australian</option>
									 <option value="Austrian"<?php if ($nation=="Austrian"){echo "selected";} ?>>Austrian</option>
									 <option value="Azerbaijani"<?php if ($nation=="Azerbaijani"){echo "selected";} ?>>Azerbaijani</option>
									 <option value="Bahamian"<?php if ($nation=="Bahamian"){echo "selected";} ?>>Bahamian</option>
									 <option value="Bahraini"<?php if ($nation=="Bahraini"){echo "selected";} ?>>Bahraini</option>
									 <option value="Bangladeshi"<?php if ($nation=="Bangladeshi"){echo "selected";} ?>>Bangladeshi</option>
									 <option value="Barbadian"<?php if ($nation=="Barbadian"){echo "selected";} ?>>Barbadian</option>
									 <option value="Barbudans"<?php if ($nation=="Barbudans"){echo "selected";} ?>>Barbudans</option>
									 <option value="Batswana"<?php if ($nation=="Batswana"){echo "selected";} ?>>Batswana</option>
									 <option value="Belarusian"<?php if ($nation=="Belarusian"){echo "selected";} ?>>Belarusian</option>
									 <option value="Belgian"<?php if ($nation=="Belgian"){echo "selected";} ?>>Belgian</option>
									 <option value="Belizean"<?php if ($nation=="Belizean"){echo "selected";} ?>>Belizean</option>
									 <option value="Beninese"<?php if ($nation=="Beninese"){echo "selected";} ?>>Beninese</option>
									 <option value="Bhutanese"<?php if ($nation=="Bhutanese"){echo "selected";} ?>>Bhutanese</option>
									 <option value="Bolivian"<?php if ($nation=="Bolivian"){echo "selected";} ?>>Bolivian</option>
									 <option value="Bosnian"<?php if ($nation=="Bosnian"){echo "selected";} ?>>Bosnian</option>
									 <option value="Brazilian"<?php if ($nation=="Brazilian"){echo "selected";} ?>>Brazilian</option>
									 <option value="British"<?php if ($nation=="British"){echo "selected";} ?>>British</option>
									 <option value="Bruneian"<?php if ($nation=="Bruneian"){echo "selected";} ?>>Bruneian</option>
									 <option value="Bulgarian"<?php if ($nation=="Bulgarian"){echo "selected";} ?>>Bulgarian</option>
									 <option value="Burkinabe"<?php if ($nation=="Burkinabe"){echo "selected";} ?>>Burkinabe</option>
									 <option value="Burmese"<?php if ($nation=="Burmese"){echo "selected";} ?>>Burmese</option>
									 <option value="Burundian"<?php if ($nation=="Burundian"){echo "selected";} ?>>Burundian</option>
									 <option value="Cambodian"<?php if ($nation=="Cambodian"){echo "selected";} ?>>Cambodian</option>
									 <option value="Cameroonian"<?php if ($nation=="Cameroonian"){echo "selected";} ?>>Cameroonian</option>
									 <option value="Canadian"<?php if ($nation=="Canadian"){echo "selected";} ?>>Canadian</option>
									 <option value="Cape verdean"<?php if ($nation=="Cape verdean"){echo "selected";} ?>>Cape Verdean</option>
									 <option value="Central african"<?php if ($nation=="Central african"){echo "selected";} ?>>Central African</option>
									 <option value="Chadian"<?php if ($nation=="Chadian"){echo "selected";} ?>>Chadian</option>
									 <option value="Chilean"<?php if ($nation=="Chilean"){echo "selected";} ?>>Chilean</option>
									 <option value="Chinese"<?php if ($nation=="Chinese"){echo "selected";} ?>>Chinese</option>
									 <option value="Colombian"<?php if ($nation=="Colombian"){echo "selected";} ?>>Colombian</option>
									 <option value="Comoran"<?php if ($nation=="Comoran"){echo "selected";} ?>>Comoran</option>
									 <option value="Congolese"<?php if ($nation=="Congolese"){echo "selected";} ?>>Congolese</option>
									 <option value="Costa rican"<?php if ($nation=="Costa rican"){echo "selected";} ?>>Costa Rican</option>
									 <option value="Croatian"<?php if ($nation=="Croatian"){echo "selected";} ?>>Croatian</option>
									 <option value="Cuban"<?php if ($nation=="Cuban"){echo "selected";} ?>>Cuban</option>
									 <option value="Cypriot"<?php if ($nation=="Cypriot"){echo "selected";} ?>>Cypriot</option>
									 <option value="Czech"<?php if ($nation=="Czech"){echo "selected";} ?>>Czech</option>
									 <option value="Danish"<?php if ($nation=="Danish"){echo "selected";} ?>>Danish</option>
									 <option value="Djibouti"<?php if ($nation=="Djibouti"){echo "selected";} ?>>Djibouti</option>
									 <option value="Dominican"<?php if ($nation=="Dominican"){echo "selected";} ?>>Dominican</option>
									 <option value="Dutch"<?php if ($nation=="Dutch"){echo "selected";} ?>>Dutch</option>
									 <option value="East timorese"<?php if ($nation=="East timorese"){echo "selected";} ?>>East Timorese</option>
									 <option value="Ecuadorean"<?php if ($nation=="Ecuadorean"){echo "selected";} ?>>Ecuadorean</option>
									 <option value="Egyptian"<?php if ($nation=="Egyptian"){echo "selected";} ?>>Egyptian</option>
									 <option value="Emirian"<?php if ($nation=="Emirian"){echo "selected";} ?>>Emirian</option>
									 <option value="Equatorial guinean"<?php if ($nation=="Equatorial guinean"){echo "selected";} ?>>Equatorial Guinean</option>
									 <option value="Eritrean"<?php if ($nation=="Eritrean"){echo "selected";} ?>>Eritrean</option>
									 <option value="Estonian"<?php if ($nation=="Estonian"){echo "selected";} ?>>Estonian</option>
									 <option value="Ethiopian"<?php if ($nation=="Ethiopian"){echo "selected";} ?>>Ethiopian</option>
									 <option value="Fijian"<?php if ($nation=="Fijian"){echo "selected";} ?>>Fijian</option>
									 <option selected value="Filipino"<?php if ($nation=="Filipino"){echo "selected";} ?>>Filipino</option>
									 <option value="Finnish"<?php if ($nation=="Finnish"){echo "selected";} ?>>Finnish</option>
									 <option value="French"<?php if ($nation=="French"){echo "selected";} ?>>French</option>
									 <option value="Gabonese"<?php if ($nation=="Gabonese"){echo "selected";} ?>>Gabonese</option>
									 <option value="Gambian"<?php if ($nation=="Gambian"){echo "selected";} ?>>Gambian</option>
									 <option value="Georgian"<?php if ($nation=="Georgian"){echo "selected";} ?>>Georgian</option>
									 <option value="German"<?php if ($nation=="German"){echo "selected";} ?>>German</option>
									 <option value="Ghanaian"<?php if ($nation=="Ghanaian"){echo "selected";} ?>>Ghanaian</option>
									 <option value="Greek"<?php if ($nation=="Greek"){echo "selected";} ?>>Greek</option>
									 <option value="Grenadian"<?php if ($nation=="Grenadian"){echo "selected";} ?>>Grenadian</option>
									 <option value="Guatemalan"<?php if ($nation=="Guatemalan"){echo "selected";} ?>>Guatemalan</option>
									 <option value="Guinea-Bissauan"<?php if ($nation=="Guinea-Bissauan"){echo "selected";} ?>>Guinea-Bissauan</option>
									 <option value="Guinean"<?php if ($nation=="Guinean"){echo "selected";} ?>>Guinean</option>
									 <option value="Guyanese"<?php if ($nation=="Guyanese"){echo "selected";} ?>>Guyanese</option>
									 <option value="Haitian"<?php if ($nation=="Haitian"){echo "selected";} ?>>Haitian</option>
									 <option value="Herzegovinian"<?php if ($nation=="Herzegovinian"){echo "selected";} ?>>Herzegovinian</option>
									 <option value="Honduran"<?php if ($nation=="Honduran"){echo "selected";} ?>>Honduran</option>
									 <option value="Hungarian"<?php if ($nation=="Hungarian"){echo "selected";} ?>>Hungarian</option>
									 <option value="Icelander"<?php if ($nation=="Icelander"){echo "selected";} ?>>Icelander</option>
									 <option value="Indian"<?php if ($nation=="Indian"){echo "selected";} ?>>Indian</option>
									 <option value="Indonesian"<?php if ($nation=="Indonesian"){echo "selected";} ?>>Indonesian</option>
									 <option value="Iranian"<?php if ($nation=="Iranian"){echo "selected";} ?>>Iranian</option>
									 <option value="Iraqi"<?php if ($nation=="Iraqi"){echo "selected";} ?>>Iraqi</option>
									 <option value="Irish"<?php if ($nation=="Irish"){echo "selected";} ?>>Irish</option>
									 <option value="Israeli"<?php if ($nation=="Israeli"){echo "selected";} ?>>Israeli</option>
									 <option value="Italian"<?php if ($nation=="Italian"){echo "selected";} ?>>Italian</option>
									 <option value="Ivorian"<?php if ($nation=="Ivorian"){echo "selected";} ?>>Ivorian</option>
									 <option value="Jamaican"<?php if ($nation=="Jamaican"){echo "selected";} ?>>Jamaican</option>
									 <option value="Japanese"<?php if ($nation=="Japanese"){echo "selected";} ?>>Japanese</option>
									 <option value="Jordanian"<?php if ($nation=="Jordanian"){echo "selected";} ?>>Jordanian</option>
									 <option value="Kazakhstani"<?php if ($nation=="Kazakhstani"){echo "selected";} ?>>Kazakhstani</option>
									 <option value="Kenyan"<?php if ($nation=="Kenyan"){echo "selected";} ?>>Kenyan</option>
									 <option value="Kittian and Nevisian"<?php if ($nation=="Kittian and Nevisian"){echo "selected";} ?>>Kittian and Nevisian</option>
									 <option value="Kuwaiti"<?php if ($nation=="Kuwaiti"){echo "selected";} ?>>Kuwaiti</option>
									 <option value="Kyrgyz"<?php if ($nation=="Kyrgyz"){echo "selected";} ?>>Kyrgyz</option>
									 <option value="Laotian"<?php if ($nation=="Laotian"){echo "selected";} ?>>Laotian</option>
									 <option value="Latvian"<?php if ($nation=="Latvian"){echo "selected";} ?>>Latvian</option>
									 <option value="Lebanese"<?php if ($nation=="Lebanese"){echo "selected";} ?>>Lebanese</option>
									 <option value="Liberian"<?php if ($nation=="Liberian"){echo "selected";} ?>>Liberian</option>
									 <option value="Libyan"<?php if ($nation=="Libyan"){echo "selected";} ?>>Libyan</option>
									 <option value="Liechtensteiner"<?php if ($nation=="Liechtensteiner"){echo "selected";} ?>>Liechtensteiner</option>
									 <option value="Lithuanian"<?php if ($nation=="Lithuanian"){echo "selected";} ?>>Lithuanian</option>
									 <option value="Luxembourger"<?php if ($nation=="Luxembourger"){echo "selected";} ?>>Luxembourger</option>
									 <option value="Macedonian"<?php if ($nation=="Macedonian"){echo "selected";} ?>>Macedonian</option>
									 <option value="Malagasy"<?php if ($nation=="Malagasy"){echo "selected";} ?>>Malagasy</option>
									 <option value="Malawian"<?php if ($nation=="Malawian"){echo "selected";} ?>>Malawian</option>
									 <option value="Malaysian"<?php if ($nation=="Malaysian"){echo "selected";} ?>>Malaysian</option>
									 <option value="Maldivan"<?php if ($nation=="Maldivan"){echo "selected";} ?>>Maldivan</option>
									 <option value="Malian"<?php if ($nation=="Malian"){echo "selected";} ?>>Malian</option>
									 <option value="Maltese"<?php if ($nation=="Maltese"){echo "selected";} ?>>Maltese</option>
									 <option value="Marshallese"<?php if ($nation=="Marshallese"){echo "selected";} ?>>Marshallese</option>
									 <option value="Mauritanian"<?php if ($nation=="Mauritanian"){echo "selected";} ?>>Mauritanian</option>
									 <option value="Mauritian"<?php if ($nation=="Mauritian"){echo "selected";} ?>>Mauritian</option>
									 <option value="Mexican"<?php if ($nation=="Mexican"){echo "selected";} ?>>Mexican</option>
									 <option value="Micronesian"<?php if ($nation=="Micronesian"){echo "selected";} ?>>Micronesian</option>
									 <option value="Moldovan"<?php if ($nation=="Moldovan"){echo "selected";} ?>>Moldovan</option>
									 <option value="Monacan"<?php if ($nation=="Monacan"){echo "selected";} ?>>Monacan</option>
									 <option value="Mongolian"<?php if ($nation=="Mongolian"){echo "selected";} ?>>Mongolian</option>
									 <option value="Moroccan"<?php if ($nation=="Moroccan"){echo "selected";} ?>>Moroccan</option>
									 <option value="Mosotho"<?php if ($nation=="Mosotho"){echo "selected";} ?>>Mosotho</option>
									 <option value="Motswana"<?php if ($nation=="Motswana"){echo "selected";} ?>>Motswana</option>
									 <option value="Mozambican"<?php if ($nation=="Mozambican"){echo "selected";} ?>>Mozambican</option>
									 <option value="Namibian"<?php if ($nation=="Namibian"){echo "selected";} ?>>Namibian</option>
									 <option value="Nauruan"<?php if ($nation=="Nauruan"){echo "selected";} ?>>Nauruan</option>
									 <option value="Nepalese"<?php if ($nation=="Nepalese"){echo "selected";} ?>>Nepalese</option>
									 <option value="New zealander"<?php if ($nation=="New zealander"){echo "selected";} ?>>New Zealander</option>
									 <option value="Ni-Vanuatu"<?php if ($nation=="Ni-Vanuatu"){echo "selected";} ?>>Ni-Vanuatu</option>
									 <option value="Nicaraguan"<?php if ($nation=="Nicaraguan"){echo "selected";} ?>>Nicaraguan</option>
									 <option value="Nigerien"<?php if ($nation=="Nigerien"){echo "selected";} ?>>Nigerien</option>
									 <option value="North Korean"<?php if ($nation=="North Korean"){echo "selected";} ?>>North Korean</option>
									 <option value="Northern Irish"<?php if ($nation=="Northern Irish"){echo "selected";} ?>>Northern Irish</option>
									 <option value="Norwegian"<?php if ($nation=="Norwegian"){echo "selected";} ?>>Norwegian</option>
									 <option value="Omani"<?php if ($nation=="Omani"){echo "selected";} ?>>Omani</option>
									 <option value="Pakistani"<?php if ($nation=="Pakistani"){echo "selected";} ?>>Pakistani</option>
									 <option value="Palauan"<?php if ($nation=="Palauan"){echo "selected";} ?>>Palauan</option>
									 <option value="Panamanian"<?php if ($nation=="Panamanian"){echo "selected";} ?>>Panamanian</option>
									 <option value="Papua New Guinean"<?php if ($nation=="Papua New Guinean"){echo "selected";} ?>>Papua New Guinean</option>
									 <option value="Paraguayan"<?php if ($nation=="Paraguayan"){echo "selected";} ?>>Paraguayan</option>
									 <option value="Peruvian"<?php if ($nation=="Peruvian"){echo "selected";} ?>>Peruvian</option>
									 <option value="Polish"<?php if ($nation=="Polish"){echo "selected";} ?>>Polish</option>
									 <option value="Portuguese"<?php if ($nation=="Portuguese"){echo "selected";} ?>>Portuguese</option>
									 <option value="Qatari"<?php if ($nation=="Qatari"){echo "selected";} ?>>Qatari</option>
									 <option value="Romanian"<?php if ($nation=="Romanian"){echo "selected";} ?>>Romanian</option>
									 <option value="Russian"<?php if ($nation=="Russian"){echo "selected";} ?>>Russian</option>
									 <option value="Rwandan"<?php if ($nation=="Rwandan"){echo "selected";} ?>>Rwandan</option>
									 <option value="Saint Lucian"<?php if ($nation=="Saint Lucian"){echo "selected";} ?>>Saint Lucian</option>
									 <option value="Salvadoran"<?php if ($nation=="Salvadoran"){echo "selected";} ?>>Salvadoran</option>
									 <option value="Samoan"<?php if ($nation=="Samoan"){echo "selected";} ?>>Samoan</option>
									 <option value="San Marinese"<?php if ($nation=="San Marinese"){echo "selected";} ?>>San Marinese</option>
									 <option value="Sao Tomean"<?php if ($nation=="Sao Tomean"){echo "selected";} ?>>Sao Tomean</option>
									 <option value="Saudi"<?php if ($nation=="Saudi"){echo "selected";} ?>>Saudi</option>
									 <option value="Scottish"<?php if ($nation=="Scottish"){echo "selected";} ?>>Scottish</option>
									 <option value="Senegalese"<?php if ($nation=="Senegalese"){echo "selected";} ?>>Senegalese</option>
									 <option value="Serbian"<?php if ($nation=="Serbian"){echo "selected";} ?>>Serbian</option>
									 <option value="Seychellois"<?php if ($nation=="Seychellois"){echo "selected";} ?>>Seychellois</option>
									 <option value="Sierra Leonean"<?php if ($nation=="Sierra Leonean"){echo "selected";} ?>>Sierra Leonean</option>
									 <option value="Singaporean"<?php if ($nation=="Singaporean"){echo "selected";} ?>>Singaporean</option>
									 <option value="Slovakian"<?php if ($nation=="Slovakian"){echo "selected";} ?>>Slovakian</option>
									 <option value="Slovenian"<?php if ($nation=="Slovenian"){echo "selected";} ?>>Slovenian</option>
									 <option value="Solomon Islander"<?php if ($nation=="Solomon Islander"){echo "selected";} ?>>Solomon Islander</option>
									 <option value="Somali"<?php if ($nation=="Somali"){echo "selected";} ?>>Somali</option>
									 <option value="South African"<?php if ($nation=="South African"){echo "selected";} ?>>South African</option>
									 <option value="South Korean"<?php if ($nation=="South Korean"){echo "selected";} ?>>South Korean</option>
									 <option value="Spanish"<?php if ($nation=="Spanish"){echo "selected";} ?>>Spanish</option>
									 <option value="Sri Lankan"<?php if ($nation=="Sri Lankan"){echo "selected";} ?>>Sri Lankan</option>
									 <option value="Sudanese"<?php if ($nation=="Sudanese"){echo "selected";} ?>>Sudanese</option>
									 <option value="Surinamer"<?php if ($nation=="Surinamer"){echo "selected";} ?>>Surinamer</option>
									 <option value="Swazi"<?php if ($nation=="Swazi"){echo "selected";} ?>>Swazi</option>
									 <option value="Swedish"<?php if ($nation=="Swedish"){echo "selected";} ?>>Swedish</option>
									 <option value="Swiss"<?php if ($nation=="Swiss"){echo "selected";} ?>>Swiss</option>
									 <option value="Syrian"<?php if ($nation=="Syrian"){echo "selected";} ?>>Syrian</option>
									 <option value="Taiwanese"<?php if ($nation=="Taiwanese"){echo "selected";} ?>>Taiwanese</option>
									 <option value="Tajik"<?php if ($nation=="Tajik"){echo "selected";} ?>>Tajik</option>
									 <option value="Tanzanian"<?php if ($nation=="Tanzanian"){echo "selected";} ?>>Tanzanian</option>
									 <option value="Thai"<?php if ($nation=="Thai"){echo "selected";} ?>>Thai</option>
									 <option value="Togolese"<?php if ($nation=="Togolese"){echo "selected";} ?>>Togolese</option>
									 <option value="Tongan"<?php if ($nation=="Tongan"){echo "selected";} ?>>Tongan</option>
									 <option value="Trinidadian or Tobagonian"<?php if ($nation=="Trinidadian or Tobagonian"){echo "selected";} ?>>Trinidadian or Tobagonian</option>
									 <option value="Tunisian"<?php if ($nation=="Tunisian"){echo "selected";} ?>>Tunisian</option>
									 <option value="Turkish"<?php if ($nation=="Turkish"){echo "selected";} ?>>Turkish</option>
									 <option value="Tuvaluan"<?php if ($nation=="Tuvaluan"){echo "selected";} ?>>Tuvaluan</option>
									 <option value="Ugandan"<?php if ($nation=="Ugandan"){echo "selected";} ?>>Ugandan</option>
									 <option value="Ukrainian"<?php if ($nation=="Ukrainian"){echo "selected";} ?>>Ukrainian</option>
									 <option value="Uruguayan"<?php if ($nation=="Uruguayan"){echo "selected";} ?>>Uruguayan</option>
									 <option value="Uzbekistani"<?php if ($nation=="Uzbekistani"){echo "selected";} ?>>Uzbekistani</option>
									 <option value="Venezuelan"<?php if ($nation=="Venezuelan"){echo "selected";} ?>>Venezuelan</option>
									 <option value="Vietnamese"<?php if ($nation=="Vietnamese"){echo "selected";} ?>>Vietnamese</option>
									 <option value="Welsh"<?php if ($nation=="Welsh"){echo "selected";} ?>>Welsh</option>
									 <option value="Yemenite"<?php if ($nation=="Yemenite"){echo "selected";} ?>>Yemenite</option>
									 <option value="Zambian"<?php if ($nation=="Zambian"){echo "selected";} ?>>Zambian</option>
									 <option value="Zimbabwean"<?php if ($nation=="Zimbabwean"){echo "selected";} ?>>Zimbabwean</option>
    							 </select></div>
					<div class="upp">
					<label class="lp">Suffix</label>
					<input type="text" name="suffix" id="suffix" class="ttbox" value="<?php echo $suffix ?>">
					<label for="nation" class="lp">Civil Status</label>
					<select name="civil" id="civil" class="ttbox">
   								 <option value="Single" <?php if ($civil=="Single"){echo "selected";} ?>>Single</option>
    							 <option value="Married" <?php if ($civil=="Married"){echo "selected";} ?>>Married</option>
    							 <option value="LS" <?php if ($civil=="LS"){echo "selected";} ?>>Separated</option>
								 <option value="W" <?php if ($civil=="W"){echo "selected";} ?>>Widow</option>
    							 </select></div>
					</div>

				<div class="mainsbody1p2down">
					<div class="upp2">
					<label class="lp">Department</label>
					<input type="text" name="department" id="department" class="ttbox2" value="<?php echo $department ?>">
					<label class="lp">Employee Status</label>
					<input type="text" name="empstatus" id="empstatus" class="ttbox2" value="<?php echo $empstatus ?>"></div>
					<div class="upp2">
					<label class="lp">Designation</label>
					<input type="text" name="designation" id="designation" class="ttbox2" value="<?php echo $designation ?>">
					<label class="lp">Paydate</label>
					<input type="date" name="pdate" id="pdate" class="ttbox2" value="<?php echo $pdate ?>"></div>
					<div class="upp2">
					<label for="quadep" class="lp">Qualified Department Status</label>
					<select name="quadep" id="quadep" class="ttbox2">
   								 <option value="">Select one</option>
    							 <option value="Z" <?php if ($quadep=="Z"){echo "selected";} ?>>Z or Single</option>
								 <option value="S or ME" <?php if ($quadep=="S or ME"){echo "selected";} ?>>S or ME</option>
								 <option value="S1 or ME1" <?php if ($quadep=="S1 or ME1"){echo "selected";} ?>>S1 or ME1</option>
								 <option value="S2 or ME2" <?php if ($quadep=="S2 or ME2"){echo "selected";} ?>>S2 or ME2</option>
								 <option value="S3 or ME3" <?php if ($quadep=="S3 or ME3"){echo "selected";} ?>>S3 or ME3</option>
								 <option value="S4 or ME4" <?php if ($quadep=="S4 or ME4"){echo "selected";} ?>>S4 or ME4</option>
    							 </select>
					<label class="lp">Employee Number</label>
					<input type="text" name="empnum" id="empnum" class="ttbox2" value="<?php echo $empnum ?>" readonly></div>
				</div>
				<h2>Contact Information</h2>
				<div class="mainsbody1p3">
					<div class="upp3">
					<label class="lp">Contact Number</label>
					<input type="text" name="contactnum" id="contactnum" class="ttbox3" value="<?php echo $contactnum ?>">
					<label for="othsoc" class="lp">Other Social Media</label>
					<select name="othsoc" id="othsoc" class="ttbox3">
   								 <option value="">Select one</option>
    							 <option value="Facebook_messenger" <?php if ($othsoc=="Facebook_messenger"){echo "selected";} ?>>Facebook Messenger</option>
								 <option value="Whatsapp_messenger" <?php if ($othsoc=="Whatsapp_messenger"){echo "selected";} ?>>WhatsApp Messenger</option>
								 <option value="Wechat" <?php if ($othsoc=="Wechat"){echo "selected";} ?>>WeChat</option>
								 <option value="Telegram" <?php if ($othsoc=="Telegram"){echo "selected";} ?>>Telegram</option>
								 <option value="Snapchat" <?php if ($othsoc=="Snapchat"){echo "selected";} ?>>Snapchat</option>
								 <option value="Other" <?php if ($othsoc=="Other"){echo "selected";} ?>>Other</option>
    							 </select>
					</div>
					<div class="upp3">
					<label class="lp">Email</label>
					<input type="text" name="email" id="email" class="ttbox3" value="<?php echo $email ?>">
					<label class="lp">Social Media Account/ID number</label>
					<input type="text" name="idnum" id="idnum" class="ttbox3" value="<?php echo $idnum ?>">
					</div>
				</div>
				<h2>Address</h2>
					<div class="mainsbody1p4">
						<div class="upp4">
					<label class="lp">Address Line 1</label>
					<input type="text" name="addline1" id="addline1" class="ttbox3" value="<?php echo $addline1 ?>">
					<label class="lp">Address Line 2</label>
					<input type="text" name="addline2" id="addline2" class="ttbox3" value="<?php echo $addline2 ?>">
					<label class="lp">City Municipality</label>
					<input type="text" name="municipality" id="municipality" class="ttbox3" value="<?php echo $municipality ?>">
					<label class="lp">Image Path</label>
					<input type="text" name="picpath" id="picpath" class="ttbox3" value="<?php echo $picpath; ?>"></div>
						<div class="upp4">
					<label for="country" class="lp">Country</label>
					<select name="country" id="country" class="ttbox3">
   								 <option value="Afganistan" <?php if ($country=="Afganistan"){echo "selected";} ?>>Afghanistan</option>
								 <option value="Albania" <?php if ($country=="Albania"){echo "selected";} ?>>Albania</option>
								 <option value="Algeria" <?php if ($country=="Algeria"){echo "selected";} ?>>Algeria</option>
								 <option value="American Samoa" <?php if ($country=="American Samoa"){echo "selected";} ?>>American Samoa</option>
								 <option value="Andorra" <?php if ($country=="Andorra"){echo "selected";} ?>>Andorra</option>
								 <option value="Angola" <?php if ($country=="Angola"){echo "selected";} ?>>Angola</option>
								 <option value="Anguilla" <?php if ($country=="Anguilla"){echo "selected";} ?>>Anguilla</option>
								 <option value="Antigua & Barbuda" <?php if ($country=="Antigua & Barbuda"){echo "selected";} ?>>Antigua & Barbuda</option>
								 <option value="Argentina" <?php if ($country=="Argentina"){echo "selected";} ?>>Argentina</option>
								 <option value="Armenia" <?php if ($country=="Armenia"){echo "selected";} ?>>Armenia</option>
								 <option value="Aruba" <?php if ($country=="Aruba"){echo "selected";} ?>>Aruba</option>
								 <option value="Australia" <?php if ($country=="Australia"){echo "selected";} ?>>Australia</option>
								 <option value="Austria" <?php if ($country=="Austria"){echo "selected";} ?>>Austria</option>
								 <option value="Azerbaijan" <?php if ($country=="Azerbaijan"){echo "selected";} ?>>Azerbaijan</option>
								 <option value="Bahamas" <?php if ($country=="Bahamas"){echo "selected";} ?>>Bahamas</option>
								 <option value="Bahrain" <?php if ($country=="Bahrain"){echo "selected";} ?>>Bahrain</option>
								 <option value="Bangladesh" <?php if ($country=="Bangladesh"){echo "selected";} ?>>Bangladesh</option>
								 <option value="Barbados" <?php if ($country=="Barbados"){echo "selected";} ?>>Barbados</option>
								 <option value="Belarus" <?php if ($country=="Belarus"){echo "selected";} ?>>Belarus</option>
								 <option value="Belgium" <?php if ($country=="Belgium"){echo "selected";} ?>>Belgium</option>
								 <option value="Belize" <?php if ($country=="Belize"){echo "selected";} ?>>Belize</option>
								 <option value="Benin" <?php if ($country=="Benin"){echo "selected";} ?>>Benin</option>
								 <option value="Bermuda" <?php if ($country=="Bermuda"){echo "selected";} ?>>Bermuda</option>
								 <option value="Bhutan" <?php if ($country=="Bhutan"){echo "selected";} ?>>Bhutan</option>
								 <option value="Bolivia" <?php if ($country=="Bolivia"){echo "selected";} ?>>Bolivia</option>
								 <option value="Bonaire" <?php if ($country=="Bonaire"){echo "selected";} ?>>Bonaire</option>
								 <option value="Bosnia & Herzegovina" <?php if ($country=="Bosnia & Herzegovina"){echo "selected";} ?>>Bosnia & Herzegovina</option>
								 <option value="Botswana" <?php if ($country=="Botswana"){echo "selected";} ?>>Botswana</option>
								 <option value="Brazil" <?php if ($country=="Brazil"){echo "selected";} ?>>Brazil</option>
								 <option value="British Indian Ocean Ter" <?php if ($country=="British Indian Ocean Ter"){echo "selected";} ?>>British Indian Ocean Ter</option>
								 <option value="Brunei" <?php if ($country=="Brunei"){echo "selected";} ?>>Brunei</option>
								 <option value="Bulgaria" <?php if ($country=="Bulgaria"){echo "selected";} ?>>Bulgaria</option>
								 <option value="Burkina Faso" <?php if ($country=="Burkina Faso"){echo "selected";} ?>>Burkina Faso</option>
								 <option value="Burundi" <?php if ($country=="Burundi"){echo "selected";} ?>>Burundi</option>
								 <option value="Cambodia" <?php if ($country=="Cambodia"){echo "selected";} ?>>Cambodia</option>
								 <option value="Cameroon" <?php if ($country=="Cameroon"){echo "selected";} ?>>Cameroon</option>
								 <option value="Canada" <?php if ($country=="Canada"){echo "selected";} ?>>Canada</option>
								 <option value="Canary Islands" <?php if ($country=="Canary Islands"){echo "selected";} ?>>Canary Islands</option>
								 <option value="Cape Verde" <?php if ($country=="Cape Verde"){echo "selected";} ?>>Cape Verde</option>
								 <option value="Cayman Islands" <?php if ($country=="Cayman Islands"){echo "selected";} ?>>Cayman Islands</option>
								 <option value="Central African Republic" <?php if ($country=="Central African Republic"){echo "selected";} ?>>Central African Republic</option>
								 <option value="Chad" <?php if ($country=="Chad"){echo "selected";} ?>>Chad</option>
								 <option value="Channel Islands" <?php if ($country=="Channel Islands"){echo "selected";} ?>>Channel Islands</option>
								 <option value="Chile"<?php if ($country=="Chile"){echo "selected";} ?>>Chile</option>
								 <option value="China"<?php if ($country=="China"){echo "selected";} ?>>China</option>
								 <option value="Christmas Island"<?php if ($country=="Christmas Island"){echo "selected";} ?>>Christmas Island</option>
								 <option value="Cocos Island"<?php if ($country=="Cocos Island"){echo "selected";} ?>>Cocos Island</option>
								 <option value="Colombia"<?php if ($country=="Colombia"){echo "selected";} ?>>Colombia</option>
								 <option value="Comoros"<?php if ($country=="Comoros"){echo "selected";} ?>>Comoros</option>
								 <option value="Congo"<?php if ($country=="Congo"){echo "selected";} ?>>Congo</option>
								 <option value="Cook Islands"<?php if ($country=="Cook Islands"){echo "selected";} ?>>Cook Islands</option>
								 <option value="Costa Rica"<?php if ($country=="Costa Rica"){echo "selected";} ?>>Costa Rica</option>
								 <option value="Cote DIvoire"<?php if ($country=="Cote DIvoire"){echo "selected";} ?>>Cote DIvoire</option>
								 <option value="Croatia"<?php if ($country=="Croatia"){echo "selected";} ?>>Croatia</option>
								 <option value="Cuba"<?php if ($country=="Cuba"){echo "selected";} ?>>Cuba</option>
								 <option value="Curaco"<?php if ($country=="Curaco"){echo "selected";} ?>>Curacao</option>
								 <option value="Cyprus"<?php if ($country=="Cyprus"){echo "selected";} ?>>Cyprus</option>
								 <option value="Czech Republic"<?php if ($country=="Czech Republic"){echo "selected";} ?>>Czech Republic</option>
								 <option value="Denmark"<?php if ($country=="Denmark"){echo "selected";} ?>>Denmark</option>
								 <option value="Djibouti"<?php if ($country=="Djibouti"){echo "selected";} ?>>Djibouti</option>
								 <option value="Dominica"<?php if ($country=="Dominica"){echo "selected";} ?>>Dominica</option>
								 <option value="Dominican Republic"<?php if ($country=="Dominican Republic"){echo "selected";} ?>>Dominican Republic</option>
								 <option value="East Timor"<?php if ($country=="East Timor"){echo "selected";} ?>>East Timor</option>
								 <option value="Ecuador"<?php if ($country=="Ecuador"){echo "selected";} ?>>Ecuador</option>
								 <option value="Egypt"<?php if ($country=="Egypt"){echo "selected";} ?>>Egypt</option>
								 <option value="El Salvador"<?php if ($country=="El Salvador"){echo "selected";} ?>>El Salvador</option>
								 <option value="Equatorial Guinea"<?php if ($country=="Equatorial Guinea"){echo "selected";} ?>>Equatorial Guinea</option>
								 <option value="Eritrea"<?php if ($country=="Eritrea"){echo "selected";} ?>>Eritrea</option>
								 <option value="Estonia"<?php if ($country=="Estonia"){echo "selected";} ?>>Estonia</option>
								 <option value="Ethiopia"<?php if ($country=="Ethiopia"){echo "selected";} ?>>Ethiopia</option>
								 <option value="Falkland Islands"<?php if ($country=="Falkland Islands"){echo "selected";} ?>>Falkland Islands</option>
								 <option value="Faroe Islands"<?php if ($country=="Faroe Islands"){echo "selected";} ?>>Faroe Islands</option>
								 <option value="Fiji"<?php if ($country=="Fiji"){echo "selected";} ?>>Fiji</option>
								 <option value="Finland"<?php if ($country=="Finland"){echo "selected";} ?>>Finland</option>
								 <option value="France"<?php if ($country=="France"){echo "selected";} ?>>France</option>
								 <option value="French Guiana"<?php if ($country=="French Guiana"){echo "selected";} ?>>French Guiana</option>
								 <option value="French Polynesia"<?php if ($country=="French Polynesia"){echo "selected";} ?>>French Polynesia</option>
								 <option value="French Southern Ter"<?php if ($country=="French Southern Ter"){echo "selected";} ?>>French Southern Ter</option>
								 <option value="Gabon"<?php if ($country=="Gabon"){echo "selected";} ?>>Gabon</option>
								 <option value="Gambia"<?php if ($country=="Gambia"){echo "selected";} ?>>Gambia</option>
								 <option value="Georgia"<?php if ($country=="Georgia"){echo "selected";} ?>>Georgia</option>
								 <option value="Germany"<?php if ($country=="Germany"){echo "selected";} ?>>Germany</option>
								 <option value="Ghana"<?php if ($country=="Ghana"){echo "selected";} ?>>Ghana</option>
								 <option value="Gibraltar"<?php if ($country=="Gibraltar"){echo "selected";} ?>>Gibraltar</option>
								 <option value="Great Britain"<?php if ($country=="Great Britain"){echo "selected";} ?>>Great Britain</option>
								 <option value="Greece"<?php if ($country=="Greece"){echo "selected";} ?>>Greece</option>
								 <option value="Greenland"<?php if ($country=="Greenland"){echo "selected";} ?>>Greenland</option>
								 <option value="Grenada"<?php if ($country=="Grenada"){echo "selected";} ?>>Grenada</option>
								 <option value="Guadeloupe"<?php if ($country=="Guadeloupe"){echo "selected";} ?>>Guadeloupe</option>
								 <option value="Guam"<?php if ($country=="Guam"){echo "selected";} ?>>Guam</option>
								 <option value="Guatemala"<?php if ($country=="Guatemala"){echo "selected";} ?>>Guatemala</option>
								 <option value="Guinea"<?php if ($country=="Guinea"){echo "selected";} ?>>Guinea</option>
								 <option value="Guyana"<?php if ($country=="Guyana"){echo "selected";} ?>>Guyana</option>
								 <option value="Haiti"<?php if ($country=="Haiti"){echo "selected";} ?>>Haiti</option>
								 <option value="Hawaii"<?php if ($country=="Hawaii"){echo "selected";} ?>>Hawaii</option>
								 <option value="Honduras"<?php if ($country=="Honduras"){echo "selected";} ?>>Honduras</option>
								 <option value="Hong Kong"<?php if ($country=="Hong Kong"){echo "selected";} ?>>Hong Kong</option>
								 <option value="Hungary"<?php if ($country=="Hungary"){echo "selected";} ?>>Hungary</option>
								 <option value="Iceland"<?php if ($country=="Iceland"){echo "selected";} ?>>Iceland</option>
								 <option value="Indonesia"<?php if ($country=="Indonesia"){echo "selected";} ?>>Indonesia</option>
								 <option value="India"<?php if ($country=="India"){echo "selected";} ?>>India</option>
								 <option value="Iran"<?php if ($country=="Iran"){echo "selected";} ?>>Iran</option>
								 <option value="Iraq"<?php if ($country=="Iraq"){echo "selected";} ?>>Iraq</option>
								 <option value="Ireland"<?php if ($country=="Ireland"){echo "selected";} ?>>Ireland</option>
								 <option value="Isle of Man"<?php if ($country=="Isle of Man"){echo "selected";} ?>>Isle of Man</option>
								 <option value="Israel"<?php if ($country=="Israel"){echo "selected";} ?>>Israel</option>
								 <option value="Italy"<?php if ($country=="Italy"){echo "selected";} ?>>Italy</option>
								 <option value="Jamaica"<?php if ($country=="Jamaica"){echo "selected";} ?>>Jamaica</option>
								 <option value="Japan"<?php if ($country=="Japan"){echo "selected";} ?>>Japan</option>
								 <option value="Jordan"<?php if ($country=="Jordan"){echo "selected";} ?>>Jordan</option>
								 <option value="Kazakhstan"<?php if ($country=="Kazakhstan"){echo "selected";} ?>>Kazakhstan</option>
								 <option value="Kenya"<?php if ($country=="Kenya"){echo "selected";} ?>>Kenya</option>
								 <option value="Kiribati"<?php if ($country=="Kiribati"){echo "selected";} ?>>Kiribati</option>
								 <option value="Korea North"<?php if ($country=="Korea North"){echo "selected";} ?>>Korea North</option>
								 <option value="Korea South"<?php if ($country=="Korea South"){echo "selected";} ?>>Korea South</option>
								 <option value="Kuwait"<?php if ($country=="Kuwait"){echo "selected";} ?>>Kuwait</option>
								 <option value="Kyrgyzstan"<?php if ($country=="Kyrgyzstan"){echo "selected";} ?>>Kyrgyzstan</option>
								 <option value="Laos"<?php if ($country=="Laos"){echo "selected";} ?>>Laos</option>
								 <option value="Latvia"<?php if ($country=="Latvia"){echo "selected";} ?>>Latvia</option>
								 <option value="Lebanon"<?php if ($country=="Lebanon"){echo "selected";} ?>>Lebanon</option>
								 <option value="Lesotho"<?php if ($country=="Lesotho"){echo "selected";} ?>>Lesotho</option>
								 <option value="Liberia"<?php if ($country=="Liberia"){echo "selected";} ?>>Liberia</option>
								 <option value="Libya"<?php if ($country=="Libya"){echo "selected";} ?>>Libya</option>
								 <option value="Liechtenstein"<?php if ($country=="Liechtenstein"){echo "selected";} ?>>Liechtenstein</option>
								 <option value="Lithuania"<?php if ($country=="Lithuania"){echo "selected";} ?>>Lithuania</option>
								 <option value="Luxembourg"<?php if ($country=="Luxembourg"){echo "selected";} ?>>Luxembourg</option>
								 <option value="Macau"<?php if ($country=="Macau"){echo "selected";} ?>>Macau</option>
								 <option value="Macedonia"<?php if ($country=="Macedonia"){echo "selected";} ?>>Macedonia</option>
								 <option value="Madagascar"<?php if ($country=="Madagascar"){echo "selected";} ?>>Madagascar</option>
								 <option value="Malaysia"<?php if ($country=="Malaysia"){echo "selected";} ?>>Malaysia</option>
								 <option value="Malawi"<?php if ($country=="Malawi"){echo "selected";} ?>>Malawi</option>
								 <option value="Maldives"<?php if ($country=="Maldives"){echo "selected";} ?>>Maldives</option>
								 <option value="Mali"<?php if ($country=="Mali"){echo "selected";} ?>>Mali</option>
								 <option value="Malta"<?php if ($country=="Malta"){echo "selected";} ?>>Malta</option>
								 <option value="Marshall Islands"<?php if ($country=="Marshall Islands"){echo "selected";} ?>>Marshall Islands</option>
								 <option value="Martinique"<?php if ($country=="Martinique"){echo "selected";} ?>>Martinique</option>
								 <option value="Mauritania"<?php if ($country=="Mauritania"){echo "selected";} ?>>Mauritania</option>
								 <option value="Mauritius"<?php if ($country=="Mauritius"){echo "selected";} ?>>Mauritius</option>
								 <option value="Mayotte"<?php if ($country=="Mayotte"){echo "selected";} ?>>Mayotte</option>
								 <option value="Mexico"<?php if ($country=="Mexico"){echo "selected";} ?>>Mexico</option>
								 <option value="Midway Islands"<?php if ($country=="Midway Islands"){echo "selected";} ?>>Midway Islands</option>
								 <option value="Moldova"<?php if ($country=="Moldova"){echo "selected";} ?>>Moldova</option>
								 <option value="Monaco"<?php if ($country=="Monaco"){echo "selected";} ?>>Monaco</option>
								 <option value="Mongolia"<?php if ($country=="Mongolia"){echo "selected";} ?>>Mongolia</option>
								 <option value="Montserrat"<?php if ($country=="Montserrat"){echo "selected";} ?>>Montserrat</option>
								 <option value="Morocco"<?php if ($country=="Morocco"){echo "selected";} ?>>Morocco</option>
								 <option value="Mozambique"<?php if ($country=="Mozambique"){echo "selected";} ?>>Mozambique</option>
								 <option value="Myanmar"<?php if ($country=="Myanmar"){echo "selected";} ?>>Myanmar</option>
								 <option value="Nambia"<?php if ($country=="Nambia"){echo "selected";} ?>>Nambia</option>
								 <option value="Nauru"<?php if ($country=="Nauru"){echo "selected";} ?>>Nauru</option>
								 <option value="Nepal"<?php if ($country=="Nepal"){echo "selected";} ?>>Nepal</option>
								 <option value="Netherland Antilles"<?php if ($country=="Netherland Antilles"){echo "selected";} ?>>Netherland Antilles</option>
								 <option value="Netherlands"<?php if ($country=="Netherlands"){echo "selected";} ?>>Netherlands (Holland, Europe)</option>
								 <option value="Nevis"<?php if ($country=="Nevis"){echo "selected";} ?>>Nevis</option>
								 <option value="New Caledonia"<?php if ($country=="New Caledonia"){echo "selected";} ?>>New Caledonia</option>
								 <option value="New Zealand"<?php if ($country=="New Zealand"){echo "selected";} ?>>New Zealand</option>
								 <option value="Nicaragua"<?php if ($country=="Nicaragua"){echo "selected";} ?>>Nicaragua</option>
								 <option value="Niger"<?php if ($country=="Niger"){echo "selected";} ?>>Niger</option>
								 <option value="Nigeria"<?php if ($country=="Nigeria"){echo "selected";} ?>>Nigeria</option>
								 <option value="Niue"<?php if ($country=="Niue"){echo "selected";} ?>>Niue</option>
								 <option value="Norfolk Island"<?php if ($country=="Norfolk Island"){echo "selected";} ?>>Norfolk Island</option>
								 <option value="Norway"<?php if ($country=="Norway"){echo "selected";} ?>>Norway</option>
								 <option value="Oman"<?php if ($country=="Oman"){echo "selected";} ?>>Oman</option>
								 <option value="Pakistan"<?php if ($country=="Pakistan"){echo "selected";} ?>>Pakistan</option>
								 <option value="Palau Island"<?php if ($country=="Palau Island"){echo "selected";} ?>>Palau Island</option>
								 <option value="Palestine"<?php if ($country=="Palestine"){echo "selected";} ?>>Palestine</option>
								 <option value="Panama"<?php if ($country=="Panama"){echo "selected";} ?>>Panama</option>
								 <option value="Papua New Guinea"<?php if ($country=="Papua New Guinea"){echo "selected";} ?>>Papua New Guinea</option>
								 <option value="Paraguay"<?php if ($country=="Paraguay"){echo "selected";} ?>>Paraguay</option>
								 <option value="Peru"<?php if ($country=="Peru"){echo "selected";} ?>>Peru</option>
								 <option value="Philippines"<?php if ($country=="Philippines"){echo "selected";} ?>>Philippines</option>
								 <option value="Pitcairn Island"<?php if ($country=="Pitcairn Island"){echo "selected";} ?>>Pitcairn Island</option>
								 <option value="Poland"<?php if ($country=="Poland"){echo "selected";} ?>>Poland</option>
								 <option value="Portugal"<?php if ($country=="Portugal"){echo "selected";} ?>>Portugal</option>
								 <option value="Puerto Rico"<?php if ($country=="Puerto Rico"){echo "selected";} ?>>Puerto Rico</option>
								 <option value="Qatar"<?php if ($country=="Qatar"){echo "selected";} ?>>Qatar</option>
								 <option value="Republic of Montenegro"<?php if ($country=="Republic of Montenegro"){echo "selected";} ?>>Republic of Montenegro</option>
								 <option value="Republic of Serbia"<?php if ($country=="Republic of Serbia"){echo "selected";} ?>>Republic of Serbia</option>
								 <option value="Reunion"<?php if ($country=="Reunion"){echo "selected";} ?>>Reunion</option>
								 <option value="Romania"<?php if ($country=="Romania"){echo "selected";} ?>>Romania</option>
								 <option value="Russia"<?php if ($country=="Russia"){echo "selected";} ?>>Russia</option>
								 <option value="Rwanda"<?php if ($country=="Rwanda"){echo "selected";} ?>>Rwanda</option>
								 <option value="St Barthelemy"<?php if ($country=="St Barthelemy"){echo "selected";} ?>>St Barthelemy</option>
								 <option value="St Eustatius"<?php if ($country=="St Eustatius"){echo "selected";} ?>>St Eustatius</option>
								 <option value="St Helena"<?php if ($country=="St Helena"){echo "selected";} ?>>St Helena</option>
								 <option value="St Kitts-Nevis"<?php if ($country=="St Kitts-Nevis"){echo "selected";} ?>>St Kitts-Nevis</option>
								 <option value="St Lucia"<?php if ($country=="St Lucia"){echo "selected";} ?>>St Lucia</option>
								 <option value="St Maarten"<?php if ($country=="St Maarten"){echo "selected";} ?>>St Maarten</option>
								 <option value="St Pierre & Miquelon"<?php if ($country=="St Pierre & Miquelon"){echo "selected";} ?>>St Pierre & Miquelon</option>
								 <option value="St Vincent & Grenadines"<?php if ($country=="St Vincent & Grenadines"){echo "selected";} ?>>St Vincent & Grenadines</option>
								 <option value="Saipan"<?php if ($country=="Saipan"){echo "selected";} ?>>Saipan</option>
								 <option value="Samoa"<?php if ($country=="Samoa"){echo "selected";} ?>>Samoa</option>
								 <option value="Samoa American"<?php if ($country=="Samoa American"){echo "selected";} ?>>Samoa American</option>
								 <option value="San Marino"<?php if ($country=="San Marino"){echo "selected";} ?>>San Marino</option>
								 <option value="Sao Tome & Principe"<?php if ($country=="Sao Tome & Principe"){echo "selected";} ?>>Sao Tome & Principe</option>
								 <option value="Saudi Arabia"<?php if ($country=="Saudi Arabia"){echo "selected";} ?>>Saudi Arabia</option>
								 <option value="Senegal"<?php if ($country=="Senegal"){echo "selected";} ?>>Senegal</option>
								 <option value="Seychelles"<?php if ($country=="Seychelles"){echo "selected";} ?>>Seychelles</option>
								 <option value="Sierra Leone"<?php if ($country=="Sierra Leone"){echo "selected";} ?>>Sierra Leone</option>
								 <option value="Singapore"<?php if ($country=="Singapore"){echo "selected";} ?>>Singapore</option>
								 <option value="Slovakia"<?php if ($country=="Slovakia"){echo "selected";} ?>>Slovakia</option>
								 <option value="Slovenia"<?php if ($country=="Slovenia"){echo "selected";} ?>>Slovenia</option>
								 <option value="Solomon Islands"<?php if ($country=="Solomon Islands"){echo "selected";} ?>>Solomon Islands</option>
								 <option value="Somalia"<?php if ($country=="Somalia"){echo "selected";} ?>>Somalia</option>
								 <option value="South Africa"<?php if ($country=="South Africa"){echo "selected";} ?>>South Africa</option>
								 <option value="Spain"<?php if ($country=="Spain"){echo "selected";} ?>>Spain</option>
								 <option value="Sri Lanka"<?php if ($country=="Sri Lanka"){echo "selected";} ?>>Sri Lanka</option>
								 <option value="Sudan"<?php if ($country=="Sudan"){echo "selected";} ?>>Sudan</option>
								 <option value="Suriname"<?php if ($country=="Suriname"){echo "selected";} ?>>Suriname</option>
								 <option value="Swaziland"<?php if ($country=="Swaziland"){echo "selected";} ?>>Swaziland</option>
								 <option value="Sweden"<?php if ($country=="Sweden"){echo "selected";} ?>>Sweden</option>
								 <option value="Switzerland"<?php if ($country=="Switzerland"){echo "selected";} ?>>Switzerland</option>
								 <option value="Syria"<?php if ($country=="Syria"){echo "selected";} ?>>Syria</option>
								 <option value="Tahiti"<?php if ($country=="Tahiti"){echo "selected";} ?>>Tahiti</option>
								 <option value="Taiwan"<?php if ($country=="Taiwan"){echo "selected";} ?>>Taiwan</option>
								 <option value="Tajikistan"<?php if ($country=="Tajikistan"){echo "selected";} ?>>Tajikistan</option>
								 <option value="Tanzania"<?php if ($country=="Tanzania"){echo "selected";} ?>>Tanzania</option>
								 <option value="Thailand"<?php if ($country=="Thailand"){echo "selected";} ?>>Thailand</option>
								 <option value="Togo"<?php if ($country=="Togo"){echo "selected";} ?>>Togo</option>
								 <option value="Tokelau"<?php if ($country=="Tokelau"){echo "selected";} ?>>Tokelau</option>
								 <option value="Tonga"<?php if ($country=="Tonga"){echo "selected";} ?>>Tonga</option>
								 <option value="Trinidad & Tobago"<?php if ($country=="Trinidad & Tobago"){echo "selected";} ?>>Trinidad & Tobago</option>
								 <option value="Tunisia"<?php if ($country=="Tunisia"){echo "selected";} ?>>Tunisia</option>
								 <option value="Turkey"<?php if ($country=="Turkey"){echo "selected";} ?>>Turkey</option>
								 <option value="Turkmenistan"<?php if ($country=="Turkmenistan"){echo "selected";} ?>>Turkmenistan</option>
								 <option value="Turks & Caicos Is"<?php if ($country=="Turks & Caicos Is"){echo "selected";} ?>>Turks & Caicos Is</option>
								 <option value="Tuvalu"<?php if ($country=="Tuvalu"){echo "selected";} ?>>Tuvalu</option>
								 <option value="Uganda"<?php if ($country=="Uganda"){echo "selected";} ?>>Uganda</option>
								 <option value="United Kingdom"<?php if ($country=="United Kingdom"){echo "selected";} ?>>United Kingdom</option>
								 <option value="Ukraine"<?php if ($country=="Ukraine"){echo "selected";} ?>>Ukraine</option>
								 <option value="United Arab Erimates"<?php if ($country=="United Arab Erimates"){echo "selected";} ?>>United Arab Emirates</option>
								 <option value="United States of America"<?php if ($country=="United States of America"){echo "selected";} ?>>United States of America</option>
								 <option value="Uraguay"<?php if ($country=="Uraguay"){echo "selected";} ?>>Uruguay</option>
								 <option value="Uzbekistan"<?php if ($country=="Uzbekistan"){echo "selected";} ?>>Uzbekistan</option>
								 <option value="Vanuatu"<?php if ($country=="Vanuatu"){echo "selected";} ?>>Vanuatu</option>
								 <option value="Vatican City State"<?php if ($country=="Vatican City State"){echo "selected";} ?>>Vatican City State</option>
								 <option value="Venezuela"<?php if ($country=="Venezuela"){echo "selected";} ?>>Venezuela</option>
								 <option value="Vietnam"<?php if ($country=="Vietnam"){echo "selected";} ?>>Vietnam</option>
								 <option value="Virgin Islands (Brit)"<?php if ($country=="Virgin Islands (Brit)"){echo "selected";} ?>>Virgin Islands (Brit)</option>
								 <option value="Virgin Islands (USA)"<?php if ($country=="Virgin Islands (USA)"){echo "selected";} ?>>Virgin Islands (USA)</option>
								 <option value="Wake Island"<?php if ($country=="Wake Island"){echo "selected";} ?>>Wake Island</option>
								 <option value="Wallis & Futana Is"<?php if ($country=="Wallis & Futana Is"){echo "selected";} ?>>Wallis & Futana Is</option>
								 <option value="Yemen"<?php if ($country=="Yemen"){echo "selected";} ?>>Yemen</option>
								 <option value="Zaire"<?php if ($country=="Zaire"){echo "selected";} ?>>Zaire</option>
								 <option value="Zambia"<?php if ($country=="Zambia"){echo "selected";} ?>>Zambia</option>
								 <option value="Zimbabwe"<?php if ($country=="Zimbabwe"){echo "selected";} ?>>Zimbabwe</option>
    							 </select>
					<label class="lp">State Province</label>
					<input type="text" name="sprovince" id="sprovince" class="ttbox3" value="<?php echo $sprovince ?>">
					<label class="lp">Zipcode</label>
					<input type="text" name="zip" id="zip" class="ttbox3" value="<?php echo $zip ?>">
					<div class="aryx2">
							<input type="submit" name="save" id="save" class="arbut" value="Save">
							<input type="submit" name="delete" id="delete" class="arbut" value="Delete">
							<input type="submit" name="cancel" id="cancel" class="arbut" value="Cancel">
						</div>
					</div>
					</div>

					<!--<div class="mainsbody1p5">
						<div class="aryx2">
							<input type="submit" name="signup" id="signup" class="arbut" value="Sign Up">
							<input type="submit" name="delete" id="delete" class="arbut" value="Delete">
							<input type="submit" name="cancel" id="cancel" class="arbut" value="Cancel">
						</div>
					</div>-->
		</div>

	</div>
</form>
</body>
</html>