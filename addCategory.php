<html>
<head>
<title>Add a new Category </title>
</head>
<body>

<?

$cat=$_REQUEST["Category"];


if (empty($cat))
	{
	print <<<HERE
	<h1>Category Management </h1>
	<center><h2>Add a new Category </h2></center>
	<form name="addCategory" method = "post" action = "http://localhost/OnlineBookstore1/BookZone.php?content=addCategory.php">
	<table>
		<tr>
		<td> Category:</td>
	<td>
		<input type="text" name="Category" maxlengh =30>
	</td>
	</tr>
	
		</table>
	<input type="submit" value="Add">
	<input type="reset" value="Clear">
	</form >
	<form action="showCategories.php">
	<input type="submit" value="Show Categories">
	</form>
HERE;
}
	else
	{
	//make the database connection
	$conn  = mysql_connect("localhost", "naderk", "fall2008");
	$select= mysql_select_db("BookStore", $conn);

	//create a query
	$sql = "INSERT INTO Categories(`Category`) values('$cat')";
	
	$result=mysql_query($sql);
	if($result)
		{
		print "<center>";
		print "<br>$cat added successfully.\n";
		$cat="";
		print <<<HERE
			<br> <br> If you have more records to add, please click 
			<form name="more" method="post" action="http://localhost/OnlineBookstore1/BookZone.php?content=addCategory.php">
			<input type="submit" value="Add Category">
			</form>
		<form name="show" action="showCategories.php">
		<input type="submit" value="Show all Categories">
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


