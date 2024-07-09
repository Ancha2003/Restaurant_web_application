function val() {
    let name = document.getElementById("name").value;
    let pass = document.getElementById("pass").value;

    if (name === "" || pass === "") {
        document.getElementById("error_message").innerText = "Please fill all fields.";
        return false;
    }

    // If validation passes, the form will be submitted
    return true;
}
