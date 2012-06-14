<?php 
$newFileNameCreated = $_POST['pagetitle'];
$dotdot = "../../CustomPages/pages/";
$trueFileName = $dotdot . $newFileNameCreated . '.php';

$PageBodySubmitted = $_POST['elm1'];

$VFCPTop = sprintf("<?php if (!defined('APPLICATION')) exit(); ?>\n \n ");

$PageBodyWritten = $VFCPTop .$PageBodySubmitted;

$OpenFile2Write = fopen($trueFileName, 'w');
fwrite($OpenFile2Write, $PageBodyWritten);
fclose($OpenFile2Write);

$xx = $_SERVER['SCRIPT_NAME'];
$xxy = str_replace("plugins/CMS/subsys/writeFile.php", "plugin/CMS", $xx);
$xxyz =  $_SERVER['SERVER_NAME'];


$Url2Go = 'http://' . $xxyz . $xxy; 

header("Location: $Url2Go")
?>







