<?php
require('Movie.php');

class Booking extends Movie {
    public $seatNumber;
    public $bookingDate;

    function __construct($title, $genre, $releaseYear, $seatNumber, $bookingDate)
    {
        parent::__construct($title, $genre, $releaseYear);
        $this->seatNumber = $seatNumber;
        $this->bookingDate = $bookingDate;
    }

    public function printBookingDetails()
    {
        parent::printDetails();
        echo "Seat Number: ".$this->seatNumber."<br>";
        echo "Booking Date: ".$this->bookingDate."<br>";
    }
}
?>
