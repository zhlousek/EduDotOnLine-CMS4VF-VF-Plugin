<?php if (!defined('APPLICATION')) exit(); ?>

<h1 style="color:brown; font-weight:bolder;"><?php echo T($this->Data['Title']); ?></h1>
<?php
   // echo $this->Form->Open();
   // echo $this->Form->Errors();
   
$functions_file = PATH_PLUGINS . DS . 'CMS' . DS . 'CMS_fn' . '.php';
require $functions_file;
?>

<!-- <h2 style="color:brown;"> Content Management System  </h2> -->

<div style="width: 800px; position: left: 250px;">

<table>
	<thead>
		<tr>
			<th><span style="color:navy; font-weight:bolder;">Access Routes Controller</span></th>
			<td><a href="<?php ourUrl("dashboard/routes"); ?>"><span style="font-weight:bolder;">Routes Controller</span></a></td>
		</tr>
		<tr>
			<th><span style="color:navy; font-weight:bolder;">File Manager (elFinder)</span></th>
			<td><a href="<?php ourUrl("plugins/CMS/subsys/fb.html"); ?>" target="_blank"><span style="font-weight:bolder;">Open Image (Media) File Manager</span></a></td>
		</tr>
		<tr>
			<th><span style="color:navy; font-weight:bolder;">Create New File</span></th>
			<td><a href="<?php ourUrl("plugins/CMS/subsys/newfileCreate.php"); ?>" target="_blank"><span style="font-weight:bolder;">Open Editor</span></a></td>
		</tr>
	</thead>
</table>


<table> <!-- List of files that we have in a system pages folder of CustomPages plugin -->
<thead>
<tr>
<td colspan="4">&nbsp;&diams;&nbsp;<span style="color:green; font-weight: bold;">Files in the system</span> </td>
</tr>
</thead>
</table>

<?php fileList(); ?>




<?php
     //   echo "<form id=\"form2\" name=\"form2\" method=\"post\" action=\"./delete_file.php\">\n";
     //   echo "<input type=\"submit\" name=\"button3\" id=\"button3\" value=\"Delete\" />\n";
     //   echo "<input name=\"file_name2delete\" type=\"hidden\" value=\"$fileentry\" /></form></td>\n";  
?>


</div>