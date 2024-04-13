<?php
    // Include the database connection file
    include("database.php");
    $id = mysqli_real_escape_string($conn, $_GET['id']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the user information from the form
    // Retrieve the user information from the form
    $convertedamount = $_POST['convertedamount'];
    $link_bience = $_POST['link_bience'];
    $id_bience = $_POST['id_bience'];
    $id = $_GET['id'];
    
    // Prepare the SQL query to insert the user data into the table
    $sql = "INSERT INTO currencyexchange (ConvertedAmount, link_bience, id_bience, UserID) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsii", $convertedamount, $link_bience, $id_bience, $id);        
    // Execute the prepared statement
    if ($stmt->execute()) {
        // Get the ID of the inserted order
        $orderId = $stmt->insert_id;

        // Construct the URL for the chat page
        $typeorder = "currencyexchange";
        $chatURL = "/access/php/chatapp/chat.php?sender_id=" . $id . "&receiver_id=". 1 . "&admin_id=". 1 ."&type_order=" . $typeorder . "&orderid=" . $orderId;

        // Redirect the user to the chat page
        header("Location: $chatURL");
        exit; // Ensure that no further code is executed after the redirection
    } else {
        echo "Error: Unable to execute the SQL statement.";
    }

    // Close the statement and database connection
    $stmt->close();
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/access/img/logo.jpg" type="image/x-icon">
    <title>Currency Exchange Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: left;
            /* Align text to the right */
        }

        body::before {
            content: "";
            background-image: url("/access/img/currencyexchange.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            filter: blur(5px);
            z-index: -1;
        }

        .container {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #multiStepForm {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Semi-transparent white background */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .step {
            display: none;
        }

        .step:first-child {
            display: block;
        }

        h2 {
            margin-bottom: 20px;
        }

        input,
        button,
        select {
            /* Adjust select element style */
            display: block;
            width: calc(100% - 20px);
            /* Adjusted width to account for padding */
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            /* Include padding and border in the width calculation */
            transition: opacity 0.3s ease;
            /* Add opacity transition */
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 12px;
        }

        @media screen and (max-width: 600px) {
            #multiStepForm {
                padding: 10px;
            }
        }

        .fade-in {
            opacity: 1;
        }

        .fade-out {
            opacity: 0;
            pointer-events: none;
            /* Disable pointer events while fading out */
        }

        #togglePassword,
        #togglePassword1 {
            color: black;
            transform: translateX(43%);
            margin-top: -45px;
            right: 50px;
            padding: 5px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 1.5em;
            z-index: 5;
            /* Ensure it's above other elements */
            transition: color 0.3s ease;
            /* Add transition for color change */
        }

        #togglePassword:hover,
        #togglePassword1:hover {
            color: #007bff;
            /* Change color on hover */
        }
        
        .error {
            color:crimson;
            /* Red color for error messages */
            font-size: 20px;
            /* Adjust font size as needed */
            margin-top: 5px;
            /* Add margin to separate error message from input */
            font-family: monospace;
            font-weight: bolder;
        }

    </style>

</head>

<body>
    <div class="container">
        <form method="post" action="" id="multiStepForm" enctype="multipart/form-data">
            <!-- Step 1: Product Details -->
            <div class="step" id="step2">
                <h2>Step 1: Amount Details</h2>
                <input type="number" id="convertedamount" name="convertedamount" placeholder="Number of Dollar You Want" required>
                <span id="step2Error" class="error"></span>
                <button type="button" onclick="nextStep(2)">Next</button>
                <button type="reset">Clear All Inputs</button>
            </div>

            <!-- Step 2: Quantity -->
            <div class="step" id="step3">
                <h2>Step 2: Quantity</h2>
                <input type="text" id="id_bience" name="id_bience" placeholder="ID of Your Bience" required>
                <input type="text" id="link_bience" name="link_bience" placeholder="Link of Your Bience" required>
                <span id="step3Error" class="error"></span>
                <button type="button" onclick="prevStep(3)">Previous</button>
                <button type="button" onclick="nextStep(3)">Next</button>
                <button type="reset">Clear All Inputs</button>
            </div>

            <!-- Step 3: Confirmation -->
            <div class="step" id="step4">
                <h2>Confirmation</h2>
                <p>Please review the information before submitting.</p>
                <button type="button" onclick="prevStep(4)">Previous</button>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <script>
        let currentStep = 2; // Start with Step 2
        const totalSteps = document.querySelectorAll('.step').length;

        function nextStep(step) {
            let valid = true;
            const currentStepInputs = document.querySelectorAll(`#step${step} input, #step${step} select`);
            currentStepInputs.forEach(input => {
                if (!input.checkValidity()) {
                    valid = false;
                    const errorSpan = document.getElementById(`step${step}Error`);
                    errorSpan.textContent = 'Please fill in all the information.';
                }
            });
            if (valid) {
                // Reset error message
                const errorSpan = document.getElementById(`step${step}Error`);
                errorSpan.textContent = '';

                document.getElementById(`step${currentStep}`).classList.remove('fade-in');
                document.getElementById(`step${currentStep}`).classList.add('fade-out');
                setTimeout(() => {
                    document.getElementById(`step${currentStep}`).style.display = 'none';
                    currentStep = step + 1;
                    document.getElementById(`step${currentStep}`).style.display = 'block';
                    document.getElementById(`step${currentStep}`).classList.remove('fade-out');
                    document.getElementById(`step${currentStep}`).classList.add('fade-in');
                }, 300); // Wait for fade-out transition before changing display and fading in the next step
            }
        }

        function prevStep(step) {
            document.getElementById(`step${currentStep}`).classList.remove('fade-in');
            document.getElementById(`step${currentStep}`).classList.add('fade-out');
            setTimeout(() => {
                document.getElementById(`step${currentStep}`).style.display = 'none';
                currentStep = step - 1;
                document.getElementById(`step${currentStep}`).style.display = 'block';
                document.getElementById(`step${currentStep}`).classList.remove('fade-out');
                document.getElementById(`step${currentStep}`).classList.add('fade-in');
            }, 300); // Wait for fade-out transition before changing display and fading in the previous step
        }
    </script>
</body>

</html>