<?php
session_start();
include '../koneksi.php';

if ( !isset($_SESSION["login_admin"]) ) {
    header("Location: login.php");
}

$id_reservasiApproved = $_GET['id_reservasiApproved'];
$id_reservasiDeclined = $_GET['id_reservasiDeclined'];

function approvedReservasi($id_reservasiApproved)
{
    global $conn;
    mysqli_query($conn, "UPDATE reservasi SET status_reservasi = 'approved' WHERE id_reservasi= '$id_reservasiApproved'");

    return mysqli_affected_rows($conn);
}

function declinedReservasi($id_reservasiDeclined)
{
    global $conn;
    mysqli_query($conn, "UPDATE reservasi SET status_reservasi = 'declined' WHERE id_reservasi= '$id_reservasiDeclined'");

    return mysqli_affected_rows($conn);
}

if ( isset($id_reservasiApproved) ) {
    approvedReservasi($id_reservasiApproved);
    echo ("
            <script> 
                alert ('Reservation Approved');
                document.location.href = 'reservasi.php';
            </script>
        
        ");
}

elseif ( isset($id_reservasiDeclined) ) {
    declinedReservasi($id_reservasiDeclined);
    echo ("
            <script> 
                alert ('Reservation Declined');
                document.location.href = 'reservasi.php';
            </script>
        
        ");
}

else {
    echo (
        "<script> 
            alert ('Error!');
            document.location.href = 'reservasi.php';
        </script>" 
    );
}


?>