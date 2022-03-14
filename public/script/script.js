const form = document.getElementById('form');
const login = document.getElementById('login');
const password = document.getElementById('password');
const submit = document.getElementById('valider');
const loginInput = document.getElementById('login_input');
const passwordInput = document.getElementById('password_input');
const loginError =  document.getElementById('loginErr');
const passwdError = document.getElementById('passwdErr');

function valid_password(input) 
{
    if(!input.value.match(/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9!@#$%^&*]{6,}$/)) 
    {
        return true;
    }
    else 
    {
        return false;
    }
}

loginInput.addEventListener('input', () => 
{
    if(login.value === '' || login.value  == null)
    {
        loginInput.style.border = "2px solid red";
    }
    else if(!login.value.match(/^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail(\.)com$/))
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
    else if(valid_password(password))
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
    else if(!login.value.match(/^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/))
    {
        loginErr.push('Veuillez entrer un email valide');
        loginInput.style.border = "2px solid red";
    }

    if(password.value === '' || password.value  == null)
    {
        passwdErr.push('Veuillez remplir votre mot de passe');
        passwordInput.style.border = "2px solid red";
    }
    else if(valid_password(password))
    {
        passwordInput.style.border = "2px solid red";
        passwdErr.push("Veuillez rentrer un mot de passe supérieur à 6 caractères");
    }
    else
    {
        passwordInput.style.border = "2px solid green";
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

