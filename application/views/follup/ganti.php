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
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="id_complaint">ID Complaint | Toko | Keluhan</label>
                                <input type="text" class="form-control" id="id_complaint" name="id_complaint" readonly value="<?= $complaint->id_complaint . ' | ' . $complaint->kode_toko . ' - ' . $complaint->nama_toko . ' | ' . $complaint->keluhan; ?>">
                            </div>
                            <div class="form-group">
                                <label for="spareparts">Spareparts</label>
                                <select class="form-control select-spareparts" id="spareparts" name="spareparts">
                                <?php foreach ($spareparts as $spr) : ?>
                                    <option value="<?= $spr->id; ?>"><?= $spr->kode . ' - ' . $spr->nama; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah">
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