<?php
include './config.php';

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO enquiries (name, email, phone, event_date, event_location, event_type, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $email, $phone, $event_date, $event_location, $event_type, $message);

// Set parameters
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$event_date = $_POST['event_date'];
$event_location = $_POST['event_location'];
$event_type = $_POST['event_type'];
$message = $_POST['message'];

// Execute the statement
$success = $stmt->execute();

$stmt->close();
$conn->close();

// Create the alert message
if ($success) {
    $alert_message = "New enquiry submitted successfully";
} else {
    $alert_message = "Error: " . $stmt->error;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Enquiry Submission</title>
    <script type="text/javascript">
        function showAlert() {
            alert("<?php echo $alert_message; ?>");
            window.location.href = "contact.php";
        }
    </script>
</head>

<body onload="showAlert()">
    <!-- The form or other content can go here -->
</body>

</html>