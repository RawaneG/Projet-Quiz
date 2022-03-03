const form = document.getElementById('form');
const login = document.getElementById('login');
const password = document.getElementById('password');
const error = document.getElementById('error');
const submit = document.getElementById('valider');
const loginInput = document.getElementById('login_input');
const passwordInput = document.getElementById('password_input');


form.addEventListener('submit', (e) => {
    let message = [];
    if(login.value === '' || login.value  == null)
    {
        message.push('Veuillez remplir votre login');
        loginInput.style.border = "2px solid red";
    }
    else if(!login.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g))
    {
        message.push('Veuillez entrer un email valide');
        loginInput.style.border = "2px solid red";
    }
    if(password.value === '' || password.value  == null)
    {
        message.push('Veuillez remplir votre mot de passe');
        passwordInput.style.border = "2px solid red";
    }
    else if(!password.value.match(/[a-bA-Z]/) || !password.value.match(/[0-9]/) || password.value < 6)
    {
        message.push("Veuillez rentrer un mot de passe supérieur à 6 caractères et contenant au moins\
        une lettre et un chiffre");
        passwordInput.style.border = "2px solid red";
    }
    if(message.length > 0)
    {
        e.preventDefault();
        error.classList.add("error");
        error.innerText = message.join('.\n');
    }
})

