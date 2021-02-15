<div class="container bg-light">
    <div class="col-md-12 mb-md-0 p-md-4 ">
        <h3>Editer un post</h3>
        <form action="/posts/update" method="POST" enctype="multipart/form-data">
            <hr>
            <div class="form-group mt-3">
                <label for="title">Title</label>
                <input type="text" class="form-control <?= (Session::errors('title') !== null) ? "text-error" :  "" ?>" name="title" id="title" value="<?= $param['post']->title ?>">
                <span class="text-danger"><?= Session::errors('title') ?></span>
            </div>
            <div class="form-group mt-3">
                <label for="upload">Upload</label>
                <input type="file" style="padding-bottom: 3,5%;" id="upload" class="form-control w-50" name="upload">
                <span class="text-danger"><?= Session::errors('upload') ?></span>
            </div>
            <div class="form-group mt-3">
                <label for="ckeditor">Content</label>
                <textarea class="form-control <?= (Session::errors('content') !== null) ? "text-error" :  "" ?>" name="content" id="ckeditor" cols="30" rows="10"><?= $param['post']->content ?></textarea>
                <span class="text-danger"><?= Session::errors('content') ?></span>
            </div>
            <input type="hidden" name="id" value="<?=  $param['post']->id ?>">
            <button type="submit" class="btn btn-primary mt-2 btn-sm"><i class='fa fa-send' aria-hidden='true'></i> Editer l'article</button>
        </form>
    </div>
</div>
<?= Session::destroy(['errors', 'input']) ?>