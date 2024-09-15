<?php
require('User.php');
require('Booking.php');

// User Instance
$user = new User();
$user->setUserData("Teguh Surya Zulfikar", "tzulfikar7@student.uns.ac.id", "2004-07-22");
$user->printUserData();

echo "<br>";

// Booking Instance
$booking = new Booking("Legenda Baginda Aji", "Horror", 2023, "A12", "2024-09-12");
$booking->printBookingDetails();
?>
