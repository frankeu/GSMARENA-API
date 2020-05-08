<?php
require('functions.php');
$GSMArena = gsmarena('https://www.gsmarena.com/samsung_galaxy_a71-9995.php');
$GSMArenaToArray = json_decode($GSMArena,TRUE);
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<h1>JSON Example:</h1> <?=$GSMArena ?>
<h1>HTML Table Example:</h1>

<?php foreach($GSMArenaToArray as $key => $value): ?>
<table cellspacing="0">
<tr>
<th rowspan="10" scope="row"><?= $key ?></th>
</tr>
<?php
for($i=0;$i<count($GSMArenaToArray[$key][0]);$i++){
	echo '<tr>
<td>'.$GSMArenaToArray[$key][0][$i].'</a></td>
<td>'.$GSMArenaToArray[$key][1][$i].'</td>
</tr>';
}
echo "<hr>";
?>
</table>
<?php endforeach ?>


</body>
</html>
