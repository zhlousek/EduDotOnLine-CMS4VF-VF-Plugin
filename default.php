<?php if (!defined('APPLICATION')) exit();

$PluginInfo['CMS4VF'] = array(
    'Name' => 'CMS4VF',
    'Description' => 'This plugin is used to create custom static pages displayed by Custom Pages Plugin. CustomPages Plugin must be installed',
    'Version' => '0.5',
    'RequiredApplications' => 'Custom Pages Plugin'
    'Author' => "Z. Hlousek",  // the author
    'AuthorEmail' => 'zhlousek@edudotonline.com',
    'AuthorUrl' => 'http://box.edudotonline.com'
);



class CMSPlugin extends Gdn_Plugin {

public function Base_Render_Before($Sender) {
		// Load custom CSS and JS file to page header
		// $Sender->AddCssFile($this->GetResource('design/example.css', FALSE, FALSE));
		// $Sender->AddJsFile($this->GetResource('js/example.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter/scripts/shCore.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shAutoloader.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushAppleScript.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushAS3.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushBash.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushColdFusion.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushCpp.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushCSharp.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushCss.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushDelphi.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushDiff.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushErlang.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushGroovy.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushJava.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushJavaFx.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushJScript.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushPerl.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushPhp.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushPlain.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushPowerShell.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushPython.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushRuby.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushSass.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushScala.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushSql.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushVb.js', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('subsys/syntaxhighlighter//scripts/shBrushXml.js', FALSE, FALSE));
		$Sender->AddCssFile($this->GetResource('subsys/syntaxhighlighter/styles/shCore.css', FALSE, FALSE));
		$Sender->AddCssFile($this->GetResource('subsys/syntaxhighlighter/styles/shThemeDefault.css', FALSE, FALSE));
		$Sender->AddJsFile($this->GetResource('js/syhs.js', FALSE, FALSE));
   }


public function PluginController_CMS_Create($Sender) {
		// Makes control screen? 
      $Sender->Title('CMS Plugin');
      $Sender->AddSideMenu('plugin/CMS');
      $Sender->Form = new Gdn_Form();
      $this->Dispatch($Sender, $Sender->RequestArgs);
   }
    
   public function Controller_Index($Sender) {
      // Prevent non-admins from accessing this page
      $Sender->Permission('Vanilla.Settings.Manage');
      $Sender->SetData('PluginDescription',$this->GetPluginKey('Description'));	
	  $Validation = new Gdn_Validation();
      $ConfigurationModel = new Gdn_ConfigurationModel($Validation);
      $ConfigurationModel->SetField(array(
         'Plugin.CMS.RenderCondition'    => 'all',
         'Plugin.CMS.TrimSize'     => 100
      ));
      
      // Set the model on the form.
      $Sender->Form->SetModel($ConfigurationModel);
   
      // If seeing the form for the first time...
      if ($Sender->Form->AuthenticatedPostBack() === FALSE) {
         // Apply the config settings to the form.
         $Sender->Form->SetData($ConfigurationModel->Data);
		} else {
         $ConfigurationModel->Validation->ApplyRule('Plugin.CMS.RenderCondition', 'Required');

         $ConfigurationModel->Validation->ApplyRule('Plugin.CMS.TrimSize', 'Required');
         $ConfigurationModel->Validation->ApplyRule('Plugin.CMS.TrimSize', 'Integer');
         
        // $Saved = $Sender->Form->Save();
        // if ($Saved) {
        //    $Sender->StatusMessage = T("Your changes have been saved.");
        // }
      }
      
      // GetView() looks for files inside plugins/PluginFolderName/views/ and returns their full path. Useful!
      $Sender->Render($this->GetView('cms.php'));
   }
   
    // creates side menu link on the dashboard   
   public function Base_GetAppSettingsMenuItems_Handler($Sender) {
      $Menu = &$Sender->EventArguments['SideMenu'];
      $Menu->AddLink('CMS', 'CMS', 'plugin/CMS', 'Garden.AdminUser.Only');
   }
   	
	public function Setup(){}
}



