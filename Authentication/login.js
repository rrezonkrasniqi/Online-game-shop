var eyeIcon = document.getElementById("eye");
var passwordField = document.getElementById("password-input");
let isEyeClosed = true;

passwordShowHide();

function passwordShowHide()
{
  eyeIcon.addEventListener("click", () => {
    if(isEyeClosed)
    {
      eyeIcon.className = 'fa-solid fa-eye';
      passwordField.type = "text";
    }
    else
    {
      eyeIcon.className = 'fa-sharp fa-solid fa-eye-slash';
      passwordField.type = "password";
    }
    isEyeClosed = !isEyeClosed;
  })
}

function saveAndRedirect() {
  var username = document.getElementById("username").value;
  var password = passwordField.value;

  function isPasswordValid()
  {
    var passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d).{7,}$/;
    return passwordRegex.test(password) ;
  }
  console.log(isPasswordValid())

  if (isPasswordValid() && username !== "") {
    window.location.href = "../index.html";
  } 
  else 
  {
    alert("Please enter both username and password.");
  }
}