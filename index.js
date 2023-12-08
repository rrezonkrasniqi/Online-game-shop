let i = 0;

var img = [
    {
        imgSrc: "./Game_Images/Formula_1.jpg",
        gameTitle: "F1® 23 AVAILABLE NOW WORLDWIDE",
        gameDescription: "Be the last to brake and race to your legacy"
    },
    {
        imgSrc: "./Game_Images/gtaVI.png",
        gameTitle: "GTA VI",
        gameDescription: "Be the last to brake and race to your legacy"
    },
    {
        imgSrc: "./Game_Images/far-cry-6.jpg",
        gameTitle: "FAR CRY 6",
        gameDescription: "Be the last to brake and race to your legacy"
    }
]

var coverImage = document.getElementById("cover-image");

var nextButton = document.getElementById("next-button");
var prevButton = document.getElementById("prev-button");

let gameTitle = document.getElementById("game-title-slider");
let gameDesc = document.getElementById("game-desc-slideri");

nextImage();
prevImage();

function nextImage(){
nextButton.addEventListener('click', () =>{
    (i >= img.length - 1) ? i = 0: i++;    
    changeSliderContect();
    })
}

function prevImage(){
prevButton.addEventListener('click',() =>{
    (i <= 0) ? i = img.length - 1: i--;
    changeSliderContect();
})
}

function changeSliderContect()
{
    coverImage.src = img[i].imgSrc;

    gameTitle.innerHTML = img[i].gameTitle;
    gameTitle.classList.add("title");

    gameDesc.innerHTML = img[i].gameDescription;
    gameDesc.classList.add("description");
}

