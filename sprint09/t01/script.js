function fillForm() {
    document.querySelector("input#login").value = "vchkhr";
    document.querySelector("input#password").value = "qweasd";
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

    let password = document.querySelector("input#password").value;

    if (password.length < 6) {
        let passwordError = document.querySelector("p#password-error");
        
        passwordError.classList.remove("hidden");
        passwordError.innerHTML = "&#x26A0;&#xFE0F; Password should be more than 6 characters";

        event.preventDefault();
    }
});
