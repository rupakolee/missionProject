let add = document.querySelector('#add');
let addSec = document.querySelector('.add-section');
let cancel = document.querySelector('#cancel');

add.addEventListener('click',  function() {
    addSec.style.position = "relative";
    addSec.style.left = "0";
    addSec.style.transition = "all 0.5s";
})

cancel.addEventListener('click', function(){
        addSec.style.position="absolute";
        addSec.style.left="-400px";
        addSec.style.transition = "all 0.5s";
})