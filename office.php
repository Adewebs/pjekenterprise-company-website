<?php
session_start(); // Start a session to store the login state

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
     $conn = new mysqli('localhost', 'pjekente_forming', ';s&&PMY2J7Vo', 'pjekente_forming');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to check if the admin exists
    $sql = "SELECT * FROM admins WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // "s" means string type

    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    // If the admin exists and the password matches
    if ($admin && password_verify($password, $admin['password'])) {
        // Set session variables
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_email'] = $admin['email'];

        // Redirect to the admin dashboard
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // If credentials are incorrect
        $error_message = "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Admin Login Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card mt-5">
                <div class="card-body">
                    <h3 class="card-title text-center">Admin Login</h3>
                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>
                    <form action="office.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
