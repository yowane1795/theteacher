<div class="container bg-light">
    <div class="col-md-8 mb-md-0 p-md-4 ">
        <h3>Inscription</h3>
        <form action="/subscribe" method="POST">
            <hr>
            <div class="form-group">
                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text" class="mt-2 mb-2 form-control <?= (Session::errors('username') !== null) ? "text-error" : "" ?>" name="username" id="username">
                <span class="text-danger"><?=   Session::errors('username') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> ".Session::errors('username') : "" ?></span>
            </div>
            <div class="form-group">
                <label for="password"><i class="fa fa-lock"></i> Password</label>
                <input type="password" class="mt-2 mb-2 form-control <?= (Session::errors('password') !== null) ? "text-error" : "" ?>" name="password" id="password">
                <span class="text-danger"><?=   Session::errors('password') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> ".Session::errors('password') : "" ?></span>
            </div>
            <div class="form-group">
                <label for="phone"><i class="fa fa-phone"></i> Phone</label>
                <input type="text" class="mt-2 mb-2 form-control <?= (Session::errors('phone') !== null) ? "text-error" : "" ?>" name="phone" id="phone">
                <span class="text-danger"><?=   Session::errors('phone') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> ".Session::errors('phone') : "" ?></span>
            </div>
            <div class="form-group">
                <label for="mail"><i class="fa fa-adress"></i> Mail</label>
                <input type="email" class="mt-2 form-control <?= (Session::errors('mail') !== null) ? "text-error" : "" ?>" name="mail" id="mail">
                <span class="text-danger"><?=   Session::errors('mail') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> ".Session::errors('mail') : "" ?></span>
            </div>
            <input type="hidden" name="role" value="0">
            <button type="submit" class="btn btn-success mt-2 btn-sm">S'inscrire</button>
            <a href="/login" class="btn btn-primary mt-2 btn-sm">Se connecter</a>
        </form>
    </div>
</div>
<?= Session::destroy(['errors', 'input']) ?>