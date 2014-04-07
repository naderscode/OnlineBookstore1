<html>
<head>
<title>Show Books</title>
</head>
<body>
<h1>Books</h1>
<?
//make the database connection
$conn  = mysql_connect("localhost", "naderk", "fall2008");
mysql_select_db("BookStore", $conn);

//create a query
$sql = "SELECT  Title, Author, Price, BookID
FROM Books";
$result = mysql_query($sql, $conn);

print "<table border = 1>\n";

//get field names
print "<tr>\n";
while ($field = mysql_fetch_field($result)){
  print "  <th>$field->name</th>\n";
} // end while
print "</tr>\n\n";

//get row data as an associative array
while ($row = mysql_fetch_assoc($result)){
  print "<tr><td>";
//echo "<img src=\"Image.php?$row['Image']\" />";
//echo "<img src=\" $row['Image']\"/>".'</td><td>';
 echo $row["Title"].'</td><td>';
 echo $row["Author"].'</td><td>';
 echo $row["Price"].'</td><td>';
 echo '<a href="purchase.php?BookID=' .$row["BookID"].'">Buy</a>';
  print "</td></tr>\n\n";
}// end while

print "</table>\n";
?>
</body>
</html>





