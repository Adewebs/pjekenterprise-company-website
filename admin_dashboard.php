<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles for the sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 250px;
      background-color: #343a40;
      padding-top: 20px;
    }

    .sidebar a {
      color: #fff;
      padding: 15px 20px;
      text-decoration: none;
      display: block;
      font-size: 18px;
    }

    .sidebar a:hover {
      background-color: #575d63;
    }

    /* Custom styles for the main content */
    .main-content {
      margin-left: 250px;
      padding: 20px;
    }

    /* Adjust layout for smaller screens */
    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .main-content {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <a href="#">Dashboard</a>
    <a href="#">Messages</a>
    <a href="#">Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Admin Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mt-4">
      <h3>Incoming Messages</h3>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Type</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // Assuming you have connected to the database
            $conn = new mysqli('localhost', 'pjekente_forming', ';s&&PMY2J7Vo', 'pjekente_forming');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["subject"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "<td>" . $row["type"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No messages found</td></tr>";
            }

            $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
