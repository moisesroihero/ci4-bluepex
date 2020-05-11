<div class="container">
    <div class="my-5">
    <h1 class="h3 my-3 font-weight-normal">Perfil</h1>

    <?php if (! empty($user) && is_array($user)) : ?>
        <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

            <tr>
                <th style="width: 2%" scope="row"><?= esc($user['id']); ?></th>
                <td style="width: 48%"><?= esc($user['name']); ?></td>
                <td style="width: 40%"><?= esc($user['email']); ?></td>
                <td style="width: 5%"><a type="button" class="btn btn-primary" href="/edit" style="color: white;">Editar</a></td>
                <td style="width: 5%"><a type="button" class="btn btn-danger" href="/delete" style="color: white;" onclick="return confirm('Deseja apagar sua conta?');">Deletar</a></td>
            </tr>

        </tbody>
        </table>

    <?php endif ?>
    </div>
</div>


