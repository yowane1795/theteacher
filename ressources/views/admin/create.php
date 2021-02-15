<div class="container bg-light">
    <div class="col-md-12 mb-md-0 p-md-4 ">
        <h3><i class="fa fa-edit" aria-hidden="true"></i> Créer un post</h3>
        <form action="/posts/create" method="POST" enctype="multipart/form-data">
            <hr>
            <div class="form-group mt-3">
                <label for="title">Title</label>
                <input type="text" class="form-control mt-2 <?= (Session::errors('title') !== null) ? "text-error" :  "" ?>" name="title" id="title" value="<?= Session::success('title') ?>">
                <span class="text-danger"><?= Session::errors('title') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> " . Session::errors('title') : "" ?></span>
            </div>
            <div class="form-group mt-3">
                <label for="upload">Upload</label>
                <input type="file" style="padding-bottom: 3,5%;" id="upload" class="form-control w-50 mt-2" name="upload">
                <span class="text-danger"><?= Session::errors('upload') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> " . Session::errors('upload') : "" ?></span>
            </div>
            <div class="form-group mt-3">
                <label for="ckeditor">Content</label>
                <textarea class="form-control mt-2 <?= (Session::errors('content') !== null) ? "text-error" :  "" ?>" name="content" id="ckeditor" cols="30" rows="10"><?= Session::success('content') ?></textarea>
                <span class="text-danger"><?= Session::errors('content') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> " . Session::errors('content') : "" ?></span>
            </div>
            <div class="form-group mt-3">
                <label for="slug">Catégorie</label>
                <select class="form-control mt-2 <?= (Session::errors('slug') !== null) ? "text-error" :  "" ?>" name="slug" id="slug" value="<?= Session::success('slug') ?>">
                    <option value="PHP">PHP</option>
                    <option value="JS">JS</option>
                    <option value="BDD">Base-de-donnée</option>
                    <option value="HTML">HTML</option>
                </select>
                <span class="text-danger"><?= Session::errors('slug') !== null ? "<i class='fa fa-warning' aria-hidden='true'></i> " . Session::errors('slug') : "" ?></span>
            </div>
            <button type="submit" class="btn btn-primary mt-2 btn-sm"><i class="fa fa-send" aria-hidden="true"></i> Créer l'article</button>
            <button type="reset" class="btn btn-danger mt-2 btn-sm"><i class="fa fa-times" aria-hidden="true"></i> Annuler</button>
        </form>
    </div>
</div>
<?= Session::destroy(['errors', 'input']) ?>