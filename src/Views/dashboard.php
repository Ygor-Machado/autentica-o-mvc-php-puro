<?php $title = 'Dashboard'; ?>

<div class="jumbotron text-center">
    <h1 class="display-4">Bem vindo ao dashboard da area administrativa!</h1>
    <p class="lead">Apenas pessoas autenticadas.</p>
    <hr class="my-4">

    <form action="/logout"  method="POST">
        <button class="btn btn-danger btn-lg" type="submit">Logout</button>
    </form>

</div>
