<html>
<head>
<title>Show Categories</title>
</head>
<body>

<?
 $menu=$_REQUEST["menu"];
  include ("amenu.css");
  include ("top.html"); 
  
   if (empty($menu)){
    $menu = "menu.html";
  } // end if

  print "<span class = \"menuPanel\"> \n";
  include ($menu);
  print "</span> \n";
print "<h1>Categories</h1>";
//make the database connection
$conn  = mysql_connect("localhost", "naderk", "fall2008");
mysql_select_db("BookStore", $conn);

//create a query
$sql = "SELECT * FROM Categories";
$result = mysql_query($sql, $conn);
print "<center>";
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
  //look at each field
  foreach ($row as $col=>$val){
    print "  <td>$val</td>\n";
  } // end foreach
  print "</tr>\n\n";
}// end while

print "</table>\n";
print "</center>";
?>
</body>
</html>





