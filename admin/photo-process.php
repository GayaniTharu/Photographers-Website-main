<?php
include '../config.php'; // Database Connection

// Check if the form is submitted for adding a photo
if (isset($_POST['submit'])) {
    // Retrieve the selected category
    $category = $_POST['category'];

    // File upload logic
    $img = $_FILES['img']['name'];
    $imgTmp = $_FILES['img']['tmp_name'];

    // Set the target directory for uploading the photo
    $targetDirectory = "../uploads/";
    $targetFile = $targetDirectory . basename($img);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($imgTmp, $targetFile)) {
        // File upload successful
        $photoPath = $targetFile;

        // Insert data into the database
        $uploadedAt = date("Y-m-d H:i:s");
        $query = "INSERT INTO photos (photo_path, category, uploaded_at) VALUES ('$photoPath', '$category', '$uploadedAt')";

        if ($conn->query($query) === TRUE) {
            echo "Photo uploaded and saved successfully.";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        // File upload failed
        echo "Sorry, there was an error uploading your file.";
    }
}

if (isset($_POST['update'])) {
    $photo_id = $_POST['photo_id'];
    $category = $_POST['category'];

    // Check if a new image was uploaded
    if ($_FILES['img']['size'] > 0) {
        // Handle new image upload
        $new_photo_path = // ... upload new image ...
            $sql = "UPDATE photos SET photo_path = ?, category = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $new_photo_path, $category, $photo_id);
    } else {
        // Only update the category
        $sql = "UPDATE photos SET category = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $category, $photo_id);
    }

    if ($stmt->execute()) {
        // Redirect to photos.php with success message
        header("Location: photos.php?message=Photo updated successfully");
    } else {
        // Handle error
        echo "Error updating photo: " . $conn->error;
    }
}

// Check if a photo needs to be deleted
if (isset($_GET['photo_id'])) {
    $photoID = $_GET['photo_id'];

    // Perform the delete operation
    $sql_delete = "DELETE FROM photos WHERE id = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("i", $photoID);

    if ($stmt->execute()) {
        echo "
        <script>
            alert('Photo deleted successfully.');
            window.location.href = 'photos.php'; 
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error deleting photo');
            window.location.href = 'photos.php'; 
        </script>
        ";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
