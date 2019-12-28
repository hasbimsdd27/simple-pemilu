<h1 class="text-center mt-5">Rekapitulasi Suara Virtual Pemilu by CKK pada jam <?= date("H:i") ?></h1>
<div class="row mt-5 mx-auto">
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Suara Masuk</h5>
                <h1><?= $suara ?></h1>
                <p>Suara</p>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Suara Jokowi - Ma'ruf</h5>
                <h1><?= number_format($per1, 2) ?>%</h1>
                <p><?= $p1 ?> Suara</p>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Suara Prabowo - Sandi</h5>
                <h1><?= number_format($per2, 2) ?>%</h1>
                <p><?= $p2 ?> Suara</p>
            </div>
        </div>
    </div>
</div>