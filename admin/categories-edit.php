<?php
include '../config.php'; // Database Connection

// Check if the form is submitted
if (isset($_POST['editCategory'])) {
    // Retrieve form data
    $categoryID = $_POST['categoryID'];
    $categoryName = $_POST['cName'];

    // Perform the update query
    $sql = "UPDATE categories SET name = '$categoryName', updated_at = NOW() WHERE category_id = '$categoryID'";

    if ($conn->query($sql) === TRUE) {
        echo "
        <script>
            alert('Category updated successfully.');
            window.location.href = 'categories.php'; // Redirect to the categories page
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error updating category: " . mysqli_error($conn) . "');
            window.location.href = 'categories.php'; // Redirect to the categories page
        </script>
        ";
    }
} else {
    // Retrieve the category ID from the URL
    $categoryID = $_GET['category_id'];

    // Fetch category data from the database
    $sql = "SELECT * FROM categories WHERE category_id = '$categoryID'";
    $result = $conn->query($sql);
    $category = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/admin-style.css">
</head>

<body>
    <div class="admin">
        <main class="admin__main">
            <h2>Edit Category</h2>
            <form action="categories-edit.php" method="POST">
                <input type="hidden" name="categoryID" value="<?php echo $category['category_id']; ?>">
                <label for="cName">Category Name:</label>
                <input type="text" id="cName" name="cName" required value="<?php echo $category['name']; ?>">

                <input type="submit" value="Update" name="editCategory">
            </form>
        </main>
    </div>
</body>

</html>