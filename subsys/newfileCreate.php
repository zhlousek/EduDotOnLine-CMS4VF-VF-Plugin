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

<!DOCTYPE html>
<html>
<head>
<!-- Load jQuery -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
        google.load("jquery", "1.3");
</script>


<!-- Load jQuery build -->
<script type="text/javascript" src="./tinymce-jq/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
		// Location of TinyMCE script
		script_url : './tinymce-jq/jscripts/tiny_mce/tiny_mce.js',
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist,equation,spellchecker,jbimages,syntaxhl",

        // Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,jbimages,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor,|,syntaxhl",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen,|,equation,|,spellchecker",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
        relative_urls : false,
        extended_valid_elements : "pre[class]",

        // Example content CSS (should be your site CSS)
        content_css : "./tinymce-jq/examples/css/content.css",

        // Drop lists for link/image/media/template dialogs
        // template_external_list_url : "js/template_list.js",
        // external_link_list_url : "js/link_list.js",
        // external_image_list_url : "js/image_list.js",
        // media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        
});
</script>
<script type="text/javascript">

function validate_form ( ) { 
    valid = true;
    if ( document.form.pagetitle.value == "" ) { 
	alert ( "Please enter the new file name." ); 
	valid = false;
	} else if ( document.form.elm1.value == "" ) { 
	alert ( "Please enter some page content." ); 
	valid = false;
	}
	return valid;
}
</script>

<!-- Need to embed SyntaxHighlighter but that may require digging into VF - do later -->

</head>


<body>

<form id="form" name="form" method="post" action="./writeFile.php" onsubmit="return validate_form ( );" >
		<div style="background-color:#99ccff;;color:red;font-weight:bolder;width:72%">
		&nbsp;<br />
		<span style="font-size:120%;">File Name:&nbsp;&nbsp;<span style="background-color:#99ccff; color:red;">
		<input name="pagetitle" type="text" id="pagetitle" size="80" maxlength="64"  value="<?php echo $fN2Edit;?>" />
		</span>
		<!-- <strong><?php echo $fN2Edit /* .".php"*/ ;  ?></strong> -->
		<span style="font-size:150%;font-weight:bold;color:red;">&nbsp;&larr;&nbsp;</span>
		<span style="font-size:medium;">No spaces in the name!</span>
		<br /><br />
		<textarea id="elm1" name="elm1" rows="45" cols="80" style="width: 99%" class="tinymce"><?php echo $FileBody; ?></textarea>
		<br />
		</div>
</form>
</body>
</html>