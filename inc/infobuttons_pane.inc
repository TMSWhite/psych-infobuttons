<?php

// start session
@session_start();

// split query string into variables and values. e.g. if URL is myscript.php?a=1&b=2 make new variables $a = 1 and $b = 2
extract($_GET);

// function definition for name2id() and get_mtime()
require_once("funcs.inc");

// get user's ip address from environment variable $REMOTE_ADDR - this variables is set by the CGI environment
$ip = getenv('REMOTE_ADDR');

// database connection code
require_once("conn.php");

// get drug ID number from drug parameter
$infomed = name2id($drug);
//$drugname = $drugname;
$drug = $drugname;

// construct URL to infobuttons server using drug ID
$redirect_url = "http://infobuttons.dbmi.columbia.edu/infobuttons/cgi-bin/wc_infomanage.cgi?info_institute=NYOMH&info_context=InPatientDrugs";
// trying to get Columbia Server connection time
$redirect_time =  microtime(); //save the current timestamp
$columbia_reply = 'Y';

$errlog = fopen("/tmp/time.log", "a");
fwrite($errlog, "timestamp before hitting columbia:$redirect_time\n\n");


//&info_med=$infomed^^MED"; this query string is the first one checked for drug name
if(isset($_GET['drug']))
	$redirect_url .= "&info_med=$infomed^^MED";

//if(isset($_GET['drugname']))
//	$redirect_url .= "&query=$query";

//else
//	$redirect_url .= "" . $_GET[''];

// this checks for facil_id and report_id to be used or not in the query string
if(isset($_GET['facil']) && !isset($_GET['report_id']))
	$redirect_url .= "&report_id=" . $_GET['facil'] . "^^" . $_GET['rtype']; 

// here it checks for both facil and rtype to display its URL in its GET string
elseif(isset($_GET['report_id']) && !isset($_GET['facil']))
	$redirect_url .= "&report_id=" . $_GET['report_id'] . "^^" . $_GET['rtype']; 
elseif(isset($_GET['report_id']) && isset($_GET['facil']))
	$redirect_url .= "&report_id=" . $_GET['facil'] . "^^" . $_GET['rtype']; 


// if you need to pass other values from the incoming URL, add the
// value to this array. for example, to pass on a param called "joe"
// change the $optional_params array to 
// $optional_params = array("dx", "uid", "pid", "joe");

$optional_params = array("dx", "uid", "pid");

foreach($optional_params as $op){
	if(isset($_GET[$op]))
		$redirect_url .= '&' . $op . '=' . $_GET[$op];
}

// Uncomment this line to display link to Columbia w/o connecting to the DB.
//die($redirect_url);


// test to see if the remote server is up
$test_handle = fopen("http://infobuttons.dbmi.columbia.edu/infobuttons/info_i.jpg", "rb");




$server_answers = microtime(); // timestamp for when the server has answered. 


$processing_time = get_mtime($server_answers) - get_mtime($redirect_time);



fwrite($errlog, "timestamp after hitting columbia:$server_answers\n\n");


fwrite($errlog, "processing time: $processing_time\n\n");





$test_data = fread($test_handle, 1000 );

if(strlen($test_data) < 50) {
	header("Location: serverdown.php");
	$query = "insert into sessions (ip, access_time, session_key, request_uri, redirect_url, processing_time, columbia_reply) values('$ip', sysdate(), '" . session_id() . "','" . getenv("QUERY_STRING") . "','$redirect_url', $processing_time, 'N')";

	// run query
	mysql_query($query) or die(mysql_error());

	exit(0);
}
fclose($test_handle);


// build query to insert this hit into the sessions table
$query = "insert into sessions (ip, access_time, session_key, request_uri, redirect_url, processing_time, columbia_reply) values('$ip', sysdate(), '" . session_id() . "','" . getenv("QUERY_STRING") . "','$redirect_url', $processing_time, '$columbia_reply')";

// run query
mysql_query($query) or die(mysql_error());




// send client to new url UNCOMMENT THESE 2 LINES TO SEND USERS TO COLUMBIA SERVER ->
//header("Location: $redirect_url");
//exit(0);


// uncomment the code below if you want to have the web server directly connect 
// and display log message.


// comment out the rest of the script to test without connecting to the server. 

// open remote URL read-only over http
$response = fopen($redirect_url, "r");
	
// buffer to hold content from remote server
$contents = "";


// read from the remote server until all bytes downloaded
do { 
   // read 8K into a temp  buffer
   $data = fread($response, 8192); 
   // done if temp buffer is empty
   if (strlen($data) == 0) { 
       break; 
   } 
   // add temp buffer to result buffer
   $contents .= $data; 
} while(true); 

// close connection to remote server
fclose($response);

/*************************

FIXING JAVASCRIPT

to fix the javascript on the new page, 
search and replace on the $contents variable. Example:

$contents = preg_replace("/gotoURL('\//", "gotoURL('http:\/\/infobuttons.dbmi.columbia.edu", $contents);


**************************/

// example of a search and replace from php
//$contents = preg_replace("/gotoURL('\//", "gotoURL('http:\/\/infobuttons.dbmi.columbia.edu", $contents);
print $drugname;

$contents = preg_replace("/<html>/","", $contents);
$contents = preg_replace("/<\/html>/","", $contents);
$contents = preg_replace("/<head>/","", $contents);
$contents = preg_replace("/<\/head>/","", $contents);

$contents = preg_replace("/<body>/","", $contents);
$contents = preg_replace("/<\/body>/","", $contents);

$contents = preg_replace("/\/webcisimgs/","http://infobuttons.dbmi.columbia.edu/infobuttons",$contents);
$contents = preg_replace("/\micromedex_omh/","http://infobuttons.dbmi.columbia.edu/infobuttons/cgi-bin/micromedex_omh",$contents);
//die($redirect_url);
print $contents;


//fflush(); // flush the output buffer

?>
