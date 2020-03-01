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
                        <form action="<?= base_url('complaint/edit/' . $complaint->id); ?>" method="post">
                            <div class="form-group">
                                <label for="id_complaint">ID Complaint</label>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $complaint->id; ?>">
                                <input type="text" class="form-control" id="id_complaint" name="id_complaint" readonly value="<?= $complaint->id_complaint; ?>">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal & Waktu</label>
                                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="<?= date('d-m-Y H:i', strtotime($complaint->tanggal)); ?>">
                            </div>
                            <div class="form-group">
                                <label for="toko">Toko</label>
                                <select class="form-control select-produk" id="toko" name="toko" required>
                                    <option value=""> -- Pilih Toko -- </option>
                                    <?php foreach ($toko as $tk) : ?>
                                    <option value="<?= $tk->id; ?>" <?= $tk->kode_toko == $complaint->kode_toko ? 'selected' : '' ?>><?= $tk->kode_toko . ' - ' . $tk->nama_toko; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keluhan">Keluhan</label>
                                <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?= $complaint->keluhan; ?>">
                            </div>
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <input type="text" class="form-control" id="catatan" name="catatan" value="<?= $complaint->catatan; ?>">
                            </div>

                            <div class="row justify-content-end">
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>&nbsp;
                            <a href="<?= base_url('complaint/'); ?>" class="btn btn-warning"><i class="fas fa-minus"></i> Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>