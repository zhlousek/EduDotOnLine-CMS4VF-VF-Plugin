<?php
if ($_GET['fN2Edit']) {
$fN2Edit = $_GET['fN2Edit'];
$FullfN2Edit = '../../CustomPages/pages/' . $fN2Edit . '.php';
$lines = file($FullfN2Edit);
  $l_count = count($lines);
  for($x = 0; $x< $l_count; $x++)
  {
  }
	for ($n = 0; $n < $l_count; $n++)
	{
	$truelines[$n]=$lines[$n+1];
 	}
	$tl_count = count($truelines);
$FileBody = implode($truelines);

// $FileBody = file_get_contents($FullfN2Edit,true);
}
?>





<?php 
echo "$truelines[0]<br />\n";
echo "$truelines[1]<br />\n";
echo "$truelines[2]<br />\n";
echo "<hr />";
echo "$FileBody";
echo "<hr />";
?>