<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-black px-4 border-3 shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold text-light">SessionAuthSystem Dashboard</span>
        <div class="d-flex align-items-center">
            <span class="me-3 text-secondary"><strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    
    <!-- Welcome -->
    <div class="card shadow-sm p-4 mb-4 bg-white rounded-3">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="h3 mb-2 fw-bold text-primary">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                <p class="text-muted mb-0">This page is protected and only visible to logged-in users.</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="#explore" class="btn btn-primary px-4">Explore Dashboard</a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <!-- Account Status  -->
        <div class="col-md-4">
            <div class="card-body">
                <h5 class="card-title text-success fw-bold mb-3">Account Status</h5>
                <p class="card-text text-secondary mb-1"><strong>Status:</strong> Active</p>
                <p class="card-text text-muted small">Your session is active and protected.</p>
            </div>   
        </div>

        <!-- User Details  -->
        <div class="col-md-4"> 
            <div class="card-body">
                <h5 class="card-title text-primary fw-bold mb-3">User Details</h5>
                <p class="card-text text-secondary mb-1"><strong>User ID:</strong> <?php echo htmlspecialchars($_SESSION['id'] ?? ''); ?></p>
                <p class="card-text text-secondary mb-1"><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                <p class="card-text text-secondary mb-0"><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            </div>
        </div>

        <!-- Active Session ID  -->
        <div class="col-md-4">
            <div class="card-body">
                <h5 class="card-title text-warning fw-bold mb-3">Active Session ID</h5>
                <p class="card-text text-black mb-1"><strong>Current Session ID:</strong></p>
                <p class="card-text text-break font-monospace small bg-light p-2"><?php echo htmlspecialchars(session_id()); ?></p>
            </div>
        </div>

    </div>
</div>

</body>
</html>