<?php
	class mySession
	{
		private $dbLink;

		public function open()
		{
			if(!($this->dbLink =
				mysql_connect("localhost", "httpd", "")))
			{
				return(FALSE);
			}

			//select database, then test for failure
			if(!($dbResult =
				mysql_query("USE test", $this->dbLink)))
			{
				return(FALSE);
			}

			return(TRUE);
		}

		public function close()
		{
			mysql_close($this->dbLink);
			return(TRUE);
		}

		public function read($id)
		{
			$Query = "SELECT SessionData " .
				"FROM session_track " .
				"WHERE ID = '" . addslashes($id) . "'";
			if(!($dbResult = mysql_query($Query, $this->dbLink)))
			{
				return(FALSE);
			}
			$dbRow = mysql_fetch_assoc($dbResult);

			//mark the session as being accessed
			$Query = "UPDATE session_track " .
				"SET " .
				"LastACtion=NOW() " .
				"WHERE ID='".addslashes($id)."' ";
			if(!($dbResult = mysql_	query($Query, $this->dbLink)))
			{
				return(FALSE);
			}
	
			return($dbRow['SessionData']);
		}

		public function write($id, $data)
		{
			//create the session if it doen't exist
			$Query = "INSERT IGNORE " .
				"INTO session_track (ID) " .
				"VALUES ('".addslashes($id)."')";
			if(!($dbResult = mysql_query($Query, $this->dbLink)))
			{
				return(FALSE);
			}

			//update the session
			$Query = "UPDATE session_track " .
				"SET " .
				"SessionData='".addslashes($data)."', " .
				"LastAction=NOW() " .
				"WHERE ID='".addslashes($id)."' ";
			if(!($dbResult = mysql_query($Query, $this->dbLink)))
			{
				return(FALSE);
			}

			return(TRUE);
		}

		public function destroy($id)
		{
			$Query = "DELETE session_track " .
				"WHERE ID='".addslashes($id)."' ";
			if(!($dbResult = mysql_query($query, $this->dbLink)))
			{
				return(FALSE);
			}

			return(TRUE);
		}
	
		public function garbage($lifetime)
		{
			$Query = "DELETE session_track " .
				"WHERE (LastAction + $lifetime) < NOW() ";
			if(!($dbResult = mysql_query($Query, $this->dbLink)))
			{
				return(FALSE);
			}

			return(TRUE);

		}

	}


	$s = new mySession();

	session_set_save_handler(
		array($s, 'open'),
		array($s, 'close'),
		array($s, 'read'),
		array($s, 'write'),
		array($s, 'destroy'),
		array($s, 'garbage')
		);
	
	//start session
	session_start();

	//Increment counter with each page load
	if(isset($_SESSION['Count']))
	{
		$_SESSION['Count']++;
	}
	else
	{
		//start with count of 1
		$_SESSION['Count'] = 1;
	}

	//connect to database
	if(!($dbLink = mysql_connect("localhost", "httpd", "")))
	{
		print("Couldn't connect to database!<br>\n");
	}

	//select database, then test for failure
	if(!($dbResult = mysql_query("USE test", $dbLink)))
	{
		print("Couldn't use test database!<br>\n");
	}

	//if the user changes the invoice ID, update the column and the session
	if(isset($_REQUEST['invoice']))
	{
		//force invoice to be integer
		$_REQUEST['invoice'] = (integer)$_REQUEST['invoice'];

		if(!($dbResult = mysql_query("USE test", $dbLink)))
		{
			print("Couldn't use test database!<br>\n");
		}

		$INVOICE = $_REQUEST['Invoice'];
	}
?>`
