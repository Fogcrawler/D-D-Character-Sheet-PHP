<?php
	include "db/db.php";
	include "db/db.php.show";
	include "db/error.php"; 
	//echo " $hostName  $databaseName  $username <br />"; 
?>

<html><head><title>DnD Character Sheet Form</title>
<style>
body {margin: 0; padding: 0;
background-color: #ffffff;
color:#996633;
font-family:"Arial","sans-serif";color:#700070;font-size:14px;}
pre{margin: 0; padding: 0;font-family:"Arial","sans-serif";color:#000000;font-size:14px;}


#content{
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
color: #330099;
background-color:white;	
position:absolute;
left:350px;
top:200px;
}

body{
	 background-image: url('https://wallup.net/wp-content/uploads/2017/05/29/357804-dragon-double_exposure-Dragon_Age.jpg');
}

</style>

</head>

<body>
<?php

?>
<div id = "content">
	
	<?php //echo "$hostname   $databasename   $username <br />";?>
	
<form  method="post">

<label for="s1">Choose your 1st Skill:</label>
 <select name="s1" id="s1">
   <option value="ath">Athletics</option>
   <option value="arco">Acrobatics</option>
   <option value="soh">Sleight of Hand</option>
   <option value="ste">Stealth</option>
   <option value="anih">Animal Handling</option>
  </select> <br />

<label for="s2">Choose your 2nd Skill:</label>
<select name="s2" id="s2">
   <option value="arca">Arcana</option>
   <option value="his">History</option>
   <option value="inv">Investigation</option>
   <option value="nat">Nature</option>
   <option value="reli">Religion</option>
   </select> <br />

<label for="s3">Choose your 3rd Skill:</label>
<select name="s3" id="s3">
   <option value="ins">Insight</option>
   <option value="med">Medicine</option>
   <option value="per">Perception</option>
   <option value="suri">Survival</option>
  </select> <br />
  
<label for="s4">Choose your 4th Skill:</label>
<select name="s4" id="s4">
   <option value="dece">Deception</option>
   <option value="inti">Intimidation</option>
   <option value="perf">Performance</option>
   <option value="pers">Persusasion</option>
  </select> <br />
  
<button type="submit">Submit</button>
</form>
<pre>

</pre>
<?php  
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";


if(empty($_POST['s1'])){  $s1_input = "s1";  } 
	else {	$s1_input=$_POST['s1'];	}

if(empty($_POST['s2'])){  $s2_input = "s2";  } 
	else {	$s2_input=$_POST['s2'];	}

if(empty($_POST['s3'])){  $s3_input = "s3";  } 
	else {	$s3_input=$_POST['s3'];	}	
	
if(empty($_POST['s4'])){  $s4_input = "s4";  } 
	else {	$s4_input=$_POST['s4'];	}	

	echo "DEBUG FORM $s1_input : $s2_input<br /> ";
if ( $s1_input != "s1" ){
//sql input	*******************************	
	//echo "DEBUG made it past if $hostname $username  <br />"; 		

	if(!($connection = mysqli_connect($hostName,$username, $password))) die ("Counld not connect to database.");
 
	$dbname = "dungon";
	mysqli_select_db( $connection,  $databaseName);

	$result = mysqli_query ($connection,"SELECT CURDATE();");
	$row = mysqli_fetch_row($result);
	$date = $row[0];
   
	$result = mysqli_query ($connection, "SELECT CURTIME();");
	$row = mysqli_fetch_row($result);
	$time = $row[0];

	$str0 = '';
	$str1 = $_SERVER['REMOTE_ADDR'];
	$str2 = $time;
	$str3 = $date;
	$str4 = $s1_input;  
	$str5 = $s2_input;
	$str6 = $s3_input;
	$str7 = $s4_input;

echo " $str4 : $date : $time <br>"; 												// cpu  cooler  motherboard  ram  storage  video  power
$query = "INSERT INTO `skills` (`id`, `ip`, `time`, `date`, `s1`, `s2`, `s3`, `s4`) VALUES (NULL, '$str1', '$str2', '$str3', '$str4', '$str5', '$str6', '$str7');";
//used this to debugINSERT INTO `formdata` (`id`, `ip`, `timein`, `datein`, `name`, `number`) VALUES (NULL, '12.0.0.1', 'now', 'now', 'test', '101902901');
	echo "$query";
	$result = @ mysqli_query ($connection,$query)  or showerror();
		//$result = @ mysqli_query ($connection,$query);			
		mysqli_close($connection);

}
?>
<pre>
<?php 
echo "<a href=''>-NEXT PAGE-</a>";
?>
</pre>
<hr />
</div>
</body>
</html>

