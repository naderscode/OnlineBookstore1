<?php
//session_start();

//make the database connection
$conn  = mysql_connect("localhost", "naderk", "fall2008");
mysql_select_db("BookStore", $conn);

$bookid=$_GET["BookID"];
//userid hard coded for an demo purposes, could be a result of a login form
$userid='NADERK';
$sql ="INSERT INTO purchases VALUES(NULL,'$userid','$bookid',NULL)";
$result = mysql_query($sql, $conn);

?>
<html>
<head>
<title>Thank You for your Purchase </title>
<meta http-equiv="refresh" content="4; url=showBookList.php">
</head>
<body>
<h1>Thanks for your Purchase</h1>
<?php
$query="SELECT user_id, Title,Author,Price FROM  purchases , Books, Authors WHERE 
Authors.AuthorID=Books.AuthorID AND
purchases.BookID=Books.BookID
AND purchases.BookID='$bookid'";
$result= mysql_query($query, $conn);

print "<table border = 1>\n";
//get field names
print "<tr>\n";
while ($field = mysql_fetch_field($result)){
  print "  <th>$field->name</th>\n";
} // end while
print "</tr>\n\n";

//get row data as an associative array
while ($row = mysql_fetch_assoc($result)){
  print "<tr>\n";

 // look at each field
  foreach ($row as $col=>$val){
  print "  <td>$val</td>\n";
  }//  end foreach
  print "</tr>\n\n";
}//end while

print "</table>\n\n";
// echo '<a href="purchase.php?BookID=' .$row["BookID"].'">Buy</a>';print "Your total is";
//print "<p> $row["Price"]</p>\n\n";
print '<a href="checkout.php">Checkout</a>';


?>





</body>
</html>
 