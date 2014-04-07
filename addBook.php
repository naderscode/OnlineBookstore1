<html>
<head>
<title>Add a new Book </title>
</head>
<body>

<?
$bkID=$_REQUEST["BookID"];
$title=$_REQUEST["Title"];
$syn=$_REQUEST["Synopsis"];
$auth=$_REQUEST["Author"];
$pub=$_REQUEST['Pub'];
$p=$_REQUEST["Price"];
$cat=$_REQUEST['Cat'];
$img=$_REQUEST["image"];


if (empty($title))
	{
	$conn  = mysql_connect("localhost", "naderk", "fall2008");
	$select= mysql_select_db("BookStore", $conn);
?>
	<CENTER><h1>Book Management </h1></CENTER>
	<CENTER><h2>Add a new Book </h2></CENTER>
	<form name="addBook" method = "post" action ="http://localhost/OnlineBookstore1/BookZone.php?content=addBook.php">
	<table>
	<tr>
		<td> Title:</td>
	<td>
		<input type="text" name="Title" maxlengh =30>
	</td>
	</tr>
	<tr>
		<td> Author: </td>
	<td>	
		<input type="text" name="Author" maxlength =30>
	</td>
	</tr>
	<tr>
		<td> Synopsis:</td>
	<td>
	<textarea name="Synopsis" maxlengh=100></textarea>
	</td>
	</tr>
	<tr>
	</tr>
		<tr>
		<td> Price:</td>
	<td>
	<input type="text" name="Price" maxlengh=12>
	</td>
	</tr>
		<tr>
		<td> Publisher:</td>
	<td> <select name="Pub" id="Pub">
<option value="blank">--Publisher--</option>
<?	$conn  = mysql_connect("localhost", "naderk", "fall2008");
mysql_select_db("BookStore", $conn); // connects to the database
$sql = "SELECT * from Publishers ORDER BY Publisher";
$res = mysql_query($sql , $conn);
	while ($row = mysql_fetch_assoc($res)){
?>
<option value="<?echo $row['PublisherID'];?>"><?echo $row['Publisher'];?></option>
<?}// end while?>
	</tr>
		<tr>
		<td> Category:</td>
<td> <select name="Cat" id="Cat">
<option value="blank">--Category--</option>
<?	$conn  = mysql_connect("localhost", "naderk", "fall2008");
mysql_select_db("BookStore", $conn); // connects to the database
$sql = "SELECT * from Categories ORDER BY Category";
$res = mysql_query($sql , $conn);
	while ($row = mysql_fetch_assoc($res)){
?>
<option value="<?echo $row['CatID'];?>"><?echo $row['Category'];?></option>
<?}// end while?>
	</td>
	</tr>

		</table>
	<input type="submit" value="Add">
	<input type="reset" value="Clear">
	</form >
	<form action="showBooks.php">
	<input type="submit" value="Show Books">
	</form>
<?
}
	else
	{

	//make the database connection
	$conn  = mysql_connect("localhost", "naderk", "fall2008");
	$select= mysql_select_db("BookStore", $conn);

	//create a query
	$sql = "INSERT INTO Books (`Title`,`Synopsis`, `Author`,`PublisherID`, `Price`, `CatID`, `image`) values('$title','$syn','$auth', $pub,$p,$cat,'$image');";

	print "<center>";
	$result=mysql_query($sql);
	if($result)
		{
		print "<br>$title added successfully.\n";
		$title="";
		print <<<HERE
			<br> <br> If you have more records to add, please click 
			<form name="more" method="post" action="http://localost/OnlineBookstore1/BookZone.php?content=addBook.php">
			<input type="submit" value="Add Book">
			</form>
			<form name="show" action="showBooksJoin.php">
		<input type="submit" value="Show all Books">
		</form >

HERE;
print "</center>";
		}
	else
		print "<center><br>There is a problem with the database and the Data could not be added.\n</center>";
	}
	
?>

</body>
</html>


