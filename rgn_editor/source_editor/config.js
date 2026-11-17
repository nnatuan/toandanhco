/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.extraPlugins = 'fontawesome';
	config.contentsCss = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';
	config.allowedContent = true; 
	
	/*
	config.extraPlugins = 'file-manager';
	
	config.Flmngr = {
		//apiKey: "qLuj8Be3",
		apiKey: "FLMNFLMN",
		urlFileManager: window.location.protocol+ "//"+window.location.host+"/flmngr/flmngr.php",
		urlFiles: window.location.protocol+ "//"+window.location.host+ "/fileman/Uploads/"
	};

	config.toolbar = [
	  // ...your toolbar goes here...
	  ["Flmngr", "Upload", "ImgPen"]
	];
	*/
};
