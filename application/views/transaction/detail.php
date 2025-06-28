<?php $this->load->view('templates/header', $title); ?>

<style>
    :root {
        --primary-color: #4A90E2;
        --secondary-color: #2C3E50;
        --accent-color: #E74C3C;
        --text-color: #333333;
        --background-color: #F5F6FA;
        --white: #FFFFFF;
        --success-color: #28a745;
        --danger-color: #dc3545;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-color: var(--background-color);
        padding: 2rem;
    }

    /* Navigation Styles */
    .nav-container {
        background: var(--white);
        padding: 1rem 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-brand {
        color: var(--primary-color);
        font-size: 1.5rem;
        font-weight: 600;
        text-decoration: none;
    }

    .nav-links {
        display: flex;
        gap: 1.5rem;
    }

    .nav-link {
        color: var(--secondary-color);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .nav-link:hover {
        color: var(--primary-color);
    }

    .nav-link i {
        font-size: 1.1rem;
        color: var(--primary-color);
    }

    .nav-link.active {
        color: var(--primary-color);
        font-weight: 600;
        position: relative;
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: var(--primary-color);
        border-radius: 2px;
    }

    .user-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        object-fit: cover;
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-radius: 10px;
    }

    .dropdown-item {
        padding: 0.7rem 1.5rem;
        transition: all 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: rgba(74, 144, 226, 0.1);
        color: var(--primary-color);
    }

    .dropdown-item.text-danger:hover {
        background-color: rgba(220, 53, 69, 0.1);
        color: var(--danger-color);
    }

    .transaction-detail {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 2rem 0;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
        color: white;
        border-radius: 15px 15px 0 0 !important;
        padding: 1.5rem;
    }

    .card-header h4 {
        margin: 0;
        font-weight: 600;
    }

    .info-section {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .info-section h5 {
        color: #4A90E2;
        font-weight: 600;
        margin-bottom: 1.2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-section h5 i {
        color: #4A90E2;
    }

    .info-item {
        display: flex;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f0f0f0;
    }

    .info-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .info-label {
        flex: 0 0 150px;
        color: #6c757d;
        font-weight: 500;
    }

    .info-value {
        flex: 1;
        color: #2C3E50;
        font-weight: 500;
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-paid {
        background-color: #d4edda;
        color: #155724;
    }

    .status-cancelled {
        background-color: #f8d7da;
        color: #721c24;
    }

    .alert {
        border-radius: 10px;
        padding: 1.2rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        animation: slideIn 0.3s ease-out;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-content {
        border-radius: 15px;
        border: none;
    }

    .modal-header {
        background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
        color: white;
        border-radius: 15px 15px 0 0;
        padding: 1.5rem;
    }

    .modal-body {
        padding: 2rem;
    }

    .payment-amount {
        font-size: 2rem;
        font-weight: 700;
        color: #4A90E2;
        text-align: center;
        margin: 1.5rem 0;
    }

    .payment-info {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 1.5rem;
        margin-top: 1.5rem;
    }
</style>

<!-- Navigation -->
<div class="nav-container">
    <a href="<?php echo base_url(); ?>" class="nav-brand">QuickTix</a>
    <div class="nav-links">
        <a href="<?php echo base_url('events/search'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'events' ? 'active' : ''; ?>">
            <i class="fas fa-search"></i>
            Cari Event
        </a>
        <a href="<?php echo base_url('tickets'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'tickets' ? 'active' : ''; ?>">
            <i class="fas fa-ticket-alt"></i>
            Tiket Saya
        </a>
        <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </div>
</div>

<div class="transaction-detail">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-receipt me-2"></i>Detail Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle fa-lg"></i>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle fa-lg"></i>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="info-section">
                            <h5><i class="fas fa-info-circle"></i>Informasi Event</h5>
                            <div class="info-item">
                                <div class="info-label">Nama Event</div>
                                <div class="info-value"><?php echo $transaction['event_name']; ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Tipe Event</div>
                                <div class="info-value"><?php echo $transaction['event_type']; ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Lokasi</div>
                                <div class="info-value"><?php echo $transaction['location']; ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Tanggal</div>
                                <div class="info-value"><?php echo date('d F Y', strtotime($transaction['date'])); ?></div>
                            </div>
                        </div>

                        <div class="info-section">
                            <h5><i class="fas fa-shopping-cart"></i>Detail Pembelian</h5>
                            <div class="info-item">
                                <div class="info-label">ID Transaksi</div>
                                <div class="info-value">#<?php echo $transaction['id']; ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Jumlah Tiket</div>
                                <div class="info-value"><?php echo $transaction['quantity']; ?> tiket</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Total Harga</div>
                                <div class="info-value">Rp <?php echo number_format($transaction['total_price'], 0, ',', '.'); ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Metode Pembayaran</div>
                                <div class="info-value"><?php echo $transaction['payment_method']; ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Status</div>
                                <div class="info-value">
                                    <span class="status-badge <?php echo 'status-' . $transaction['payment_status']; ?>">
                                        <i class="fas <?php echo $transaction['payment_status'] == 'pending' ? 'fa-clock' : ($transaction['payment_status'] == 'paid' ? 'fa-check-circle' : 'fa-times-circle'); ?>"></i>
                                        <?php echo ucfirst($transaction['payment_status']); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <?php if($transaction['payment_status'] == 'pending'): ?>
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle fa-lg"></i>
                                <div>
                                    <h5 class="alert-heading">Pembayaran Belum Dilakukan</h5>
                                    <p class="mb-0">Silakan lakukan pembayaran sesuai dengan metode yang dipilih. Setelah pembayaran berhasil, status akan diperbarui secara otomatis.</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pembayaran -->
<?php if($transaction['payment_status'] == 'pending'): ?>
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">
                    <i class="fas fa-credit-card me-2"></i>Konfirmasi Pembayaran
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Silakan lakukan pembayaran sebesar:</p>
                <div class="payment-amount">
                    Rp <?php echo number_format($transaction['total_price'], 0, ',', '.'); ?>
                </div>
                
                <div class="payment-info">
                    <h6 class="mb-3"><i class="fas fa-info-circle me-2"></i>Informasi Pembayaran</h6>
                    <p class="mb-0">Pembayaran akan diverifikasi dalam waktu 1x24 jam setelah pembayaran dilakukan.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Tutup
                </button>
                <button type="button" class="btn btn-success" onclick="confirmPayment()">
                    <i class="fas fa-check me-2"></i>Konfirmasi Pembayaran
                </button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
function confirmPayment() {
    // Implementasi konfirmasi pembayaran
    alert('Fitur konfirmasi pembayaran akan segera hadir!');
}
</script>

<?php $this->load->view('templates/footer'); ?> 