<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="text-center">Please Register Your Self</h1>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 text-center">
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <label for="rollno" class="form-label input-group-text">Roll No:- &nbsp;
                                    <input type="text" name="rno" placeholder="Enter Your Roll No" class="form-control">
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="username" class="form-label input-group-text">Name:- &nbsp;
                                    <input type="text" name="name" placeholder="Enter Student Name" class="form-control"
                                        required>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="email" class="form-label input-group-text">Email:- &nbsp;
                                    <input type="email" name="email" placeholder="Enter Your Email ID"
                                        class="form-control" required>
                                </label>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group-text  form-check">

                                    <span class="m-lg-1 input-group-lg">
                                        Gender:-
                                    </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="input-group-text bg-white">
                                        <label for="male" class="form-check-label">
                                            Male
                                        </label>
                                        <input type="radio" name="gender" value="Male" class="form-check-input m-lg-1"
                                            required>

                                        <label for="female" class="form-check-label">
                                            Female
                                        </label>
                                        <input type="radio" name="gender" value="Female" class="form-check-input m-lg-1"
                                            required>
                                        &nbsp;
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="dob" class="form-label input-group-text">Date of Birth:- &nbsp;
                                    <input type="Date" name="dob" class="form-control" required>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="mobile_no" class="form-label input-group-text">Contact No:- &nbsp;
                                    <input type="text" name="contact" class="form-control" maxlength="10" minlength="10"
                                        required>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="Image" class="form-label input-group-text"> Select Image:- &nbsp;
                                    <input type="file" name="image" class="form-control" required>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="Password" class="form-label input-group-text"> Password:- &nbsp;
                                    <input type="password" name="pass" class="form-control" required>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td><input type="Submit" value="Register" name="submit"
                                    class="btn btn-primary form-control">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <?php

    if (isset($_POST['submit'])) {
        $rollno = $_POST['rno'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $image_name = $_FILES['image']['name'];
        $password = $_POST['pass'];

        if ($image_name != "") {
            $ext = end(explode('.', $image_name));

            $image_name = "Profile_" . rand(000, 999) . '.' . $ext;
            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "Photo/" . $image_name;

            $upload = move_uploaded_file($source_path, $destination_path);
        }

        try {
            $stm = $con->query("INSERT INTO stud_reg (Roll_No, Name ,Email,Gender,DOB,Contact_No,image_name,Password) VALUES('$rollno','$name','$email','$gender','$dob','$contact','$image_name','$password')");

            //$no = $stm->rowCount();
            echo "<script>alert('Registration Successfull')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } catch (Exception $e) {
            echo "Could not Insert the Data" . $e->getMessage();
        }
    }

    ?>
</body>

</html>