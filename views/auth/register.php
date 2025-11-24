<div class="mx-auto" style="max-width:480px">
    <div class="card p-4 shadow-sm">
        <h2 class="text-center mb-4">Registrati</h2>
        <form action="index.php?page=register" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Registrati</button>
        </form>
        <p class="text-center mt-3">
            Hai già un account? <a href="index.php?page=login">Accedi qui</a>
        </p>
    </div>
</div>