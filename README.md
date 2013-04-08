# LocalFonts #

A script to download fonts from a Google Web Fonts URL, alter the CSS file and provide you with a ZIP of the resulting files.

## Note ##

**This is just a placeholder for an idea right now - I have no idea when/if I'll start working on this.**

## About ##

Worried that using Google Web Fonts is impacting your site's performance, but still want to use their offerings in place of standard fonts?

Give this script the GWF URL (see code section below) and it'll provide you with the original Web Fonts CSS file, the fonts that file points to and a modified CSS file using the local files - all as a handy ZIP for redistributing.

**Google WebFonts URL**

```
// Google will give you the following HTML code:
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>

// take the 'href' attribute URL for use with this script:
http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600
```

## Usage ##

**This is how I envision interacting with the script, could (probably will) change once I actually start making it**

```php
include '/path/to/script/localfonts.php';
// constructor takes optional string parameter of a path to download to
$_LF = new LocalFonts();

$url = "http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600";
$_LF->addURL($url);

$urls = array(
  "http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600",
  "http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,300italic,400italic,500italic,700italic"
);
$_LF->addURL($urls);

/*
$_LF->download() parameters:
  * zip   - ZIPs files, returns the ZIP through file_get_contents() and then deletes the ZIP
  * url   - ZIPs files, returns URL to temporary ZIP file
  * local - if a path was given to constructor, downloads files and returns an array of URLs to the generated CSS files
          - if no path given to constructor, defaults to behaviour or 'url'
default behaviour is 'zip'
*/
$_LF->download("zip");
```

## License ##

As usual with my work, this project is available under the BSD 3-Clause license. In short, you can do whatever you want with this code as long as:

* I am always recognised as the original author.
* I am not used to advertise any derivative works without prior permission.
* You include a copy of said license and attribution with any and all redistributions of this code, including derivative works.

For more details, read the included [LICENSE.md](LICENSE.md) file or read about it on [opensource.org](http://opensource.org/licenses/BSD-3-Clause).
