<div class="card mx-auto mt-5" style="width: 50%;">
    <div class="card-body">
        <?php if ($this->session->flashdata('pesan')) : ?>
            <div class="row mt-3 centered">
                <div class="col-12 centered">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Token anda adalah <strong><?= $this->session->flashdata('pesan'); ?></strong><br>
                        Untuk mengakses surat suara silahkan <a href="<?= base_url() ?>ssuara">disini</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('err')) : ?>
            <div class="row mt-3 centered">
                <div class="col-12 centered">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        email yang anda gunakan telah <strong><?= $this->session->flashdata('err'); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('err1')) : ?>
            <div class="row mt-3 centered">
                <div class="col-12 centered">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        email yang anda gunakan belum <strong><?= $this->session->flashdata('err1'); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('sks1')) : ?>
            <div class="row mt-3 centered">
                <div class="col-12 centered">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Terimakasih, anda telah <strong><?= $this->session->flashdata('sks1'); ?></strong> hak suara anda
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <h5 class="text-center">Selamat Datang di Virtual Pemilu By CKK</h5>
                <p class="text-justify text-muted">Selamat datang di Virtual Pemilu by CKK, Silahkan masukkan email anda kemudian kami akan mengirimkan link untuk surat suara anda. Surat suara yang tersedia kali ini hanya surat suara PILPRES 2019. 1 Email hanya bisa memilih 1 kali, silahkan digunakan dengan bijak :)</p>
                <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Masukkan Email">
                <small id="emailHelp" class="form-text text-muted">Kami tidak akan menyebarkan email anda kepada siapa pun</small>
                <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>