<?php
class User {
    public $name;
    private $email;
    private $birthDate;

    function __construct($name = "Guest", $email = "guest@example.com", $birthDate = "2000-01-01")
    {
        $this->name = $name;
        $this->email = $email;
        $this->birthDate = $birthDate;
    }

    public function setUserData($name, $email, $birthDate)
    {
        $this->name = $name;
        $this->email = $email;
        $this->birthDate = $birthDate;
    }

    public function calculateAge()
    {
        $birthDate = new DateTime($this->birthDate);
        $today = new DateTime(date('Y-m-d'));
        $age = $today->diff($birthDate)->y;
        return $age;
    }

    public function printUserData()
    {
        echo "User Name: ".$this->name."<br>";
        echo "Email: ".$this->email."<br>";
        echo "Birth Date: ".$this->birthDate."<br>";
        echo "User Age: ".$this->calculateAge()." years<br>";
    }
}
?>
