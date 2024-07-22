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
font-family: fangsong;
font-size: 20px;
color: #000000;
position:absolute;
left:660px;
top:300px;
}

img {
position: absolute;
height: 35%;
width: 35%;
left:600px;
top:-10px;
}

body{
	 background-image: url('https://i2.wp.com/azgaar.files.wordpress.com/2019/07/antique-big.jpg');
}

</style>
</head>
<body>
<img src="https://logos-world.net/wp-content/uploads/2021/12/Dungeons-Dragons-Logo-2000.png">
<div id = "content">
	
<?php 
//echo "$hostname   $databasename   $username <br />";

echo "NAME - " . $_SESSION["name"] . " ....................... ";
echo "RACE - " . $_SESSION["race"] . " <br />";
echo "CLASS - " . $_SESSION["class"] . " ....................... ";
echo "LEVEL - " . $_SESSION["level"] . "<br />";


echo " <br />";

echo "AC : " . $_SESSION["ac"] . " |\n";
echo "HP : " . $_SESSION["hp"] . "<br /> ";


echo " <br />";

echo "STR : " . $_SESSION["str"] . " |\n";
echo "DEX : " . $_SESSION["dex"] . " |	";
echo "CON : " . $_SESSION["con"] . " |	";
echo "INT : " . $_SESSION["inte"] . " |	";
echo "WIS : " . $_SESSION["wis"] . " | ";
echo "CHA : " . $_SESSION["cha"] . " <br />";

echo " <br />";

echo "SKILL - " . $_SESSION["s1"] . "<br />";
echo "SKILL - " . $_SESSION["s2"] . "<br />";
echo "SKILL - " . $_SESSION["s3"] . "<br />";
echo "SKILL - " . $_SESSION["s4"] . "<br />";


?>

</form>
<pre></pre>
<pre>
</pre>
<hr/>
</div>
</body>
</html>
