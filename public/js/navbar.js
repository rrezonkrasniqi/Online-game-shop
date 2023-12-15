
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}


function validateForm() {
  var emailInput = document.getElementById("email");
  var email = emailInput.value.trim();

  var emailRegex = /[@.]/;

  if (emailRegex.test(email)) {
      alert('Please enter a valid email address.');
      return false;
  }

  alert('You successfully subscribed to our newsletter');
  return true;
}
