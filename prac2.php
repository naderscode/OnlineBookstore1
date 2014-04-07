<html>
<head>
<title>Book Search</title>
</head>
<body>

<?
$searchField=$_REQUEST["sField"];
$Cat=$_REQUEST["Cat"];
$type=$_REQUEST["type"];
$ES=$_REQUEST["ES"];
$LS=$_REQUEST["LS"];

if ($searchField==""&&$type==""&&$Cat=="")
{

print "<h1>Search for a Book</h1>";
print "<center>";
?>
<table border=1>
<form method="post" action="prac2.php">
<tr>
<td>Search By: </td>
<td>  <select name="type" id="type">
<option value="blank">--Search--</option>
<option value="SearchTitle">Title</option>
<option value="SearchAuthor">Author</option>
<option value="SearchPub">Publishers</option>
<option value="SearchAll">All</option>
</select></td>
<td>
<input type="text" name="sField" id="sField">
</td>
<td> 
<select name="Cat" id="Cat">
<option value="blank">--Category--</option>
<?	$conn  = mysql_connect("localhost, "naderk", "fall2008");
mysql_select_db("BookStore", $conn); // connects to the database
$sql = "SELECT * from Categories ORDER BY Category";
$res = mysql_query($sql , $conn);
	while ($row = mysql_fetch_assoc($res)){
?>
<option value="<?echo $row['CatID'];?>"><?echo $row['Category'];?></option>
<?}// end while?>
</select>
	</td>
<td><input type="submit" name = "ES" id="ES" value="Exact Search"></td>
<td><input type="submit" name = "LS" id="LS" value="Loose Search"></td>
</form>
<?
print "</center>";
}
else
{

  $menu=$_REQUEST["menu"];
  include ("amenu.css");
  include ("top.html"); 
  
   if (empty($menu)){
    $menu = "menu.html";
  } // end if

  print "<span class = \"menuPanel\"> \n";
  include ($menu);
  print "</span> \n";

//make the database connection
$conn  = mysql_connect("localhost", "naderk", "fall2008");
mysql_select_db(BookStore, $conn); // connects to the database
if (empty($LS)){
if ($Cat=="blank") {

if ($type=="SearchAuthor") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID and Author = '$searchField'";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchTitle") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Title = '$searchField'";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchPub") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Publisher = '$searchField'";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchAll") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID";
$result = mysql_query($sql, $conn);

} //end if
if ($type=="SearchAll"&&$searchField!="") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND (Title='$searchField' OR Author='$searchField' OR Publisher='$searchField')";
$result = mysql_query($sql, $conn);

} //end if
} //ends cat if

else {

if ($type=="SearchAuthor") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID and Author = '$searchField' AND Categories.CatID=$Cat";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchTitle") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Title = '$searchField' AND Categories.CatID=$Cat";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchPub") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Publisher = '$searchField' AND Categories.CatID=$Cat";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchAll") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Categories.CatID=$Cat";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="blank"&&$Cat!="blank") { //Searches for things in categories

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Categories.CatID=$Cat";
$result = mysql_query($sql, $conn);

} // ends if
} // ends inner else

} //ends IF LS empty

if (empty($ES)){
if ($Cat=="blank") {

if ($type=="SearchAuthor") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID and Author LIKE '%$searchField%'";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchTitle") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Title LIKE '%$searchField%'";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchPub") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Publisher LIKE '%$searchField%'";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchAll") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID";
$result = mysql_query($sql, $conn);

} //end if
if ($type=="SearchAll"&&$searchField!="") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND (Title LIKE '%$searchField%' OR Author LIKE '%$searchField%' OR Publisher LIKE '%$searchField%')";
$result = mysql_query($sql, $conn);

} //end if
} //ends cat if

else {

if ($type=="SearchAuthor") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID and Author LIKE '%$searchField%' AND Categories.CatID=$Cat";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchTitle") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Title LIKE '%$searchField%' AND Categories.CatID=$Cat";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchPub") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Publisher LIKE '%$searchField%' AND Categories.CatID=$Cat";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="SearchAll") {

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Categories.CatID=$Cat";
$result = mysql_query($sql, $conn);

} //end if

if ($type=="blank"&&$Cat!="blank") { //Searches for things in categories

//create a query
$sql = "SELECT Title, Price, Author, Category, Publisher FROM Books, Publishers, Categories WHERE Books.PublisherID=Publishers.PublisherID AND Books.CatID=Categories.CatID AND Categories.CatID=$Cat";
$result = mysql_query($sql, $conn);

} // ends if
} // ends inner else

} //ends If ES Empty

if (empty($result)){
	Print "<h1>Please Enter a Search Topic</h1>";
}
else{
print "<center><table border = 1>\n";

print "<tr>\n";

print "<h1>Books That Match Your Criteria</h1>";
print<<<HERE
	<form method="post" action="BookZone.php">
	<input type="submit" value="New Search">
	</form>
HERE;
while ($field = mysql_fetch_field($result)){
 print "  <th>$field->name</th>\n";
} // end while
print "</tr>\n\n";
//get row data as an associative array
while ($row = mysql_fetch_assoc($result)){
print "<tr>\n";
//look at each field
foreach ($row as $col=>$val){
print "  <td>$val</td>\n";
} // end foreach
print "</tr>\n\n";
}// end while
print "</table>\n";
} //ends else

}//ends outer else

?>


</body>
</html>
