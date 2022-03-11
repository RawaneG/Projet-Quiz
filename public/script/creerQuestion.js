const ajout = document.getElementById('ajout');
const selection = document.getElementById('selection');
const videur = document.getElementById('videur');

let i = 1;

    ajout.addEventListener('click', () =>
    {
        let reponse = document.createElement('div');

        let label = document.createElement('label');

        let checkBox = document.createElement('input');
        let checkBoxText = document.createElement('input');

        let radio = document.createElement('input');
        let radioText = document.createElement('input');

        let img = document.createElement('img');

        reponse.setAttribute('class','reponse');

        radio.setAttribute('type','radio');
        radio.setAttribute('name','radio');

        radioText.setAttribute('type','text');
        radioText.setAttribute('name','radioText[]');

        checkBox.setAttribute('type','checkbox');
        checkBox.setAttribute('name','checkbox');

        checkBoxText.setAttribute('type','text');
        checkBoxText.setAttribute('name','checkBoxText[]');

        img.setAttribute('src','../public/img/supprimer.png');
        img.setAttribute('onclick','remove()');

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
        let img = document.createElement('img');

        reponse.setAttribute('class','reponse');
        label.innerHTML = `Réponse`;
        text.setAttribute('type','text');
        text.setAttribute('name','singleText');
        img.setAttribute('src','../public/img/supprimer.png');

        reponse.appendChild(label);
        reponse.appendChild(text);
        reponse.appendChild(img);
        videur.appendChild(reponse);

        img.addEventListener('click',() => 
        {
            reponse.remove();
        })
    }   
}