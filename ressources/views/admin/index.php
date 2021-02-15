<div class="container">
    <h3><i class="fa fa-folder" aria-hidden="true"></i> Mes Posts</h3>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th><i class="fa fa-text" aria-hidden="true"></i> Titre</th>
                <th><i class="fa fa-calendar" aria-hidden="true"></i> Publié le</th>
                <th style="text-align: center;"><i class="fa fa-cogs" aria-hidden="true"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($param['posts'] as $key =>  $post) : ?>
                <tr>
                    <?php $key++; ?>
                    <td><?= $key ?></td>
                    <td><?= $post->title ?></td>
                    <td><?= $post->created_at ?></td>
                    <td align="center">
                        <a href="/posts/update/<?= $post->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Editer</a>
                        <form action="/posts/destroy" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?= $post->id ?>">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"> Supprimer</i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>