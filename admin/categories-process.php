<?php
include '../config.php'; // Database Connection

if (isset($_POST['addCategory'])) {
    // Retrieve the form data
    $categoryName = $_POST['cName'];

    // Insert the category data into the database
    $sql = "INSERT INTO categories (name, created_at) VALUES ('$categoryName', NOW())";

    if (mysqli_query($conn, $sql)) {
        // Category added successfully
        echo "
        <script>
            alert('Category added successfully!');
            window.location.href = 'categories.php'; 
        </script>
        ";
    } else {
        // Error occurred while adding the category
        echo "
        <script>
            alert('Error: " . mysqli_error($conn) . "');
            window.location.href = 'categories.php'; 
        </script>
        ";
    }
} elseif (isset($_POST['editCategory'])) {
    // Retrieve form data
    $categoryName = $_POST['cName'];

    // Retrieve the category ID from the form or any other source
    $categoryID = $_POST['categoryID'];

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
} elseif (isset($_GET['category_id'])) { // Delete Category ================================================================================
    $categoryID = $_GET['category_id'];

    // Perform the delete operation
    $sql = "DELETE FROM categories WHERE category_id = $categoryID";
    if ($conn->query($sql) === TRUE) {
        echo "
        <script>
            alert('Category deleted successfully.');
            window.location.href = 'categories.php'; 
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error deleting category: " . mysqli_error($conn) . "');
            window.location.href = 'categories.php'; 
        </script>
        ";
    }
}

// Close the database connection
mysqli_close($conn);
