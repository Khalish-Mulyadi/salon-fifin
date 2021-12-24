<?php 
session_start();
include '../koneksi.php';

if ( !isset($_SESSION["login_admin"]) ) {
    header("Location: login.php");
}

$id_admin = $_GET["id_admin"];
$id_review = $_GET["id_review"];
$id = $_GET["id"];

function deleteAdmin($id_admin)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM admin WHERE id_admin = '$id_admin'");

    return mysqli_affected_rows($conn);
}

function deleteReview($id_review)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM review WHERE id_review = '$id_review'");

    return mysqli_affected_rows($conn);
}

function deletePengajar($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pengajar WHERE id = '$id'");

    return mysqli_affected_rows($conn);
}

if (deleteAdmin($id_admin) > 0) {
    echo ("
            <script> 
                alert ('Data successfully deleted');
                document.location.href = 'admin.php';
            </script>
        
        ");
    }
else {
    echo (
    "Error description:" .$conn -> error
    );
}

if (deleteReview($id_review) > 0) {
    echo ("
            <script> 
                alert ('Data successfully deleted');
                document.location.href = 'review.php';
            </script>
        
        ");
    }
else {
    echo (
    "Error description:" .$conn -> error
    );
}

if (deletePengajar($id) > 0) {
    echo ("
            <script> 
                alert ('Data successfully deleted');
                document.location.href = 'pengajar.php';
            </script>
        
        ");
    }
else {
    echo (
    "Error description:" .$conn -> error
    );
}
?>