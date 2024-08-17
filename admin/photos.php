<?php
include '../config.php'; // Database Connection
session_start(); // Start the session
$username = $_SESSION['user_id'] ?? 'Guest';

// Fetch photos
$sql = "SELECT * FROM photos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Photos - Gentex iPhone Shop Admin</title>
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
      margin-top: 20px;
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

    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      margin-bottom: 20px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    .action-link {
      color: #333;
      margin-right: 10px;
      font-size: 18px;
    }

    .action-link:hover {
      color: #4CAF50;
    }

    .del-badge {
      color: #f44336;
    }

    .del-badge:hover {
      color: #d32f2f;
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
        <h2>Photos</h2>
        <div class="toolbar">
        </div>
      </header>
      <main class="admin__main">
        <a href="photo-add.php" class="btn"><i class="fas fa-plus"></i> Add Photo</a>
        <table>
          <thead>
            <tr>
              <th>Photo ID</th>
              <th>Photo</th>
              <th>Category</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td><img src='../uploads/" . htmlspecialchars($row['photo_path']) . "' alt='photo' style='width: 80px; height: 80px; object-fit: cover;'></td>";
                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                echo "<td>
                                    <a href='photo-edit.php?photo_id=" . $row['id'] . "' class='action-link' title='Edit'><i class='fas fa-edit'></i></a>
                                    <a href='photo-process.php?photo_id=" . $row['id'] . "' class='action-link del-badge' title='Delete'><i class='fas fa-trash'></i></a>
                                </td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='4'>No photos found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </main>
    </div>
  </div>
</body>

</html>