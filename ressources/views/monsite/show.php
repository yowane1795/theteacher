<div class="container">
    <div class="card mb-3">
        <img src="<?= $param['post']->upload ?>" alt="img">
        <div class="card-body">
            <h5><?= $param['post']->title ?></h5>
            <p><?= $param['post']->content ?></p>
            <span class="text-info"><i class='fa fa-calendar' aria-hidden='true'></i> Publié le <?= $param['post']->createdAt() ?></span class="text-info">
        </div>
        <div class="card-footer">
            <form action="/posts/destroy" method="POST" class="d-inline">
                <input type="hidden" name="id" value="<?= $param['post']->id ?>">
                <button class="btn btn-danger btn-sm"><i class='fa fa-trash' aria-hidden='true'></i> Supprimer</button>
            </form>|
            <a class="btn btn-primary btn-sm" href="/posts/update/<?= $param['post']->id ?>"><i class='fa fa-edit' aria-hidden='true'></i> Modifier</a>
        </div>
    </div>

    <div class="col-md-12 mb-md-0 p-md-4 ">
        <h3><i class='fa fa-comments' aria-hidden='true'></i>  Commentaires</h3>
        <hr>
        <?php foreach ($param['post']->getComment((int)$param['post']->id) as $comment) : ?>
            <div class="card">
                <div class="container">
                    <span class="text-danger"><i class='fa fa-user-circle' aria-hidden='true'></i> <?= $comment->username ?></span>
                    <hr>
                    <small class="text-muted">Le <?= $comment->createdAt() ?></small>
                    <p><?= $comment->content ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="col-md-12 mb-md-0 p-md-4 ">
        <h3>Ajouter un commentaire</h3>
        <form action="/posts/comment" method="POST">
            <hr>
            <div class="form-group">
                <label for="username">Nom</label>
                <input type="text" class="form-control <?= (Session::errors('username') !== null) ? "text-error" :  "" ?>" name="username" id="username" value="<?= Session::isset('login') ?>">
                <span class="text-danger"><?=   Session::errors('username') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> ".Session::errors('username') : "" ?></span>
            </div>
            <div class="form-group  mt-3">
                <label for="ckeditor">Votre commentaire ici:</label>
                <textarea class=" form-control <?= (Session::errors('username') !== null) ? "text-error" :  "" ?>" name="content" id="ckeditor" cols="30" rows="10"></textarea>
                <span class="text-danger"><?=   Session::errors('content') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> ".Session::errors('content') : "" ?></span>
            </div>
            <input type="hidden" name="id_post" value="<?= $param['post']->id ?>">
            <button type="submit" class="btn btn-success mt-2 btn-sm"><i class='fa fa-send' aria-hidden='true'></i> Envoyer</button>
            <button type="reset" class="btn btn-danger mt-2 btn-sm"><i class='fa fa-times' aria-hidden='true'></i> Annuler</button>
        </form>
    </div>
    <?= Session::destroy(['errors']) ?>
</div>