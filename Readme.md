Vanilla Forums Plugin, Custom Pages is a great system for maintenance
and display of custom created page for the Forum system. However, pages
are created in code by hand.
Also, pages must be uploaded to a specific folder on the server.

CMS4VF adds a WYSIWYG editor and file manager capability to Custom
Pages Plugin.

The editor is TinyMCE with integrated Code Cogs equations editor,
JBImages graphics uploader and SyntaxHighLighter.

To install the plugin, upload files to VF plugins folder and uncompress. 
Two installation steps must be done by hand:
1) Create folder images in uploads folder of VF
2) JBImages, graphics uploader plugin needs to know path to images folder relative to server root.
  - Navigate to TinyMCE plugins folder inside CMS4VF plugin and locate jbImages folder. 
  - jbImages configuration file config.php is well documented. Adjust the path to images folder as appropriate.