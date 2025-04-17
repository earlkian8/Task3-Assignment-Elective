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

    getList();
    const addBookForm = document.getElementById("addBookForm");
    addBookForm.addEventListener("submit", function(){
        addList();
    });

    const editBookForm = document.getElementById("editBookForm");
    editBookForm.addEventListener("submit", function(){
        editList();
    });

    const deleteConfirmModal = document.getElementById("deleteConfirmModal");
    deleteConfirmModal.addEventListener("submit", function(){
        deleteList();
    });

});

function addList(){
    const selectedType = document.querySelector('input[name="bookType"]:checked');
    if (!selectedType) {
        alert("Please select a book type");
        return false;
    }

    const formData = {
        bookName: document.getElementById("bookName").value.trim(),
        authorName: document.getElementById("authorName").value.trim(),
        type: selectedType.value,
        targetDate: document.getElementById("targetDate").value
    }

    fetch("api/reading_list_api.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("addBookModal").classList.remove("show");
        document.getElementById("addBookForm").reset();
        document.getElementById("contentTbody").innerHTML = "";
        getList();
    })
    .catch(error => console.error(error));
    
    return false;
}

function getList(){
    fetch("api/reading_list_api.php")
    .then(response => response.json())
    .then(data => {
        if(data.status === "success"){
            data.lists.forEach(list => {
                document.getElementById("contentTbody").innerHTML += `
                        <tr class="tr-body-style">
                            <td class="td-style" id="atd"><input type="checkbox" data-id="${list.read_id}" class="checkboxstyle" 
                                    ${list.status === 'Completed' ? 'checked' : ''}></td>
                            <td class="td-style">${list.book_name}</td>
                            <td class="td-style">${list.author_name}</td>
                            <td class="td-style">${list.type}</td>
                            <td class="td-style">${list.target_date}</td>
                            <td class="td-style">${list.status}</td>
                            <td class="action-td-style">
                                <button class="edit-button-style" edit-id=${list.read_id}>Edit</button>
                                <button class="delete-button-style" delete-id=${list.read_id}>Delete</button>
                            </td>
                        </tr>
            `;
            });

            document.querySelectorAll(".edit-button-style").forEach(button =>{
                button.addEventListener("click", function(){
                    const id = this.getAttribute("edit-id");
                    const listData = data.lists.find(l => l.read_id == id);
                    if(listData){
                        editModal(listData);
                    }
                });
            });

            document.querySelectorAll(".delete-button-style").forEach(button =>{
                button.addEventListener("click", function(){
                    const id = this.getAttribute("delete-id");
                    const listData = data.lists.find(l => l.read_id == id);
                    if(listData){
                        deleteList(listData);
                    }
                });
            });

            document.querySelectorAll(".checkboxstyle").forEach(button =>{
                button.addEventListener("change", function(){
                    const id = this.getAttribute("data-id");
                    const listData = data.lists.find(l => l.read_id == id);
                    if(listData){
                        actionComplete(listData);
                    }
                });
            })
        }
    })
    .catch(error => console.error(error));
}

function editModal(listData){
    document.getElementById("editId").value = listData.read_id;
    document.getElementById("editBookName").value = listData.book_name;
    document.getElementById("editAuthorName").value = listData.author_name;
    document.getElementById("editTargetDate").value = listData.target_date;
    if (listData.type === "Fiction") {
        document.getElementById("editFiction").checked = true;
    } else if (listData.type === "Non-Fiction") {
        document.getElementById("editNonFiction").checked = true;
    }

    document.getElementById("editBookModal").classList.add("show");

    document.getElementById("closeEdit").addEventListener("click", function(event){
        event.preventDefault();
        document.getElementById("editBookModal").classList.remove("show");
    });
}

function editList(){
    const selectedEditType = document.querySelector('input[name="editBookType"]:checked');
    if (!selectedEditType) {
        alert("Please select a book type");
        return false;
    }

    const formData = {
        editId: Number(document.getElementById("editId").value),
        editBookName: document.getElementById("editBookName").value.trim(),
        editAuthorName: document.getElementById("editAuthorName").value.trim(),
        editBookType: selectedEditType.value,
        editTargetDate: document.getElementById("editTargetDate").value
    }

    fetch("api/reading_list_api.php", {
        method: "PUT",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("editBookModal").classList.remove("show");
        document.getElementById("contentTbody").innerHTML = "";
        getList()
    })
    .catch(error => console.error(error));
    
    return false;
}

function deleteList(listData){
    document.getElementById("deleteConfirmModal").classList.add("show");

    document.getElementById("cancelDelete").addEventListener("click", function(event){
        event.preventDefault();
        document.getElementById("deleteConfirmModal").classList.remove("show");
    });

    document.getElementById("closeDelete").addEventListener("click", function(event){
        event.preventDefault();
        document.getElementById("deleteConfirmModal").classList.remove("show");
    });

    const formData = {
        deleteId: listData.read_id
    }
    fetch("api/reading_list_api.php",{
        method: "DELETE",
        headers: { "Content-Type": "application/json"},
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data =>{

    })
    .catch(error => console.error(error));
}


function actionComplete(listData) {
    const checkbox = document.querySelector(`.checkboxstyle[data-id="${listData.read_id}"]`);
    const newStatus = checkbox.checked ? "Completed" : "Ongoing";
    
    const formData = {
        readId: listData.read_id,
        status: newStatus
    };
    
    fetch("api/reading_list_api.php", {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        const row = checkbox.closest('tr');
        row.querySelector('td:nth-child(6)').textContent = newStatus;
    })
    .catch(error => {
        console.error(error);
        checkbox.checked = !checkbox.checked;
    });
}
