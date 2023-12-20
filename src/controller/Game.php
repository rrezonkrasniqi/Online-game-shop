<?php
class Game
{
    private $name;
    private $description;
    private $price;
    private $image;
    private $release_date;
    private $rating;

    
    private $platform;

    public function __construct($name, $description, $price, $image, $release_date, $platform, $rating)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->release_date = $release_date;
        $this->platform = $platform;
        $this->rating = $rating;
        if ($this->price == 0) {
            $this->price = "Free";
        }
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
        echo "</div>";
        echo "<span class=\"price\">{$this->price}</span>";
        echo "<a href=\"game-info.php?name={$this->name}\">";
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

    public function displayInfo()
    {
        echo "<div class=\"main-container game-container\">";
        echo "<div class=\"left-half\">";
        echo "<img src=\"{$this->image}\" class=\"game-cover\" alt=\"game-cover\" />";
        echo "</div>";
        echo "<div class=\"right-half\">";
        echo "<div class=\"game-info-top\">";
        echo "<span class=\"game-title\">{$this->name}</span>";
        echo "<span class=\"game-creator\">{$this->platform}</span>";

        echo "<span class=\"game-creator\">CD PROJEKT RED</span>";
        echo "<span class=\"game-platform\"><img src=\"windows-10-icon.svg\" alt=\"\" class=\"platform-icon\" /></span>";
        echo "<span class=\"game-rating\">$this->rating / 5</span>";
        echo "</div>";
        echo "<div class=\"game-info-bottom\">";
        echo "<span class=\"game-price-sale\">{$this->price}</span>";
        echo "<a href=\"../Authentication/login.html\">";
        echo "<div class=\"button-container\">";
        echo "<button class=\"cart-btn\">Add to cart</button>";
        echo "<button class=\"buy-btn\"><img src=\"http://localhost/Online-game-shop/public/images/bag.svg\" alt=\"\" class=\"bag-img\" /></button></div></a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class=\"main-container\">";
        echo "<div class=\"game-long-description\">";
        echo "<p>{$this->description}</p>";
        echo "</div>";
        echo "</div>";
    }

}
?>

