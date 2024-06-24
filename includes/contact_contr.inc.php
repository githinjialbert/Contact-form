<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'contact_model.inc.php';
require_once '../sessions.php';


class ContactContr {
   private $messager;

   public function __construct () {
    $this->messager = new ContactModel();
   }

   public function contactForm() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $fname = htmlspecialchars(trim($_POST["fname"]));
        $lname = htmlspecialchars(trim($_POST["lname"]));
        $email = htmlspecialchars($_POST["email"]);
        $phone = htmlspecialchars(trim($_POST["phone"]));
        $messages = htmlspecialchars(trim($_POST["messages"]));
    }

    echo "Phone input: $phone<br>";
    $stripped_phone = preg_replace('/\D/', '', $phone);
    echo "Stripped phone (digits only): $stripped_phone<br>";
    echo "Length of stripped phone: " . strlen($stripped_phone) . "<br>";


    if (empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($messages)) {
        throw new Exception("Fill in all the fields!");
       }

    if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
        throw new Exception("Firstname can only contain letters and spaces");
    }

    if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
        throw new Exception("Lastname can only contain letters and spaces");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email address");
    }

    if (!preg_match('/^\+?[0-9\s\-\(\)]+$/', $phone) || strlen($stripped_phone) < 10 || strlen($stripped_phone) > 15) {
        throw new Exception("Invalid phone number format. It should contain 10-15 digits and can include a leading +, spaces, dashes, and parentheses.");
    }
    if (strlen($messages) < 20) {
        throw new Exception("Message should exceed 20 characters");
    }
    if (strlen($messages) > 1000) {
        throw new Exception("Message should not exceed 1000 characters.");
    }

    try {
        $this->messager->insertYourInfo($fname, $lname, $email, $phone, $messages); 
        echo "Form submitted successfully.";
    } catch (PDOException $e) {
        echo "An error occurred. Could not submit form." . $e->getMessage();
    }

   }
}

$contactContr = new ContactContr();
$contactContr->contactForm();