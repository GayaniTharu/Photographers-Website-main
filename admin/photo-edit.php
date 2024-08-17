<?php
include '../config.php'; // Database Connection
session_start(); // Start the session
$username = $_SESSION['user_id'] ?? 'Guest';

// Check if photo_id is provided
if (!isset($_GET['photo_id'])) {
    die("No photo ID provided");
}

$photo_id = $_GET['photo_id'];

// Fetch the photo details
$sql = "SELECT * FROM photos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $photo_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Photo not found");
}

$photo = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Photo - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="assets/admin-style.css">
    <style>
        .admin__main form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .admin__main label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .admin__main input[type="file"],
        .admin__main select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .admin__main input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .admin__main input[type="submit"]:hover {
            background-color: #45a049;
        }

        .current-photo {
            max-width: 200px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="admin">
        <header class="admin__header">
            <a href="#" class="logo">
                <h1>Admin Dashboard</h1>
            </a>
            <div class="toolbar">
                <h3>Hello, Admin</h3>
                <a href="../login.php" class="logout">Log Out</a>
            </div>
        </header>
        <nav class="admin__nav">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="menu__item"><a class="menu__link" href="categories.php"><i class="fas fa-list"></i> Categories</a></li>
                <li class="menu__item"><a class="menu__link" href="photos.php"><i class="fas fa-image"></i> Add Photos</a></li>
                <li class="menu__item"><a class="menu__link" href="users.php"><i class="fas fa-users"></i> Booking Enquiries</a></li>
                <li class="menu__item"><a class="menu__link" href="../login.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            </ul>
        </nav>
        <main class="admin__main">
            <h2>Edit Photo</h2>
            <form action="photo-process.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="photo_id" value="<?php echo htmlspecialchars($photo['id']); ?>">

                <label for="current_photo">Current Photo:</label>
                <img src="../uploads/<?php echo htmlspecialchars($photo['photo_path']); ?>" alt="Current Photo" class="current-photo">

                <label for="img">Update Photo (leave blank to keep current photo):</label>
                <input type="file" id="img" name="img">

                <label for="category">Category:</label>
                <?php
                // Retrieve categories from the database
                $sql_category = "SELECT * FROM categories";
                $sql_category_run = $conn->query($sql_category);

                // Check if there are any categories
                if ($sql_category_run->num_rows > 0) {
                ?>
                    <select name="category" id="category" required>
                        <?php
                        // Loop through each category
                        while ($row_category = $sql_category_run->fetch_assoc()) {
                            $categoryName = $row_category['name'];
                            $selected = ($categoryName === $photo['category']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo htmlspecialchars($categoryName); ?>" <?php echo $selected; ?>><?php echo htmlspecialchars($categoryName); ?></option>
                        <?php
                        }
                        ?>
                    </select>
                <?php
                } else {
                    echo "No categories found.";
                }
                ?>
                <input type="submit" value="Update" name="update">
            </form>
        </main>
    </div>
</body>

</html>