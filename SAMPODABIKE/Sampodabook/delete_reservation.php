<?php
session_start();
include('includes/config.php');

// Check if user is logged in
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit();
}

if (isset($_POST['reservation_id'])) {
    $reservation_id = intval($_POST['reservation_id']);
    $useremail = $_SESSION['login'];

    // Fetch reservation status to ensure it's not confirmed
    $sql = "SELECT Status FROM ebikereservation WHERE id = :reservation_id AND userEmail = :useremail";
    $query = $dbh->prepare($sql);
    $query->bindParam(':reservation_id', $reservation_id, PDO::PARAM_INT);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    // Check if reservation exists and is not confirmed (Status == 0)
    if ($query->rowCount() > 0 && $result->Status == 0) {
        // Update the reservation status to "Cancelled By User" (Status = 3)
        $sql = "UPDATE ebikereservation SET Status = 3 WHERE id = :reservation_id AND userEmail = :useremail";
        $query = $dbh->prepare($sql);
        $query->bindParam(':reservation_id', $reservation_id, PDO::PARAM_INT);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->execute();

        // Check if the update was successful
        if ($query->rowCount() > 0) {
            $_SESSION['msg'] = "Reservation cancelled successfully.";
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Invalid operation. Reservation cannot be cancelled or is already confirmed.";
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

// Redirect back to the reservation page
header("Location: my-reservation.php");
exit();
?>
