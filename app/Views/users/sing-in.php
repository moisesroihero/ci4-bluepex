<div class="container">
<form class="my-5 form-signin" action="create" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Cadastro</h1>

    <?php echo \Config\Services::validation()->listErrors(); ?>

    <?= csrf_field() ?>

    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" required autofocus>
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" required>
    <label for="password">Senha</label>
    <input type="password" name="password" class="form-control" required>

    <button class="my-5 btn btn-lg btn-primary float-right" type="submit">Cadastrar-se</button>
</form>
</div>