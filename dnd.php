<?php
	include "db/db.php";
	include "db/db.php.show";
	include "db/error.php"; 
	echo " $hostName  $databaseName  $username <br />"; 
?>

<html><head><title>PHP Form Input</title>
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

</style>


</head>

<body>
<?php

?>
<div id = "content">
	
	<?php echo "$hostname   $databasename   $username <br />";?>

	<a href = "select.php" target = "_blank"> select * from dungon.dd order by id desc;</a>


<form  method="post">

&nbsp;	name<input type="text" name="name" maxlength="64"> <br />
&nbsp;  class<input type="text" name="class" maxlength="64"> <br />
&nbsp;  race<input type="text" name="race" maxlength="64"> <br />
&nbsp;  level<input type="text" name="level" maxlength="64"> <br />


<button type="submit">Submit</button>
</form>
<pre>

</pre>
<?php  
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";


if(empty($_POST['name'])){  $name_input = "Name";  } 
	else {	$name_input=$_POST['name'];	}

if(empty($_POST['class'])){  $class_input = "Class";  } 
	else {	$class_input=$_POST['class'];	}	
	
if(empty($_POST['race'])){  $race_input = "Race";  } 
	else {	$race_input=$_POST['race'];	}	
	
if(empty($_POST['level'])){  $level_input = "Level";  } 
	else {	$level_input=$_POST['level'];	}	
	
	

	//echo "DEBUG FORM $name_input : $class_input<br /> ";
if ( $name_input != "Name" ){
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
	$str2 = $timein;
	$str3 = $datein;
	$str4 = $name_input;  
	$str5 =  $class_input;
	$str6 =  $race_input;
	$str7 =  $level_input;

echo " $str1 : $date : $time <br>"; 
												// cpu  cooler  motherboard  ram  storage  video  power
$query = "INSERT INTO `dd` (`id`, `ip`, `timein`, `datein`, `name`, `class`, `race`, `level`) VALUES (NULL, '$str1', '$str2', '$str3', '$str4', '$str5', '$str6', '$str7');";
//used this to debugINSERT INTO `formdata` (`id`, `ip`, `timein`, `datein`, `name`, `number`) VALUES (NULL, '12.0.0.1', 'now', 'now', 'test', '101902901');
	echo "$query";
	$result = @ mysqli_query ($connection,$query)  or showerror();
		//$result = @ mysqli_query ($connection,$query);			
		mysqli_close($connection);

}
?>
<pre>

<a href = "usage.php" target="_blank" >data</a>

</pre>
<hr />
</div>
</body>
</html>
