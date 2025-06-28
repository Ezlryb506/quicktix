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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--background-color);
        }
        
        .navbar {
            background-color: var(--white);
            padding: 1rem 5%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            gap: 32rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-login {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-login:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .btn-register {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-register:hover {
            background-color: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .btn-search {
            background: var(--primary-color);
            color: var(--white);
            border: none;
            margin-right: 0.5rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .btn-search i {
            margin-right: 0.3rem;
        }

        .btn-search:hover {
            background: #357ABD;
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
        }

        .hero {
            padding: 12rem 5% 4rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, #357ABD 100%);
            color: var(--white);
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .features {
            padding: 4rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .features h2 {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--primary-color);
        }

        .features-carousel-container {
            overflow: hidden;
            position: relative;
            -webkit-mask-image: linear-gradient(to right, transparent, black 20%, black 80%, transparent);
            mask-image: linear-gradient(to right, transparent, black 20%, black 80%, transparent);
        }
        
        .features-grid {
            display: flex;
            gap: 2rem;
            padding-bottom: 1rem;
            animation: featureScroll 40s linear infinite;
        }

        .features-carousel-container:hover .features-grid {
            animation-play-state: paused;
        }
        
        .feature-card {
            width: 280px; 
            flex-shrink: 0;
            background: var(--white);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        @keyframes featureScroll {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-2184px); /* (280px width + 32px gap) * 7 cards */
            }
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .feature-icon i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .feature-card p {
            color: #666;
        }

        .events {
            padding: 4rem 5%;
            background-color: var(--white);
        }

        .events h2 {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--primary-color);
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .event-card {
            background: var(--background-color); /* DIPERBAIKI: Menggunakan variabel yang ada */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .event-image {
            width: 100%;
            height: 200px;
            object-fit: contain;
            background: #f4f6fa;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            display: block;
        }

        .event-content {
            padding: 1.5rem;
        }

        .event-content h3 {
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .event-content p {
            color: #666;
            margin-bottom: 1rem;
        }

        .event-price {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.2rem;
        }

        .event-action-center {
            text-align: center;
            margin-top: 2.5rem;
        }
        .btn-go-events {
            display: inline-block;
            background: var(--primary-color);
            color: var(--white);
            padding: 0.8rem 2.2rem;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(74,144,226,0.13);
            transition: all 0.3s;
            border: none;
        }
        .btn-go-events i {
            margin-right: 0.7rem;
        }
        .btn-go-events:hover {
            background: #357ABD;
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(74,144,226,0.18);
        }

        .footer {
            background-color: var(--text-color);
            color: var(--white);
            padding: 3rem 5%;
            text-align: center;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer p {
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: var(--white);
            text-decoration: none;
            font-size: 1.2rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.2s;
        }

        .social-links a:hover {
            color: var(--primary-color);
        }

        .social-links i {
            font-size: 1.3em;
        }

        /* DIPERBAIKI: Kode responsif ditambahkan kembali */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 1.5rem;
            }
            .nav-buttons {
                width: 100%;
                justify-content: center;
                margin-top: 0.5rem;
            }
            .hero {
                padding: 6rem 5% 3rem;
            }
            .hero h1 {
                font-size: 2rem;
            }
            .events-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="<?php echo base_url(); ?>" class="logo">QuickTix</a>
            <div class="nav-buttons">
                <a href="<?php echo base_url('events/search'); ?>" class="btn btn-search"><i class="fas fa-search"></i> Cari Event</a>
                <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-login">Masuk</a>
                <a href="<?php echo base_url('auth/register'); ?>" class="btn btn-register">Daftar</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Tiket Cepat, Tanpa Ribet!</h1>
            <p>Temukan dan beli tiket event favoritmu dengan mudah dan aman</p>
        </div>
    </section>

    <section class="features" id="features">
        <h2>Mengapa Memilih QuickTix?</h2>
        <div class="features-carousel-container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div><h3>Pembelian Cepat</h3><p>Proses pembelian tiket yang cepat dan mudah dalam hitungan menit</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div><h3>Pembayaran Aman</h3><p>Transaksi aman dengan berbagai metode pembayaran terpercaya</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div><h3>E-Ticket</h3><p>Terima tiket digital langsung ke email atau smartphone Anda</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-map-marked-alt"></i></div><h3>Tiket di Berbagai Daerah</h3><p>Pilih event dan konser dari berbagai kota besar di Indonesia</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-tags"></i></div><h3>Banyak Promosi & Diskon</h3><p>Nikmati promo menarik dan diskon spesial setiap bulannya</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-headset"></i></div><h3>Dukungan 24 Jam</h3><p>Customer service siap membantu Anda kapan saja</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-undo-alt"></i></div><h3>Proses Refund Mudah</h3><p>Refund tiket mudah dan transparan jika event dibatalkan</p>
                </div>
            </div>
        </div>
    </section>

    <section class="events" id="events">
        <h2>Event Terbaru</h2>
        <div class="events-grid">
            <div class="event-card">
                <img src="uploads/java-jazz.jpg" alt="Event 1" class="event-image">
                <div class="event-content">
                    <h3>Konser Musik Jazz</h3><p>Sabtu, 23 Juni 2025 • 19:00 WIB</p><p>Venue: Jakarta Convention Center</p><p class="event-price">Rp 250.000</p>
                </div>
            </div>
            <div class="event-card">
                <img src="uploads/digital-marketing.jpg" alt="Event 2" class="event-image">
                <div class="event-content">
                    <h3>Workshop Digital Marketing</h3><p>Minggu, 29 Juni 2025 • 09:00 WIB</p><p>Venue: Digital Hub Jakarta</p><p class="event-price">Rp 150.000</p>
                </div>
            </div>
            <div class="event-card">
                <img src="uploads/festival-kuliner-Bekasi2.jpg" alt="Event 3" class="event-image">
                <div class="event-content">
                    <h3>Festival Kuliner</h3><p>Sabtu, 5 Juli 2025 • 10:00 WIB</p><p>Venue: Central Park Mall</p><p class="event-price">Rp 100.000</p>
                </div>
            </div>
        </div>
        <div class="event-action-center">
            <a href="<?php echo base_url('events/search'); ?>" class="btn-go-events">
                <i class="fas fa-search"></i> Lihat Semua Event
            </a>
        </div>
    </section>

    <footer class="footer" id="contact">
        <!-- DIPERBAIKI: Konten footer ditambahkan kembali -->
        <div class="footer-content">
            <p>© 2025 QuickTix. All rights reserved.</p>
            <p>Tiket Cepat, Tanpa Ribet!</p>
            <div class="social-links">
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.querySelector('.features-grid');
            if (!track) return;

            const cards = Array.from(track.children);
            
            cards.forEach(card => {
                const clone = card.cloneNode(true);
                clone.setAttribute('aria-hidden', 'true'); 
                track.appendChild(clone);
            });
        });
    </script>
</body>
</html>
