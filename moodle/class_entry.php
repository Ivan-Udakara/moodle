

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>new class</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/mystyle.css"> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

       

    </head>


    <!-this is body  ->
    <body >

        <div class="container">
            <div style="background-color:#0f0f0f; margin-top:5px; margin-bottom:5px ">
                <nav class="nav nav-tabs nav-justified ">


                    <ul class="nav nav-pills navFont ">
                        <li role="presentation" class="label label-default"><a href="lec_home.php"class="navFont"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                        <li role="presentation" class=" active label label-default"><a href="add_class.php" class="navFont">Class</a></li>
                        <li role="presentation" class="label label-default"><a href="lec_profile.php" class="navFont">Profile</a></li>                        
                        <li role="presentation" class="label label-default"><a href="#"class="navFont">Contacts</a></li>




                    </ul>
            </div>










            <aside>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>Add New Course </h1>
                        <br>
                    </div>
                    <div class="panel-body">
                        <form action="add_class.php">

                            <input type="submit" value="Take New Course">
                        </form>

                        <div>



                            <?PHP
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "moodle";


                            $conn = mysqli_connect($servername, $username, $password, $dbname);

                            if (!$conn) {

                                die("Connection failed:" . mysqli_connect_error());
                            }
                            $sql = "SELECT count(lec_id) FROM class where lec_id='" . $_SESSION["user"] . "'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            mysqli_close($conn);


                            if ($_SERVER["REQUEST_METHOD"] == "POST") {


                                if ($row['count(lec_id)'] < 3) {

                                    $con = new mysqli($servername, $username, $password, $dbname); // connect in to the database
                                    if ($con->connect_error) {
                                        echo 'connecting to database failed';
                                    }

                                    $sql = "INSERT INTO class values('" . $_POST['id'] . "','" . $_POST['time'] . "','" . $_SESSION["user"] . "','" . $_POST['course_id'] . "','" . $_POST['building'] . "','" . $_POST['date'] . "')";

                                    if ($con->query($sql) === TRUE) {
                                        echo 'Class was added successfully in to the system';
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $con->error;
                                    }

                                    $con->close();
                                } else {
                                    echo 'You cannot take more than 3 classes';
                                }
                            }
                            ?>

                        </div>




                    </div>
                </div>
            </aside>


        </div>
    </body>

</html>



