<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Event - QuickTix</title>
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

        /* Styling untuk tombol login dan register */
        .nav-link.btn-login {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 5px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .nav-link.btn-login:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .nav-link.btn-register {
            background-color: var(--primary-color);
            color: var(--white);
            border: 2px solid var(--primary-color);
            border-radius: 5px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .nav-link.btn-register:hover {
            background-color: #357ABD;
            border-color: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .search-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .filter-section {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .filter-group {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border: 2px solid var(--primary-color);
            border-radius: 20px;
            background: transparent;
            color: var(--primary-color);
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .filter-btn:hover {
            background: rgba(74, 144, 226, 0.1);
        }

        .filter-btn.active {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.2);
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .event-card {
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-5px);
        }

        .event-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .event-content {
            padding: 1.5rem;
        }

        .event-type {
            color: var(--primary-color);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .event-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .event-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .event-detail {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--secondary-color);
            font-size: 0.9rem;
        }

        .event-price {
            font-size: 1.2rem;
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .event-actions {
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
        }

        .btn-detail {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-buy {
            background: var(--accent-color);
            color: var(--white);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
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
            max-width: 600px;
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

        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-color);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            background: rgba(0,0,0,0.1);
            color: var(--accent-color);
        }

        /* Detail Modal Styles */
        .event-detail-content {
            margin-top: 1rem;
        }

        .event-detail-content h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }

        .event-detail-content img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .event-detail-content p {
            margin-bottom: 1rem;
            line-height: 1.6;
            color: var(--text-color);
        }

        .event-detail-content p strong {
            color: var(--secondary-color);
            font-weight: 600;
        }

        /* Buy Modal Styles */
        .buy-form {
            margin-top: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--secondary-color);
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }

        .form-group input[type="number"] {
            width: 100px;
        }

        #totalPrice {
            font-size: 1.2rem;
            color: var(--accent-color);
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .btn-submit {
            background: var(--accent-color);
            color: var(--white);
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-submit:hover {
            background: #d62c1a;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.2);
        }

        /* Animation for modal content */
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-content {
            animation: modalFadeIn 0.3s ease forwards;
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: slideIn 0.3s ease-out;
        }

        .alert-success {
            background: var(--success-color);
            color: var(--white);
        }

        .alert-error {
            background: var(--danger-color);
            color: var(--white);
        }

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .alert i {
            font-size: 1.2rem;
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

        .search-input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(74,144,226,0.08);
        }

        .clear-search-btn {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            padding: 0.3rem;
            border-radius: 50%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
        }

        .clear-search-btn:hover {
            background: rgba(0,0,0,0.1);
            color: var(--danger-color);
            transform: translateY(-50%) scale(1.1);
        }

        .clear-search-btn:active {
            transform: translateY(-50%) scale(0.95);
        }

        .btn-search-event:hover {
            background: #357ABD;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
        }

        /* Pagination Styles */
        .pagination-container {
            margin-top: 3rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }

        .results-info {
            background: var(--white);
            padding: 1rem 2rem;
            border-radius: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            color: var(--text-color);
            font-weight: 500;
            text-align: center;
        }

        .pagination-wrapper {
            background: var(--white);
            padding: 1rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .pagination-nav {
            display: flex;
            justify-content: center;
        }

        .pagination-list {
            display: flex;
            list-style: none;
            gap: 0.5rem;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .pagination-item {
            margin: 0;
        }

        .pagination-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            background: #f8f9fa;
            position: relative;
            overflow: hidden;
        }

        .pagination-link:hover {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
            border-color: var(--primary-color);
        }

        .pagination-link:active {
            transform: translateY(0);
        }

        .pagination-current {
            background: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .pagination-first,
        .pagination-last {
            width: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--white);
            border-color: transparent;
        }

        .pagination-first:hover,
        .pagination-last:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .pagination-prev,
        .pagination-next {
            width: 50px;
            background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
            color: var(--white);
            border-color: transparent;
        }

        .pagination-prev:hover,
        .pagination-next:hover {
            background: linear-gradient(135deg, #357ABD 0%, #4A90E2 100%);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 20px rgba(74, 144, 226, 0.4);
        }

        .pagination-ellipsis {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
        }

        .pagination-ellipsis-text {
            color: var(--text-color);
            font-weight: 600;
            font-size: 1.2rem;
        }

        /* Responsive Pagination */
        @media (max-width: 768px) {
            .pagination-list {
                gap: 0.3rem;
            }

            .pagination-link {
                width: 40px;
                height: 40px;
                font-size: 0.9rem;
            }

            .pagination-first,
            .pagination-last,
            .pagination-prev,
            .pagination-next {
                width: 45px;
            }

            .results-info {
                padding: 0.8rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .pagination-list {
                gap: 0.2rem;
            }

            .pagination-link {
                width: 35px;
                height: 35px;
                font-size: 0.8rem;
            }

            .pagination-first,
            .pagination-last,
            .pagination-prev,
            .pagination-next {
                width: 40px;
            }

            .pagination-ellipsis {
                width: 35px;
                height: 35px;
            }
        }

        /* Animation for pagination */
        .pagination-link {
            animation: fadeInUp 0.3s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hover effects with ripple */
        .pagination-link::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.3s ease, height 0.3s ease;
        }

        .pagination-link:hover::before {
            width: 100%;
            height: 100%;
        }

        /* No results styling */
        .no-results {
            text-align: center;
            padding: 3rem;
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .no-results i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .no-results h3 {
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .no-results p {
            color: #666;
        }

        /* Lightbox Styles */
        .lightbox-modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            opacity: 0;
            transition: opacity 0.3s ease;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .lightbox-modal.show {
            opacity: 1;
            display: flex;
        }

        .lightbox-image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transform: scale(0.8);
            transition: transform 0.3s ease;
            width: auto;
            height: auto;
        }

        .lightbox-modal.show .lightbox-content {
            transform: scale(1);
        }

        .lightbox-close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 2001;
            transition: all 0.3s ease;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.5);
        }

        .lightbox-close:hover,
        .lightbox-close:focus {
            color: #bbb;
            text-decoration: none;
            background: rgba(0, 0, 0, 0.8);
            transform: scale(1.1);
        }

        .lightbox-controls {
            position: absolute;
            top: 15px;
            left: 35px;
            display: flex;
            gap: 10px;
            z-index: 2001;
        }

        .lightbox-btn {
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .lightbox-btn:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: scale(1.1);
            color: #fff;
        }

        .lightbox-btn:active {
            transform: scale(0.95);
        }

        .lightbox-caption {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: white;
            padding: 15px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }

        /* Event detail image styles */
        .event-detail-content img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .event-detail-content img:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        /* Zoom indicator */
        .event-detail-content img::after {
            content: "🔍";
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 8px;
            border-radius: 50%;
            font-size: 12px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .event-detail-content img:hover::after {
            opacity: 1;
        }

        /* Responsive lightbox */
        @media (max-width: 768px) {
            .lightbox-image-container {
                padding: 10px;
            }
            
            .lightbox-content {
                max-width: 95%;
                max-height: 85%;
            }
            
            .lightbox-close {
                top: 10px;
                right: 20px;
                font-size: 30px;
                width: 40px;
                height: 40px;
            }
            
            .lightbox-controls {
                top: 10px;
                left: 20px;
                gap: 8px;
            }
            
            .lightbox-btn {
                width: 35px;
                height: 35px;
                font-size: 14px;
            }
            
            .lightbox-caption {
                bottom: 10px;
                width: 90%;
                font-size: 1rem;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <a href="<?php echo base_url(); ?>" class="nav-brand">QuickTix</a>
        <div class="nav-links">
            <?php if($this->session->userdata('logged_in')): ?>
                <!-- Menu untuk user yang sudah login -->
                <a href="<?php echo base_url('events/search'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'events' ? 'active' : ''; ?>">
                    <i class="fas fa-search"></i>
                    Cari Event
                </a>
                <a href="<?php echo base_url('tickets'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'tickets' ? 'active' : ''; ?>">
                    <i class="fas fa-ticket-alt"></i>
                    Tiket Saya
                </a>
                <?php if($this->session->userdata('role') == 'admin'): ?>
                    <a href="<?php echo base_url('admin'); ?>" class="nav-link" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                        <i class="fas fa-crown"></i>
                        Admin Panel
                    </a>
                <?php endif; ?>
                <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            <?php else: ?>
                <!-- Menu untuk user yang belum login -->
                <a href="<?php echo base_url('events/search'); ?>" class="nav-link active">
                    <i class="fas fa-search"></i>
                    Cari Event
                </a>
                <a href="<?php echo base_url('auth/login'); ?>" class="nav-link btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Masuk
                </a>
                <a href="<?php echo base_url('auth/register'); ?>" class="nav-link btn-register">
                    <i class="fas fa-user-plus"></i>
                    Daftar
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="search-container">
        <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>

        <?php if(!$this->session->userdata('logged_in')): ?>
        <div class="alert alert-info" style="background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb;">
            <i class="fas fa-info-circle"></i>
            <strong>Info:</strong> Silakan <a href="<?php echo base_url('auth/login'); ?>" style="color: #0c5460; text-decoration: underline; font-weight: 600;">login</a> terlebih dahulu untuk membeli tiket event.
        </div>
        <?php endif; ?>

        <div class="search-bar" style="margin-bottom:1.5rem;display:flex;gap:0.5rem;align-items:center;">
            <form method="get" action="" style="width:100%;display:flex;gap:0.5rem;">
                <div style="position:relative;flex:1;">
                    <input type="text" name="q" id="searchInput" value="<?php echo htmlspecialchars($this->input->get('q') ?? ''); ?>" placeholder="Cari nama event..." class="search-input" style="width:100%;padding:0.7rem 1rem;padding-right:2.5rem;border:2px solid #e1e1e1;border-radius:8px;font-size:1rem;">
                </div>
                <button type="submit" class="btn-search-event" style="background:var(--primary-color);color:#fff;border:none;padding:0.7rem 1.5rem;border-radius:8px;font-weight:600;display:flex;align-items:center;gap:0.5rem;cursor:pointer;transition:all 0.3s;">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>

        <div class="filter-section">
            <h2>Filter Event</h2>
            <br>
            <div class="filter-group">
                <button class="filter-btn <?php echo !$this->input->get('type') || $this->input->get('type') === 'all' ? 'active' : ''; ?>" data-type="all">Semua</button>
                <button class="filter-btn <?php echo $this->input->get('type') === 'Festival' ? 'active' : ''; ?>" data-type="Festival">Festival</button>
                <button class="filter-btn <?php echo $this->input->get('type') === 'Workshop' ? 'active' : ''; ?>" data-type="Workshop">Workshop</button>
                <button class="filter-btn <?php echo $this->input->get('type') === 'Konser' ? 'active' : ''; ?>" data-type="Konser">Konser</button>
            </div>
        </div>

        <div class="events-grid">
            <?php foreach($events as $event): ?>
            <div class="event-card">
                <img src="<?php echo base_url($event['image_url']); ?>" alt="<?php echo $event['event_name']; ?>" class="event-image">
                <div class="event-content">
                    <div class="event-type"><?php echo $event['event_type']; ?></div>
                    <h3 class="event-title"><?php echo $event['event_name']; ?></h3>
                    <div class="event-details">
                        <div class="event-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo $event['location']; ?>
                        </div>
                        <div class="event-detail">
                            <i class="fas fa-calendar"></i>
                            <?php echo date('d M Y H:i', strtotime($event['date'])); ?>
                        </div>
                        <div class="event-detail">
                            <i class="fas fa-ticket-alt"></i>
                            <?php echo $event['available_tickets']; ?> tiket tersedia
                        </div>
                    </div>
                    <div class="event-price">
                        Rp <?php echo number_format($event['price'], 0, ',', '.'); ?>
                    </div>
                    <div class="event-actions">
                        <button class="btn btn-detail" onclick="showEventDetail(<?php echo $event['id']; ?>)">
                            Lihat Detail
                        </button>
                        <button class="btn btn-buy" onclick="showBuyModal(<?php echo $event['id']; ?>)">
                            Beli
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination dan Info Hasil -->
        <div class="pagination-container">
            <?php if($total_records > 0): ?>
                <div class="results-info">
                    Menampilkan <?php echo (($current_page - 1) * $per_page) + 1; ?> - 
                    <?php echo min($current_page * $per_page, $total_records); ?> 
                    dari <?php echo $total_records; ?> event
                </div>
                
                <?php if($pagination): ?>
                    <div class="pagination-wrapper">
                        <?php echo $pagination; ?>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="no-results">
                    <i class="fas fa-search"></i>
                    <h3>Tidak ada event yang ditemukan</h3>
                    <p>Coba ubah filter atau kata kunci pencarian Anda</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal Detail Event -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeDetailModal()">&times;</span>
            <div id="eventDetailContent"></div>
        </div>
    </div>

    <!-- Modal Pembelian -->
    <div id="buyModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeBuyModal()">&times;</span>
            <div id="buyFormContent"></div>
        </div>
    </div>

    <!-- Lightbox Modal untuk Gambar -->
    <div id="imageLightbox" class="lightbox-modal">
        <span class="lightbox-close" onclick="closeImageLightbox()">&times;</span>
        <div class="lightbox-controls">
            <button class="lightbox-btn" onclick="zoomImage('in')" title="Zoom In (+)">
                <i class="fas fa-search-plus"></i>
            </button>
            <button class="lightbox-btn" onclick="zoomImage('out')" title="Zoom Out (-)">
                <i class="fas fa-search-minus"></i>
            </button>
            <button class="lightbox-btn" onclick="zoomImage('reset')" title="Reset Zoom (0)">
                <i class="fas fa-expand-arrows-alt"></i>
            </button>
        </div>
        <div class="lightbox-image-container">
            <img id="lightboxImage" class="lightbox-content" alt="Event Image">
        </div>
        <div class="lightbox-caption" id="lightboxCaption"></div>
    </div>

    <script>
        // Filter functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const type = this.getAttribute('data-type');
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Ambil parameter pencarian yang ada
                const urlParams = new URLSearchParams(window.location.search);
                const searchQuery = urlParams.get('q');
                
                // Buat URL baru dengan parameter type dan q
                let newUrl = `<?php echo base_url('events/search'); ?>?type=${type}`;
                if (searchQuery) {
                    newUrl += `&q=${encodeURIComponent(searchQuery)}`;
                }
                
                // Redirect ke URL baru
                window.location.href = newUrl;
            });
        });

        // Modal functions
        function showEventDetail(eventId) {
            fetch(`<?php echo base_url('events/get_detail/'); ?>${eventId}`)
                .then(response => response.json())
                .then(event => {
                    // Format harga dengan pemisah ribuan yang benar
                    const formattedPrice = new Intl.NumberFormat('id-ID').format(event.price);
                    
                    const content = `
                        <h2>${event.event_name}</h2>
                        <div class="event-detail-content">
                            <img src="<?php echo base_url(); ?>${event.image_url}" alt="${event.event_name}" 
                                 onclick="openImageLightbox('<?php echo base_url(); ?>${event.image_url}', '${event.event_name}')"
                                 title="Klik untuk melihat gambar penuh">
                            <p><strong>Tipe Event:</strong> ${event.event_type}</p>
                            <p><strong>Lokasi:</strong> ${event.location}</p>
                            <p><strong>Tanggal:</strong> ${new Date(event.date).toLocaleString()}</p>
                            <p><strong>Harga:</strong> Rp ${formattedPrice}</p>
                            <p><strong>Tiket Tersedia:</strong> ${event.available_tickets}</p>
                            <p><strong>Deskripsi:</strong></p>
                            <p>${event.description}</p>
                        </div>
                    `;
                    document.getElementById('eventDetailContent').innerHTML = content;
                    const modal = document.getElementById('detailModal');
                    modal.style.display = 'block';
                    setTimeout(() => modal.classList.add('show'), 10);
                });
        }

        function showBuyModal(eventId) {
            fetch(`<?php echo base_url('events/get_detail/'); ?>${eventId}`)
                .then(response => response.json())
                .then(event => {
                    const maxQuantity = Math.min(event.available_for_booking, 10); // Maksimal 10 tiket per transaksi
                    // Format harga dengan pemisah ribuan yang benar
                    const formattedPrice = new Intl.NumberFormat('id-ID').format(event.price);
                    
                    const content = `
                        <h2>Beli Tiket - ${event.event_name}</h2>
                        <form action="<?php echo base_url('events/buy'); ?>" method="POST" class="buy-form">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="ticket_id" value="${event.id}">
                            <div class="form-group">
                                <label>Jumlah Tiket</label>
                                <input type="number" name="quantity" min="1" max="${maxQuantity}" value="1" required 
                                       onchange="updateTotalPrice(this.value, ${event.price})">
                                <small style="color: #666;">Maksimal ${maxQuantity} tiket per transaksi</small>
                            </div>
                            <div class="form-group">
                                <label>Metode Pembayaran</label>
                                <select name="payment_method" required>
                                    <option value="transfer_bank">Transfer Bank</option>
                                    <option value="e_wallet">E-Wallet</option>
                                    <option value="qris">QRIS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Total Harga</label>
                                <p id="totalPrice">Rp ${formattedPrice}</p>
                            </div>
                            <button type="submit" class="btn-submit">Beli Tiket</button>
                        </form>
                    `;
                    document.getElementById('buyFormContent').innerHTML = content;
                    const modal = document.getElementById('buyModal');
                    modal.style.display = 'block';
                    setTimeout(() => modal.classList.add('show'), 10);
                });
        }

        function closeDetailModal() {
            const modal = document.getElementById('detailModal');
            modal.classList.remove('show');
            setTimeout(() => modal.style.display = 'none', 300);
        }

        function closeBuyModal() {
            const modal = document.getElementById('buyModal');
            modal.classList.remove('show');
            setTimeout(() => modal.style.display = 'none', 300);
        }

        function updateTotalPrice(quantity, price) {
            const total = quantity * price;
            const formattedTotal = new Intl.NumberFormat('id-ID').format(total);
            document.getElementById('totalPrice').textContent = `Rp ${formattedTotal}`;
        }

        // Lightbox functions
        function openImageLightbox(imageSrc, imageAlt) {
            const lightbox = document.getElementById('imageLightbox');
            const lightboxImage = document.getElementById('lightboxImage');
            const lightboxCaption = document.getElementById('lightboxCaption');
            
            lightboxImage.src = imageSrc;
            lightboxImage.alt = imageAlt;
            lightboxCaption.textContent = imageAlt;
            
            // Reset zoom
            currentZoom = 1;
            lightboxImage.style.transform = 'scale(1)';
            
            lightbox.style.display = 'flex';
            setTimeout(() => lightbox.classList.add('show'), 10);
            
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        function closeImageLightbox() {
            const lightbox = document.getElementById('imageLightbox');
            lightbox.classList.remove('show');
            setTimeout(() => {
                lightbox.style.display = 'none';
                // Restore body scroll
                document.body.style.overflow = 'auto';
            }, 300);
        }

        // Zoom functionality
        let currentZoom = 1;
        const zoomStep = 0.2;
        const maxZoom = 3;
        const minZoom = 0.5;

        function zoomImage(direction) {
            const lightboxImage = document.getElementById('lightboxImage');
            
            if (direction === 'in') {
                currentZoom = Math.min(currentZoom + zoomStep, maxZoom);
            } else if (direction === 'out') {
                currentZoom = Math.max(currentZoom - zoomStep, minZoom);
            } else if (direction === 'reset') {
                currentZoom = 1;
            }
            
            lightboxImage.style.transform = `scale(${currentZoom})`;
        }

        // Close lightbox when clicking outside the image
        document.addEventListener('click', function(event) {
            const lightbox = document.getElementById('imageLightbox');
            
            if (event.target === lightbox && lightbox.style.display === 'flex') {
                closeImageLightbox();
            }
        });

        // Keyboard controls for lightbox
        document.addEventListener('keydown', function(event) {
            const lightbox = document.getElementById('imageLightbox');
            
            if (lightbox.style.display === 'flex') {
                switch(event.key) {
                    case 'Escape':
                        closeImageLightbox();
                        break;
                    case '+':
                    case '=':
                        event.preventDefault();
                        zoomImage('in');
                        break;
                    case '-':
                        event.preventDefault();
                        zoomImage('out');
                        break;
                    case '0':
                        event.preventDefault();
                        zoomImage('reset');
                        break;
                }
            }
        });

        // Mouse wheel zoom
        document.addEventListener('wheel', function(event) {
            const lightbox = document.getElementById('imageLightbox');
            
            if (lightbox.style.display === 'flex' && event.ctrlKey) {
                event.preventDefault();
                
                if (event.deltaY < 0) {
                    zoomImage('in');
                } else {
                    zoomImage('out');
                }
            }
        });

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.classList.remove('show');
                setTimeout(() => event.target.style.display = 'none', 300);
            }
        }

        // Clear search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const clearSearchBtn = document.getElementById('clearSearch');
            
            // Show/hide clear button based on input value
            function toggleClearButton() {
                if (searchInput.value.trim() !== '') {
                    if (!clearSearchBtn) {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.id = 'clearSearch';
                        btn.className = 'clear-search-btn';
                        btn.innerHTML = '<i class="fas fa-times"></i>';
                        btn.title = 'Hapus pencarian';
                        btn.onclick = clearSearch;
                        searchInput.parentNode.appendChild(btn);
                    }
                } else {
                    if (clearSearchBtn) {
                        clearSearchBtn.remove();
                    }
                }
            }

            // Clear search function
            function clearSearch() {
                searchInput.value = '';
                searchInput.focus();
                
                // Remove query parameter and redirect
                const url = new URL(window.location);
                url.searchParams.delete('q');
                url.searchParams.delete('page'); // Reset to page 1
                window.location.href = url.toString();
            }

            // Add event listeners
            searchInput.addEventListener('input', toggleClearButton);
            searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Escape') {
                    clearSearch();
                }
            });

            // Initial check
            toggleClearButton();
        });
    </script>
</body>
</html>
