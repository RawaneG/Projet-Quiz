const ajout = document.getElementById('ajout');
const selection = document.getElementById('selection');
const videur = document.getElementById('videur');
const btn = document.getElementById('btn');
const plus = document.getElementById('plus');
const moins = document.getElementById('moins');
const erreur = document.getElementById('erreur');
const point = document.getElementById('point');
point.value = 1;

plus.addEventListener('click',() => 
{
    erreur.removeAttribute('class');
    erreur.innerHTML = "";
    point = point.value++;
});

moins.addEventListener('click',() => 
{
    if(point.value <= 0)
    {
        erreur.setAttribute('class','erreur');
        erreur.innerHTML = "Aucune valeur négative n'est autorisée";
        point.value = 1;
    }
    else
    {
        erreur.removeAttribute('class');
        erreur.innerHTML = "";
        point = point.value--;
    }
});

point.addEventListener('input',() => 
{
    if(point.value <= 0)
    {
        erreur.setAttribute('class','erreur');
        erreur.innerHTML = "Aucune valeur négative n'est autorisée";
        point.value = 1;
    }
    else
    {
        erreur.removeAttribute('class');
        erreur.innerHTML = "";
    }
});

let i = 1;

function rebuild() 
{
    const reponses = document.querySelectorAll('.lab');
    reponses.forEach((rep,i) =>
    {
        rep.innerHTML = 'Reponse '+(i+1)
    });
}

function checkBoxRebuild()
{
    const checkBoxes = document.querySelectorAll('.checkBoxCheck');
    checkBoxes.forEach((rep,i) => 
    {
        rep.value = i + 1;
    })
}

function radioRebuild()
{
    const radios = document.querySelectorAll('.radioCheck');
    radios.forEach((rep,i) => 
    {
        rep.value = i + 1;
    })
}
    ajout.addEventListener('click', () =>
    {
        let reponse = document.createElement('div');

        let label = document.createElement('label');
        label.className='lab';

        let checkBox = document.createElement('input');
        let checkBoxText = document.createElement('input');
        checkBox.className = 'checkBoxCheck';

        let radio = document.createElement('input');
        let radioText = document.createElement('input');
        radio.className = 'radioCheck';

        let img = document.createElement('img');

        reponse.setAttribute('class','reponse');

        radio.setAttribute('type','radio');
        radio.setAttribute('name','radio');


        radioText.setAttribute('type','text');
        radioText.setAttribute('name','radioText[]');


        checkBox.setAttribute('type','checkbox');
        checkBox.setAttribute('name','checkbox[]');

        checkBoxText.setAttribute('type','text');
        checkBoxText.setAttribute('name','checkBoxText[]');

        checkBoxText.addEventListener('input',() => 
        {
            checkBox.value = checkBoxText.value;
        });

        radioText.addEventListener('input', () => 
        {
            radio.value = radioText.value
        });

        img.setAttribute('src','../public/img/supprimer.png');

        if(selection.value == 1)
        {         
            label.innerHTML = `Réponse ${i}`;
            reponse.appendChild(label);
            reponse.appendChild(radioText);
            reponse.appendChild(radio);
            reponse.appendChild(img);
            videur.appendChild(reponse);

            i++;
        }
        if(selection.value == 2) 
        { 
            label.innerHTML = `Réponse ${i}`;
            reponse.appendChild(label);
            reponse.appendChild(checkBoxText);
            reponse.appendChild(checkBox);
            reponse.appendChild(img);
            videur.appendChild(reponse);

            i++;
        }  

         img.addEventListener('click',() => 
         {
            reponse.remove();
            rebuild();
            checkBoxRebuild();
            radioRebuild();;
         });

     });

function change()
{
    videur.innerHTML = "";

    i = 1;

    if(selection.value == 3) 
    {     
 
        let reponse = document.createElement('div');
        let label = document.createElement('label');
        let text = document.createElement('input');

        reponse.setAttribute('class','reponse');
        label.innerHTML = `Réponse`;
        text.setAttribute('type','text');
        text.setAttribute('name','singleText');

        reponse.appendChild(label);
        reponse.appendChild(text);
        videur.appendChild(reponse);

    }   
}



