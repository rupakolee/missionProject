let editBtn = document.querySelector('#edit');
let edit = document.querySelector('.edit-section');

editBtn.addEventListener('click', function() {
    edit.style.position = "relative";
    edit.style.left = "0";
    edit.style.transition = "all 0.5s";
})