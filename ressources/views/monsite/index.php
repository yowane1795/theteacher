<div class="container">
    <div class="row">
        <?php foreach ($param['posts'] as $post) : ?>
            <div class="card mb-3 mx-2" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="<?= $post->upload ?>" class="w-100 mt-4" alt="Img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post->title ?></h5>
                            <p class="card-text"><?= $post->getContent() ?></p>
                            <p class="card-text"><small class="text-muted">Publié le<?= $post->createdAt() ?></small></p>
                        </div>
                        <div class="card-footer">
                        <a href="/post/<?= $post->id ?>" class="btn btn-primary btn-sm">Lire la suite</a> | <span class="text-muted"><i class='fa fa-comments' aria-hidden='true'></i> <?= $post->postComment($post->id)->count ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>