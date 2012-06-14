<?php if (!defined('APPLICATION')) exit();

// Functions for the system

	function ourUrl($x){
	  // We live in some folder and our full url is http://host/root-folder-of-forums 
	  // We need to extract the above url
	  $LineUrl1 = Url('', TRUE);
	  $LineUrl = str_replace("plugin/CMS", $x, $LineUrl1);
	  printf ($LineUrl);
	}


   function fileList (){
   		// $Path = PATH_PLUGINS . DS . 'CMS' . DS . 'cms_pages' . DS;
   		// $Page = ArrayValue('0', $Sender->RequestArgs);	
	echo "<table>\n<tr>\n";
	// $Path = PATH_PLUGINS . DS . 'CMS' . DS . 'cms_pages' . DS . 'pages' . DS;
	$Path = PATH_PLUGINS . DS . 'CustomPages' . DS . 'pages' . DS;
	$Line2 = Url('', TRUE);
	$Line3 = str_replace("CMS","page",$Line2 );
	if ($handle = opendir($Path)) {
		while (false !== ($file_name_full = readdir($handle))){
			if ($file_name_full != "." && $file_name_full != ".." && $file_name_full != ".tmb" && $file_name_full != ".quarantine" && $file_name_full != "default.php" && $file_name_full != "deleted_files"){
			$file_name = str_replace(".php", NULL, $file_name_full);
			$view_file_url= "$Line3/$file_name";
			echo "<tr>";
			echo "<td>$file_name</td><td><a href=\"$view_file_url\" target=\"_blank\">View</a></td>";
			echo "<td><a href=\"";ourUrl("plugins/CMS/subsys/newfileCreate.php?fN2Edit=$file_name");echo "\" target=\"_blank\">Edit</a></td>";
			echo "<td><a href=\"";ourUrl("plugins/CMS/subsys/deleteFile.php?fN2Delete=$file_name");echo "\">Delete</a></td>";
			echo "</tr>";
			}
		}
	}
	closedir($handle);
	echo "</table>";	   		
   }
?>

<!-- <form id=\"form1\" name=\"form1\" method=\"post\" action=\"$editorScriptUrl\"><input type=\"submit\" name=\"button2\" id=\"button2\" value=\"Edit\" /><input name=\"file_name\" type=\"hidden\" value=\"$file_name\" /></form> </td>"; -->