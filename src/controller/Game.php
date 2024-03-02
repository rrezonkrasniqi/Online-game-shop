<?php
class Game
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $release_date;
    private $rating;
    private $platform;

    private $creator;

    private $platform_image;

    public function __construct($id, $name, $description, $price, $image, $release_date, $platform, $rating, $creator)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->release_date = $release_date;
        $this->platform = $platform;
        $this->rating = $rating;
        $this->creator = $creator;
        if ($this->price == 0) {
            $this->price = "Free";
        }
        if ($this->platform == "Windows") {
            $this->platform_image = "../../public/images/windows-10-icon.svg";
        } else if ($this->platform == "PlayStation") {
            $this->platform_image = "../../public/images/playstation.png";
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


    public function displayIndexGames()
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
        echo "<a href=\"/Online-game-shop/public/view/game-info.php?name={$this->name}\">";
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
    public function displayOwned()
    {
        echo "<div class=\"game-card\">";
        echo "<div class=\"image-container\">";
        echo "<img src=\"{$this->image}\" alt=\"Game Image\" class=\"game-card-image\">";
        echo "</div>";
        echo "<div class=\"info-container\">";
        echo "<div class=\"title-container\">";
        echo "<span class=\"game-name\">{$this->name}</span>";
        echo "</div>";
        echo "<a href=\"game-info.php?name={$this->name}\">";
        echo "<div class=\"button-container\">";
        echo "<button class=\"read-more-btn\">Read more</button>";
        echo "<a href=\"LOL\">";
        echo "<button class=\"buy-btn\">Play</button>";
        echo "</a>";
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
        echo "<span class=\"game-creator\">{$this->creator}</span>";
        echo "<span class=\"game-platform\"><img src=\"{$this->platform_image}\" alt=\"\" class=\"platform-icon\" /></span>";
        echo "<span class=\"game-rating\">$this->rating / 5</span>";
        echo "</div>";
        echo "<div class=\"game-info-bottom\">";
        echo "<span class=\"game-price-sale\">{$this->price}</span>";
        echo "<div class=\"button-container\">";
        echo "<a href=\"/Online-game-shop/src/controller/add-to-cart.php?id={$this->id}\">";
        echo "<button class=\"cart-btn\">Add to cart</button></a>";
        echo "<a href=\"/Online-game-shop/src/controller/buy-game.php?id={$this->id}\">";
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

    public function displayCRUD()
    {
        echo "<div class=\"game-card-crud\">";
        echo "<div class=\"image-container-crud\">";
        echo "<img src=\"{$this->image}\" alt=\"Game Image\" class=\"game-card-image-crud\">";
        echo "</div>";
        echo "<div class=\"title-container-crud\">";
        echo "<span class=\"game-name\">{$this->name}</span>";
        echo "</div>";
        echo "<div class=\"title-container-crud\">";
        echo "<span class=\"price\">{$this->price}</span>";
        echo "</div>";
        echo "<div class=\"info-container-crud\">";
        echo "<div class=\"button-container-crud\">";
        echo "<a href=\"/Online-game-shop/public/view/admin/edit-game.php?id={$this->id}\" >";
        echo "<button class=\"read-more-btn\">Edit</button>";
        echo "</a>";
        echo "<a href=\"/Online-game-shop/src/controller/delete-game.php?id={$this->id}\" class=\"delete-btn\">";
        echo "<img src=\"http://localhost/Online-game-shop/public/images/delete.png\" alt=\"\" class=\"delete-img\">";
        echo "</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}
