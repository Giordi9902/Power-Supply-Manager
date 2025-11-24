<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php?page=home">⚡ PSU Manager</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="d-flex">
                    <a href="index.php?page=logout" class="btn btn-outline-danger btn-sm">Logout</a>
                </div>
            <?php else: ?>
                <div class="d-flex gap-2">
                    <a href="index.php?page=login" class="btn btn-outline-light btn-sm">Login</a>
                    <a href="index.php?page=register" class="btn btn-primary btn-sm">Registrati</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>