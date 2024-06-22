<?php

require_once 'contact_model.inc.php';
require_once '../sessions.php';

class ContactContr {
   private $messager;

   public function __construct () {
    $this->messager = new ContactModel();
   }

   public function contactForm() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

    }
   }
}