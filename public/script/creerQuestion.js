const ajout = document.getElementById('ajout');
const selection = document.getElementById('selection');
const videur = document.getElementById('videur');
const btn = document.getElementById('btn');

let i = 1;

function rebuild() 
{
    const reponses = document.querySelectorAll('.lab');
    reponses.forEach((rep,i) =>
    {
        rep.innerHTML = 'Reponse '+(i+1)
    });
}

function rebuilt()
{
    const checkBoxes = document.querySelectorAll('.check');
    checkBoxes.forEach((rep,i) => 
    {
        rep.value = i + 1;
        console.log(rep.value); 
    })
}
    ajout.addEventListener('click', () =>
    {
        let reponse = document.createElement('div');

        let label = document.createElement('label');
        label.className='lab';

        let checkBox = document.createElement('input');
        let checkBoxText = document.createElement('input');
        checkBox.className = 'check';
        let radio = document.createElement('input');
        let radioText = document.createElement('input');

        let img = document.createElement('img');

        reponse.setAttribute('class','reponse');

        radio.setAttribute('type','radio');
        radio.setAttribute('name','radio');

        radioText.setAttribute('type','text');
        radioText.setAttribute('name','radioText[]');


        checkBox.setAttribute('type','checkbox');
        checkBox.setAttribute('name','checkbox[]');
        checkBox.setAttribute('value',`${i}`);

        checkBoxText.setAttribute('type','text');
        checkBoxText.setAttribute('name','checkBoxText[]');

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
            rebuilt();
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



