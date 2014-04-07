<html>
<head>
<title>Add a new Author </title>
</head>
<body>

<?

$author=$_REQUEST["Author"];
  
  $menu=$_REQUEST["menu"];
  include ("pmenu.css");
  include ("top.html"); 
  
   if (empty($menu)){
    $menu = "menu.html";
  } // end if

  print "<span class = \"menuPanel\"> \n";
  include ($menu);
  print "</span> \n";
if (empty($author))
	{
	print <<<HERE
	<CENTER><h1>Author Management </h1></CENTER>
	<CENTER><h2>Add a new Author </h2></CENTER>
	<CENTER>
	<form name="addAuthor" method = "post" >
	<table>
	<tr>
		<td> Author:</td>
	<td>
		<input type="text" name="Author" maxlengh =30>
	</td>
	</tr>
		</table>
	<input type="submit" value="Add">
	<input type="reset" value="Clear">
	</form >
	<form action="showAuthors.php">
	<input type="submit" value="Show Authors">
	</form>
	</CENTER>
HERE;
}
	else
	{

	//make the database connection
	$conn  = mysql_connect("dlocalhost", "naderk", "fall2008");
	$select= mysql_select_db("BookStore", $conn);

	//create a query
	$sql = "INSERT INTO Authors(`Author`) values('$author')";
	print $sql;
	$result=mysql_query($sql);
	if($result)
		{
		print "<center>";
		print "<br>$author added successfully.\n";
		$author="";
		print <<<HERE
			<br> <br> if you have more records to add, please click 
			<form name="more" method="post" action="addAuthor.php">
			<input type="submit" value="Add record">
			</form>
		<form name="show" action="showAuthors.php">
		<input type="submit" value="Show all Authors">
		</form >
HERE;
		}
	else
		print "<br>There is a problem with the database.\n";
	}
	
?>

</body>
</html>


