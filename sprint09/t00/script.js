function fillForm() {
    document.querySelector("input#login").value = "vchkhr";
    document.querySelector("input#password").value = "qweasd";
    document.querySelector("input#password-confirm").value = "qweasd";
    document.querySelector("input#name").value = "Viacheslav"
    document.querySelector("input#email").value = "vchkhr@gmail.com";
}

// fillForm();

function hideErrors() {
    document.querySelectorAll("p.error").forEach(function(elem) {
        elem.classList.add("hidden");
    });
}

hideErrors();

document.querySelector("form").addEventListener("submit", function(event) {
    hideErrors();

    let login = document.querySelector("input#login").value;

    if (login.length < 6) {
        let loginError = document.querySelector("p#login-error");
        
        loginError.classList.remove("hidden");
        loginError.innerHTML = "&#x26A0;&#xFE0F; Login should be more than 6 characters";

        event.preventDefault();
    }

    if (login.length >= 20) {
        let loginError = document.querySelector("p#login-error");

        loginError.classList.remove("hidden");
        loginError.innerHTML = "&#x26A0;&#xFE0F; Login should be less than 20 characters";

        event.preventDefault();
    }

    if (/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(login) || login.includes(" ")) {
        let loginError = document.querySelector("p#login-error");

        loginError.classList.remove("hidden");
        loginError.innerHTML = "&#x26A0;&#xFE0F; Login should not contains special characters or space";

        event.preventDefault();
    }

    let email = document.querySelector("input#email").value;

    if (email.includes(" ") || !email.includes("@")) {
        let emailError = document.querySelector("p#email-error");
        
        emailError.classList.remove("hidden");
        emailError.innerHTML = "&#x26A0;&#xFE0F; Invalid email";

        event.preventDefault();
    }

    if (email.length < 3) {
        let emailError = document.querySelector("p#email-error");
        
        emailError.classList.remove("hidden");
        emailError.innerHTML = "&#x26A0;&#xFE0F; Email should be more than 3 characters.";

        event.preventDefault();
    }

    let name = document.querySelector("input#name").value;

    if (name.length < 1) {
        let nameError = document.querySelector("p#name-error");
        
        nameError.classList.remove("hidden");
        nameError.innerHTML = "&#x26A0;&#xFE0F; Name shouldn't be empty";

        event.preventDefault();
    }

    if (name.length >= 256) {
        let nameError = document.querySelector("p#name-error");
        
        nameError.classList.remove("hidden");
        nameError.innerHTML = "&#x26A0;&#xFE0F; Name should be less than 256 characters";

        event.preventDefault();
    }

    let password = document.querySelector("input#password").value;

    if (password.length < 6) {
        let passwordError = document.querySelector("p#password-error");
        
        passwordError.classList.remove("hidden");
        passwordError.innerHTML = "&#x26A0;&#xFE0F; Password should be more than 6 characters";

        event.preventDefault();
    }

    let passwordConfirm = document.querySelector("input#password-confirm").value;

    if (password != passwordConfirm) {
        let passwordConfirmError = document.querySelector("p#password-confirm-error");
        
        passwordConfirmError.classList.remove("hidden");
        passwordConfirmError.innerHTML = "&#x26A0;&#xFE0F; Passwords should be the same";

        event.preventDefault();
    }
});
