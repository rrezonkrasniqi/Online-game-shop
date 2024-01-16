
function saveAndRedirect() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var birthday = document.getElementById("birthday").value;
  console.log(name);

  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+/;


  var currentDate = new Date();
  var userBirthday = new Date(birthday);
  var ageDiff = currentDate.getFullYear() - userBirthday.getFullYear();
  if (ageDiff < 9) {
    alert("You must be at least 9 years old to sign up.");
    return;
  }

  var takenUsernames = ["user1", "user2", "user3"];
  if (takenUsernames.includes(username)) {
    alert("Username is already taken. Please choose another.");
    return;
  }

  if (name === "" || email === "" || username === "" || password === "") {
    alert("Please fill the entire form");
  } else if (!emailRegex.test(email)) {
      alert ("Your email is wrong")
  }
  else{


  }
}
