<html>
    <head>
        <title>www.user_info</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="form_style.css">
    </head>
    <body>
        <div class="user_area">
            <div class="banner-area">

            </div>
            <div class="user-form">
                <h2>User Information Table From</h2>
                <form action="" method="post">
                    <table class="user-tb">

                        <tr>
                            <td>User Name:</td><td><input type="text" name="user_name" placeholder="User name"></td> 
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" placeholder="password"></td>
                        </tr>
                         <tr>
                            <td>Password:</td>
                            <td><input type="text" name="f_name" placeholder="fname"></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="text" name="l_name" placeholder="password"></td>
                        </tr>
                        <tr>
                            <td></td><td><input type="submit" name="submit" value="Login"></td>
                        </tr>
                    </table>
                </form>

                <?php
                include 'db_config.php';
                if (isset($_POST['submit'])) {
                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];
                    $first_name  = $_POST['f_name'];
                    $last_name  = $_POST['l_name'];
                    if (empty($user_name) or empty($password)) {
                        echo 'Please fillup text bar';
                    } else {
                        $select = mysql_query("SELECT * FROM user_info WHERE user_name='$user_name' && password='$password'");
                        $number = mysql_num_rows($select);
                        if ($number > 0) {
                            echo'This information alrady Exit';
                        } else {
                            $insert = mysql_query("INSERT INTO user_info(user_id,user_name,password) VALUES ('','$user_name','$password')");
                            if ($insert) {
                                $select_user = mysql_query("SELECT * FROM user_info ORDER BY user_id DESC");
                                $fetch_user = mysql_fetch_array($select_user);
                                $user_id = $fetch_user['user_id'];
                                $profile_type = 'user';
                                
                                $insert_profile = mysql_query("
                                        INSERT INTO profile (last_name,profile_person,profile_type)
                                        VALUES('$first_name','$last_name','$user_id','$profile_type')");
                                
                                
                                echo 'Welcom you';
                            } else {
                                echo 'Not Welcome';
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>

    </body>
</html>