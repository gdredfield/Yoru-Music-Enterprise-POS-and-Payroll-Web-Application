<?php $target=""; ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
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
					<h2>New Employee</h2>
					<p>Personal Information</p>
				</div>
				<form id="pupload" method="POST" class="a-form" enctype="multipart/form-data">
				<div class="mainsbody1p1">
					<div id="mainsbody1cont">
						<img src="" id="uploadimg">
					</div>
					<label for="uploadfile" class="lp2">Choose File</label>
					<input type="file" id="uploadfile" class="uploadfile" name="uploadfile" value="">
				</div>
				</form>
				<form action="emp_signup.php" id="emp_signup" method="POST">
				<div class="mainsbody1p2up">
					<div class="upp">
					<label class="lp">Name</label>
					<input type="text" name="name" id="name" class="ttbox" value="">
					<label class="lp">Date of Birth</label>
					<input type="date" name="bday" id="bday" class="ttbox" value=""></div>
					<div class="upp">
					<label class="lp">Middle Name</label>
					<input type="text" name="mname" id="mname" class="ttbox" value="">
					<label for="gender" class="lp">Gender</label>
					<select name="gender" id="gender" class="ttbox">
   								 <option value="M">Male</option>
    							 <option value="F">Female</option>
    							 </select></div>

					<div class="upp">
					<label class="lp">Last Name</label>
					<input type="text" name="lname" id="lname" class="ttbox" value="">
					<label for="nation" class="lp">Nationality</label>
					<select name="nation" id="nation" class="ttbox">
    							 	 <option value="Afghan">Afghan</option>
									 <option value="Albanian">Albanian</option>
									 <option value="Algerian">Algerian</option>
									 <option value="American">American</option>
									 <option value="Andorran">Andorran</option>
									 <option value="Angolan">Angolan</option>
									 <option value="Antiguans">Antiguans</option>
									 <option value="Argentinean">Argentinean</option>
									 <option value="Armenian">Armenian</option>
									 <option value="Australian">Australian</option>
									 <option value="Austrian">Austrian</option>
									 <option value="Azerbaijani">Azerbaijani</option>
									 <option value="Bahamian">Bahamian</option>
									 <option value="Bahraini">Bahraini</option>
									 <option value="Bangladeshi">Bangladeshi</option>
									 <option value="Barbadian">Barbadian</option>
									 <option value="Barbudans">Barbudans</option>
									 <option value="Batswana">Batswana</option>
									 <option value="Belarusian">Belarusian</option>
									 <option value="Belgian">Belgian</option>
									 <option value="Belizean">Belizean</option>
									 <option value="Beninese">Beninese</option>
									 <option value="Bhutanese">Bhutanese</option>
									 <option value="Bolivian">Bolivian</option>
									 <option value="Bosnian">Bosnian</option>
									 <option value="Brazilian">Brazilian</option>
									 <option value="British">British</option>
									 <option value="Bruneian">Bruneian</option>
									 <option value="Bulgarian">Bulgarian</option>
									 <option value="Burkinabe">Burkinabe</option>
									 <option value="Burmese">Burmese</option>
									 <option value="Burundian">Burundian</option>
									 <option value="Cambodian">Cambodian</option>
									 <option value="Cameroonian">Cameroonian</option>
									 <option value="Canadian">Canadian</option>
									 <option value="Cape verdean">Cape Verdean</option>
									 <option value="Central african">Central African</option>
									 <option value="Chadian">Chadian</option>
									 <option value="Chilean">Chilean</option>
									 <option value="Chinese">Chinese</option>
									 <option value="Colombian">Colombian</option>
									 <option value="Comoran">Comoran</option>
									 <option value="Congolese">Congolese</option>
									 <option value="Costa rican">Costa Rican</option>
									 <option value="Croatian">Croatian</option>
									 <option value="Cuban">Cuban</option>
									 <option value="Cypriot">Cypriot</option>
									 <option value="Czech">Czech</option>
									 <option value="Danish">Danish</option>
									 <option value="Djibouti">Djibouti</option>
									 <option value="Dominican">Dominican</option>
									 <option value="Dutch">Dutch</option>
									 <option value="East timorese">East Timorese</option>
									 <option value="Ecuadorean">Ecuadorean</option>
									 <option value="Egyptian">Egyptian</option>
									 <option value="Emirian">Emirian</option>
									 <option value="Equatorial guinean">Equatorial Guinean</option>
									 <option value="Eritrean">Eritrean</option>
									 <option value="Estonian">Estonian</option>
									 <option value="Ethiopian">Ethiopian</option>
									 <option value="Fijian">Fijian</option>
									 <option selected value="Filipino">Filipino</option>
									 <option value="Finnish">Finnish</option>
									 <option value="French">French</option>
									 <option value="Gabonese">Gabonese</option>
									 <option value="Gambian">Gambian</option>
									 <option value="Georgian">Georgian</option>
									 <option value="German">German</option>
									 <option value="Ghanaian">Ghanaian</option>
									 <option value="Greek">Greek</option>
									 <option value="Grenadian">Grenadian</option>
									 <option value="Guatemalan">Guatemalan</option>
									 <option value="Guinea-Bissauan">Guinea-Bissauan</option>
									 <option value="Guinean">Guinean</option>
									 <option value="Guyanese">Guyanese</option>
									 <option value="Haitian">Haitian</option>
									 <option value="Herzegovinian">Herzegovinian</option>
									 <option value="Honduran">Honduran</option>
									 <option value="Hungarian">Hungarian</option>
									 <option value="Icelander">Icelander</option>
									 <option value="Indian">Indian</option>
									 <option value="Indonesian">Indonesian</option>
									 <option value="Iranian">Iranian</option>
									 <option value="Iraqi">Iraqi</option>
									 <option value="Irish">Irish</option>
									 <option value="Israeli">Israeli</option>
									 <option value="Italian">Italian</option>
									 <option value="Ivorian">Ivorian</option>
									 <option value="Jamaican">Jamaican</option>
									 <option value="Japanese">Japanese</option>
									 <option value="Jordanian">Jordanian</option>
									 <option value="Kazakhstani">Kazakhstani</option>
									 <option value="Kenyan">Kenyan</option>
									 <option value="Kittian and Nevisian">Kittian and Nevisian</option>
									 <option value="Kuwaiti">Kuwaiti</option>
									 <option value="Kyrgyz">Kyrgyz</option>
									 <option value="Laotian">Laotian</option>
									 <option value="Latvian">Latvian</option>
									 <option value="Lebanese">Lebanese</option>
									 <option value="Liberian">Liberian</option>
									 <option value="Libyan">Libyan</option>
									 <option value="Liechtensteiner">Liechtensteiner</option>
									 <option value="Lithuanian">Lithuanian</option>
									 <option value="Luxembourger">Luxembourger</option>
									 <option value="Macedonian">Macedonian</option>
									 <option value="Malagasy">Malagasy</option>
									 <option value="Malawian">Malawian</option>
									 <option value="Malaysian">Malaysian</option>
									 <option value="Maldivan">Maldivan</option>
									 <option value="Malian">Malian</option>
									 <option value="Maltese">Maltese</option>
									 <option value="Marshallese">Marshallese</option>
									 <option value="Mauritanian">Mauritanian</option>
									 <option value="Mauritian">Mauritian</option>
									 <option value="Mexican">Mexican</option>
									 <option value="Micronesian">Micronesian</option>
									 <option value="Moldovan">Moldovan</option>
									 <option value="Monacan">Monacan</option>
									 <option value="Mongolian">Mongolian</option>
									 <option value="Moroccan">Moroccan</option>
									 <option value="Mosotho">Mosotho</option>
									 <option value="Motswana">Motswana</option>
									 <option value="Mozambican">Mozambican</option>
									 <option value="Namibian">Namibian</option>
									 <option value="Nauruan">Nauruan</option>
									 <option value="Nepalese">Nepalese</option>
									 <option value="New zealander">New Zealander</option>
									 <option value="Ni-Vanuatu">Ni-Vanuatu</option>
									 <option value="Nicaraguan">Nicaraguan</option>
									 <option value="Nigerien">Nigerien</option>
									 <option value="North Korean">North Korean</option>
									 <option value="Northern Irish">Northern Irish</option>
									 <option value="Norwegian">Norwegian</option>
									 <option value="Omani">Omani</option>
									 <option value="Pakistani">Pakistani</option>
									 <option value="Palauan">Palauan</option>
									 <option value="Panamanian">Panamanian</option>
									 <option value="Papua New Guinean">Papua New Guinean</option>
									 <option value="Paraguayan">Paraguayan</option>
									 <option value="Peruvian">Peruvian</option>
									 <option value="Polish">Polish</option>
									 <option value="Portuguese">Portuguese</option>
									 <option value="Qatari">Qatari</option>
									 <option value="Romanian">Romanian</option>
									 <option value="Russian">Russian</option>
									 <option value="Rwandan">Rwandan</option>
									 <option value="Saint Lucian">Saint Lucian</option>
									 <option value="Salvadoran">Salvadoran</option>
									 <option value="Samoan">Samoan</option>
									 <option value="San Marinese">San Marinese</option>
									 <option value="Sao Tomean">Sao Tomean</option>
									 <option value="Saudi">Saudi</option>
									 <option value="Scottish">Scottish</option>
									 <option value="Senegalese">Senegalese</option>
									 <option value="Serbian">Serbian</option>
									 <option value="Seychellois">Seychellois</option>
									 <option value="Sierra Leonean">Sierra Leonean</option>
									 <option value="Singaporean">Singaporean</option>
									 <option value="Slovakian">Slovakian</option>
									 <option value="Slovenian">Slovenian</option>
									 <option value="Solomon Islander">Solomon Islander</option>
									 <option value="Somali">Somali</option>
									 <option value="South African">South African</option>
									 <option value="South Korean">South Korean</option>
									 <option value="Spanish">Spanish</option>
									 <option value="Sri Lankan">Sri Lankan</option>
									 <option value="Sudanese">Sudanese</option>
									 <option value="Surinamer">Surinamer</option>
									 <option value="Swazi">Swazi</option>
									 <option value="Swedish">Swedish</option>
									 <option value="Swiss">Swiss</option>
									 <option value="Syrian">Syrian</option>
									 <option value="Taiwanese">Taiwanese</option>
									 <option value="Tajik">Tajik</option>
									 <option value="Tanzanian">Tanzanian</option>
									 <option value="Thai">Thai</option>
									 <option value="Togolese">Togolese</option>
									 <option value="Tongan">Tongan</option>
									 <option value="Trinidadian or Tobagonian">Trinidadian or Tobagonian</option>
									 <option value="Tunisian">Tunisian</option>
									 <option value="Turkish">Turkish</option>
									 <option value="Tuvaluan">Tuvaluan</option>
									 <option value="Ugandan">Ugandan</option>
									 <option value="Ukrainian">Ukrainian</option>
									 <option value="Uruguayan">Uruguayan</option>
									 <option value="Uzbekistani">Uzbekistani</option>
									 <option value="Venezuelan">Venezuelan</option>
									 <option value="Vietnamese">Vietnamese</option>
									 <option value="Welsh">Welsh</option>
									 <option value="Yemenite">Yemenite</option>
									 <option value="Zambian">Zambian</option>
									 <option value="Zimbabwean">Zimbabwean</option>
    							 </select></div>
					<div class="upp">
					<label class="lp">Suffix</label>
					<input type="text" name="suffix" id="suffix" class="ttbox" value="">
					<label for="nation" class="lp">Civil Status</label>
					<select name="civil" id="civil" class="ttbox">
   								 <option value="Single">Single</option>
    							 <option value="Married">Married</option>
    							 <option value="LS">Separated</option>
								 <option value="W">Widow</option>
    							 </select></div>
					</div>

				<div class="mainsbody1p2down">
					<div class="upp2">
					<label class="lp">Department</label>
					<input type="text" name="department" id="department" class="ttbox2" value="">
					<label class="lp">Employee Status</label>
					<input type="text" name="empstatus" id="empstatus" class="ttbox2" value=""></div>
					<div class="upp2">
					<label class="lp">Designation</label>
					<input type="text" name="designation" id="designation" class="ttbox2" value="">
					<label class="lp">Paydate</label>
					<input type="date" name="pdate" id="pdate" class="ttbox2" value=""></div>
					<div class="upp2">
					<label for="quadep" class="lp">Qualified Department Status</label>
					<select name="quadep" id="quadep" class="ttbox2">
   								 <option value="">Select one</option>
    							 <option value="Z">Z or Single</option>
								 <option value="S or ME">S or ME</option>
								 <option value="S1 or ME1">S1 or ME1</option>
								 <option value="S2 or ME2">S2 or ME2</option>
								 <option value="S3 or ME3">S3 or ME3</option>
								 <option value="S4 or ME4">S4 or ME4</option>
    							 </select>
					<label class="lp">Employee Number</label>
					<input type="text" name="empnum" id="empnum" class="ttbox2" value=""></div>
				</div>
				<h2>Contact Information</h2>
				<div class="mainsbody1p3">
					<div class="upp3">
					<label class="lp">Contact Number</label>
					<input type="text" name="contactnum" id="contactnum" class="ttbox3" value="">
					<label for="othsoc" class="lp">Other Social Media</label>
					<select name="othsoc" id="othsoc" class="ttbox3">
   								 <option value="">Select one</option>
    							 <option value="Facebook_messenger">Facebook Messenger</option>
								 <option value="Whatsapp_messenger">WhatsApp Messenger</option>
								 <option value="Wechat">WeChat</option>
								 <option value="Telegram">Telegram</option>
								 <option value="Snapchat">Snapchat</option>
								 <option value="Other">Other</option>
    							 </select>
					</div>
					<div class="upp3">
					<label class="lp">Email</label>
					<input type="text" name="email" id="email" class="ttbox3" value="">
					<label class="lp">Social Media Account/ID number</label>
					<input type="text" name="idnum" id="idnum" class="ttbox3" value="">
					</div>
				</div>
				<h2>Address</h2>
					<div class="mainsbody1p4">
						<div class="upp4">
					<label class="lp">Address Line 1</label>
					<input type="text" name="addline1" id="addline1" class="ttbox3" value="">
					<label class="lp">Address Line 2</label>
					<input type="text" name="addline2" id="addline2" class="ttbox3" value="">
					<label class="lp">City Municipality</label>
					<input type="text" name="municipality" id="municipality" class="ttbox3" value="">
					<label class="lp">Image Path</label>
					<input type="text" name="picpath" id="picpath" class="ttbox3" value="<?php echo $target; ?>"></div>
						<div class="upp4">
					<label for="country" class="lp">Country</label>
					<select name="country" id="country" class="ttbox3">
   								 <option value="Afganistan">Afghanistan</option>
								 <option value="Albania">Albania</option>
								 <option value="Algeria">Algeria</option>
								 <option value="American Samoa">American Samoa</option>
								 <option value="Andorra">Andorra</option>
								 <option value="Angola">Angola</option>
								 <option value="Anguilla">Anguilla</option>
								 <option value="Antigua & Barbuda">Antigua & Barbuda</option>
								 <option value="Argentina">Argentina</option>
								 <option value="Armenia">Armenia</option>
								 <option value="Aruba">Aruba</option>
								 <option value="Australia">Australia</option>
								 <option value="Austria">Austria</option>
								 <option value="Azerbaijan">Azerbaijan</option>
								 <option value="Bahamas">Bahamas</option>
								 <option value="Bahrain">Bahrain</option>
								 <option value="Bangladesh">Bangladesh</option>
								 <option value="Barbados">Barbados</option>
								 <option value="Belarus">Belarus</option>
								 <option value="Belgium">Belgium</option>
								 <option value="Belize">Belize</option>
								 <option value="Benin">Benin</option>
								 <option value="Bermuda">Bermuda</option>
								 <option value="Bhutan">Bhutan</option>
								 <option value="Bolivia">Bolivia</option>
								 <option value="Bonaire">Bonaire</option>
								 <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
								 <option value="Botswana">Botswana</option>
								 <option value="Brazil">Brazil</option>
								 <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
								 <option value="Brunei">Brunei</option>
								 <option value="Bulgaria">Bulgaria</option>
								 <option value="Burkina Faso">Burkina Faso</option>
								 <option value="Burundi">Burundi</option>
								 <option value="Cambodia">Cambodia</option>
								 <option value="Cameroon">Cameroon</option>
								 <option value="Canada">Canada</option>
								 <option value="Canary Islands">Canary Islands</option>
								 <option value="Cape Verde">Cape Verde</option>
								 <option value="Cayman Islands">Cayman Islands</option>
								 <option value="Central African Republic">Central African Republic</option>
								 <option value="Chad">Chad</option>
								 <option value="Channel Islands">Channel Islands</option>
								 <option value="Chile">Chile</option>
								 <option value="China">China</option>
								 <option value="Christmas Island">Christmas Island</option>
								 <option value="Cocos Island">Cocos Island</option>
								 <option value="Colombia">Colombia</option>
								 <option value="Comoros">Comoros</option>
								 <option value="Congo">Congo</option>
								 <option value="Cook Islands">Cook Islands</option>
								 <option value="Costa Rica">Costa Rica</option>
								 <option value="Cote DIvoire">Cote DIvoire</option>
								 <option value="Croatia">Croatia</option>
								 <option value="Cuba">Cuba</option>
								 <option value="Curaco">Curacao</option>
								 <option value="Cyprus">Cyprus</option>
								 <option value="Czech Republic">Czech Republic</option>
								 <option value="Denmark">Denmark</option>
								 <option value="Djibouti">Djibouti</option>
								 <option value="Dominica">Dominica</option>
								 <option value="Dominican Republic">Dominican Republic</option>
								 <option value="East Timor">East Timor</option>
								 <option value="Ecuador">Ecuador</option>
								 <option value="Egypt">Egypt</option>
								 <option value="El Salvador">El Salvador</option>
								 <option value="Equatorial Guinea">Equatorial Guinea</option>
								 <option value="Eritrea">Eritrea</option>
								 <option value="Estonia">Estonia</option>
								 <option value="Ethiopia">Ethiopia</option>
								 <option value="Falkland Islands">Falkland Islands</option>
								 <option value="Faroe Islands">Faroe Islands</option>
								 <option value="Fiji">Fiji</option>
								 <option value="Finland">Finland</option>
								 <option value="France">France</option>
								 <option value="French Guiana">French Guiana</option>
								 <option value="French Polynesia">French Polynesia</option>
								 <option value="French Southern Ter">French Southern Ter</option>
								 <option value="Gabon">Gabon</option>
								 <option value="Gambia">Gambia</option>
								 <option value="Georgia">Georgia</option>
								 <option value="Germany">Germany</option>
								 <option value="Ghana">Ghana</option>
								 <option value="Gibraltar">Gibraltar</option>
								 <option value="Great Britain">Great Britain</option>
								 <option value="Greece">Greece</option>
								 <option value="Greenland">Greenland</option>
								 <option value="Grenada">Grenada</option>
								 <option value="Guadeloupe">Guadeloupe</option>
								 <option value="Guam">Guam</option>
								 <option value="Guatemala">Guatemala</option>
								 <option value="Guinea">Guinea</option>
								 <option value="Guyana">Guyana</option>
								 <option value="Haiti">Haiti</option>
								 <option value="Hawaii">Hawaii</option>
								 <option value="Honduras">Honduras</option>
								 <option value="Hong Kong">Hong Kong</option>
								 <option value="Hungary">Hungary</option>
								 <option value="Iceland">Iceland</option>
								 <option value="Indonesia">Indonesia</option>
								 <option value="India">India</option>
								 <option value="Iran">Iran</option>
								 <option value="Iraq">Iraq</option>
								 <option value="Ireland">Ireland</option>
								 <option value="Isle of Man">Isle of Man</option>
								 <option value="Israel">Israel</option>
								 <option value="Italy">Italy</option>
								 <option value="Jamaica">Jamaica</option>
								 <option value="Japan">Japan</option>
								 <option value="Jordan">Jordan</option>
								 <option value="Kazakhstan">Kazakhstan</option>
								 <option value="Kenya">Kenya</option>
								 <option value="Kiribati">Kiribati</option>
								 <option value="Korea North">Korea North</option>
								 <option value="Korea Sout">Korea South</option>
								 <option value="Kuwait">Kuwait</option>
								 <option value="Kyrgyzstan">Kyrgyzstan</option>
								 <option value="Laos">Laos</option>
								 <option value="Latvia">Latvia</option>
								 <option value="Lebanon">Lebanon</option>
								 <option value="Lesotho">Lesotho</option>
								 <option value="Liberia">Liberia</option>
								 <option value="Libya">Libya</option>
								 <option value="Liechtenstein">Liechtenstein</option>
								 <option value="Lithuania">Lithuania</option>
								 <option value="Luxembourg">Luxembourg</option>
								 <option value="Macau">Macau</option>
								 <option value="Macedonia">Macedonia</option>
								 <option value="Madagascar">Madagascar</option>
								 <option value="Malaysia">Malaysia</option>
								 <option value="Malawi">Malawi</option>
								 <option value="Maldives">Maldives</option>
								 <option value="Mali">Mali</option>
								 <option value="Malta">Malta</option>
								 <option value="Marshall Islands">Marshall Islands</option>
								 <option value="Martinique">Martinique</option>
								 <option value="Mauritania">Mauritania</option>
								 <option value="Mauritius">Mauritius</option>
								 <option value="Mayotte">Mayotte</option>
								 <option value="Mexico">Mexico</option>
								 <option value="Midway Islands">Midway Islands</option>
								 <option value="Moldova">Moldova</option>
								 <option value="Monaco">Monaco</option>
								 <option value="Mongolia">Mongolia</option>
								 <option value="Montserrat">Montserrat</option>
								 <option value="Morocco">Morocco</option>
								 <option value="Mozambique">Mozambique</option>
								 <option value="Myanmar">Myanmar</option>
								 <option value="Nambia">Nambia</option>
								 <option value="Nauru">Nauru</option>
								 <option value="Nepal">Nepal</option>
								 <option value="Netherland Antilles">Netherland Antilles</option>
								 <option value="Netherlands">Netherlands (Holland, Europe)</option>
								 <option value="Nevis">Nevis</option>
								 <option value="New Caledonia">New Caledonia</option>
								 <option value="New Zealand">New Zealand</option>
								 <option value="Nicaragua">Nicaragua</option>
								 <option value="Niger">Niger</option>
								 <option value="Nigeria">Nigeria</option>
								 <option value="Niue">Niue</option>
								 <option value="Norfolk Island">Norfolk Island</option>
								 <option value="Norway">Norway</option>
								 <option value="Oman">Oman</option>
								 <option value="Pakistan">Pakistan</option>
								 <option value="Palau Island">Palau Island</option>
								 <option value="Palestine">Palestine</option>
								 <option value="Panama">Panama</option>
								 <option value="Papua New Guinea">Papua New Guinea</option>
								 <option value="Paraguay">Paraguay</option>
								 <option value="Peru">Peru</option>
								 <option selected value="Phillipines">Philippines</option>
								 <option value="Pitcairn Island">Pitcairn Island</option>
								 <option value="Poland">Poland</option>
								 <option value="Portugal">Portugal</option>
								 <option value="Puerto Rico">Puerto Rico</option>
								 <option value="Qatar">Qatar</option>
								 <option value="Republic of Montenegro">Republic of Montenegro</option>
								 <option value="Republic of Serbia">Republic of Serbia</option>
								 <option value="Reunion">Reunion</option>
								 <option value="Romania">Romania</option>
								 <option value="Russia">Russia</option>
								 <option value="Rwanda">Rwanda</option>
								 <option value="St Barthelemy">St Barthelemy</option>
								 <option value="St Eustatius">St Eustatius</option>
								 <option value="St Helena">St Helena</option>
								 <option value="St Kitts-Nevis">St Kitts-Nevis</option>
								 <option value="St Lucia">St Lucia</option>
								 <option value="St Maarten">St Maarten</option>
								 <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
								 <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
								 <option value="Saipan">Saipan</option>
								 <option value="Samoa">Samoa</option>
								 <option value="Samoa American">Samoa American</option>
								 <option value="San Marino">San Marino</option>
								 <option value="Sao Tome & Principe">Sao Tome & Principe</option>
								 <option value="Saudi Arabia">Saudi Arabia</option>
								 <option value="Senegal">Senegal</option>
								 <option value="Seychelles">Seychelles</option>
								 <option value="Sierra Leone">Sierra Leone</option>
								 <option value="Singapore">Singapore</option>
								 <option value="Slovakia">Slovakia</option>
								 <option value="Slovenia">Slovenia</option>
								 <option value="Solomon Islands">Solomon Islands</option>
								 <option value="Somalia">Somalia</option>
								 <option value="South Africa">South Africa</option>
								 <option value="Spain">Spain</option>
								 <option value="Sri Lanka">Sri Lanka</option>
								 <option value="Sudan">Sudan</option>
								 <option value="Suriname">Suriname</option>
								 <option value="Swaziland">Swaziland</option>
								 <option value="Sweden">Sweden</option>
								 <option value="Switzerland">Switzerland</option>
								 <option value="Syria">Syria</option>
								 <option value="Tahiti">Tahiti</option>
								 <option value="Taiwan">Taiwan</option>
								 <option value="Tajikistan">Tajikistan</option>
								 <option value="Tanzania">Tanzania</option>
								 <option value="Thailand">Thailand</option>
								 <option value="Togo">Togo</option>
								 <option value="Tokelau">Tokelau</option>
								 <option value="Tonga">Tonga</option>
								 <option value="Trinidad & Tobago">Trinidad & Tobago</option>
								 <option value="Tunisia">Tunisia</option>
								 <option value="Turkey">Turkey</option>
								 <option value="Turkmenistan">Turkmenistan</option>
								 <option value="Turks & Caicos Is">Turks & Caicos Is</option>
								 <option value="Tuvalu">Tuvalu</option>
								 <option value="Uganda">Uganda</option>
								 <option value="United Kingdom">United Kingdom</option>
								 <option value="Ukraine">Ukraine</option>
								 <option value="United Arab Erimates">United Arab Emirates</option>
								 <option value="United States of America">United States of America</option>
								 <option value="Uraguay">Uruguay</option>
								 <option value="Uzbekistan">Uzbekistan</option>
								 <option value="Vanuatu">Vanuatu</option>
								 <option value="Vatican City State">Vatican City State</option>
								 <option value="Venezuela">Venezuela</option>
								 <option value="Vietnam">Vietnam</option>
								 <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
								 <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
								 <option value="Wake Island">Wake Island</option>
								 <option value="Wallis & Futana Is">Wallis & Futana Is</option>
								 <option value="Yemen">Yemen</option>
								 <option value="Zaire">Zaire</option>
								 <option value="Zambia">Zambia</option>
								 <option value="Zimbabwe">Zimbabwe</option>
    							 </select>
					<label class="lp">State Province</label>
					<input type="text" name="sprovince" id="sprovince" class="ttbox3" value="">
					<label class="lp">Zipcode</label>
					<input type="text" name="zip" id="zip" class="ttbox3" value="">
					<div class="aryx">
							<input type="submit" name="signup" id="signup" class="arbut" value="Save">
							<input type="submit" name="cancel" id="cancel" class="arbut" value="Cancel">
						</div>
					</div>
					</div>

					<!--<div class="mainsbody1p5">
						<div class="aryx">
							<input type="submit" name="signup" id="signup" class="arbut" value="Sign Up">
							<input type="submit" name="cancel" id="cancel" class="arbut" value="Cancel">
						</div>
					</div>-->
		</div>

	</div>
</form>
</body>
</html>