const form = document.getElementById('form');
const prenom = document.getElementById("prenom");
const nom = document.getElementById("nom");
const email = document.getElementById("email");
const mdp = document.getElementById("mdp");
const c_mdp = document.getElementById("c_mdp");
const avatar = document.getElementById("avatar");
const sumbit = document.getElementById("submit");

const prenomInput = document.getElementById("prenomInput");
const nomInput = document.getElementById("nomInput");
const emailInput = document.getElementById("emailInput");
const mdpInput = document.getElementById("mdpInput");
const c_mdpInput = document.getElementById("c_mdpInput");
const avatarInput = document.getElementById("avatarInput");
const inputs = document.querySelectorAll(".inpute");

function disabled(e)
{
    e.disabled = true;
    e.style.pointerEvents = "none";
}
function enable(e)
{
    e.disabled = false;
    e.style.pointerEvents = "";
}

function valid_name(e)
{
    if(e.value === '' || e.value  == null)
    {
        e.style.border = "3px solid red";
    }
    else
    {
        e.style.border = "3px solid green";
    }
}

prenom.addEventListener('input',() =>
{
    valid_name(prenomInput);
});
nom.addEventListener('input',()=>
{
    valid_name(nomInput);
});

email.addEventListener('input',()=>
{
    if(emailInput.value === '' || emailInput.value  == null)
    {
        emailInput.style.border = "3px solid red";
    }
    else if(!emailInput.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g))
    {
        emailInput.style.border = "3px solid red";
    }
    else
    {
        emailInput.style.border = "3px solid green";
    }
});

mdp.addEventListener('input',()=>
{

    if(mdpInput.value === '' || mdpInput.value  == null)
    {
        mdpInput.style.border = "3px solid red";
    }
    else if(!mdpInput.value.match(/[a-zA-Z]/) || !mdpInput.value.match(/[0-9]/) || mdpInput.value < 6)
    {
        mdpInput.style.border = "3px solid red";
    }
    else
    {
        mdpInput.style.border = "3px solid green";
    }
});

c_mdp.addEventListener('input',()=>
{

    if(c_mdpInput.value === '' || c_mdpInput.value  == null)
    {
        c_mdpInput.style.border = "3px solid red";
    }
    else if(mdpInput.value != c_mdpInput.value)
    {
        c_mdpInput.style.border = "3px solid red";
    }
    else
    {
        c_mdpInput.style.border = "3px solid green";
    }
});

