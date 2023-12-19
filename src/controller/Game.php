<?php
class Game
{
    private $name;
    private $description;
    private $price;
    private $image;
    private $release_date;
    private $platform;

    public function __construct($name, $description, $price, $image, $release_date, $platform)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->release_date = $release_date;
        $this->platform = $platform;
    }

    public function display()
    {
       
        echo "<div class=\"game-card\">";
        echo "<div class=\"image-container\">";
        echo "<img src=\"{$this->image}\" alt=\"Game Image\" class=\"game-card-image\">";
        echo "</div>";
        echo "<div class=\"info-container\">";
        echo "<div class=\"title-container\">";
        echo "<span class=\"game-name\">{$this->name}</span>";
        echo "<span class=\"game-description\">{$this->description}</span>";
        echo "</div>";
        echo "<span class=\"price\">{$this->price}</span>";
        echo "<a href=\"{$this->name}\">";
        echo "<div class=\"button-container\">";
        echo "<button class=\"read-more-btn\">Read more</button>";
        echo "<button class=\"buy-btn\">";
        echo "<img src=\"http://localhost/Online-game-shop/public/images/bag.svg\" alt=\"\" class=\"bag-img\">";
        echo "</button>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
        echo "</div>";


    }
}
?>

