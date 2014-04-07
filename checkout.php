<html>
<head>
<title>Process Order</title>
</head>
<body>

<?


$oname=$_REQUEST["orderName"];
$oaddress=$_REQUEST["orderAddress"];
$ocity=$_REQUEST["orderCity"];
$ostate=$_REQUEST["orderState"];
$ozip=$_REQUEST["orderZip"];
$otel=$_REQUEST["orderTel"];

if (empty($oname))
	{
	print <<<HERE
	<CENTER><h1>Join Our Mailing List </h1></CENTER>
	<h2>Enter: </h2>
	<form name="addCustomer" method = "post" action = "checkout.php">
	<table>
	
	<tr>
		<td> Name:</td>
	<td>
	<input type="text" name="orderName" maxlengh=100>
	</td>
	</tr>
		<tr>
		<td> Address:</td>
	<td>
		<input type ="text" name="orderAddress" maxlengh=5> 
	</td>
	</tr>
	<tr>
		<td> City:</td>
	<td>
		<input type="text" name="orderCity" maxlengh =5>
	</td>
	</tr>
	<tr>
		<td> State:</td>
	<td>
	<input type="text" name="orderState" maxlengh=12>
	</td>
	</tr>
		<tr>
		<td> Zip:</td>
	<td>
		<input type="text" name="orderZip" maxlengh =5>
	</td>
	</tr>
	<tr>
		<td> Telephone:</td>
	<td>
	<input type="text" name="orderTel" maxlengh=12>
	</td>
	</tr>
		</table>
	<input type="submit" value="Submit">
	<input type="reset" value="Clear">
	</form >

HERE;
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
	$select= mysql_select_db("BookStore", $conn);

	//create a query
	$sql = "INSERT INTO Customers (`Customer`, `Address`, `City`, `State`,`Zip`,`Phone`)  values('$oname','$oaddress','$ocity','$ostate','$ozip','$otel')";
	
	print "<center>";
	$result=mysql_query($sql);
	if($result)
		{

		
		print "<br>Congratulations $oname, you have successfully Joined our Mailing List!\n";
		$oname="";
		print "<br> <br> Now Search for a Book!";
		?>
			<form name="more" method="post" action="BookZone.php">
			<input type="submit" value="Book Search">
			</form>

<?
		}
	else
		print "<br>There is a problem with the database.\n";
	print "</center>";
	}
	
?>

</body>
</html>


