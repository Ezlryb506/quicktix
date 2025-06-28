<?php $this->load->view('templates/header', $title); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Tiket Saya</h4>
                    <a href="<?php echo base_url('events/search'); ?>" class="btn btn-light">
                        <i class="fas fa-plus me-2"></i>Beli Tiket Baru
                    </a>
                </div>
                <div class="card-body">
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(empty($transactions)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-ticket-alt fa-4x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada tiket yang dibeli</h5>
                            <p class="text-muted">Silakan beli tiket event yang Anda inginkan</p>
                            <a href="<?php echo base_url('events/search'); ?>" class="btn btn-primary mt-3">
                                <i class="fas fa-search me-2"></i>Cari Event
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Event</th>
                                        <th>Tanggal Event</th>
                                        <th>Jumlah Tiket</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($transactions as $transaction): ?>
                                    <tr>
                                        <td>#<?php echo $transaction['id']; ?></td>
                                        <td>
                                            <div class="fw-bold"><?php echo $transaction['event_name']; ?></div>
                                            <small class="text-muted"><?php echo $transaction['event_type']; ?></small>
                                        </td>
                                        <td><?php echo date('d F Y', strtotime($transaction['date'])); ?></td>
                                        <td><?php echo $transaction['quantity']; ?> tiket</td>
                                        <td>Rp <?php echo number_format($transaction['total_price'], 0, ',', '.'); ?></td>
                                        <td>
                                            <span class="badge <?php echo $transaction['payment_status'] == 'pending' ? 'bg-warning' : ($transaction['payment_status'] == 'paid' ? 'bg-success' : 'bg-danger'); ?>">
                                                <?php echo ucfirst($transaction['payment_status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('transaction/detail/' . $transaction['id']); ?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye me-1"></i>Detail
                                            </a>
                                            <?php if($transaction['payment_status'] == 'paid'): ?>
                                                <a href="<?php echo base_url('tickets/print/' . $transaction['id']); ?>" target="_blank" class="btn btn-sm btn-success">
                                                    <i class="fas fa-print me-1"></i>Cetak Tiket
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>