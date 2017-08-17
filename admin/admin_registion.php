<?php
include 'top_index.php';
?>
<div class="registion_area">
    <div class="registion_form">
        
            <h2 style="color: #0000ff; float: left; margin-top: 50px; margin-left: 100px;">Admin registration</h2>
            <form action="admin_registration_code.php" method="post">
            <table class="registration-tb">

                <tr>
                    <td>Name:</td><td><input type="text" name="reg_name"></td>
                </tr>
                <tr>
                    <td>Password</td><td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    


    </div>

</div>


<?php
include 'bottom_index.php';
?>