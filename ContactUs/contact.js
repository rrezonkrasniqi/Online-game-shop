function validateAndSubmit() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var textField = document.getElementById("text-field").value;

    let nameRegex  = /[a-zA-Z]{5,10}$/;
    let emailRegex = /[a-zA-Z0-9.-_]+@+[a-z]+\.+[a-z]{3}$/;
    let textFieldRegex = /[a-zA-Z,.-_0-9]{5,50}/;

    if(!nameRegex.test(name))
    {
        alert("Name input is not correct");
        return;
    }

    if(!emailRegex.test(email))
    {
        alert("Email input is not correct");
        return;
    }

    if(!textFieldRegex.test(textField))
    {
        alert("Text field input is not correct");
        return;
    }
}



      