const form = document.getElementById('form');
const login = document.getElementById('login');
const password = document.getElementById('password');
const submit = document.getElementById('valider');
const loginInput = document.getElementById('login_input');
const passwordInput = document.getElementById('password_input');
const loginError =  document.getElementById('loginErr');
const passwdError = document.getElementById('passwdErr');

loginInput.addEventListener('input', () => 
{
    if(login.value === '' || login.value  == null)
    {
        loginInput.style.border = "2px solid red";
    }
    else if(!login.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g))
    {
        loginInput.style.border = "2px solid red";
    }
    else
    {
        loginInput.style.border = "2px solid green";
    }
})

passwordInput.addEventListener('input', () => 
{
    if(password.value === '' || password.value  == null)
    {
        passwordInput.style.border = "2px solid red";
    }
    else if(!password.value.match(/[a-zA-Z]/) || !password.value.match(/[0-9]/) || password.value < 6)
    {
        passwordInput.style.border = "2px solid red";
    }
    else
    {
        passwordInput.style.border = "2px solid green";
    }
})

form.addEventListener('submit', (e) => {
    let loginErr = [];
    let passwdErr = [];

    if(login.value === '' || login.value  == null)
    {
        loginErr.push('Veuillez remplir votre login');
        loginInput.style.border = "2px solid red";
    }
    else if(!login.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g))
    {
        loginErr.push('Veuillez entrer un email valide');
        loginInput.style.border = "2px solid red";
    }
    if(password.value === '' || password.value  == null)
    {
        passwdErr.push('Veuillez remplir votre mot de passe');
        passwordInput.style.border = "2px solid red";
    }
    else if(!password.value.match(/[a-bA-Z]/) || !password.value.match(/[0-9]/) || password.value < 6)
    {
        passwdErr.push("Veuillez rentrer un mot de passe supérieur à 6 caractères et contenant au moins\
        une lettre et un chiffre");
        passwordInput.style.border = "2px solid red";
    }
    if(loginErr.length > 0)
    {
        e.preventDefault();
        loginError.classList.add("error");  
        loginError.innerText = loginErr;
    }
    if(passwdErr.length > 0)
    {
        e.preventDefault();
        passwdError.classList.add("error");
        passwdError.innerText = passwdErr;
    }
})

