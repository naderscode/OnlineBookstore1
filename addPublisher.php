<html>
<head>
<title>Add a new Publisher </title>
</head>
<body>

<?


$pub=$_REQUEST["Publisher"];


if (empty($pub))
	{
			
 
  

	print <<<HERE
	<CENTER><h1>Publisher Management </h1></CENTER>
	<CENTER><h2>Add a new Publisher </h2></CENTER>
	<form name="addPublisher" method = "post" action = "http://localhost/OnlineBookstore1/BookZone.php?content=addPublisher.php">
	<table>
		<tr>
		<td> Publisher:</td>
	<td>
		<input type="text" name="Publisher" maxlengh =30>
	</td>
	</tr>
	
		</table>
	<input type="submit" value="Add">
	<input type="reset" value="Clear">
	</form >
	<form action="showPublishers.php">
	<input type="submit" value="Show Publishers">
	</form>
HERE;
}
	else
	{

	//make the database connection
	$conn  = mysql_connect("localhost", "naderk", "fall2008");
	mysql_select_db("BookStore", $conn);

	//create a query
	$sql = "INSERT INTO Publishers (`Publisher`) values ('$pub');";
	
	$result=mysql_query($sql,$conn);
	if($result)
		{
		print "<center>";
		print "<br>$pub added successfully.\n";
		$pub="";
		print <<<HERE
			<br> <br> If you have more records to add, please click 
			<form name="more" method="post" action="http://localhost/OnlineBookstore1/BookZone.php?content=addPublisher.php">
			<input type="submit" value="Add Publisher">
			</form>
		<form name="show" action="showPublishers.php">
		<input type="submit" value="Show all Publishers">
		</form >
		
HERE;
		print "</center>";
		}

	else
		print "<br>There is a problem with the database.\n";
	}
	
?>

</body>
</html>


