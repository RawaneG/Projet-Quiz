let questionCompteurs = document.querySelectorAll('li');

let compteur = document.getElementById('compteur');

let conteneur = document.getElementById('conteneur');

let inputs = conteneur.querySelectorAll('.rep');

let suivant = document.getElementById('suivant');
let precedent = document.getElementById('precedent');

compteur.value = questionCompteurs.length;
compteur.setAttribute('disabled','disabled');

let input = conteneur.querySelectorAll('input');

let start = 0;
let nombreParPages = 5;

for(let i = 0; i < input.length; i++)
{
    input[i].setAttribute('disabled','disabled');
}

paginer();

suivant.addEventListener('click',() =>
{
    if(start + nombreParPages < questionCompteurs.length)
    {
        start += nombreParPages;
        paginer();
        precedent.style.visibility = "visible";
    }
    else
    {
        suivant.style.visibility = "hidden";
    }
});

precedent.addEventListener('click',() =>
{
    if(start - nombreParPages >= 0)
    {
        start -= nombreParPages;
        paginer();
        suivant.style.visibility = "visible";
    }
    else
    {
        precedent.style.visibility = "hidden";
    }
});

function paginer()
{
    let valeur = '';
    for (let i = start; i < start + nombreParPages; i++) 
    {
        if(i < questionCompteurs.length)
        {
            valeur += 
            `
            <ol>
            ${i+1} - ${questionCompteurs[i].innerHTML}
                <div>
                    ${inputs[i].innerHTML}
                </div>
            </ol>
            `;
        }
    }
    conteneur.innerHTML = valeur;
}

