<?php
include('connection.php');
?>
<?php
if (!isset($_SESSION['login'])) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <h2 class="text-center">Student's DATA</h2><br>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-12 text-center">


                <a href="logout.php" class="btn btn-secondary mb-5">Logout</a>




                <table class="table table-hover">
                    <thead>
                        <tr class="bg bg-primary text-white">
                            <th>Roll No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Mobile No</th>
                            <th>User Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <?php
                    $sn = 1;
                    $stm = $con->query("SELECT * FROM stud_reg ORDER BY Roll_No ASC");
                    while ($data = $stm->fetch()) {
                        $image_name = $data['image_name'];


                        ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $data['Roll_No']; ?>
                                </td>

                                <td>
                                    <?php echo $data['Name']; ?>
                                </td>
                                <td>
                                    <?php echo $data['Email']; ?>
                                </td>
                                <td>
                                    <?php echo $data['Gender']; ?>
                                </td>
                                <td>
                                    <?php echo $data['DOB']; ?>
                                </td>
                                <td>
                                    <?php echo $data['Contact_No']; ?>
                                </td>
                                <td> <img src="Photo/<?php echo $image_name ?>"
                                        style="height:100px; width:100px; border-radius:10%;"
                                        class="shadow bg-body rounded"> </td>
                                <td>
                                    <a href="delete.php?Roll_No=<?php echo $data['Roll_No']; ?>" class="btn btn-danger">
                                        Delete </a>
                                    <a href="update.php?Roll_No=<?php echo $data['Roll_No']; ?>" class="btn btn-success">
                                        Update </a>
                                </td>
                                <!-- <td><input type="Submit" name="delete" value="Delete" class="btn btn-danger"></td> -->
                                <!-- <td><input type="Submit" name="Update" value="Update" class="btn btn-success"></td>  -->
                                <?php
                    }
                    ?>


                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">

                <a href="Register.php" class="btn btn-info mb-3 text-white" style="font-size:19px; width:50%;">Add
                    Data</a>
            </div>
        </div>


    </div>
</body>

</html>