function validateAndSubmit() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var textField = document.getElementById("text-field").value;

    if (name === "" || email === "" || textField === "") {
        alert("Please fill in all fields.");
    } else {
        alert("Form submitted successfully!");
    }
}



      