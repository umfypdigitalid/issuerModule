function setFormMessage(formElement, type, message){
    const messageElement = formElement.querySelector(".form_message");
   
    messageElement.textContent = message;
    messageElement.classList.remove("form_message--success","form_message--error");
    messageElement.classList.add(`form_message--${type}`);
}

//setFormMessage(loginForm,"success","You're logged in!");

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");

    console.log("loginjs.jsfully loaded");

    loginForm.addEventListener("submit", e => {  
        //perfirm AJAX login
        
            console.log("submit");
  
           var username= $("#username").val();
           var password = $("#password").val();
           console.log(username);
           const request = new XMLHttpRequest();

           if (username == ""||password == ""){
            setFormMessage(loginForm,"error","Fill in your username/password");
           }
           else {
               
            setFormMessage(loginForm,"success","Logging in...");
           }
       


       // setFormMessage(loginForm,"error","Invalid username/password combination");
  });
});

