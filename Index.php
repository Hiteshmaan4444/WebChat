<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous"
    />
    <link rel="stylesheet" href="Style.css"/>

	<title>Sign-up Sign-in</title>
    <?php

    include("dbconnection.php");
    $username='';
    if(isset($_POST["signup"]))
    {
    $name=$_REQUEST["name"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    for($i=0;$i<strlen($email);$i++){
        if($email[$i]=='@'){
            break;
        }
        else{
            $username=$username.$email[$i];
        }
    }
    $checkemail="select * from registration where email='$email'";
    $query=mysqli_query($connection,$checkemail);
    
    $emailcount=mysqli_num_rows($query);

    if($emailcount>0)
    {   
       echo'<script>alert("account already exist")</script>';
       header('location:index.php');
    }
    else
    {  
        $_SESSION["name"]=$name;
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$password;
        $_SESSION["username"]=$username;
        
        ?>

        <?php
        $query1="insert into registration values('$name','$email','$password','$username')";

    $checkregistered=mysqli_query($connection,$query1);

    if($checkregistered)
    {
        echo '<script type="text\javascript">alert("Username:'.$username.' Password:'.$password.'")</script>';
         header('location:index.php');
         
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert($username);
        </script>
        <?php

    }
}
}
if(isset($_POST["signin"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $sql="Select * from registration where email='".$email."'AND password='".$password."'; ";
    $query=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($query);
    $emailcount=mysqli_num_rows($query);

    if($emailcount>0)
    {   
        $_SESSION["username"]=$row["username"];
        $val= $_SESSION["username"];
       header('location:Homepage.php?sender='.$val.'');
    }
    else
    {
        echo "<div style='color:red; border:2px red solid;margin-bottom:5px; border-radius:10px; padding:5px 5px;'>Invalid Inputs . Try again !!!</div>";
       
    }
}
    ?>

    </head>
<body>
	<div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="https://touch.facebook.com/?stype=lo&jlou=AfdvBsPDbs-5IOMdltVGZKM8Zy5s5Qq6UTgVqtjnCK9sfGDdjtzRMK65xv31Wj4rddnF9tDA-Dt7Xtc5QJw459J60HyNGAvFyJkgS-GRV_rNXg&smuh=44410&lh=Ac9nCykZW9KmeZltf44&_rdr" class ="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="https://www.linkedin.com/login" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                
                <input type="text" placeholder="Name" name="name" autocomplete="off" required>
                <input type="email" placeholder="Email" name="email" required autocomplete="off">
                <input type="password" placeholder="Password" name="password" required autocomplete="off">
                <input type="submit" value="Sign up" id="button3" name="signup" autocomplete="off"  >
            </form>
        </div>
            <div class="form-container sign-in-container">
                <form action="Index.php" method="post" autocomplete="false">
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="https://touch.facebook.com/?stype=lo&jlou=AfdvBsPDbs-5IOMdltVGZKM8Zy5s5Qq6UTgVqtjnCK9sfGDdjtzRMK65xv31Wj4rddnF9tDA-Dt7Xtc5QJw459J60HyNGAvFyJkgS-GRV_rNXg&smuh=44410&lh=Ac9nCykZW9KmeZltf44&_rdr" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="https://www.linkedin.com/login" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>
                    <div class="ghostwarn1" id="ghostwarn"> *successfully Registered </div>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <a href="#">Forgot your password?</a>
                    <input type="submit" value="Sign In" id="button3" name="signin">
                    </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>
                            To keep connected with us please login with your personal info
                        </p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p> Enter your personel info </p>
                        <button class="ghost" id="signUp">Sign Up</button>
                        
                    </div>
                </div>
            </div>
        </div>  
         <script src="main.js"></script>
</body>
</html>