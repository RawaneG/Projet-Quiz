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

function load(photo) {

    const img = document.getElementById('img')
    img.src = window.URL.createObjectURL(photo.files[0]);
}

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

disabled(submit);

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
    else if(!emailInput.value.match(/^[\w-\.]+@(gmail)+.(com)$/g))
    {
        emailInput.style.border = "3px solid red";
    }
    else
    {
        emailInput.style.border = "3px solid green";
        mdp.addEventListener('input',()=>
        {

            if(mdpInput.value === '' || mdpInput.value  == null)
            {
                mdpInput.style.border = "3px solid red";
            }
            else if(valid_password(mdpInput))
            {
                mdpInput.style.border = "3px solid red";
            }
            else
            {
                mdpInput.style.border = "3px solid green";
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
                        enable(submit);
                    }
                });
            }
        });
    }
});


function success()
{
    alert('Un administrateur a été crée avec succès');
}