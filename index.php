<?php
	session_start();
	include "db/db.php";
	include "db/db.php.show";
	include "db/error.php"; 
	//echo " $hostName  $databaseName  $username  <br />"; 
?>

<html><head><title>DnD Character Sheet</title>
<style>
body {margin: 0; padding: 0;
background-color: #ffffff;
color:#996633;
font-family:"Arial","sans-serif";color:#700070;font-size:14px;}
pre{margin: 0; padding: 0;font-family:"Arial","sans-serif";color:#000000;font-size:14px;}


#content{
font-family: Arial, Helvetica, sans-serif;
font-size: 16px;
color: #243b33;
background-color:white;	
position:absolute;
left:350px;
top:250px;
}

body{
background-image: url('https://wallup.net/wp-content/uploads/2017/05/29/357804-dragon-double_exposure-Dragon_Age.jpg');
}

</style>


</head>


<body>
<div id = "content">
	
	<?php //echo "$hostname   $databasename   $username <br />";?>


<form  method="post">

&nbsp;	Name: <input type="text" name="name" maxlength="32"> <br />
&nbsp;  Race: <input type="text" name="race" maxlength="32"> <br />
&nbsp;  <label for="class">Choose a Class:</label>
 <select name="class" id="class">
    <option value="Fighter">Fighter</option>
    <option value="Bard">Bard</option>
    <option value="Warlock">Warlock</option>
    <option value="Ranger">Ranger</option>
    <option value="Monk">Monk</option>
    <option value="Cleric">Cleric</option>
    <option value="Druid">Druid</option>
    <option value="Paladin">Paladin</option>
    <option value="Barbarian">Barbarian</option>
    <option value="Wizard">Wizard</option>
    <option value="Rogue">Rogue</option>
    <option value="Sorcerer">Sorcerer</option>
  </select> <br />
&nbsp;  Level: <input type="text" name="level" maxlength="32"> <br />

<button type="submit">Submit</button>

</form>
<pre>

</pre>
<?php  
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";


if(empty($_POST['name'])){  $name_input = "name";  } 
	else {	$name_input=$_POST['name'];	}

if(empty($_POST['race'])){  $race_input = "race";  } 
	else {	$race_input=$_POST['race'];	}

if(empty($_POST['class'])){  $class_input = "class";  } 
	else {	$class_input=$_POST['class'];	}	
	
if(empty($_POST['level'])){  $level_input = "level";  } 
	else {	$level_input=$_POST['level'];	}	
	

	//echo "DEBUG FORM $name_input : $class_input<br /> ";
if ( $name_input != "name" ){
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
	$str4 = $name_input;  
	$str5 =  $race_input;
	$str6 =  $class_input;
	$str7 =  $level_input;

//echo " $str1 : $date : $time <br>"; 
												// cpu  cooler  motherboard  ram  storage  video  power
$query = "INSERT INTO `dd` (`id`, `ip`, `timein`, `datein`, `name`, `race`, `class`, `level`) VALUES (NULL, '$str1', '$str2', '$str3', '$str4', '$str5', '$str6', '$str7');";
//used this to debugINSERT INTO `formdata` (`id`, `ip`, `timein`, `datein`, `name`, `number`) VALUES (NULL, '12.0.0.1', 'now', 'now', 'test', '101902901');
	//echo "$query";
	$result = @ mysqli_query ($connection,$query)  or showerror();
		//$result = @ mysqli_query ($connection,$query);			
		mysqli_close($connection);

}
?>

<pre>
<?php 
echo "<a href='index2.php'>-NEXT PAGE-</a>";

$_SESSION["name"] = $name_input;
$_SESSION["race"] = $race_input;
$_SESSION["class"] = $class_input;
$_SESSION["level"] = $level_input;

?>

</pre>
<hr/>
<p>Weclome to D&D Charcter Sheet, Please hit submit before you head to the next page.</p>

</div>
</body>
</html>
