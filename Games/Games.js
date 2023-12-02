var allGames = [
  {
    name: "FIFA 2024",
    description: "Latest FIFA with upgrades.",
    price: "3.99$",
    imageUrl: "../Game_Images/fc_24.avif",
    link: "fifa-2024.html",
  },
  {
    name: "Fortnite",
    description: "Battle royale with building.",
    price: "Free",
    imageUrl: "../Game_Images/fortnite.avif",
    link: "fortnite.html",
  },
  {
    name: "GTA V",
    description: "Open-world action-adventure.",
    price: "4.99$",
    imageUrl: "../Game_Images/gtaV.avif",
    link: "/Games/gta-v.html",
  },
  {
    name: "Counter Strike 2",
    description: "Tactical shooter multiplayer.",
    price: "Free",
    imageUrl: "../Game_Images/cs2-cover.png",
    link: "counter-strike-2.html",
  },
  {
    name: "Rocket League",
    description: "Cars scoring soccer goals.",
    price: "Free",
    imageUrl: "../Game_Images/rocket.avif",
    link: "/Games/rocket-league.html",
  },
  {
    name: "FIFA 2023",
    description: "Online football gameplay.",
    price: "69.99$",
    imageUrl: "../Game_Images/fifa23.avif",
    link: "/Games/fifa-2023.html",
  },
  {
    name: "Watch Dogs 2",
    description: "Open-world hacking adventure.",
    price: "49.99$",
    imageUrl: "../Game_Images/fc_24.avif",
    link: "fifa-2024.html",
  },
  {
    name: "Among Us",
    description: "Deception in space.",
    price: "4.99$",
    imageUrl: "../Game_Images/among_us.avif",
    link: "among-us.html",
  },
  {
    name: "Forza Horizon 4",
    description: "Dynamic open-world racing.",
    price: "69.99$",
    imageUrl: "../Game_Images/forza-horizon-2.jpg",
    link: "forza-horizon-4.html",
  },
  {
    name: "Valorant",
    description: "Tactical shooter with agents.",
    price: "Free",
    imageUrl: "../Game_Images/valorant.avif",
    link: "valorant.html",
  },
  {
    name: "Call of Duty Modern Warfare",
    description: "Intense modern warfare action.",
    price: "Free",
    imageUrl: "../Game_Images/call-of-duty.jpeg",
    link: "call-of-duty-modern-warfare.html",
  },
  {
    name: "Cyberpunk 2077",
    description: "Futuristic open-world RPG.",
    price: "89.99$",
    imageUrl: "../Game_Images/cyberpunk.avif",
    link: "cyberpunk-2077.html",
  },
  {
    name: "Alan Awake 2",
    description: "Psychological horror sequel.",
    price: "49.99$",
    imageUrl: "../Game_Images/alan-awake-2.avif",
    link: "alan-awake-2.html",
  },
,
  {
    name: "Far Cry 6",
    description: "Tropical action-adventure.",
    price: "Free",
    imageUrl: "../Game_Images/far-cry-6.jpg",
    link: "far-cry-6.html",
  },
  {
    name: "Cities Skylines",
    description: "City-building simulation.",
    price: "24.99$",
    imageUrl: "../Game_Images/cities-skylines.avif",
    link: "cities-skylines.html",
  },

  {
    name: "Genshin Impact",
    description: "Anime-inspired action RPG.",
    price: "Free",
    imageUrl: "../Game_Images/genshin-impact.avif",
    link: "genshin-impact.html",
  },
  {
    name: "Dota 2",
    description: "Multiplayer online battle arena.",
    price: "Free",
    imageUrl: "../Game_Images/dota-2.jpeg",
    link: "dota-2.html",
  },
];


function createGameCard(game) {
  var gameCard = document.createElement("div");
  gameCard.className = "game-card";

  var imageContainer = document.createElement("div");
  imageContainer.className = "image-container";

  var imageLink = document.createElement("a");
  imageLink.href = game.link;

  var gameImage = document.createElement("img");
  gameImage.src = game.imageUrl;
  gameImage.alt = "Game Image";
  gameImage.className = "game-card-image";

  imageLink.appendChild(gameImage);
  imageContainer.appendChild(imageLink);

  var infoContainer = document.createElement("div");
  infoContainer.className = "info-container";

  var titleContainer = document.createElement("div");
  titleContainer.className = "title-container";

  var gameName = document.createElement("span");
  gameName.className = "game-name";
  gameName.textContent = game.name;

  var gameDescription = document.createElement("span");
  gameDescription.className = "game-description";
  gameDescription.textContent = game.description;

  titleContainer.appendChild(gameName);
  titleContainer.appendChild(gameDescription);

  
  var price = document.createElement("span");
  price.className = "price";
  price.textContent = game.price;

  var buttonContainer = document.createElement("div");
  buttonContainer.className = "button-container";

  var readMoreBtn = document.createElement("button");
  readMoreBtn.className = "read-more-btn";
  readMoreBtn.textContent = "Read more";
  
  readMoreBtn.onclick = function() {
    window.location.href = game.link;
  };
  
  var buyBtn = document.createElement("button");
  buyBtn.className = "buy-btn";
  
 

  buyBtn.onclick = function() {
    window.location.href = "../Authentication/Login.html";
  };
  

  var bagImg = document.createElement("img");
  bagImg.src = "/bag.svg";
  bagImg.alt = "";
  bagImg.className = "bag-img";

  buyBtn.appendChild(bagImg);

  buttonContainer.appendChild(readMoreBtn);
  buttonContainer.appendChild(buyBtn);

  infoContainer.appendChild(titleContainer);
  infoContainer.appendChild(price);
  infoContainer.appendChild(buttonContainer);

  gameCard.appendChild(imageContainer);
  gameCard.appendChild(infoContainer);

  return gameCard;
}

function displayGameCards() {
  var gameContainer = document.getElementById("game-container"); // Replace with the actual container ID

  allGames.forEach(function (game) {
    var gameCard = createGameCard(game);
    gameContainer.appendChild(gameCard);
  });
}

// Call the function to display game cards on page load
displayGameCards();
