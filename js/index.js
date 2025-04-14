document.addEventListener("DOMContentLoaded", function(){
    const addBookBtn = document.getElementById("addBookBtn");
    const addBookModal = document.getElementById("addBookModal");
    const close = document.getElementById("close");
    addBookBtn.addEventListener("click", function(){
        addBookModal.classList.add("show")
    });

    close.addEventListener("click", function(){
        addBookModal.classList.remove("show");
    });
});