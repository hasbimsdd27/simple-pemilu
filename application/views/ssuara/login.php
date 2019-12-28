<div class="card mx-auto mt-5" style="width: 50%;">
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <h5 class="text-center mb-3">Silahkan Masukkan Email dan Token Anda</h5>
                <input type="text" class="form-control mb-3" id="exampleInputEmail1" name="email" placeholder="Masukkan Email">
                <small class="form-text text-danger"><?= form_error('email'); ?></small>
                <input type="text" class="form-control" id="exampleInputEmail1" name="token" placeholder="Masukkan Token">
                <small class="form-text text-danger"><?= form_error('token'); ?></small>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>