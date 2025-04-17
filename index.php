<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reading List</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
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
                    <tbody>
                        <tr class="tr-body-style">
                            <td class="td-style" id="atd"><input type="checkbox"></td>
                            <td class="td-style">The Archivist of the forgotten Usman</td>
                            <td class="td-style">Albriane</td>
                            <td class="td-style">100</td>
                            <td class="td-style">04-14-2025</td>
                            <td class="td-style">Ongoing</td>
                            <td class="action-td-style">
                                <button class="edit-button-style">Edit</button>
                                <button class="delete-button-style">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <tbody>

                </tbody>
            </div>
        </div>
        <script src="js/index.js"></script>
    </body>
<html>
