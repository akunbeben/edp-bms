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
                        <div class="float-right">
                            <a class="btn btn-dark btn-sm" href="<?= base_url('users/tambah/'); ?>"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="complaintTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $usr) : ?>
                                <tr>
                                    <td><?= $usr->nama; ?></td>
                                    <td><?= $usr->username; ?></td>
                                    <td><?= $usr->level == 1 ? 'Administrator' : 'Teknisi'; ?></td>
                                    <td class="text-center" style="width: 120px;">
                                        <a class="btn btn-warning btn-sm" href="<?= base_url('users/edit/') . $usr->id; ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-sm" href="<?= base_url('users/hapus/') . $usr->id; ?>"><i class="fas fa-trash"></i></a>
                                    </td>
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