<?php $title = 'Register'; ?>
<?php if (isset($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>

<h2 class="text-center">Register</h2>
<form method="POST" action="/register" class="w-50 mx-auto mt-4">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required placeholder="Name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
    </div>
    <button type="submit" class="btn btn-success btn-block">Register</button>
</form>
<p class="text-center mt-3">Already have an account? <a href="/login">Login</a></p>
