<?php
include '../config.php'; // Database Connection
session_start(); // Start the session
$username = $_SESSION['user_id'] ?? 'Guest';

// Fetch categories
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - Gentex iPhone Shop Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .admin {
            display: flex;
            min-height: 100vh;
        }

        .admin__nav {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .admin__content {
            flex-grow: 1;
            margin-left: 250px;
            display: flex;
            flex-direction: column;
        }

        .admin__main {
            flex-grow: 1;
            padding: 20px;
        }

        .logo h1 {
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 30px;
        }

        .menu {
            list-style-type: none;
        }

        .menu__item {
            margin-bottom: 10px;
        }

        .menu__link {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            transition: background-color 0.3s;
        }

        .menu__link:hover {
            background-color: #555;
        }

        .admin__header {
            background-color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .toolbar {
            display: flex;
            align-items: center;
        }

        .logout {
            color: #333;
            text-decoration: none;
            margin-left: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .edit-badge,
        .del-badge {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            color: #fff;
            font-size: 14px;
            margin-right: 5px;
        }

        .edit-badge {
            background-color: #4CAF50;
        }

        .del-badge {
            background-color: #f44336;
        }

        .add-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .add-form form {
            display: flex;
            flex-direction: column;
        }

        .add-form input[type="text"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .add-form input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="admin">
        <nav class="admin__nav">
            <div class="logo">
                <h1>Admin Dashboard</h1>
            </div>
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="menu__item"><a class="menu__link" href="categories.php"><i class="fas fa-list"></i> Categories</a></li>
                <li class="menu__item"><a class="menu__link" href="photos.php"><i class="fas fa-image"></i> Add Photos</a></li>
                <li class="menu__item"><a class="menu__link" href="users.php"><i class="fas fa-users"></i> Booking Enquiries</a></li>
                <li class="menu__item"><a class="menu__link" href="../login.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            </ul>
        </nav>
        <div class="admin__content">
            <header class="admin__header">
                <h2>Categories</h2>
                <div class="toolbar">

                </div>
            </header>
            <main class="admin__main">
                <table>
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['category_id']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['updated_at']) . "</td>";
                                echo "<td>
                                    <a href='categories-edit.php?category_id=" . $row['category_id'] . "' class='edit-badge'><i class='fas fa-edit'></i> </a>
                                    <a href='categories-process.php?category_id=" . $row['category_id'] . "' class='del-badge'><i class='fas fa-trash'></i></a>
                                </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No categories found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <div class="add-form">
                    <h2>Add Category</h2>
                    <form action="categories-process.php" method="POST">
                        <input type="text" id="cName" name="cName" required placeholder="Enter Category Name">
                        <input type="submit" value="Add Category" name="addCategory">
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>