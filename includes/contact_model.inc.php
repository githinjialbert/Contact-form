<?php

class ContactModel {
    private $dbserver = "localhost";
    private $dbname = "contact_form";
    private $dbusername = "root";
    private $password = "";
    private $conn;

    public function __construct () {

        try {
        $this->conn = new PDO("mysql:host={$this->dbserver};dbname={$this->dbname}", $this->dbusername, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection Failed:" . $e->getMessage());
        }
    }

    public function insertYourInfo($fname, $lname, $email, $phone, $messages) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO messenger(fname, lname, email, phone, messages) VALUES(:fname, :lname, :email, :phone, :messages);");

            $stmt = $this->stmt->prepare($query);
            $stmt->bindParam(":fname", $fname);
            $stmt->bindParam(":lname", $lname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":messages", $messages);

            return $stmt->execute();

        } catch (PDOException $e) {
            die("Failed to submit your results: " . $e->getMessagge());
        }
    }
}