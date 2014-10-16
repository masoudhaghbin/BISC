<?php
        include("config.php");
        session_start();
        if (!isset($_SESSION['username'])){
            header("location:home.php"); ;

        }
        $flag="";
        $username =  $_SESSION['username'];
        connect();
        $result = mysql_query("select * from users where username='$username' ") or die(mysql_error());
        $first_name = mysql_result($result,0,3) or die(mysql_error());
        $last_name = mysql_result($result,0,4) or die(mysql_error());
        $email   =  mysql_result($result,0,2) or die(mysql_error());

        if(isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['year']) && isset($_POST['writer'])){
            $username =  $_SESSION['username'];    
            $name =  $_POST['name'];
            $Writer=$_POST['writer']   ;
            $year =   $_POST['year']  ;
            mysql_query("INSERT INTO book VALUES ('$name','$Writer','$year')  ") or die(mysql_error());
            mysql_query("INSERT INTO userbook VALUES ('$username','$name',10)  ") or die(mysql_error());
            if (mysql_affected_rows()){
            $flag="your post Successful save ." ;

        }
        else{
              $flag="your post not Successful save .";
        }

        }




?>

<html>

<head>
  <title>Hello!</title>
</head>

<body>


<img src ="profile-150x150.png" height="100" width="80" />

<div style=" border-style: solid; border-color:black; border-width:2px; height:500px; width:200px;">
    latest books you introduced
     <ol>
    <?php
         $result=mysql_query("select BookName from userbook where username='$username'")   or die(mysql_error());
         for ($i=0;$i!=mysql_num_rows($result);$i++){
           $book=mysql_result($result,$i);
           print("<li>$book</li>");

    }
    ?>
     </ol>
</div>

<form action="" style="right:0; margin-top:-600px; position: absolute; ">
    <input type="text" placeholder="search" />
    <input type="submit" value="search" />
</form>
<?php

$result=mysql_query("select count(BookName) from userbook where username='$username'")   or die(mysql_error());
$num=mysql_result($result,0)    ;

print ("<div style=' border-style: solid; border-color:black; border-width:2px; height:500px; width:200px; float:right; margin-top:-500px;'>
    about you   <br>
    Name : $first_name  <br>
    Username : $username  <br>
    number of books you introdused : $num  <br> </div>");
  ?>

<div>
<form action="" method="post"style="margin-left:500px; margin-top:-150px; position: absolute; ">
<<<<<<< HEAD
    <legend> introducing new book ... </legend>     <br>
=======
    introducing new book ...      <br>
>>>>>>> origin/master
    <input type="text" name="name" placeholder="Book name" /> <br>
    <input type="text" name="writer" placeholder="writer name" /> <br>
    <input type="text" name="year" placeholder="publish year" /> <br>
    <textarea placeholder="your opinion ...">
    </textarea>
    <input name="submit" type="submit" value="post" />
</form>
<?php
print("<h3>$flag</h3>") ;
?>
</div>









</body>
</html>
