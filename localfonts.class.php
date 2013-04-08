<?php

class LocalFonts{
	private $tempPath = "./temp/"		// set the temporary download path
	private $localPath = false;			// local path for saving downloaded fonts
	private $requestedURLs = false;		// the GWF URLs to the fonts the user wants to download

	public function __construct($_path = false){
		if($_path){
			if(is_string($_path) && is_dir($_path)){
				$this->localPath = $_path;
			} else {
				throw new InvalidArgumentException("'".$_path."' is not a string or is not a valid folder path.");
			}
		}
	}

	// add a URL or a group of URLs to $this->requestedURLs ready for processing
	public function addURL($_url = false){
		$_url = (is_array($_url) ? $_url : (is_string($_url) ? array($_url) : false));
		if(!$_url){ throw new InvalidArgumentException("Please provide a string or an array of strings"); }
		$_temp = array();
		foreach ($_url as $key => $value) {
			if(is_string($value) && strpos($value, "fonts.googleapis.com") !== false){
				array_push($_temp, $value);
			}
		}
		$this->requestedURLs = array_unique($_temp);
	}

	// control which download method to use
	public function download($_output = 'zip'){
		switch ($_output) {
			case 'url':
				
				break;
			case 'local':
				
				break;
			case 'zip':
			default:
				
				break;
		}
	}

	// follows the URLs in $this->requestedURLs, makes temp folders, downloads the CSS files
	private function downloadCSS(){
		
	}

	// parses Web Fonts CSS file to get the font info
	private function parseCSS(){
		
	}

	// downloads individual font files from the Web Fonts server
	private function downloadFonts(){
		
	}

	// writes the new CSS files using the local font files
	private function writeCSS(){
		
	}

	// takes the downloaded files and ZIPs them with the new CSS file
	private function createZIP(){
		
	}

	// move the files from the temp directory to $this->localPath
	private function moveFiles(){
		
	}

	// try to force download of the generated ZIP file
	private function sendZIP(){
		
	}

	// send the URL to the generated ZIP for manual download
	private function sendURL(){
		
	}

	// purge the temp directory, delete a single ZIP or delete by date range
	private function deleteZIP(){
		
	}
}

?>