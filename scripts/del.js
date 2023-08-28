let delBtn = document.querySelector('#del');
let del = document.querySelector('.del');

delBtn.addEventListener('click', function() {

    if ( del.style.display == "block") {
        del.style.display = "none";
    } else {        
        del.style.display = "block";
    }

})