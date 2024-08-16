<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat Penghargaan</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            text-align: center;
            margin: 0;
        }

        .container {
            width: 800px;
            margin: 50px auto;
            padding: 50px;
            /* background: none; */ /* Hapus pengaturan background di sini */
            border: 2px solid #996633;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            page-break-after: always;
            position: relative;
        }

        .content {
            position: relative;
            z-index: 1;
            padding: 20px;
        }

        .bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .header {
            color: #996633;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .header h2 {
            font-size: 36px;
            margin: 0;
        }

        .logo {
            width: 70px;
            height: auto;
        }

        .nrp-satpam {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .nama-satpam {
            font-family: 'Brush Script MT', cursive;
            font-size: 48px;
            margin-bottom: 15px;
            text-transform: capitalize;
        }

        .body {
            line-height: 1.8;
            font-size: 18px;
            margin-bottom: 40px;
            text-align: justify;
        }

        .footer {
            text-align: right;
            font-style: italic;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script>
        window.onload = function() {
            const containers = document.querySelectorAll('.container');
            containers.forEach(container => {
                const bgImage = new Image();
                bgImage.src = '/assets/images/piagam.png'; // Path to background image
                bgImage.classList.add('bg-image');
                container.appendChild(bgImage);
            });
        };
        window.print();
    </script>
</head>
<body>
    @if($results->isNotEmpty())
        @foreach($results as $result)
            <div class="container">
                <div class="content">
                    <div class="header">
                        <img src="{{ asset('assets/images/logo-admana.png') }}" alt="Logo ADMANA" class="logo">
                        <h2>PIAGAM PENGHARGAAN</h2>
                        <img src="{{ asset('assets/images/logo-ppa.png') }}" alt="Logo PPA" class="logo">
                    </div>
                    <div class="nama-satpam">{{ ucwords(strtolower($result['nama'])) }}</div>
                    <div class="nrp-satpam">{{ $result['nrp_satpam'] }}</div>
                    <div class="body">
                        <p>Sebagai bentuk apresiasi dan pengakuan atas dedikasi, profesionalisme, dan kinerja luar biasa yang telah ditunjukkan selama periode <b>{{ $selectedPeriode }}</b>, Satpam ini telah menunjukkan komitmen tinggi dalam menjaga keamanan dan kenyamanan lingkungan kerja, serta memberikan pelayanan yang terbaik kepada seluruh anggota perusahaan.</p>
                    </div>
                    <div class="footer">
                        <p><b>Imam Musori</b></p>
                        <p>Penanggung Jawab Operasional</p>
                        <p>{{ now()->format('d.m.Y') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="container">
            <p>Tidak ada data yang tersedia untuk periode ini.</p>
        </div>
    @endif
</body>
</html>
