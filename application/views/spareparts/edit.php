<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form <?= $title; ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                    <li class="breadcrumb-item active">Form <?= $sub_title; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="hidden" id="id" name="id" value="<?= $spareparts->id; ?>">
                                <input type="text" class="form-control" id="kode" name="kode" readonly value="<?= $spareparts->kode; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $spareparts->nama; ?>">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" id="kategori" name="kategori" >
                                <?php foreach ($kategori as $kat) : ?>
                                    <option value="<?= $kat->id; ?>" <?= $kat->id == $spareparts->id_kat ? 'selected' : ''; ?>><?= $kat->kategori; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="satuan">Satuan</label>
                                <select class="form-control" id="satuan" name="satuan" >
                                <?php foreach ($satuan as $sat) : ?>
                                    <option value="<?= $sat->id; ?>" <?= $sat->id == $spareparts->id_sat ? 'selected' : ''; ?>><?= $sat->satuan; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" value="<?= $spareparts->harga; ?>">
                            </div>

                            <div class="row justify-content-end">
                                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>&nbsp;
                                <a type="a" class="btn btn-warning" href="<?= base_url('spareparts/'); ?>"><i class="fas fa-minus"></i> Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>