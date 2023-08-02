<?php

$name_entered= $_POST['name'];
$comment_entered= $_POST['comment'];
$table= echo $_SESSION['title'];

$date= date("m-d-Y");

$user = "root"; 
$password = "t@yOn2x/Gnk,"; 
$host = "localhost"; 
$dbase = "sbm"; 

$connection= mysql_connect ($host, $user, $password);
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
mysql_select_db($dbase, $connection);

$val = mysql_query("select 1 from $table");

if($val !== FALSE)
{
  if ((!empty($name_entered)) && (!empty($comment_entered)))
  {
    mysql_query("INSERT INTO $table (name, date, comments)
    VALUES ('$name_entered', '$date', '$comment_entered')");
  }
  $result= mysql_query( "SELECT * FROM $table ORDER BY ID DESC" ) 
  or die("SELECT Error: ".mysql_error()); 

  while ($row = mysql_fetch_array($result)){ 
    $name_field= $row['name'];
    $date_field= $row['date'];
    $comment_field= $row['comments'];
  
    echo '<div class="card p-3 mx-4">';
    echo '<div class="d-flex justify-content-between align-items-center">';
    echo '<div class="d-flex flex-row align-items-center">';
    echo "($date_field) <br>";
    echo '<span><small class="font-weight-bold text-primary">$name_field</small> <small class="font-weight-bold">$comment_field</small></span>';
    echo "</div></div></div>";
  }
}
else
{
  $createtable= "CREATE TABLE $table
  ( ".
  "ID INT NOT NULL AUTO_INCREMENT, ".
  "name VARCHAR(50) NOT NULL, ".
  "date VARCHAR(50) NOT NULL, ".
  "comments VARCHAR(60000) NOT NULL, ".
  "PRIMARY KEY (ID)
  );
  ";
  
  $create= mysql_query($createtable, $connection);
  
  if ($create)
  {
    if ((!empty($name_entered)) && (!empty($comment_entered)))
    {
      mysql_query("INSERT INTO $table (name, date, comments)
      VALUES ('$name_entered', '$date', '$comment_entered')");
    }
    $result= mysql_query( "SELECT * FROM $table ORDER BY ID DESC" ) 
    or die("SELECT Error: ".mysql_error()); 
  
    while ($row = mysql_fetch_array($result)){ 
      $name_field= $row['name'];
      $date_field= $row['date'];
      $comment_field= $row['comments'];
    
      echo '<div class="card p-3 mx-4">';
      echo '<div class="d-flex justify-content-between align-items-center">';
      echo '<div class="d-flex flex-row align-items-center">';
      echo "($date_field) <br>";
      echo '<span><small class="font-weight-bold text-primary">$name_field</small> <small class="font-weight-bold">$comment_field</small></span>';
      echo "</div></div></div>";
    }
  }//if createtable
}//else
?> 
