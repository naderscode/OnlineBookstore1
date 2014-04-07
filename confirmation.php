<html>
<head>
<title>Order Confirmation</title>
</head>
<body>
<h1>Order Confirmation</h1>
<?

$orderid=$_GET["id"];

$oname=$_REQUEST["order_name"];
$oaddress=$_REQUEST["order_address"];
$ocity=$_REQUEST["order_city"];
$ostate=$_REQUEST["order_state"];
$ozip=$_REQUEST["order_zip"];
$otel=$_REQUEST["order_tel"];


//make the database connection
$conn  = mysql_connect("localhost", "naderk", "fall2008");
mysql_select_db("BookStore", $conn);

//create a query
$sql = "SELECT * FROM store_orders WHERE store_orders.id=$orderid";
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
  print "<tr>\n";
  //look at each field
  foreach ($row as $col=>$val){
    print "  <td>$val</td>\n";
  } // end foreach
  print "</tr>\n\n";
}// end while

print "</table>\n";

print " <p><h3> Thank you $oname</h3>\n\n";
print " <p>Your Order Number is: $orderid \n";
print " <p>Your order will be shipped promptly to: \n";
print " <p>$oaddress \n";
print " <p>$ocity  $ostate   $ozip\n";
?>
</body>
</html>





