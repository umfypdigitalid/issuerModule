function setFormMessage(formElement, type, message){
    const messageElement = formElement.querySelector(".form_message");
   
    messageElement.textContent = message;
    messageElement.classList.remove("form_message--success","form_message--error");
    messageElement.classList.add(`form_message--${type}`);
}

//setFormMessage(loginForm,"success","You're logged in!");


document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");

    console.log("fully loaded");
    loginForm.addEventListener("submit", e => {  

        //perfirm AJAX login
        setFormMessage(loginForm,"error","Invalid username/password combination");
    });
});
