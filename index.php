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
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>
<h1>JSON Example:</h1> <?=$GSMArena ?>
<h1>HTML Table Example:</h1>

<?php foreach($GSMArenaToArray['table'] as $key => $value): ?>
<table cellspacing="0">
<tr>
<th rowspan="10" scope="row"><?= $key ?></th>
</tr>
<?php
for($i=0;$i<count($GSMArenaToArray['table'][$key][0]);$i++){
	echo '<tr>
<td>'.$GSMArenaToArray['table'][$key][0][$i].'</a></td>
<td>'.$GSMArenaToArray['table'][$key][1][$i].'</td>
</tr>';
}
echo "<hr>";
?>
</table>
<?php endforeach ?>

<h1>Images Example:</h1>

<?php foreach($GSMArenaToArray['images'] as $key => $value): ?>
<div class="responsive">
  <div class="gallery">
      <img src="<?=$value?>" alt="Example" width="600" height="400">
    <div class="desc">Add a description of the image here</div>
  </div>
</div>
<?php endforeach ?>

</body>
</html>
