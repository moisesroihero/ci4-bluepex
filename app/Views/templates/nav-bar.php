<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <h1 class="text-light font-weight-bold">CI4-BLUEPEX</h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <?php  $session = session();if($session->get('logged_in')) : ?>
            <li class="nav-item active px-2">
                <a class="btn btn-primary" href="/logout" role="button">LOGOUT</a>
            </li>
            <?php else : ?>
            <li class="nav-item active px-2">
                <a type="button" class="btn btn-outline-light" href="/sing-in">CADASTRAR-SE</a>
            </li>
            <li class="nav-item active px-2">
                <a class="btn btn-primary" href="/login" role="button">LOGIN</a>
            </li>
            <?php endif ?>
        </ul>
    </div>
</nav>