<?php
include 'top_index.php';
?>
<div class="profile-form">
    <h2>User Information Table From</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="user-tb">
            <tr>
                <td>First Name: </td><td><input type="text" name="f_name" placeholder="First Name"</td>
            </tr>
            <tr>
                <td>Password:</td><td><input type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td>Email :</td><td><input type="email" name="email" placeholder="Enter- your email"></td>
            </tr>
            <tr>
                <td>Phone:</td> <td><input type="text" name="phone" phaceholder="Enter-your phone"></td>
            </tr>

            <tr>
                <td>Date of birth:</td>
                <td>
                    <select value="year" name="year">
                        <option>Year</option>
                        <option>1990</option>
                        <option>1991</option>
                        <option>1992</option>
                        <option>1993</option>
                        <option>1994</option>
                        <option>1995</option>
                        <option>1996</option>
                        <option>1997</option>
                        <option>1998</option>
                        <option>1999</option>
                        <option>2001</option>
                        <option>2002</option>
                        <option>2003</option>
                        <option>2004</option>
                        <option>2005</option>
                        <option>2006</option>
                        <option>2007</option>
                        <option>2008</option>
                        <option>2009</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                    </select>
                    <select value="month" name="month">
                        <option>Month</option>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                    <select value="Day" name="date">
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Address:</td><td><textarea name="address"></textarea></td>
            </tr>
            <tr>
                <td>Photo:</td> <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td></td> <td><input type="submit" name="submit" value="Submit"></td>
            </tr>


        </table>
    </form>


    <div class="add-category-show-output">
        <h2>Add Profile Output</h2>
        <table class="category-show-tb">
            <tr>
                <td>Profile Id</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Password</td>
                <td>Date of birth</td>
                <td>address</td>
                <td>Image</td>

            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM profile");
            while ($fetch_category = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_category['profile_id']; ?></td>
                    <td><?php echo $fetch_category['first_name']; ?></td>
                    <td><?php echo $fetch_category['email']; ?></td>
                    <td><?php echo $fetch_category['phone']; ?></td>
                    <td><?php echo $fetch_category['password']; ?></td>
                    <td><?php echo $fetch_category['date_of_birth']; ?></td>
                    <td><?php echo $fetch_category['address']; ?></td>
                </tr>
            <?php } ?>
        </table>


    </div>

    <?php
    include 'db_config.php';
    if (isset($_POST['submit'])) {
        $user_name = $_POST['f_name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['date'];
        $date_of_birth = $year . '/' . $month . '/' . $day;
        $address = $_POST['address'];

//        check image choice 
        if (!$_FILES['image']['error']) {
            $photo_name = $_FILES['image']['name'];
            $dir = "image";
            copy($_FILES['image']['tmp_name'], "$dir/$photo_name");
            $photo = "$dir/$photo_name";
        } else {
            $photo = 'image/default.png';
        }
        $type = 'user';

        /*
         * check input filed empty 
         */
        if (empty($user_name) or empty($password) or empty($email) or empty($phone) or empty($address)) {
            echo 'Please fillup text';
        } else {

            /*
             * check this user exist or not
             */
            $select = mysql_query("SELECT * FROM profile WHERE first_name='$user_name' && phone='$phone' && email='$email'");
            $number = mysql_num_rows($select);
            if ($number > 0) {
                echo"This recorde allready Exit";
            } else {

                /*
                 * insert user Information
                 */
                $insert = mysql_query("INSERT INTO user_info (user_name,password) VALUES ('$email','$password')");

                if ($insert) {

                    /*
                     * Select user Id 
                     * for use other table
                     */
                    $select_user_id = mysql_query("SELECT * FROM user_info ORDER BY user_id DESC");
                    $fetch_user_id = mysql_fetch_array($select_user_id);
                    $user_id = $fetch_user_id['user_id'];

                    /*
                     * Insert profile image
                     * there role id mean's user id
                     */
                    mysql_query("INSERT INTO image (image_type,role_id,image) VALUES('$type','$user_id','$photo')");

                    /*
                     * Select  image id
                     */
                    $select_image = mysql_query("SELECT * FROM image ORDER BY image_id DESC");
                    $fetch_image_id = mysql_fetch_array($select_image);
                    $image_id = $fetch_image_id['image_id'];

                    /*
                     * Insert user address
                     * there person id mean's user id
                     * there person type mean's user 
                     */
                    mysql_query("INSERT INTO address (profile_id,address,person_type) VALUES('$user_id','$address','$type')");

                    /*
                     * Select  address id
                     */
                    $select_address = mysql_query("SELECT * FROM address ORDER BY add_id DESC");
                    $fetch_address_id = mysql_fetch_array($select_address);
                    $address_id = $fetch_address_id['add_id'];

                    /*
                     * insert user profile
                     * there profile_person mean's user id
                     */
                    mysql_query("INSERT INTO profile(first_name,email,phone,date_of_birth,profile_person,address,image) VALUES
                    ('$user_name','$email','$phone','$date_of_birth','$user_id','$address_id','$image_id')");


                    echo'Information Inserting successfull';
                } else {
                    echo'Information Not Inserting';
                }
            }
        }
    }
    ?>



</div>
</div>

</body>
</html>

