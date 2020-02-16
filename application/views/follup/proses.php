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
                                <input type="hidden" id="id" name="id" value="<?= $complaint->id; ?>">
                                <input type="text" class="form-control" id="id_complaint" name="id_complaint" readonly value="<?= $complaint->id_complaint . ' | ' . $complaint->toko . ' | ' . $complaint->keluhan; ?>">
                            </div>
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan" value="<?= $complaint->catatan; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="teknisi">Teknisi</label>
                                <select class="form-control select-spareparts" id="teknisi" name="teknisi">
                                <?php foreach ($teknisi as $tks) : ?>
                                    <option value="<?= $tks->id; ?>"><?= $tks->nik . ' - ' . $tks->nama; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="solusi">Solusi</label>
                                <textarea type="text" class="form-control" id="solusi" name="solusi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ganti">Ganti Sparepart</label>
                                <select class="form-control" id="ganti" name="ganti">
                                    <option value="0">Tidak Ada</option>
                                    <option value="1">Ada</option>
                                </select>
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