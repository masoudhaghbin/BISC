<?php
include("config.php");
$flag="";
session_start();
connect();
if(isset($_POST['Logout'])) {

session_destroy();
header("location:home.php")  ;

}

if (isset($_POST["login"]))  {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $result = mysql_query("select password from users where Username = '$username' ") or die(mysql_error());
        if (mysql_num_rows($result)!=1){
            $flag='The User Name And/Or Password is incorrect!Please try again...';

	    }

        else if(mysql_result($result,0)==$password){
		    $_SESSION['username']=$username;
	    }

        else {
         $flag='The User Name And/Or Password is incorrect!Please try again... ';}

}

if (isset($_SESSION['username'])){

    $username =  $_SESSION['username'];
    $result = mysql_query("select * from users where Username='$username' ") or die(mysql_error());
    $first_name = mysql_result($result,0,3) or die(mysql_error());
    $last_name = mysql_result($result,0,4) or die(mysql_error());
    $email   =  mysql_result($result,0,2) or die(mysql_error());

    }

if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["password"])  )

{
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'] ;
     $e_mail =  $_POST['email']    ;
     $user_name = $_POST['username']  ;
     $passwd = $_POST['password']    ;
     mysql_query("INSERT INTO user VALUES ('$user_name','$e_mail',,'$passwd','$first_name','$last_name')  ") or die(mysql_error()) ;


     if (mysql_affected_rows()){
             $_SESSION['username']=$user_name;
     }
     else {
       die("your insert information don't Successful")     ;
     }




}


?>




<html lang="fa" dir="rtl">
	<head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Rotating Words with CSS Animations</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Rotating Words with CSS Animations" />
        <meta name="keywords" content="css3, animations, rotating words, sentence, typography" />
        <meta name="author" content="Codrops" />
		<link href='http://fonts.googleapis.com/css?family=Bree+Serif|Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="rotate.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="jquery_popup.js"></script>
		<style>
			.no-cssanimations .rw-wrapper .rw-sentence span:first-child{
				opacity: 1;
			}
		</style>
	</head>

	<body>
		
		<section class="rw-wrapper">
			<h2 class="rw-sentence">
				<span>شما در این جا</span>
				<br />
				<span>می تونید</span>
				<div class="rw-words rw-words-1">
					<span>کتاب معرفی کنید...</span>
					<span>درباره کتاب های موجود نظر بدید...</span>
					<span>به کتاب ها نمره بدید...</span>
					<span>و...</span>
				</div>
				<br />
			</h2>
		</section>
			
			

		<div class="bmenu">
			<h2  style="margin-top:0px;"><font color="#e3e3e3">دسته بندی کتاب ها</font></h2>
			<ul>
				<li><a href="#">تاریخی</a></li>
				<li><a href="#">رمان</a></li>
				<li><a href="#">فلسفی</a></li>
				<li><a href="#">مذهبی</a></li>
				<li><a href="#">علمی</a></li>
				<li><a href="#">هنری</a></li>
				<li><a href="#">جغرافیا</a></li>
				<li><a href="#">سیاسی</a></li>
				<li><a href="#">اقتصاد</a></li>
				<li><a href="#">ادبیات</a></li>
				<li><a href="#">فرهنگی</a></li>
				<li><a href="#">آشپزی</a></li>
				<li><a href="#">پزشکی</a></li>
				<li><a href="#">صنعت</a></li>
    
			</ul>
		</div>

         <?php
         if (!isset($_SESSION['username'])) {
         print("
		<div class='signinpart'>
			<form method='POST' action=''>
				<ul>
					<li><input type='text' name='user' placeholder='نام کاربری' ></li>
					<li><input type='password' name='pass' placeholder='رمز عبور ' ></li>
					<li><input type='submit' name='login' value= 'ورود' ></li>
				</ul>
			</form>
			<a href='#' id='onclick'>هنوز ثبت نام نکرده اید؟</a>
		<br>
        <h4><font color='red'>$flag</font></h4>
		</div> ");
        }
        else{

        print("<div class='signinpart'>	<h2  style='margin-left:0px'><font color='#e3e3e3'> $first_name &emsp; $last_name</font></h2> </div>");
        print("<div class='signinpart'><form method='post' action=''><input name='Logout' type='submit' value='خروج' /></form></div>");

        }
		      ?>
		
		<div id="contactdiv">
            <form class="form" method="post" action="" id="contact">
                <img src="button_cancel.png" class="img" id="cancel"/>
                <h3>فرم ثبت نام</h3>
                <hr/><br/>
                <label>نام: <span>*</span></label>
                <br/>
                <input type="text" id="firstname" placeholder="first name"/><br/>
                <br/>
                <label>نام خانوادگی: <span>*</span></label>
                <br/>
                <input type="text" id="lastname" placeholder="last name"/><br/>
                <br/>
                <label>نام کاربری: <span>*</span></label>
                <br/>
                <input type="text" id="username" placeholder="user name"/><br/>
                <br/>
                <label>ایمیل:<span>*</span></label>
                <br/>
				<input type="text" id="email" placeholder="email"/><br/>
                <br/>
                <label>رمز عبور:<span>*</span></label>
                <br/>
				<input type="password" id="password" placeholder="password"/><br/>
                <br/>
				<label>تکرار رمز عبور:<span>*</span></label>
                <br/>				
				<input type="password" id="confirmpassword" placeholder="confirm password"/><br/>
                <br/>
                <input type="submit" id="send" value="ارسال"/>
                <input type="submit" id="cancel" value="انصراف"/>
                <br/>
            </form>
        </div>

	</body>
</html>
