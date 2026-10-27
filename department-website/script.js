function validateRegisterForm() {

    const name =
        document.getElementById("name").value.trim();

    const email =
        document.getElementById("email").value.trim();

    const password =
        document.getElementById("password").value;

    if (name === "") {

        alert("Please enter your name.");

        return false;
    }

    if (email === "") {

        alert("Please enter your email.");

        return false;
    }

    if (password.length < 6) {

        alert(
            "Password must contain at least 6 characters."
        );

        return false;
    }

    return true;
}

// ========================================
// REGISTRATION FORM VALIDATION
// ========================================

function validateRegisterForm() {

    const name =
        document.getElementById("name").value.trim();

    const email =
        document.getElementById("email").value.trim();

    const password =
        document.getElementById("password").value;


    if (name === "") {

        alert("Please enter your name.");

        return false;
    }


    if (email === "") {

        alert("Please enter your email.");

        return false;
    }


    if (password.length < 6) {

        alert(
            "Password must contain at least 6 characters."
        );

        return false;
    }


    return true;
}


// ========================================
// DASHBOARD SECTION
// ========================================

function showSection(sectionName) {


    // Get all dashboard sections

    const sections =
        document.querySelectorAll(
            ".dashboard-section"
        );


    // Hide all sections

    sections.forEach(function(section) {

        section.style.display = "none";

    });


    // Get the selected section

    const selectedSection =
        document.getElementById(sectionName);


    // Show selected section

    if (selectedSection) {

        selectedSection.style.display = "block";

    }

}


// ========================================
// SHOW COURSES WHEN DASHBOARD OPENS
// ========================================

window.onload = function() {

    showSection("courses");

};
