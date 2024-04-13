<?php
// Establish a database connection
include("../database.php"); // assuming this file contains your database connection code

// Assuming $admin_id contains the ID of the logged-in admin
$admin_id = $_GET['id']; // Assuming you store admin ID in session after login

// Query to retrieve admin's first and last name based on the admin ID
$sql = "SELECT firstname, lastname FROM admins WHERE id = $admin_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the admin's first and last name
    $row = $result->fetch_assoc();
    $admin_firstname = $row['firstname'];
    $admin_lastname = $row['lastname'];
} else {
    header("location: \index.php");
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="/access/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="/access/admin_file/index.php?adminid=<?php echo $_GET['id']; ?>">Transa<span>Versa</span></a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Admin Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Add ADS
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/access/admin_file/add_ads.php?id=<?php echo $_GET['id']; ?>" class="sidebar-link">Click Here To Add</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#ads" class="sidebar-link">Click Here To Show All Ads</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Add European Address
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Click Here To Add</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#europeanaddress" class="sidebar-link">Click Here To Show All European Address</a>
                            </li>

                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                            Auth
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/access/login_form/index.php" class="sidebar-link">Login</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/access/login_form/index.php" class="sidebar-link">Register</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-header">
                        Multi Level Menu
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#multi" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-share-nodes pe-2"></i>
                            All Users
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <?php
                            // Establish database connection
                            include("database.php");

                            // Fetch all users from the database
                            $sql_users = "SELECT id, firstname, lastname FROM users";
                            $result_users = $conn->query($sql_users);

                            if ($result_users->num_rows > 0) {
                                // Output first names and last names of each user
                                while ($row_users = $result_users->fetch_assoc()) {
                                    echo "<li class='sidebar-item'>";
                                    echo "<a href='#' class='sidebar-link collapsed' data-bs-target='#level-" . $row_users["id"] . "' data-bs-toggle='collapse' aria-expanded='false'>" . $row_users["firstname"] . " " . $row_users["lastname"] . "</a>";
                                    echo "<ul id='level-" . $row_users["id"] . "' class='sidebar-dropdown list-unstyled collapse'>";
                                    echo "<li class='sidebar-item'><a href='/access/php/chatapp/chat.php?sender_id=" . 1 . "&receiver_id=" . $row_users["id"] . "&admin_id=" . 1 . "&admin_online=true' class='sidebar-link'>Chat With " . $row['firstname'] . " " . $row['lastname'] . "</a></li>";
                                    echo "<li class='sidebar-item'><a href='#' class='sidebar-link'>See Orders</a></li>";
                                    echo "</ul>";
                                    echo "</li>";
                                }
                            } else {
                                echo "<li class='sidebar-item'>";
                                echo "<a href='#' class='sidebar-link'>No Users Found</a>";
                                echo "</li>";
                            }

                            // Close the database connection
                            $conn->close();
                            ?>
                        </ul>
                    </li>
                                   
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="/access/admin_file/admin_panal/update_admin.php?id=1" class="dropdown-item">Modifing</a>
                                <a href="/index.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Welcome Back, <?php echo $admin_firstname . '  ' . $admin_lastname; ?></h4>
                                                <p class="mb-0">Admin Dashboard, Transa<span>Versa</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="image/customer-support.jpg" class="img-fluid illustration-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                What You Find In This Page
                                            </h4>
                                            <p class="mb-2">
                                                you can see and add delete modification :
                                            </p>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#aliexpressorder">
                                                    <span class="badge text-success me-2">
                                                        1
                                                    </span>
                                                    <span class="text-muted">
                                                        Aliexpress Orders
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#ads">
                                                    <span class="badge text-success me-2">
                                                        2
                                                    </span>
                                                    <span class="text-muted">
                                                        Ads
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#wisecard">
                                                    <span class="badge text-success me-2">
                                                        3
                                                    </span>
                                                    <span class="text-muted">
                                                        Wise Card
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#redotpaycard">
                                                    <span class="badge text-success me-2">
                                                        4
                                                    </span>
                                                    <span class="text-muted">
                                                        Redotpay Card
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#europeanaddress">
                                                    <span class="badge text-success me-2">
                                                        5
                                                    </span>
                                                    <span class="text-muted">
                                                        Europ And Address
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#currencyexchange">
                                                    <span class="badge text-success me-2">
                                                        6
                                                    </span>
                                                    <span class="text-muted">
                                                        Currency Exchange {Dollar $, Erro €}
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0" id="ads">
                        <div class="card-header">
                            <h5 class="card-title">
                                Ads Table
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Ads Will Show It in Home Page
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Modification</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Establish database connection
                                        include("database.php");

                                        // Fetch ads data from the database
                                        $sql = "SELECT * FROM ads";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<th scope='row'>" . $row["id"] . "</th>";
                                                echo "<td>" . $row["title"] . "</td>";
                                                echo "<td>" . $row["description"] . "</td>";
                                                echo "<td><img src='" . $row["image_url"] . "' alt='Ad Image' style='max-width: 100px; max-height: 100px;'></td>";
                                                echo '<td><div style="width:auto; color:#f9f9f9;"><a href="/access/admin_file/update_ads.php?adminid=1&id=' . $row["id"] . '" target="_blank" rel="noopener noreferrer" style="color:#f9f9f9; font-family:\'Georgia\', \'Times New Roman\', Times, serif; font-weight:bolder;" onclick="return confirm(\'Are You Sure To Update This Ads\');">Update Ads</a></div></td>';
                                                echo '<td><div style="width:auto; color:#f9f9f9;"><a href="/access/admin_file/delete_ads.php?adminid=1&id=' . $row["id"] . '" rel="noopener noreferrer" style="color:#f9f9f9; font-family:\'Georgia\', \'Times New Roman\', Times, serif; font-weight:bolder;" onclick="return confirm(\'Are You Sure To Delete This Ads\');">Delete Ads</a></div></td>';
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>No ads found</td></tr>";
                                        }

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Table Element -->
                    <div class="card border-0" id="aliexpressorder">
                        <div class="card-header">
                            <h5 class="card-title">
                                AliExpress Orders
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Here You See Info of The Aliexpress Order of every user with his name and gmail of user
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User Email</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Link</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Delete Order</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Establish database connection
                                        include("database.php");

                                        // Fetch orders data from the database
                                        $sql = "SELECT ao.*, u.firstname, u.lastname, u.gmail AS user_email
                                        FROM aliexpressorder ao 
                                        LEFT JOIN users u ON ao.UserID = u.id";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<th scope='row'>" . $row["OrderID"] . "</th>";
                                                echo "<td>" . $row["user_email"] . "</td>";
                                                echo "<td>" . $row["firstname"] . "</td>";
                                                echo "<td>" . $row["lastname"] . "</td>";
                                                echo "<td>" . $row["Link"] . "</td>";
                                                echo "<td>" . $row["ProductName"] . "</td>";
                                                echo "<td>" . $row["Quantity"] . "</td>";
                                                echo "<td>" . $row["OrderDate"] . "</td>";
                                                echo '<td><div style="width:auto; color:#f9f9f9;"><a href="/access/admin_file/delete_alexpress_order.php?adminid=1&id=' . $row["OrderID"] . '" rel="noopener noreferrer" style="color:#f9f9f9; font-family:\'Georgia\', \'Times New Roman\', Times, serif; font-weight:bolder;" onclick="return confirm(\'Are You Sure To Delete This Alexpress Order\');">Delete Alexpress Order</a></div></td>';
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='10'>No orders found</td></tr>";
                                        }
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Table element -->
                    <div class="card border-2" id="wisecard">
                        <div class="card-header">
                            <h5 class="card-title">
                                WiseCard Table
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Here You See Info of The Wise Card Order of every user with his name and gmail of user
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">User Gmail</th>
                                            <th scope="col">Card Gmail</th>
                                            <th scope="col">Card Password</th>
                                            <th scope="col">Expiry Date</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Establish database connection
                                        include("database.php");

                                        // Fetch wisecard data along with user information from the database
                                        $sql = "SELECT wc.CardID, u.firstname, u.lastname, u.gmail AS usergmail,  wc.email AS cardgmail, wc.password AS cardpassword,  wc.date_added 
                    FROM wisecard wc
                    LEFT JOIN users u ON wc.UserID = u.id";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<th scope='row'>" . $row["CardID"] . "</th>";
                                                echo "<td>" . $row["firstname"] . "</td>";
                                                echo "<td>" . $row["lastname"] . "</td>";
                                                echo "<td>" . $row["usergmail"] . "</td>";
                                                echo "<td>" . $row["cardgmail"] . "</td>";
                                                echo "<td>" . $row["cardpassword"] . "</td>";
                                                echo "<td>" . $row["ExpiryDate"] . "</td>";
                                                echo '<td><div style="width:auto; color:#f9f9f9;"><a href="/access/admin_file/delete_wisecard_commond.php?adminid=1&id=' . $row["CardID"] . '" rel="noopener noreferrer" style="color:#f9f9f9; font-family:\'Georgia\', \'Times New Roman\', Times, serif; font-weight:bolder;" onclick="return confirm(\'Are You Sure To Delete This WiseCard Commond\');">Delete WiseCard Order</a></div></td>';

                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'>No WiseCard found</td></tr>";
                                        }

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Tableux Element -->
                    <div class="card border-0" id="redotpaycard">
                        <div class="card-header">
                            <h5 class="card-title">
                                RedotPayCard Table
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Here You See Info of The RedotPay Card Order of every user with his name and gmail of user
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User Email</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Card Email</th>
                                            <th scope="col">Card Password</th>
                                            <th scope="col">Expiry Date</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Establish database connection
                                        include("database.php");

                                        // Fetch redotpaycard data along with user information from the database
                                        $sql_redotpaycard = "SELECT rc.CardID, rc.email AS card_email, rc.password, u.firstname, u.lastname, u.gmail AS user_email
                    FROM redotpaycard rc
                    LEFT JOIN users u ON rc.UserID = u.id";
                                        $result_redotpaycard = $conn->query($sql_redotpaycard);

                                        if ($result_redotpaycard->num_rows > 0) {
                                            // Output data of each row for RedotPayCard
                                            while ($row_redotpaycard = $result_redotpaycard->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<th scope='row'>" . $row_redotpaycard["CardID"] . "</th>";
                                                echo "<td>" . $row_redotpaycard["user_email"] . "</td>";
                                                echo "<td>" . $row_redotpaycard["firstname"] . "</td>";
                                                echo "<td>" . $row_redotpaycard["lastname"] . "</td>";
                                                echo "<td>" . $row_redotpaycard["card_email"] . "</td>";
                                                echo "<td>" . $row_redotpaycard["password"] . "</td>";
                                                echo "<td>". $row_redotpaycard["date_added"] ."</td>";
                                                echo '<td><div style="width:auto; color:#f9f9f9;"><a href="/access/admin_file/delete_redotpaycard_order.php?adminid=1&id=' . $row["CardID"] . '" rel="noopener noreferrer" style="color:#f9f9f9; font-family:\'Georgia\', \'Times New Roman\', Times, serif; font-weight:bolder;" onclick="return confirm(\'Are You Sure To Delete This RedotpayCard\');">Delete RedotpayCard Order</a></div></td>';
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='9'>No RedotPayCard found</td></tr>";
                                        }

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Tableux Element -->
                    <div class="card border-0" id="europeanaddress">
                        <div class="card-header">
                            <h5 class="card-title">
                                European Address Table
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Here You See Info of The European Address Order of every user with his name and gmail of user
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"> <!-- Added table-responsive class -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User Email</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Date Added</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Establish database connection
                                        include("database.php");

                                        // Fetch europeanaddress data from the database
                                        $sql_europeanaddress = "SELECT ea.*, u.gmail AS user_email, u.firstname, u.lastname FROM europeanaddress ea LEFT JOIN users u ON ea.UserID = u.id";
                                        $result_europeanaddress = $conn->query($sql_europeanaddress);

                                        if ($result_europeanaddress->num_rows > 0) {
                                            // Output data of each row for European Address
                                            while ($row_europeanaddress = $result_europeanaddress->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<th scope='row'>" . $row_europeanaddress["id"] . "</th>"; // Changed
                                                echo "<td>" . $row_europeanaddress["user_email"] . "</td>";
                                                echo "<td>" . $row_europeanaddress["firstname"] . "</td>";
                                                echo "<td>" . $row_europeanaddress["lastname"] . "</td>";
                                                echo "<td>" . $row_europeanaddress["address"] . "</td>";
                                                echo "<td>". $row_europeanaddress["date_added"] ."</td>";
                                                echo '<td><div style="width:auto; color:#f9f9f9;"><a href="/access/admin_file/delete_europeanaddress_order.php?adminid=1&id=' . $row["id"] . '" rel="noopener noreferrer" style="color:#f9f9f9; font-family:\'Georgia\', \'Times New Roman\', Times, serif; font-weight:bolder;" onclick="return confirm(\'Are You Sure To Delete This European Address\');">Delete European Address Order</a></div></td>';
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'>No European Address found</td></tr>";
                                        }

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!-- End of table-responsive -->
                        </div>
                    </div>
                    <!-- Tableux element  -->
                    <div class="card border-0" id="currencyexchange">
                        <div class="card-header">
                            <h5 class="card-title">
                                Currency Exchange Table
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Here You See Info of The Currency Exchange Order of every user with his name and gmail of user
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"> <!-- Added table-responsive class -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User Email</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Converted Amount</th>
                                            <th scope="col">Id Bience</th>
                                            <th scope="col">Link Bience</th>
                                            <th scope="col">Exchange Date</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Establish database connection
                                        include("database.php");

                                        // Fetch currencyexchange data along with user information from the database
                                        $sql_currencyexchange = "SELECT ce.*, u.gmail AS user_email, u.firstname, u.lastname 
                                             FROM currencyexchange ce 
                                             LEFT JOIN users u ON ce.UserID = u.id";
                                        $result_currencyexchange = $conn->query($sql_currencyexchange);

                                        if ($result_currencyexchange->num_rows > 0) {
                                            // Output data of each row for Currency Exchange
                                            while ($row_currencyexchange = $result_currencyexchange->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<th scope='row'>" . $row_currencyexchange["ExchangeID"] . "</th>";
                                                echo "<td>" . $row_currencyexchange["user_email"] . "</td>";
                                                echo "<td>" . $row_currencyexchange["firstname"] . "</td>";
                                                echo "<td>" . $row_currencyexchange["lastname"] . "</td>";
                                                echo "<td>" . $row_currencyexchange["ConvertedAmount"] . "</td>";
                                                echo "<td>" . $row_currencyexchange["id_bience"] . "</td>";
                                                echo "<td>" . $row_currencyexchange["link_bience"] . "</td>";
                                                echo "<td>" . $row_currencyexchange["ExchangeDate"] . "</td>";
                                                echo '<td><div style="width:auto; color:#f9f9f9;"><a href="/access/admin_file/delete_currencyexchange_order.php?adminid=1&id=' . $row["id"] . '" rel="noopener noreferrer" style="color:#f9f9f9; font-family:\'Georgia\', \'Times New Roman\', Times, serif; font-weight:bolder;" onclick="return confirm(\'Are You Sure To Delete This Currency Exchange Order\');">Delete Currency Exchange Order</a></div></td>';

                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='12'>No Currency Exchange found</td></tr>";
                                        }

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!-- End of table-responsive -->
                        </div>
                    </div>

            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Transa<span>Versa</span></strong>
                                </a>
                            </p>
                        </div>
                        <!-- <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Terms</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Booking</a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>