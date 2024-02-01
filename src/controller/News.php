<?php
class News
{
    private $news_id;
    private $title;
    private $news_date;
    private $journalist_user_id;
    private $image;
    private $news_text;
    private $newsShortDesc;

    public function __construct($news_id, $title, $news_date, $journalist_user_id, $image, $news_text, $newsShortDesc)
    {
        $this->news_id = $news_id;
        $this->title = $title;
        $this->news_date = $news_date;
        $this->journalist_user_id = $journalist_user_id;
        $this->image = $image;
        $this->news_text = $news_text;
        $this->newsShortDesc = $newsShortDesc;
    }




    public function displayNews()
    {
        echo "<a href=\"article-info.php?id={$this->news_id}\">";
        echo "<div class=\"article\">";
        echo "<img src=\"{$this->image}\" alt=\"news-cover\" class=\"mini-news-cover\">";
        echo "<div class=\"title-and-text\">";
        echo "<p class=\"title\" >{$this->title}</p>";
        echo " <p class=\"description\">{$this->newsShortDesc}</p>";
        echo "<div class=\"written-by\">";
        echo "<p>By: {$this->journalist_user_id}</p>";

        echo "<p>{$this->news_date}</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</a>";
    }

    public function displayNewsInfo()
    {




        echo "<div class=\"news-title\">";
        echo "  <h1>{$this->title}</h1>";
        echo "  <span class=\"under-title\">{$this->journalist_user_id} | Journalist</span>";
        echo "  <span class=\"under-title\">Gamer News</span>";
        echo "</div>";

        echo "<div class=\"cover-container\">";
        echo "  <img src=\"{$this->image}\" alt=\"article-cover\" class=\"news-cover\" />";
        echo "</div>";

        echo "<article>";

        echo "<div>{$this->news_text}";
        echo "</div>";
        echo "</article>";
    }

    public function displayNewsCRUD()
    {
        echo "<div class=\"game-card-crud\">";
        echo "<div class=\"title-container-crud\">";
        echo "<span class=\"game-name\">{$this->title}</span>";
        echo "</div>";

        echo "<div class=\"title-container-crud\">";
        echo "<span class=\"price\">{$this->news_date}</span>";
        echo "</div>";
        echo "<div class=\"info-container-crud\">";

        echo "<div class=\"button-container-crud\">";
        echo "<a href=\"/Online-game-shop/public/view/admin/edit-news.php?id={$this->news_id}\" >";

        echo "<button class=\"read-more-btn\">Edit</button>";
        echo "</a>";

        echo "<a href=\"/Online-game-shop/src/controller/delete-news.php?id={$this->news_id}\" class=\"delete-btn\">";
        echo "<img src=\"http://localhost/Online-game-shop/public/images/delete.png\" alt=\"\" class=\"delete-img\">";
        echo "</a>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
    }



    public function displayIndexNews()
    {
        echo "<div class=\"news-card\">";
        echo "<div class=\"news-image-container\">";
        echo "<a href=\"article-info.php?id={$this->news_id}\">";
        echo "<img src=\"{$this->image}\" alt=\"news-cover\" class=\"news-cover game-card-image\">";
        echo "</a>";
        echo "</div>";
        echo "<div class=\"news-info-container\">";
        echo "<p class=\"game-name\">{$this->title}</p>";
        echo "<p class=\"game-description\">{$this->newsShortDesc}</p>";
        echo "<a href=\"view\article-info.php?id={$this->news_id}\"><button class=\"read-more-btn\">Read more</button></a>";
        echo "</div>";
        echo "</div>";

   
    }
}
