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
    const addBookForm = document.getElementById("addBookForm");
    addBookForm.addEventListener("submit", function(){
        const formData = {
            bookName: document.getElementById("bookName").value,
            authorName: document.getElementById("authorName").value,
            type: document.getElementById("type").value,
            targetDate: document.getElementById("targetDate").value}
            fetch("api/reading_list_api.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                addBookModal.classList.remove("show");
                window.location.reload();
            })
            .catch(error => console.error(error));
    });


});

