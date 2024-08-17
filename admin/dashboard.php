<?php
include '../config.php'; // Database Connection
session_start(); // Start the session
$username = $_SESSION['user_id'] ?? 'Guest';

function getCount($table)
{
  global $conn;
  $sql = "SELECT COUNT(*) AS total FROM $table";
  $result = $conn->query($sql);
  return ($result && $result->num_rows > 0) ? $result->fetch_assoc()['total'] : 0;
}

$cards = [
  ['title' => 'Categories', 'count' => getCount('categories'), 'link' => 'categories.php', 'icon' => 'fa-folder'],
  ['title' => 'Photos', 'count' => getCount('photos'), 'link' => 'photos.php', 'icon' => 'fa-camera'],
  ['title' => 'Booking Enquiries', 'count' => getCount('enquiries'), 'link' => 'users.php', 'icon' => 'fa-calendar-check'],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Photography Studio</title>
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
      background-color: #2c3e50;
      color: #ecf0f1;
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
      color: #ecf0f1;
      margin-bottom: 30px;
    }

    .menu {
      list-style-type: none;
    }

    .menu__item {
      margin-bottom: 10px;
    }

    .menu__link {
      color: #ecf0f1;
      text-decoration: none;
      display: block;
      padding: 10px;
      transition: background-color 0.3s;
      border-radius: 5px;
    }

    .menu__link:hover {
      background-color: #34495e;
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
      color: #2c3e50;
    }

    .dashboard-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .card {
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h3 {
      margin-bottom: 10px;
      color: #2c3e50;
    }

    .card .count {
      font-size: 2.5rem;
      font-weight: bold;
      color: #3498db;
      margin-bottom: 10px;
    }

    .card a {
      display: inline-block;
      padding: 8px 16px;
      background-color: #3498db;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    .card a:hover {
      background-color: #2980b9;
    }

    .card-icon {
      font-size: 3rem;
      margin-bottom: 15px;
      color: #3498db;
    }
  </style>
</head>

<body>
  <div class="admin">
    <nav class="admin__nav">
      <div class="logo">
        <h1>Photo Studio Admin</h1>
      </div>
      <ul class="menu">
        <li class="menu__item"><a class="menu__link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="menu__item"><a class="menu__link" href="categories.php"><i class="fas fa-folder"></i> Categories</a></li>
        <li class="menu__item"><a class="menu__link" href="photos.php"><i class="fas fa-camera"></i> Photos</a></li>
        <li class="menu__item"><a class="menu__link" href="users.php"><i class="fas fa-calendar-check"></i> Booking Enquiries</a></li>
        <li class="menu__item"><a class="menu__link" href="../index.html"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
      </ul>
    </nav>
    <div class="admin__content">
      <header class="admin__header">
        <h2>Dashboard</h2>
        <div class="toolbar">
          <a href="../index.html" class="logout">Log Out</a>
        </div>
      </header>
      <main class="admin__main">
        <div class="dashboard-cards">
          <?php foreach ($cards as $card) : ?>
            <div class="card">
              <div class="card-icon">
                <i class="fas <?php echo $card['icon']; ?>"></i>
              </div>
              <h3><?php echo htmlspecialchars($card['title']); ?></h3>
              <div class="count"><?php echo $card['count']; ?></div>
              <a href="<?php echo $card['link']; ?>">View All</a>
            </div>
          <?php endforeach; ?>
        </div>
      </main>
    </div>
  </div>
</body>

</html>