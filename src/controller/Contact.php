<?php
class Contact
{
    private $id;
    private $name;
    private $message;
    private $email;

    public function __construct($id, $name, $message, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->message = $message;
        $this->email = $email;
    }


    public function display()
    {
        echo "<div class=\"contact-card\">";
        echo "<div class=\"info-container\">";
        echo "<div class=\"title-container\">";
        echo "<span class=\"game-name\">{$this->name}</span>";
        echo "</div>";
        echo "<span class=\"price\">{$this->message}</span>";
        echo "<br/>";
        echo "<a href=\"mailto:{$this->email}\">";
        echo "<button class=\"read-more-btn\">{$this->email}</button>";
        echo "</a>";
        echo "</div>";
        echo "</div>";
    }
   
}
