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
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h1 class="card-title">Data <?= $title; ?></h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="complaintTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Complaint</th>
                                    <th>Toko</th>
                                    <th>Teknisi</th>
                                    <th>Solusi</th>
                                    <th>Diselesaikan</th>
                                    <th>Ganti Sparepart</th>
                                    <th>Status Complaint</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($follup as $fol) : ?>
                                <tr>
                                    <td><?= $fol->id_complaint; ?></td>
                                    <td><?= $fol->kode_toko . ' - ' . $fol->nama_toko; ?></td>
                                    <td><?= $fol->nama; ?></td>
                                    <td><?= $fol->solusi; ?></td>
                                    <td><?= date('d M Y H:i:s', strtotime($fol->diselesaikan)); ?></td>
                                    <td><?= $fol->ganti == 0 ? 'Tidak ada' : 'Ada: ' . $fol->nama_spareparts; ?></td>
                                    <td class="text-center"><?= $fol->status == 1 ? '<span class="badge bg-success">Selesai</span>' : ''; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->