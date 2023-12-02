var searchForm = document.getElementById('search-form');
var searchInput = document.getElementById('search-bar');
let searchIcon = document.getElementById('search-icon');
let searchContainer = document.getElementById('search-container');

let bIsSearchFormClosed = true;
openCloseSearchBar();

function openCloseSearchBar()
{
    searchIcon.addEventListener("click", () => {
        if(searchInput.value != "") return;

        let display = 'none';
        (bIsSearchFormClosed) ? display = 'none' : display = 'inline';

        searchForm.style.display = display;
        searchContainer.style.display = display;

        bIsSearchFormClosed = !bIsSearchFormClosed;
    })
}

let searchItems = document.querySelectorAll('.search-item');
let searchImage = document.querySelectorAll('.search-item-image');
let searchItemName = document.querySelectorAll('.search-item-name');
let searchItemPrice = document.querySelectorAll('.search-item-price');

let searchImagePhotos = searchImage;
let searchItemsName = searchItemName;
let searchItemsPrice = searchItemPrice;

function searchGame()
{
    const searchInput = document.getElementById('search-bar').value.toLowerCase();
    const searchCard = document.getElementById('search-card-container');
    
    document.querySelectorAll('.search-item').forEach(card => {
        const itemName = card.querySelector('.search-item-name').innerText.toLowerCase();
        let display = 'none';
        (itemName.includes(searchInput)) ? display = 'block': display = 'none';
        card.style.display = display;
    });
    searchCard.style.display = document.querySelector('.search-item:visible') ? 'block' : 'none';
}