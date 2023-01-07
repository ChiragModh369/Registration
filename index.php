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
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <h2 class="text-center">Login</h2>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 text-center">
                <form action="" method="post">
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <label for="UserName" class="form-label input-group-text">Name:- &nbsp;
                                    <input type="text" name="uname" placeholder="Enter Student Username"
                                        class="form-control" required>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Password" class="form-label input-group-text">Password:- &nbsp;
                                    <input type="password" name="password" placeholder="Enter Student Password"
                                        class="form-control" required>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="Submit" name="login" value="Login" class="btn btn-primary">
                            </td>
                        </tr>
                        <tr>
                            <td><a href="Register.php">Click here to Register...</a></td>
                        </tr>

                    </table>
                </form>
            </div>

        </div>

    </div>
</body>

</html>

<?php
try {


    if (isset($_POST['login'])) {


        $username = $_POST['uname'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM stud_reg WHERE Name=? AND Password=? ";
        $query = $con->prepare($sql);
        $query->execute(array($username, $password));
        $row = $query->rowCount();
        // $fetch = $query->fetch();

        if ($row == 1) {

            $_SESSION['login'] = true; // without login do not open Data Page

            echo "<script>alert('Login Successfull')</script>";
            echo "<script>window.open('StudData.php','_self')</script>";
        } else {
            echo "<script>alert('Please enter Correct Email and Password')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }


} catch (Exception $error) {
    $message = $error->getMessage();
}

?>