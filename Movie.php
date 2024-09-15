<?php
class Movie {
    public $title;
    protected $genre;
    private $releaseYear;

    function __construct($title = "Unknown", $genre = "Unknown", $releaseYear = 2000)
    {
        $this->title = $title;
        $this->genre = $genre;
        $this->releaseYear = $releaseYear;
    }

    public function setDetails($title, $genre, $releaseYear)
    {
        $this->title = $title;
        $this->genre = $genre;
        $this->releaseYear = $releaseYear;
    }

    public function printDetails()
    {
        echo "Movie Title: ".$this->title."<br>";
        echo "Genre: ".$this->genre."<br>";
        echo "Release Year: ".$this->releaseYear."<br>";
        echo "Movie Age: ".$this->calculateAge()." years<br>";
    }

    protected function calculateAge()
    {
        return date('Y') - $this->releaseYear;
    }
}
?>
