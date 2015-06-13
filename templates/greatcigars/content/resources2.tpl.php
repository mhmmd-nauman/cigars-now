<table cellspacing="0" width="100%" cellpadding="0">
                <tr>
<!-- body //-->
<!-- body_text //-->
    <tr>
        <td><?php
// # THE FOLLOWING BLOCK IS USED TO RETRIEVE AND DISPLAY LINK INFORMATION.
// # PLACE THIS ENTIRE BLOCK IN THE AREA YOU WANT THE DATA TO BE DISPLAYED.

// # MODIFY THE VARIABLES BELOW:
// # Enter your user key below (provided to you by PowerLinks.com):
$UserKey = "9192824202004-J4ZYY56O5T";

// # The following variable defines how many columns are used to display categories
$CategoryColumns = "2";

// # The following variable defines how many links to display per page
$LinksPerPage = "25";

// # The following variable defines whether links are opened in a new window
// # (1 = Yes, 0 = No)
$OpenInNewWindow = "1";

// # The following variable determines whether the search function is enabled
// # for your links page (1 = Yes, 0 = No)
$AllowSearch = "1";

// # DO NOT MODIFY ANYTHING ELSE BELOW THIS LINE!
// ----------------------------------------------
$ThisPage = $_SERVER["PHP_SELF"];

$PostingString = "UserKey=" .$UserKey . "\r\n";
$PostingString .= "&ScriptName=" .$ThisPage . "\r\n";
$PostingString .= "&CatCols=" .$CategoryColumns . "\r\n";
$PostingString .= "&LinksPerPage=" .$LinksPerPage . "\r\n";
$PostingString .= "&OpenInNewWindow=" .$OpenInNewWindow . "\r\n";
$PostingString .= "&AllowSearch=" .$AllowSearch;

$QueryString = "script=php";
foreach ($_GET as $key => $value) {
	$value = urlencode(stripslashes($value));
	$QueryString .= "&$key=$value";
}

// congfigure our headers
$header = "POST /bin/dumplinks.asp?" . $QueryString . " HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($PostingString) . "\r\n\r\n";

// open a connection to PowerLinks
$fp = fsockopen ('www.powerlinks.com', 80, $errno, $errstr, 30);

if (!$fp) {
	// HTTP ERROR
	echo "Error processing request";
} else {
	// send form headers, form post
	fputs ($fp, $header . $PostingString);
	
	// set our returned header flag to true, these we want to ignore
	// initialize our body variable
	$bHeader = true;
	$sData = "";

	while (!feof($fp)) {
		$res = fgets ($fp, 8192);
		$res = ereg_replace("[\r\n]", "", $res);
		// if we have an empty line, we are now past the headers.
		// set the flag so we can start retrieving data
		if (strlen($res) == 0) $bHeader = false;
		
		if ($bHeader == false) $sData .= $res;
	}
	echo $sData;
	
	fclose ($fp);
}
?>

<br>

		<font face="arial" size="1">

		<br>Want to see your link added here? Send an email to
		<a href="mailto:cigar_links@imageadvantages.com">
		cigar_links@imageadvantages.com</a>. <br>

</font>
		</td>
    </tr>
<!-- body_text_eof //-->
<!-- body_eof //-->
                </tr>
            </table>
<script language="JavaScript" src="http://db9.net-filter.com/script/19938.js">
</script>
<noscript>
<img src="http://db9.net-filter.com/db.php?id=19938&page=unknown">
</noscript>