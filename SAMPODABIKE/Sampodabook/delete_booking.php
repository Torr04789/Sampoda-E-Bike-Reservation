<?php
session_start();
include('includes/config.php');

// Check if user is logged in
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit();
}

if (isset($_POST['booking_id'])) {
    $booking_id = intval($_POST['booking_id']);
    $useremail = $_SESSION['login'];

    // Fetch booking status to ensure it's not confirmed
    $sql = "SELECT Status FROM ebikebooking WHERE id = :booking_id AND userEmail = :useremail";
    $query = $dbh->prepare($sql);
    $query->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    // Check if booking exists and is not confirmed (Status == 0)
    if ($query->rowCount() > 0 && $result->Status == 0) {
        // Update the booking status to "Cancelled By User" (Status = 3)
        $sql = "UPDATE ebikebooking SET Status = 3 WHERE id = :booking_id AND userEmail = :useremail";
        $query = $dbh->prepare($sql);
        $query->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->execute();

        // Check if the update was successful
        if ($query->rowCount() > 0) {
            $_SESSION['msg'] = "Booking cancelled successfully.";
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Invalid operation. Booking cannot be cancelled or is already confirmed.";
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

// Redirect back to the booking page
header("Location: my-booking.php");
exit();
?>
