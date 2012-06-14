<p><?php echo $_SERVER['SERVER_NAME']; ?></p>
<p><?php echo $_SERVER["DOCUMENT_ROOT"]; ?></p>
<p><?php echo $_SERVER['REQUEST_URI']; ?></p>
<?php
$OurHost = $_SERVER['SERVER_NAME'];
$OurScript = $_SERVER['REQUEST_URI'];
$OurScriptPointer = str_replace("CMS/subsys/tinymce-jq/jscripts/tiny_mce/plugins/jbimages/tezt.php", "CustomPages/pages/images", $OurScript);
?>
<p><?php echo "OSP is $OurScriptPointer"; ?></p>