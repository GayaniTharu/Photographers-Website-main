<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include '../config.php'; // Database Connection
  // include '../includes/header.php';
  session_start(); // Start the session
  $username = $_SESSION['user_id'];
  ?>
  <link rel="stylesheet" href="assets/admin-style.css">
</head>

<body>

  <div class="admin">
    <header class="admin__header">
      <a href="#" class="logo">
        <h1>Admin Dashboard</h1>
      </a>
      <div class="toolbar">
        <h3> Hello, Admin</h3>
        <a href="../login.php" class="logout">
          Log Out
        </a>
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
      <h2>Add Product</h2>
      <form action="photo-process.php" method="POST" enctype="multipart/form-data">
        <label for="img">Select Photo:</label>
        <input type="file" id="img" name="img" required>

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
            ?>
              <option value="<?php echo $categoryName; ?>"><?php echo $categoryName; ?></option>
            <?php
            }
            ?>
          </select>
        <?php
        } else {
          echo "No categories found.";
        }
        ?>
        <input type="submit" value="Submit" name="submit">
      </form>

    </main>

  </div>
</body>

</html>