let parent = document.getElementById('joueur');
let table = document.getElementById('table');
let cellules = document.querySelectorAll('tr');
let grilles = document.querySelectorAll('td');
let suivant = document.getElementById('suivant');
let precedent = document.getElementById('precedent');
let nombreDeValeursParPages = 10;
let premier = 0;
affichageListe();

suivant.addEventListener('click',() =>
{
    if(premier + nombreDeValeursParPages <= cellules.length)
    {
        premier += nombreDeValeursParPages;
        affichageListe();
        precedent.style.visibility = "visible";
    }
    suivant.style.visibility = "hidden";
});

precedent.addEventListener('click',() =>
{
    if(premier - nombreDeValeursParPages >= 0)
    {
        premier -= nombreDeValeursParPages;
        affichageListe();
        suivant.style.visibility = "visible";
    }
    precedent.style.visibility = "hidden";
});

function affichageListe()
{
    let valeurs = "";
    for(let i = premier; i < premier + nombreDeValeursParPages; i++)
    {
        if(i < cellules.length)
        {
            valeurs += 
            `
            <tr>
                ${cellules[i].innerHTML}
            </tr>
            `;
        }
    }
    table.innerHTML = valeurs;
}