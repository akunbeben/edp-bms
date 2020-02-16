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
                                <label for="sparepart">Spareparts</label>
                                <select class="form-control select-spareparts" id="spareparts" name="spareparts">
                                <?php foreach ($spareparts as $spr) : ?>
                                    <option value="<?= $spr->id; ?>"><?= $spr->kode . ' - ' . $spr->nama; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah">
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