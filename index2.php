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
background-color:white;	
color: #243b33;
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

&nbsp;	Strength: <input type="text" name="str" maxlength="32" size="5" style="background-color:#fab2a2;"> <br />
&nbsp;  Dexterity: <input type="text" name="dex" maxlength="32" size="5" style="background-color:#ffc170;"> <br />
&nbsp;  Constitution: <input type="text" name="con" maxlength="32" size="5" style="background-color:#fdff87;"> <br />
&nbsp;  Intelligence: <input type="text" name="inte" maxlength="32" size="5" style="background-color:#baffc7;"> <br />
&nbsp;  Wisdom: <input type="text" name="wis" maxlength="32" size="5" style="background-color:#93b8f5;"> <br />
&nbsp;  Charisma: <input type="text" name="cha" maxlength="32" size="5" style="background-color:#cda2fa;"> <br />
&nbsp;  Armor Class: <input type="text" name="ac" maxlength="32" size="5" style="background-color:#c9c9c9;"> <br />
&nbsp;  Hit Points: <input type="text" name="hp" maxlength="32" size="5" style="background-color:#ebfcde;"> <br />


<button type="submit">Submit</button>
</form>
<pre>

</pre>
<?php  
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";


if(empty($_POST['str'])){  $str_input = "str";  } 
	else {	$str_input=$_POST['str'];	}

if(empty($_POST['dex'])){  $dex_input = "dex";  } 
	else {	$dex_input=$_POST['dex'];	}

if(empty($_POST['con'])){  $con_input = "con";  } 
	else {	$con_input=$_POST['con'];	}	
	
if(empty($_POST['inte'])){  $inte_input = "inte";  } 
	else {	$inte_input=$_POST['inte'];	}
	
if(empty($_POST['wis'])){  $wis_input = "wis";  } 
	else {	$wis_input=$_POST['wis'];	}	
	
if(empty($_POST['cha'])){  $cha_input = "cha";  } 
	else {	$cha_input=$_POST['cha'];	}	
	
if(empty($_POST['ac'])){  $ac_input = "ac";  } 
	else {	$ac_input=$_POST['ac'];	}	
	
if(empty($_POST['hp'])){  $hp_input = "hp";  } 
	else {	$hp_input=$_POST['hp'];	}	
	
	
		//echo "DEBUG FORM $str_input : $dex_input<br /> ";
if ( $str_input != "str" ){
//sql input	*******************************	
	//echo "DEBUG made it past if $hostname $username  <br />"; 		
	
	if(!($connection = mysqli_connect($hostName, $username, $password))) die ("Counld not connect to database.");
 
	$dbname = "dungeon";
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
	$str4 = $str_input;  
	$str5 = $dex_input;
	$str6 = $con_input;
	$str7 = $inte_input;
	$str8 = $wis_input;
	$str9 = $cha_input;
	$str10 = $ac_input;
	$str11 = $hp_input;


//echo " $str1 : $date : $time <br>"; 										
$query = "INSERT INTO `stats`(`id`, `ip`, `time`, `date`, `str`, `dex`, `con`, `inte`, `wis`, `cha`, `ac`, `hp`) VALUES (NULL, '$str1', '$str2', '$str3', '$str4', '$str5', '$str6', '$str7', '$str8', '$str9', '$str10', '$str11');";
//used this to debugINSERT INTO `formdata` (`id`, `ip`, `timein`, `datein`, `name`, `number`) VALUES (NULL, '12.0.0.1', 'now', 'now', 'test', '101902901');
	//echo "$query";
	$result = @ mysqli_query ($connection,$query)  or showerror();
		//$result = @ mysqli_query ($connection,$query);			
		mysqli_close($connection);

}
?>
<pre>
<?php 
echo "<a href='index3.php'>-NEXT PAGE-</a><br />";

$_SESSION["str"] = $str_input;
$_SESSION["dex"] = $dex_input;
$_SESSION["con"] = $con_input;
$_SESSION["inte"] = $inte_input;
$_SESSION["wis"] = $wis_input;
$_SESSION["cha"] = $cha_input;
$_SESSION["ac"] = $ac_input;
$_SESSION["hp"] = $hp_input;

?>
</pre>
<hr />
<a href='rand_num.php'>CHARACTER STATS ROLLER</a>
<p>Armor Class = Dex Modifier & Armor that your Character is wearing + 10</p>

<a href='hp-chart.html'>HIT DICE CHART</a>
</div>
</body>
</html>


