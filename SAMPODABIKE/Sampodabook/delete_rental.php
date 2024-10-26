<?php
session_start();
include('includes/config.php');

// Check if user is logged in
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit();
}

if (isset($_POST['rental_id'])) {
    $rental_id = intval($_POST['rental_id']);
    $useremail = $_SESSION['login'];

    // Fetch Rental status to ensure it's not confirmed
    $sql = "SELECT Status FROM ebikerental WHERE id = :rental_id AND userEmail = :useremail";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rental_id', $rental_id, PDO::PARAM_INT);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    // Check if Rental exists and is not confirmed (Status == 0)
    if ($query->rowCount() > 0 && $result->Status == 0) {
        // Update the Rental status to "Cancelled By User" (Status = 3)
        $sql = "UPDATE ebikerental SET Status = 3 WHERE id = :rental_id AND userEmail = :useremail";
        $query = $dbh->prepare($sql);
        $query->bindParam(':rental_id', $rental_id, PDO::PARAM_INT);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->execute();

        // Check if the update was successful
        if ($query->rowCount() > 0) {
            $_SESSION['msg'] = "Rental cancelled successfully.";
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Invalid operation. Rental cannot be cancelled or is already confirmed.";
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

// Redirect back to the rental page
header("Location: my-rental.php");
exit();
?>
