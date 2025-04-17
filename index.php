<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reading List</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <!-- Create Modal -->
        <div id="addBookModal" class="modal">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Book</h2>
                <span class="close" id="close">&times;</span>
            </div>
            <form id="addBookForm" action="index.php" method="POST">
                <div class="form-group">
                <label for="bookName">Book Name</label>
                <input type="text" id="bookName" name="bookName" required>
                </div>
                <div class="form-group">
                <label for="authorName">Author Name</label>
                <input type="text" id="authorName" name="authorName" required>
                </div>
                <div class="form-group">
                <label for="bookType">Type</label>
                <select id="bookType" name="bookType" required>
                    <option value="">Select a type</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-Fiction">Non-Fiction</option>
                </select>
                </div>
                <div class="form-group">
                <label for="targetDate">Target Date</label>
                <input type="date" id="targetDate" name="targetDate" required>
                </div>
                <div class="modal-footer">
                <button type="submit" class="submit-btn">Add Book</button>
                </div>
            </form>
            </div>
        </div>

        <!-- Edit Modal -->
        <div id="editBookModal" class="modal">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Book</h2>
                <span class="close" id="closeEdit">&times;</span>
            </div>
            <form id="editBookForm">
                <div class="form-group">
                <input type="hidden" name="editId" id="editId">
                <label for="editBookName">Book Name</label>
                <input type="text" id="editBookName" name="editBookName" required>
                </div>
                <div class="form-group">
                <label for="editAuthorName">Author Name</label>
                <input type="text" id="editAuthorName" name="editAuthorName" required>
                </div>
                <div class="form-group">
                <label for="editBookType">Type</label>
                <select id="editBookType" name="editBookType" required>
                    <option value="">Select a type</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-Fiction">Non-Fiction</option>
                </select>
                </div>
                <div class="form-group">
                <label for="editTargetDate">Target Date</label>
                <input type="date" id="editTargetDate" name="editTargetDate" required>
                </div>
                <div class="modal-footer">
                <button type="submit" class="submit-btn">Update Book</button>
                </div>
            </form>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <form id="deleteConfirmModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Confirm Deletion</h2>
                    <span class="close" id="closeDelete">&times;</span>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this book?</p>
                    <input type="hidden" id="deleteId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="cancel-btn" id="cancelDelete">Cancel</button>
                    <button type="submit" class="delete-btn" id="confirmDelete">Delete</button>
                </div>
            </div>
        </form>

        <div class="box-container">
            <div class="button-container">
                <button class="add-button-style" id="addBookBtn">Add Book</button>
            </div>
            <div class="table-container">
                <table class="table-style">
                    <thead>
                        <tr class="tr-head-style">
                            <th class="th-style" id="a"></th>
                            <th class="th-style" id="b">Book Name</th>
                            <th class="th-style" id="c">Author Name</th>
                            <th class="th-style" id="d">Ouch Count</th>
                            <th class="th-style" id="e">Target Date</th>
                            <th class="th-style" id="f">Status</th>
                            <th class="th-style" id="g">Action</th>
                        </tr>
                    </thead>
                    <tbody id="contentTbody">
                        
                    </tbody>
                </table>
                <tbody>

                </tbody>
            </div>
        </div>
        <script src="js/index.js"></script>
    </body>
<html>
