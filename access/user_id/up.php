<?php
if (isset($_POST['submit'])) {
    // Get the ID of the user to update
    $id = $_POST['id'];

    // Retrieve the updated values from the form fields
    $updated_firstname = $_POST['firstname'];
    $updated_lastname = $_POST['lastname'];
    $updated_gmail = $_POST['gmail'];
    $password= md5($_POST['password']);
    // Include the database connection file
    include("database.php");

    // Prepare the SQL query to update the user
    $sql = "UPDATE users SET firstname='$updated_firstname', lastname='$updated_lastname', gmail='$updated_gmail' WHERE id='$id'";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        // Redirect to a success page or display a success message
        header("Location: /access/login_form/index.php?user_id=$id");
        exit; // Stop script execution after redirection
    } else {
        // If there's an error, display the error message
        echo "Error updating user: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
