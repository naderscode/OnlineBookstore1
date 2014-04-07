<?
  
  //an extremely Simple CMS system
  
  $menu=$_REQUEST["menu"];
  $content=$_REQUEST["content"];
  include ("pmenu.css");
  include ("top.html");

 if (empty($menu)){
    $menu = "menu.html";
  } // end if

  if (empty($content)){
    $content = "http://localhost/OnlineBookstore1/prac2.php";
  } // end if


  print "<span class = \"menuPanel\"> \n";
  include ($menu);
  print "</span> \n";

  print "<span class = \"item\"> \n";
  include ($content);
  print "</span> \n";

?>


</body>
</html>
