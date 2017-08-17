<?php 
session_start();
$_SESSION['user'];
$logout = $_GET['logout'];
if($logout == 1){
    session_unset($_SESSION['user']);
    session_destroy();
}
?>
<html>
    <head>
        <title>Login Panel</title>
        <style type="text/css">
            body{
                background: rgba(5,0,0,.5);
                background-color: #19198a;
background-color: #163d78;
background-image: url(http://www.transparenttextures.com/patterns/clean-gray-paper.png);
/* This is mostly intended for prototyping; please download the pattern and re-host for production environments. Thank you! */
            }
            .body{
                margin: auto;
                clear:both;
                width:25%;
                height: 25%;
            }
            .login{
                /*                height: 300px;*/
                background: white;
                margin-top:50%;
            }
            .login_box{
                padding: 2% 4%;
            }
            h2{
                background:#0088CC;
                color:#fff;
                padding: 10px;
                font-size: 18px;
                text-align: center;
                font-family: sans-serif;
            }
            input[type=text],input[type=password]{
                width:100%;
                height: 30px;
                padding-left: 10px;

            }
            label{
                color:#444;
                line-height: 30px;
            }
            input[type=submit]{
                float: right;
                margin-top: 10px;
                width: 100px;
                background:-moz-linear-gradient(#f1f1f1,#eee);
                background:-webkit-linear-gradient(#fff,#ddd);
                box-shadow: 0px 2px 3px gray;
                border: 1px solid #eee;
                height: 30px;
                color:#555;
            }
            p{
                color:#666;
            }
            @media only screen and (min-width:150px) and (max-width:600px)
            {
                .body{
                margin: auto;
                clear:both;
                width:100%;
                height: 25%;
            }
            .login{
                /*                height: 300px;*/
                background: white;
                margin-top:30%;
                -moz-border-radius: 10px;
                -o-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
            .login_box{
                padding: 2% 4%;
            }
            }
        </style>
    </head>
    <body class="body">
        <div class="login">
            <h2>Admin Login</h2>
            <div class="login_box">

                <form action="login_page.php" method="post">
                    <label>User Name</label><br>
                    <input type="text" name="user" placeholder="User Name"><br>
                    <label>Password</label><br>
                    <input type="password" name="password" placeholder="Password"><br>
                    <input type="submit" name="submit" value="Login"/><p>Forget Your Password</p>
                </form>

            </div>
        </div>
    </body>
</html>
