<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            max-width: 1200px;
            margin: 0 auto;
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
            color: var(--text-color);
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

        .detail-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .detail-card {
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .detail-card:hover {
            transform: translateY(-5px);
        }

        .detail-header {
            background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .detail-header h1 {
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }

        .detail-header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .detail-content {
            padding: 2rem;
        }

        .info-section {
            margin-bottom: 2rem;
        }

        .info-section h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.3rem;
        }

        .info-section h3 i {
            color: var(--primary-color);
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #6c757d;
            font-weight: 500;
            flex: 0 0 200px;
        }

        .info-value {
            color: var(--text-color);
            font-weight: 600;
            text-align: right;
            flex: 1;
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

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: center;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .btn-success {
            background: var(--success-color);
            color: var(--white);
        }

        .btn-success:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-danger {
            background: var(--danger-color);
            color: var(--white);
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 768px) {
            .info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .info-label {
                flex: none;
            }

            .info-value {
                text-align: left;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <a href="<?php echo base_url(); ?>" class="nav-brand">QuickTix</a>
        <div class="nav-links">
            <a href="<?php echo base_url('events/search'); ?>" class="nav-link">
                <i class="fas fa-search"></i>
                Cari Event
            </a>
            <a href="<?php echo base_url('tickets'); ?>" class="nav-link active">
                <i class="fas fa-ticket-alt"></i>
                Tiket Saya
            </a>
            <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </div>
    </div>

    <div class="detail-container">
        <div class="detail-card">
            <div class="detail-header">
                <h1><i class="fas fa-ticket-alt"></i> Detail Tiket</h1>
                <p>Informasi lengkap tiket Anda</p>
            </div>
            
            <div class="detail-content">
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <div class="info-section">
                    <h3><i class="fas fa-info-circle"></i> Informasi Event</h3>
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
                        <div class="info-label">Tanggal Event</div>
                        <div class="info-value"><?php echo date('d F Y H:i', strtotime($transaction['date'])); ?></div>
                    </div>
                </div>

                <div class="info-section">
                    <h3><i class="fas fa-shopping-cart"></i> Detail Pembelian</h3>
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
                        <div class="info-value"><?php echo ucfirst(str_replace('_', ' ', $transaction['payment_method'])); ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            <span class="status-badge <?php echo 'status-' . $transaction['payment_status']; ?>">
                                <i class="fas <?php echo $transaction['payment_status'] == 'pending' ? 'fa-clock' : ($transaction['payment_status'] == 'paid' ? 'fa-check-circle' : 'fa-times-circle'); ?>"></i>
                                <?php 
                                switch($transaction['payment_status']) {
                                    case 'pending':
                                        echo 'Menunggu Pembayaran';
                                        break;
                                    case 'paid':
                                        echo 'Pembayaran Berhasil';
                                        break;
                                    case 'cancelled':
                                        echo 'Dibatalkan';
                                        break;
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>

                <?php if($transaction['payment_status'] == 'pending'): ?>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        <div>
                            <strong>Pembayaran Belum Dilakukan</strong><br>
                            Silakan lakukan pembayaran sesuai dengan metode yang dipilih. Setelah pembayaran berhasil, status akan diperbarui secara otomatis.
                        </div>
                    </div>
                <?php endif; ?>

                <div class="action-buttons">
                    <a href="<?php echo base_url('tickets'); ?>" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Tiket Saya
                    </a>
                    
                    <?php if($transaction['payment_status'] == 'paid'): ?>
                        <a href="<?php echo base_url('tickets/print/' . $transaction['id']); ?>" target="_blank" class="btn btn-success">
                            <i class="fas fa-print"></i> Cetak Tiket
                        </a>
                    <?php endif; ?>
                    
                    <?php if($transaction['payment_status'] == 'pending'): ?>
                        <a href="<?php echo base_url('transaction/cancel/' . $transaction['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')">
                            <i class="fas fa-times"></i> Batalkan Transaksi
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 