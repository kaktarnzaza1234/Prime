<?php
// Include the necessary files for DB connection
include("include.php");

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values
    $user_id = $_POST['user_id'];  // The hidden user_id
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Sanitize input to prevent XSS
    $firstName = htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8');
    $lastName = htmlspecialchars($lastName, ENT_QUOTES, 'UTF-8');
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

    // Update the user record in the database
    $strSQL = "UPDATE users SET firstName = ?, lastName = ?, username = ?, email = ? WHERE user_id = ?";
    $stmt = $conn->prepare($strSQL);

    // Bind the parameters to the SQL query
    $stmt->bind_param("ssssi", $firstName, $lastName, $username, $email, $user_id);

    // Execute the update query
    if ($stmt->execute()) {
        // If the update is successful, redirect or show a success message
        echo "Profile updated successfully!";
        // You can redirect to another page after successful update
        header("Location: profile.php");  // Redirect to profile page
        exit();
    } else {
        // If there is an error, show the error message
        echo "Error updating profile: " . $conn->error;
    }
}
