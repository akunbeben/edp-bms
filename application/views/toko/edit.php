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
                        <form action="<?= base_url('toko/edit/') . $toko->id; ?>" method="post">
                            <div class="form-group">
                                <label for="kode_toko">Kode Toko</label>
                                <input type="text" class="form-control" id="kode_toko" name="kode_toko" value="<?=$toko->kode_toko; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_toko">Nama Toko</label>
                                <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?=$toko->nama_toko; ?>" required>
                            </div>

                            <div class="row justify-content-end">
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>&nbsp;
                            <button type="reset" class="btn btn-warning"><i class="fas fa-minus"></i> Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>