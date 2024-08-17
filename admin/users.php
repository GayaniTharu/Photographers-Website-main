<?php
include '../config.php'; // Database Connection
session_start(); // Start the session

// Fetch enquiries from the database
$sql = "SELECT * FROM enquiries ORDER BY submission_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Enquiries - Admin Dashboard</title>
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
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
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
                <li class="menu__item"><a class="menu__link" href="../index.html"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            </ul>
        </nav>
        <div class="admin__content">
            <header class="admin__header">
                <h2>Booking Enquiries</h2>
                <div class="toolbar">
                    <a href="../login.php" class="logout">Log Out</a>
                </div>
            </header>
            <main class="admin__main">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Event Date</th>
                            <th>Event Location</th>
                            <th>Event Type</th>
                            <th>Message</th>
                            <th>Submission Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['event_date']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['event_location']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['event_type']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['submission_date']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No enquiries found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</body>

</html>