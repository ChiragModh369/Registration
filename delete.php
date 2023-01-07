<?php
include('connection.php');



$stm = $con->query("SELECT * FROM stud_reg");
$data = $stm->fetch();
$roll = $_GET['Roll_No'];
$image_name = $data['image_name'];
if ($image_name != "") {

    $image_name = $data['image_name'];
    $path = "Photo/" . $image_name;
    $remove = unlink($path);

}

$stm1 = $con->query("DELETE FROM stud_reg WHERE Roll_No = '$roll'");

if ($stm1) {
    // header('location:StudData.php');
    echo "<script>alert('Data Deleted Successfully')</script>";
    echo "<script>window.open('StudData.php','_self')</script>";

} else {
    echo "<script>alert('Failed to Delete Data')</script>";
    echo "<script>window.open('StudData.php','_self')</script>";
}

?>




