var recommendedSectionData = [
    {
        name: "Rocket League",
        description: "Cars and goals",
        price: "Free",
        imageUrl: "Game_Images/rocket.avif",
        link: "/Games/rocket-league.html"   
    },
    {
        name: "FIFA 2023",
        description: "Play football online",
        price: " 69.99$",
        imageUrl: "Game_Images/fifa23.avif",
        link: "/Games/fifa-2023.html"
    },
    {
        name: "GTA V",
        description: " action-adventure",
        price: " 19.99$",
        imageUrl: "Game_Images/gtaV.avif",
        link: "/Games/gta-v.html"
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
        link: "/Games/rocket-league.html"
    }
];

var saleSectionData = [
    {
        name: "Fortine",
        description: "100 players 1 winner",
        priceForSale: "9.99$",
        price: "Free",
        imageUrl: "/Game_Images/fortnite.avif",
        link: "/Games/fortnite.html"
    },
    {
        name: "Among Us",
        description: "Find the impostor to win",
        priceForSale: "9.99$",
        price: "3.99$",
        imageUrl: "Game_Images/among_us.avif",
        link: "/Games/amonug_us.html"
    },
    {
        name: "Watch Dogs 2",
        description: "All the power in your hands",
        priceForSale: "19.99$",
        price: "10.99$",
        imageUrl: "Game_Images/watch_dogs.avif",
        link: "/Games/watch-dogs-2.html"
    }
]

var latestSectionData = [
    {
        name: "Fifa 2024",
        description: "Play football online",
        price: "3.99$/Monthly",
        imageUrl: "/Game_Images/fc_24.avif",
        link: "/Games/fifa-2024.html"
    },
    {
        name: "Valorant",
        description: "Competitive fps shooter",
        price: "Free",
        imageUrl: "Game_Images/valorant.avif",
        link: "/Games/valorant.html"
    },
    {
        name: "Cyberpunk 2077",
        description: "Challange the world",
        price: "89.99$",
        imageUrl: "Game_Images/cyberpunk.avif",
        link: "/Games/cyberpunk-2077.html"
    }
]

function createGameCard(data,section,bIsInSale) {
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

    if(bIsInSale == true)
    {
        var priceForSale = document.createElement('span');
        priceForSale.className = 'price-for-sale';
        priceForSale.textContent = data.priceForSale;
        priceForSale.classList.add('price-for-sale');
    }

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

    readMoreBtn.addEventListener('click', function () {
        window.location.href = data.link;
    });

    var buyBtn = document.createElement('button');
    buyBtn.className = 'buy-btn';
    buyBtn.classList.add('buy-btn');

    buyBtn.addEventListener('click', function () {
        window.location.href = "/Authentication/login.html";
    });

    var bagImg = document.createElement('img');
    bagImg.src = '/bag.svg';
    bagImg.alt = '';
    bagImg.className = 'bag-img';
    bagImg.classList.add('bag-img');

    gameSection.appendChild(gameCard);
    gameCard.appendChild(imageContainer);
    imageContainer.appendChild(imageLink);
    imageLink.appendChild(gameImage);
    gameCard.appendChild(infoContainer);
    infoContainer.appendChild(titleContainer);
    titleContainer.appendChild(gameName);
    titleContainer.appendChild(gameDescription);
    if(bIsInSale == true) infoContainer.appendChild(priceForSale);
    infoContainer.appendChild(price);
    infoContainer.appendChild(buttonContainer);
    buttonContainer.appendChild(readMoreBtn);
    buttonContainer.appendChild(buyBtn);
    buyBtn.appendChild(bagImg);
}

function createGameCards(data,sectionName,bIsInSale)
{
    for(let i = 0;i<data.length;i++)
    {
        createGameCard(data[i],sectionName,bIsInSale);
    }
}

createGameCards(recommendedSectionData,'recommended-section',false);
createGameCards(freeSectionData,'free-section',false);
createGameCards(saleSectionData,'for-sale-section',true);
createGameCards(latestSectionData,'latest-section',false);

var searchBarSectionData = [
    {
        name: "Rocket League",
        description: "Cars and goals",
        price: "99.99$",
        cardIDd: "rocketleague",
        imageUrl: "Game_Images/rocket.avif",
        link: "/Games/rocket-league.html"   
    },
    {
        name: "FIFA 2023",
        description: "Play football online",
        price: " 69.99$",
        cardIDd: "fifa",
        imageUrl: "Game_Images/fifa23.avif",
        link: "/Games/fifa-2023.html"
    },
    {
        name: "GTA V",
        description: " action-adventure",
        price: " 19.99$",
        cardIDd: "gtav",
        imageUrl: "Game_Images/gtaV.avif",
        link: "/Games/gta-v.html"
    },
];

createGameCardsForSearchBar(searchBarSectionData);

function createGameCardsForSearchBar(data)
{
    for(i = 0;i< data.length;i++)
    {
        gameCardForSearchBar(data[i],data[i].cardIDd);
    }
}

function gameCardForSearchBar(data,cardId){
    var searchCardContainer = document.getElementById('search-card-container');
     
    var searchItem = document.createElement('div');
    searchItem.className = "search-item";   
    searchItem.id = cardId;
    searchItem.style.display = 'flex';
    searchItem.style.cursor = 'pointer';

    searchItem.addEventListener("click",() => {
        window.location.href = data.link;

    })

    var searchCardImage = document.createElement('img');
    searchCardImage.className = "search-item-image";
    searchCardImage.src = data.imageUrl;

    var searchCardInfo = document.createElement('div');
    searchCardInfo.className = "search-item-info";

    var searchItemName = document.createElement('p');
    searchItemName.className = 'search-item-name';
    searchItemName.innerHTML = data.name;

    var searchItemPrice = document.createElement('p');
    searchItemPrice.className = 'search-item-price';
    searchItemPrice.innerHTML = data.price;

    searchCardContainer.appendChild(searchItem);
    searchItem.appendChild(searchCardImage);
    searchItem.appendChild(searchCardInfo);
    searchCardInfo.appendChild(searchItemName);
    searchCardInfo.appendChild(searchItemPrice);
}