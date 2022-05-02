
const autre = document.querySelector('.autre-message');
const particulier = document.querySelector('.particulier-message')


const addClass = document.querySelector('div .display-message ');



autre.onclick = ()=>{

    addClass.classList.add("apparai-message");


}

particulier.onclick = () =>{
    autre.classList.remove('display-message')
}

