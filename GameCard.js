var recommendedSectionData = [
    {
        name: "Rocket League",
        description: "Cars and goals",
        price: "Free",
        imageUrl: "Game_Images/rocket.avif",
        link: "/Games/Valorant"   
    },
    {
        name: "FIFA 2023",
        description: "Play football online",
        price: " 69.99$",
        imageUrl: "Game_Images/fifa23.avif",
        link: "/Games/Valorant"
    },
    {
        name: "GTA V",
        description: " action-adventure",
        price: " 19.99$",
        imageUrl: "Game_Images/gtaV.avif",
        link: "/Games/Valorant"
    },
];

var freeSectionData = [ 
    {
        name: "CS 2",
        description: "Competitive fps shooter",
        price: "Free",
        imageUrl: "/Game_Images/cs2-cover.png",
        link: "/Games/counter-strike-2.html"
    },
    {
        name: "Valorant",
        description: "Competitive fps shooter",
        price: "Free",
        imageUrl: "Game_Images/valorant.avif",
        link: "/Games/valorant.html"
    },
    {
        name: "Rocket League",
        description: "Cars and goals",
        price: "Free",
        imageUrl: "Game_Images/rocket.avif",
        link: "/Games/rocket-leaug"
    }
];

function CreateGameCard(data,section) {
    var gameSection = document.getElementById(section);
    gameSection.classList.add('latest-container');

    var gameCard = document.createElement('div');

    gameCard.className = 'game-card';
    gameCard.classList.add('game-card');

    var imageContainer = document.createElement('div');
    imageContainer.className = 'image-container';
    imageContainer.classList.add('image-container');

    var imageLink = document.createElement('a');
    imageLink.href = data.link;

    var gameImage = document.createElement('img');
    gameImage.src = data.imageUrl;
    gameImage.alt = 'Game Image';
    gameImage.className = 'game-card-image';

    var infoContainer = document.createElement('div');
    infoContainer.className = 'info-container';
    infoContainer.classList.add('info-container');

    var titleContainer = document.createElement('div');
    titleContainer.className = 'title-container';
    titleContainer.classList.add('title-container');

    var gameName = document.createElement('span');
    gameName.className = 'game-name';
    gameName.textContent = data.name;
    gameName.classList.add('game-name');

    var gameDescription = document.createElement('span');
    gameDescription.className = 'game-description';
    gameDescription.textContent = data.description;
    gameDescription.classList.add('game-description');

    var price = document.createElement('span');
    price.className = 'price';
    price.textContent = data.price;
    price.classList.add('price');

    var buttonContainer = document.createElement('div');
    buttonContainer.className = 'button-container';
    buttonContainer.classList.add('button-container');

    var readMoreBtn = document.createElement('button');
    readMoreBtn.className = 'read-more-btn';
    readMoreBtn.textContent = 'Read more';
    readMoreBtn.classList.add('read-more-btn');

    var buyBtn = document.createElement('button');
    buyBtn.className = 'buy-btn';
    buyBtn.classList.add('buy-btn');

    var bagImg = document.createElement('img');
    bagImg.src = '/bag.svg';
    bagImg.alt = '';
    bagImg.className = 'bag-img';
    bagImg.classList.add('bag-img');

    // Append elements to the DOM
    gameSection.appendChild(gameCard);
    gameCard.appendChild(imageContainer);
    imageContainer.appendChild(imageLink);
    imageLink.appendChild(gameImage);
    gameCard.appendChild(infoContainer);
    infoContainer.appendChild(titleContainer);
    titleContainer.appendChild(gameName);
    titleContainer.appendChild(gameDescription);
    infoContainer.appendChild(price);
    infoContainer.appendChild(buttonContainer);
    buttonContainer.appendChild(readMoreBtn);
    buttonContainer.appendChild(buyBtn);
    buyBtn.appendChild(bagImg);
}

function CreateGameCards(data,sectionName)
{
    for(i = 0;i< data.length;i++)
    {
        CreateGameCard(data[i],sectionName);
    }
}

CreateGameCards(recommendedSectionData,'recommended-section');
CreateGameCards(freeSectionData,'free-section');