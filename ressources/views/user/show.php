<div class="container">
    <h3><i class="fa fa-user-circle" aria-hidden="true"></i> Mon profil</h3>
    <hr>
    <div class="card">
        <div class="card-body">
            <span style="font-weight: 700;font-size: 20px; letter-spacing: 2px"><i class="fa fa-user" aria-hidden="true"></i> Username: <?= $param['user']->username ?> | <a href="" class="btn btn-warning btn-sm">Change</a></span> <hr>
            <span style="font-weight: 700;font-size: 20px; letter-spacing: 2px"><i class="fa fa-phone" aria-hidden="true"></i> Phone: <?= $param['user']->phone ?> | <a href="" class="btn btn-warning btn-sm">Change</a></span><hr>
            <span style="font-weight: 700;font-size: 20px; letter-spacing: 2px"><i class="fa fa-sms" aria-hidden="true"></i> Email: <?= $param['user']->mail ?> | <a href="" class="btn btn-warning btn-sm">Change</a></span><hr>
        </div>
        <div class="card-footer">
            <a href="/login/edit/<?= $param['user']->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Modifier</a>
        </div>
    </div>
</div>