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
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('kunjungan/tambah/'); ?>" method="post">
                            <div class="form-group">
                                <label for="toko">Toko</label>
                                <select class="form-control select-produk" id="toko" name="toko" required>
                                    <option value=""> -- Pilih Toko -- </option>
                                    <?php foreach ($toko as $tk) : ?>
                                    <option value="<?= $tk->id; ?>"><?= $tk->kode_toko . ' - ' . $tk->nama_toko; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keperluan">Keperluan</label>
                                <input type="text" class="form-control" id="keperluan" name="keperluan">
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