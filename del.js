let delBtn = document.querySelector('#del');
let del = document.querySelector('.del');

delBtn.addEventListener('click', function() {

    if ( del.style.display == "none") {
        del.style.display = "block";
    } else {        
        del.style.display = "none";
    }

})