<div class="mx-auto" style="max-width:480px">
    <div class="card p-4 shadow-sm">
        <h2 class="text-center mb-4">Accedi</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'registrato'): ?>
            <div class="alert alert-success" role="alert">
                Registrazione avvenuta con successo! Effettua il login.
            </div>
        <?php endif; ?>
        <form action="index.php?page=login" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="text-center mt-3">
            Non hai un account? <a href="index.php?page=register">Registrati qui</a>
        </p>
    </div>
</div>