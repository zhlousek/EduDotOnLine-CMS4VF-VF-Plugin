<?php
$file2DeleteName = $_GET['fN2Delete'];
$dotdot = "../../CustomPages/pages/";
$trueFileName2Delete = $dotdot . $file2DeleteName . '.php';
// We don't really delete - just move the file to a new folder for keeping
$dotdotDeleted = "../../CustomPages/pages/deleted_files/";
$DeletedFileNameNewLocation = $dotdotDeleted . $file2DeleteName . '.php';
rename($trueFileName2Delete,$DeletedFileNameNewLocation);

$xx = $_SERVER['SCRIPT_NAME'];
$xxy = str_replace("plugins/CMS/subsys/deleteFile.php", "plugin/CMS", $xx);
$xxyz =  $_SERVER['SERVER_NAME'];


$Url2Go = 'http://' . $xxyz . $xxy; 

header("Location: $Url2Go")


// //unlink($file_name_delete); - this really deletes
// One day we may implement undelete and empty trash
?>