<div class="container bg-light">
    <div class="col-md-8 mb-md-0 p-md-4 ">
        <h3>Connexion</h3>
        <form action="/login" method="POST">
            <hr>
            <div class="form-group">
                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text" class="mb-2 form-control mt-2 <?= (Session::errors('username') !== null) ? "text-error" :  "" ?>" name="username" id="username" value="<?= Session::success('username') ?>">
                <span class="text-danger"><?=   Session::errors('username') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> ".Session::errors('username') : "" ?></span>
            </div>
            <div class="form-group">
                <label for="password"><i class="fa fa-lock"></i> Password</label>
                <input type="password" class="mt-2 form-control <?= (Session::errors('password') !== null) ? "text-error" : "" ?>" name="password" id="password" value="<?= Session::success('password') ?>">
                <span class="text-danger"><?=   Session::errors('password') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> ".Session::errors('password') : "" ?></span>
            </div>
            <button type="submit" class="btn btn-success mt-2 btn-sm">Se connecter</button>
            <a href="/subscribe" class="btn btn-primary mt-2 btn-sm">S'inscrire</a>
        </form>
    </div>
</div>
<?= Session::destroy(['errors', 'input', 'success']) ?>
