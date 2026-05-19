<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun - Tokokita</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #e1f0fd;
            overflow: hidden;
        }

        /* Container Utama Pembagi Layar */
        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            position: relative;
            background: linear-gradient(135deg, #e1f0fd 0%, #cee6fa 100%);
        }

        /* SISI KIRI: Area Gelombang Berlapis */
        .left-side {
            width: 48%;
            height: 100%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        /* Layer Gelombang Luar (Biru Muda Gradasi) */
        .wave-outer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('dus1.png');
            background-size: 100% 100%;
            background-position: left center;
            background-repeat: no-repeat;
            z-index: -2;
        }

        /* Layer Gelombang Dalam (Biru Tua) */
        .wave-inner {
            position: absolute;
            top: 0;
            left: 0;
            width: 95%; /* Menyisakan ruang agar pinggiran dus1 tetap terlihat presisi */
            height: 100%;
            background-image: url('dus2.png');
            background-size: 100% 100%;
            background-position: left center;
            background-repeat: no-repeat;
            z-index: -1;
        }

        /* Container Komponen Logo */
        .logo-container {
            width: 100%;
            max-width: 320px;
            padding: 0 30px;
            text-align: center;
            z-index: 2;
            margin-right: 12%; /* Dorong posisi logo sedikit ke kiri agar seimbang */
        }

        .brand-logo {
            width: 100%;
            height: auto;
            object-fit: contain;
            display: block;
        }

        /* SISI KANAN: Tempat Form Berada */
        .right-side {
            width: 52%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2;
        }

        /* Card Form Putih Kebiruan dengan Efek Lembut */
        .card {
            background: rgba(227, 242, 253, 0.85);
            width: 490px;
            padding: 55px 45px;
            border-radius: 32px;
            box-shadow: 0 20px 45px rgba(85, 128, 160, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.3rem;
            color: #1e354a;
            margin-bottom: 15px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .card p.instruction {
            font-size: 0.9rem;
            color: #62829c;
            line-height: 1.6;
            margin-bottom: 35px;
            font-weight: 400;
        }

        /* Struktur Baris Kotak OTP */
        .otp-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 15px;
        }

        .otp-input {
            width: 56px;
            height: 72px;
            border: 1.5px solid #b7cfe0;
            border-radius: 14px;
            background: #ffffff;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            color: #1e354a;
            outline: none;
            transition: all 0.2s ease-in-out;
        }

        .otp-input:focus {
            border-color: #5580a0;
            box-shadow: 0 0 10px rgba(85, 128, 160, 0.25);
        }

        /* Indikator Titik-Titik di Bawah Kotak */
        .dots-indicator {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 35px;
        }

        .dot {
            width: 6px;
            height: 6px;
            background-color: #b7cfe0;
            border-radius: 50%;
        }

        /* Tombol Aksi */
        .btn-submit {
            width: 100%;
            background-color: #6c92b0;
            color: #ffffff;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(108, 146, 176, 0.2);
        }

        .btn-submit:hover {
            background-color: #557996;
        }

        /* Teks Tautan Kirim Ulang */
        .resend-text {
            text-align: center;
            font-size: 0.85rem;
            color: #799bb5;
        }

        .resend-link {
            color: #1e354a;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1.5px solid #1e354a;
            padding-bottom: 2px;
            cursor: pointer;
        }

        .resend-link:hover {
            color: #000000;
            border-color: #000000;
        }
    </style>
</head>
<body>

    <?php
    // Logika dasar pemrosesan backend PHP
    $otp_tergabung = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['otp']) && is_array($_POST['otp'])) {
            $otp_tergabung = implode("", $_POST['otp']);
            // Variabel $otp_tergabung siap divalidasi ke database di sini
        }
    }
    ?>

    <div class="container">
        <div class="left-side">
            <div class="wave-outer"></div>
            <div class="wave-inner"></div>
            
            <div class="logo-container">
                <img src="logo.png" alt="Logo Tokokita" class="brand-logo">
            </div>
        </div>

        <div class="right-side">
            <div class="card">
                <h2>Verifikasi Akun!</h2>
                <p class="instruction">Kami telah mengirimkan kode OTP ke email Anda.<br>Silakan masukkan 6 digit kode di bawah ini.</p>
                
                <form action="" method="POST">
                    <div class="otp-container">
                        <input type="text" name="otp[]" class="otp-input" maxlength="1" required oninput="moveNext(this, 0)">
                        <input type="text" name="otp[]" class="otp-input" maxlength="1" required oninput="moveNext(this, 1)">
                        <input type="text" name="otp[]" class="otp-input" maxlength="1" required oninput="moveNext(this, 2)">
                        <input type="text" name="otp[]" class="otp-input" maxlength="1" required oninput="moveNext(this, 3)">
                        <input type="text" name="otp[]" class="otp-input" maxlength="1" required oninput="moveNext(this, 4)">
                        <input type="text" name="otp[]" class="otp-input" maxlength="1" required oninput="moveNext(this, 5)">
                    </div>

                    <div class="dots-indicator">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>

                    <button type="submit" class="btn-submit">Masukkan 6 Digit Kode</button>
                    
                    <div class="resend-text">
                        Tidak menerima kode? Kirim ulang dalam <a href="#" class="resend-link">Kirim ulang</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll('.otp-input');
        
        function moveNext(current, index) {
            // Membatasi agar karakter input wajib berupa angka (0-9)
            current.value = current.value.replace(/[^0-9]/g, '');
            
            // Fokus otomatis bergeser ke baris kotak sebelah kanan jika sudah terisi
            if (current.value.length >= 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        }

        // Event handler deteksi tombol Backspace untuk mundur ke kotak sebelumnya
        inputs.forEach((input, index) => {
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && input.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    </script>
</body>
</html>