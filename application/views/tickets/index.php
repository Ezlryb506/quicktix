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
            --success-color: #2ECC71;
            --warning-color: #F1C40F;
            --danger-color: #E74C3C;
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

        .tickets-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .tickets-header {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .tickets-header h1 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .tickets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .ticket-card {
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .ticket-card:hover {
            transform: translateY(-5px);
        }

        .ticket-header {
            padding: 1.5rem;
            background: var(--primary-color);
            color: var(--white);
        }

        .ticket-header h3 {
            margin-bottom: 0.5rem;
        }

        .ticket-type {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .ticket-content {
            padding: 1.5rem;
        }

        .ticket-details {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }

        .ticket-detail {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-color);
        }

        .ticket-detail i {
            color: var(--primary-color);
            width: 20px;
        }

        .ticket-status {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .status-pending {
            background: var(--warning-color);
            color: var(--text-color);
        }

        .status-paid {
            background: var(--success-color);
            color: var(--white);
        }

        .status-cancelled {
            background: var(--danger-color);
            color: var(--white);
        }

        .ticket-actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            text-decoration: none;
            text-align: center;
        }

        .btn-detail {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-cancel {
            background: var(--danger-color);
            color: var(--white);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .no-tickets {
            text-align: center;
            padding: 3rem;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .no-tickets i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .no-tickets h2 {
            color: var(--text-color);
            margin-bottom: 1rem;
        }

        .no-tickets p {
            color: #666;
            margin-bottom: 1.5rem;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            opacity: 1;
        }

        .modal-content {
            background: var(--white);
            width: 90%;
            max-width: 500px;
            margin: 50px auto;
            padding: 2rem;
            border-radius: 15px;
            position: relative;
            transform: translateY(-20px);
            transition: transform 0.3s ease;
            box-shadow: 0 5px 30px rgba(0,0,0,0.3);
        }

        .modal.show .modal-content {
            transform: translateY(0);
        }

        .modal-content h2 {
            color: var(--danger-color);
            margin-bottom: 1rem;
        }

        .modal-content p {
            margin-bottom: 1rem;
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-danger {
            background: var(--danger-color);
            color: var(--white);
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
        }

        .btn-secondary {
            background: #6c757d;
            color: var(--white);
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.2);
        }
    </style>
</head>
<body>
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

    <div class="tickets-container">
        <div class="tickets-header">
            <h1>Tiket Saya</h1>
            <p>Kelola dan lihat status tiket Anda</p>
        </div>

        <?php if(empty($transactions)): ?>
        <div class="no-tickets">
            <i class="fas fa-ticket-alt"></i>
            <h2>Belum Ada Tiket</h2>
            <p>Anda belum memiliki tiket event apapun.</p>
            <a href="<?php echo base_url('events/search'); ?>" class="btn btn-detail">Cari Event</a>
        </div>
        <?php else: ?>
        <div class="tickets-grid">
            <?php foreach($transactions as $transaction): ?>
            <div class="ticket-card">
                <div class="ticket-header">
                    <h3><?php echo $transaction['event_name']; ?></h3>
                    <div class="ticket-type"><?php echo $transaction['event_type']; ?></div>
                </div>
                <div class="ticket-content">
                    <div class="ticket-details">
                        <div class="ticket-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo $transaction['location']; ?>
                        </div>
                        <div class="ticket-detail">
                            <i class="fas fa-calendar"></i>
                            <?php echo date('d M Y H:i', strtotime($transaction['date'])); ?>
                        </div>
                        <div class="ticket-detail">
                            <i class="fas fa-ticket-alt"></i>
                            <?php echo $transaction['quantity']; ?> tiket
                        </div>
                        <div class="ticket-detail">
                            <i class="fas fa-money-bill-wave"></i>
                            Total: Rp <?php echo number_format($transaction['total_price'], 0, ',', '.'); ?>
                        </div>
                    </div>
                    <div class="ticket-status status-<?php echo strtolower($transaction['payment_status']); ?>">
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
                    </div>
                    <div class="ticket-actions">
                        <a href="<?php echo base_url('transaction/detail/' . $transaction['id']); ?>" class="btn btn-detail">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                        <?php if($transaction['payment_status'] == 'paid'): ?>
                        <a href="<?php echo base_url('tickets/print/' . $transaction['id']); ?>" target="_blank" class="btn btn-detail" style="background: var(--success-color);">
                            <i class="fas fa-print"></i> Cetak Tiket
                        </a>
                        <?php endif; ?>
                        <?php if($transaction['payment_status'] == 'pending'): ?>
                        <button onclick="confirmCancel(<?php echo $transaction['id']; ?>)" class="btn btn-cancel">
                            <i class="fas fa-times"></i> Batalkan
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <!-- Modal Konfirmasi Pembatalan -->
    <div id="cancelModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeCancelModal()">&times;</span>
            <h2>Konfirmasi Pembatalan</h2>
            <p>Apakah Anda yakin ingin membatalkan transaksi ini?</p>
            <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
            <div class="modal-buttons">
                <button onclick="closeCancelModal()" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button onclick="proceedCancel()" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Ya, Batalkan
                </button>
            </div>
        </div>
    </div>

    <script>
    let transactionToCancel = null;

    function confirmCancel(transactionId) {
        transactionToCancel = transactionId;
        const modal = document.getElementById('cancelModal');
        modal.style.display = 'block';
        setTimeout(() => modal.classList.add('show'), 10);
    }

    function closeCancelModal() {
        const modal = document.getElementById('cancelModal');
        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
            transactionToCancel = null;
        }, 300);
    }

    function proceedCancel() {
        if (transactionToCancel) {
            window.location.href = `<?php echo base_url('transaction/cancel/'); ?>${transactionToCancel}`;
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('cancelModal');
        if (event.target == modal) {
            closeCancelModal();
        }
    }
    </script>
</body>
</html>