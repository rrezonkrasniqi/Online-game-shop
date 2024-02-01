var subToNewsletterEmail = document.getElementById("email-last");
let emailRegex = /[a-zA-Z0-9.-_]+@+[a-z]+\.+[a-z]{3}$/;

function subToNewsLetter()
{
    if(!emailRegex.test(subToNewsletterEmail.value))
    {
        alert("Email input is not correct");
        return;
    }

    alert("Subscribed successfully");
}