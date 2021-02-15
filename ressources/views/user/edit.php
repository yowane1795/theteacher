<div class="container bg-light">
    <div class="col-md-12 mb-md-0 p-md-4 ">
        <h3><i class="fa fa-edit" aria-hidden="true"></i> Modifier mon profil</h3>
        <form action="/login/edit" method="POST">
            <hr>
            <div class="form-group mt-3">
                <label for="username"><i class="fa fa-user" aria-hidden="true"></i> username</label>
                <input type="text" class="form-control <?= (Session::errors('username') !== null) ? "text-error" :  "" ?>" name="username" id="username" value="<?= $param['user']->username ?>">
                <span class="text-danger"><?= Session::errors('username') ?></span>
            </div>
            <div class="form-group mt-3">
                <label for="old"><i class="fa fa-lock" aria-hidden="true"></i> old password (not required)</label>
                <input type="password" class="form-control <?= (Session::errors('old') !== null) ? "text-error" :  "" ?>" name="old" id="old">
                <span class="text-danger"><?= Session::errors('old') ?></span>
            </div>
            <div class="form-group mt-3">
                <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> new password (not required)</label>
                <input type="password" class="form-control <?= (Session::errors('password') !== null) ? "text-error" :  "" ?>" name="password" id="password">
                <span class="text-danger"><?= Session::errors('password') ?></span>
            </div>
            <div class="form-group mt-3">
                <label for="phone"><i class="fa fa-phone" aria-hidden="true"></i> phone</label>
                <input type="text" class="form-control <?= (Session::errors('phone') !== null) ? "text-error" :  "" ?>" name="phone" id="phone" value="<?= $param['user']->phone ?>">
                <span class="text-danger"><?= Session::errors('phone') ?></span>
            </div>
            <div class="form-group mt-3">
                <label for="mail"><i class="fa fa-email" aria-hidden="true"></i> email</label>
                <input type="text" class="form-control <?= (Session::errors('mail') !== null) ? "text-error" :  "" ?>" name="mail" id="mail" value="<?= $param['user']->mail ?>">
                <span class="text-danger"><?= Session::errors('mail') ?></span>
            </div>
           <input type="hidden" name="id" value="<?= $param['user']->id ?>">
            <button type="submit" class="btn btn-success mt-2 btn-sm"><i class='fa fa-send' aria-hidden='true'></i> Modifier</button>
        </form>
    </div>
</div>
<?= Session::destroy(['errors', 'input']) ?>