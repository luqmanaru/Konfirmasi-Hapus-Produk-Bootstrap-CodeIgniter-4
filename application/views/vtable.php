<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Produk</li>
            </ol>
            
            <?php if ($this->session->flashdata('pesan')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <i class="fas fa-table me-1"></i>
                            Tabel Data Produk
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="<?php echo site_url('dashboard/add_product'); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Produk
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($produk as $p): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $p->nama_produk; ?></td>
                                    <td><?php echo "Rp " . number_format($p->harga, 0, ',', '.'); ?></td>
                                    <td><?php echo $p->stok; ?></td>
                                    <td><?php echo $p->keterangan; ?></td>
                                    <td width="120">
                                        <a href="<?php echo site_url('dashboard/edit_product/'.$p->id_produk); ?>" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $p->id_produk; ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="deleteModal<?php echo $p->id_produk; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus produk <strong><?php echo $p->nama_produk; ?></strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <a href="<?php echo site_url('dashboard/delete_product/'.$p->id_produk); ?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
