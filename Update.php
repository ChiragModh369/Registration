<?php
include('connection.php');
?>

<?php
if (isset($_GET['Roll_No']))
    $rollno = $_GET['Roll_No'];

$query = $con->query("SELECT * FROM stud_reg WHERE Roll_No='$rollno'");

while ($data = $query->fetch()) {

    $name = $data['Name'];
    $email = $data['Email'];
    $gender = $data['Gender'];
    $dob = $data['DOB'];
    $contact = $data['Contact_No'];
    $current_image = $data['image_name'];

}

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
    <h1 class="text-center">Update Data</h1>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 text-center">
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <label for="rollno" class="form-label input-group-text">Roll No:- &nbsp;
                                    <input type="text" name="rno" placeholder="Enter Your Roll No"
                                        value="<?php echo $rollno; ?>" class="form-control" required>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="username" class="form-label input-group-text">Name:- &nbsp;
                                    <input type="text" name="name" placeholder="Enter Student Name"
                                        value="<?php echo $name; ?>" class="form-control" required>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="email" class="form-label input-group-text">Email:- &nbsp;
                                    <input type="email" name="email" placeholder="Enter Your Email ID"
                                        value="<?php echo $email; ?>" class="form-control" required>
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
                                        <label for="Male" class="form-check-label">
                                            Male
                                        </label>
                                        <input <?php if ($gender == "Male") {
                                            echo "Checked";
                                        } ?> type="radio"
                                        name="gender" value="Male" class="form-check-input m-lg-1" required>

                                        <label for="Female" class="form-check-label">
                                            Female
                                        </label>
                                        <input <?php if ($gender == "Female") {
                                            echo "Checked";
                                        } ?> type="radio"
                                        name="gender" value="Female" class="form-check-input m-lg-1" required>
                                        &nbsp;
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="dob" class="form-label input-group-text">Date of Birth:- &nbsp;
                                    <input type="Date" name="dob" value="<?php echo $dob; ?>" class="form-control"
                                        required>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="mobile_no" class="form-label input-group-text">Contact No:- &nbsp;
                                    <input type="text" name="contact" value="<?php echo $contact; ?>"
                                        class="form-control" maxlength="10" minlength="10" required>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="current_img" class="form-label input-group-text">Current Image:-&nbsp;
                                    <img src="Photo/<?php echo $current_image ?>"
                                        style="height:125px; width:100px; margin:auto">
                                    <input type="hidden" name="current" value="<?php echo $current_image; ?>">

                                </label>

                            </td>
                        </tr>
                        <tr>
                            <td> <label for="Image" class="form-label input-group-text"> Select New Image:- &nbsp;
                                    <input type="file" name="image" id="" class="form-control">
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td><input type="Submit" value="Update" name="Update" class="btn btn-primary form-control">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['Update'])) {
    $rollno = $_POST['rno'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $current = $_POST['current'];
    $contact = $_POST['contact'];
    $image_name = $_FILES['image']['name'];
    if ($image_name == NULL) {
        $image_name = $current;

    } else {

        if (isset($_FILES['image']['name'])) {

            $image_name = $_FILES['image']['name'];
            if (file_exists("Photo/" . $current)) {
                $path = "Photo/" . $current;
                $remove = unlink($path);
            }
            if ($image_name != "") {
                $ext = end(explode('.', $image_name));

                $image_name = "Profile_" . rand(000, 999) . '.' . $ext;
                $src_path = $_FILES['image']['tmp_name'];
                $dest_path = "Photo/" . $image_name;

                $upload = move_uploaded_file($src_path, $dest_path);
            } else {
                echo "Image not Updated";
            }

        }
    }
    $query1 = "UPDATE stud_reg SET  Name = ? , Email = ? , Gender = ? , DOB = ?, Contact_No = ? , image_name = ? WHERE Roll_No = ? ";
    $stm = $con->prepare($query1);
    $stm->execute([$name, $email, $gender, $dob, $contact, $image_name, $rollno]);

    if ($stm) {
        echo "<script>alert('Data Updated Successfully')</script>";
        echo "<script>window.open('StudData.php','_self')</script>";
    } else {
        echo "<script>alert('Failed To Update Data')</script>";
        echo "<script>window.open('StudData.php','_self')</script>";
    }
}

?>