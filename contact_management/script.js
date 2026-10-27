function validateForm() {

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let address = document.getElementById("address").value.trim();

    let namePattern = /^[A-Za-z ]+$/;

    if (!namePattern.test(name)) {
        alert("Name should contain only letters and spaces.");
        return false;
    }

    let emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }
n
    let phonePattern = /^[0-9]{10}$/;

    if (!phonePattern.test(phone)) {
        alert("Phone number must contain exactly 10 digits.");
        return false;
    }

    if (address === "") {
        alert("Address cannot be empty.");
        return false;
    }

    return true;
}



function confirmDelete() {
    return confirm("Are you sure you want to delete this contact?");
}