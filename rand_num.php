<html>
<body>
<style>
body {margin: 0; padding: 0;
	background-color: #faf4f2;
	color:#996633;
	font-family:"Arial","sans-serif";color:#18014a;font-size:18px;
	position:absolute;
	left:600px;
	top:100px;}
	
td, th {
  border: 1px solid #b5b3b3;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #c9c9c9;
}
</style>

<?php

function statroll() {
	 if(array_key_exists('button1')) {
            statroll();
        }
	$a = rand(1,6);
	$b = rand(1,6);
	$c = rand(1,6);
	$d = rand(1,6);
	$x = $a+$b+$c;
	if ($x <= 7) {
	$z = $x+$d;
	echo $z;
	} else {
	echo $x;
	}
}

statroll();
echo "<br>";
statroll();
echo "<br>";
statroll();
echo "<br>";
statroll();
echo "<br>";
statroll();
echo "<br>";
statroll();
?>

<form>
<button type="submit" name="button1">Roll Stats</button>
</form>
<table>
	
  <tr>
	<th>Stats</th>
    <th>Modifiers</th>
   </tr>
  <tr>
    <th>6-7</th>
    <td>-2</td>
  </tr>
  <tr>
    <th>8-9</th>
    <td>-1</td>
  </tr>
    <tr>
    <th>10-11</th>
    <td>0</td>
  </tr>
    <tr>
    <th>12-13</th>
    <td>+1</td>
  </tr>
    <tr>
    <th>14-15</th>
    <td>+2</td>
  </tr>
    <tr>
    <th>16-17</th>
    <td>+3</td>
  </tr>
    <tr>
    <th>18-19</th>
    <td>+4</td>
  </tr>
    <tr>
    <th>20-21</th>
    <td>+5</td>
  </tr>
    <tr>
    <th>22-23</th>
    <td>+6</td>
  </tr>
    <tr>
    <th>24-25</th>
    <td>+7</td>
  </tr>
  <tr>
    <th>26-27</th>
    <td>+8</td>
  </tr>
  <tr>
    <th>28-29</th>
    <td>+9</td>
  </tr>
  <tr>
   <th>30</th>
   <td>+10</td>
  </tr>
</body>
</html>
