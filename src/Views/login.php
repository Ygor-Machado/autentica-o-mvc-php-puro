<?php $title = 'Login'; ?>
<?php if (isset($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>

<h2 class="text-center">Login</h2>
<form method="POST" action="/login" class="w-50 mx-auto mt-4">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
</form>
<p class="text-center mt-3">Don't have an account? <a href="/register">Register</a></p>
