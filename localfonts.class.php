<?php

/*
 *
 */

/*
 INTERACTION FUNCTIONS
 Interaction Functions are the public functions that users of the class are
 allowed to interact with. If it isn't a public function meant for the user
 to call directly then it shouldn't be in this section.
 
 COMPILATION FUNCTIONS
 Compilation Functions are the functions that perform pre-defined collections
 of tasks. These functions shouldn't do anything beyond simple logic by
 themselves but instead call upon Worker Functions in a certain order to
 accomplish the desired outcome.
 These functions should not be callable by the user.
 
 WORKER FUNCTIONS
 Worker Functions are where you should put complex logic, interactions with
 other classes, calls to external resources and filesystem modification. Worker
 Functions should contain re-usable but task-specific code such as defining
 how to download from a given service.
 These functions should not be callable by the user.
 
 SUPPORT FUNCTIONS
 Support Functions are similar to Worker Functions, but less specific such as
 defining how to process the arrays you make regardless of what is in the array
 or what purpose it serves. Also, where Worker Functions should only be called
 by Compilation Functions - including not calling other Worker Functions - a
 Support Function can be called from anywhere in the class.
 These functions should not be callable by the user.
*/

abstract class LocalFonts_Base{
	protected $tempPath = "./temp/"			// set the temporary download path
	protected $localPath = false;			// local path for saving downloaded fonts
	protected $requestedURLs = false;		// the URLs to the fonts the user wants to download
	protected $downloadFunctions = array();	// the names of the various download functions


	/* INTERACTION FUNCTIONS */

	public function __construct($_path = false){
		if($_path){
			if(is_string($_path) && is_dir($_path)){
				$this->localPath = $_path;
			} else {
				throw new InvalidArgumentException("'".$_path."' is not a string or is not a valid folder path.");
			}
		}
		$this->addDownloadOption(array("zip", "local", "url"));
	}

	// add a URL or a group of URLs to $this->requestedURLs ready for processing
	public function addURL($_url = false){
		$_url = (is_array($_url) ? $_url : (is_string($_url) ? array($_url) : false));
		if(!$_url){ throw new InvalidArgumentException("Please provide a string or an array of strings"); }
		$_temp = array();
		foreach ($_url as $key => $value) {
			if(is_string($value)){
				array_push($this->requestedURLs, $value);
			}
		}
		$_temp = array_unique($_temp);
	}

	// control which download method to use
	final public function download($_output = 'zip'){
		if(in_array($_output, $this->downloadFunctions)){
			return $this->{"download_".$_output}();
		}
		return false;
	}

	// add new download options
	final public function addDownloadOption($_functions = false){
		$_functions = (is_array($_functions) ? $_functions : (is_string($_functions) ? array($_functions) : false));
		if(!$_functions){ throw new InvalidArgumentException("Please provide a string or an array of strings"); }
		foreach ($_functions as $key => $value) {
			if(function_exists($this->{$value})){
				array_push($this->downloadFunctions, $value);
			}
		}
		// $this->downloadFunctions = array_merge($this->downloadFunctions, $_functions);
		$this->downloadFunctions = array_unique($this->downloadFunctions);
	}


	/* COMPILATION FUNCTIONS */

	// make ZIP, read the file to the client, delete the ZIP
	private function download_zip(){
		
	}


	/* WORKER FUNCTIONS */

	// follows the URLs in $this->requestedURLs, makes temp folders, downloads the CSS files
	private function getCSS(){
		
	}

	// parses Web Fonts CSS file to get the font info
	private function parseCSS(){
		
	}

	// downloads individual font files from the Web Fonts server
	private function getFont(){
		
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