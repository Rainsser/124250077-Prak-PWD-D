<?php
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $jumlah = $_POST['jumlah'] ?? '';
    $layanan = $_POST['layanan'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $prioritas = $_POST['prioritas'] ?? '';
    $gps = $_POST['gps'] ?? '';
    
    // biar data ga kosong (validasi)
    if ($nama == '' || $email == '' || $jumlah == 0) {
    echo "Data belum lengkap";
    exit;
    }

    $biayalayanan = [
        "Robot Darat" => 12000,
        "Drone Fixed-Wing" => 20000,
        "VTOL Kargo Berat" => 34000
    ];

    $harga = $biayalayanan[$layanan] ?? 0;
    $total = $jumlah * $harga;
    
    if ($prioritas == "Express"){
        $total += 10000;
    } else if ($prioritas == "Instant") {
        $total += 20000;
    } 

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autonomous Logistics | Konfirmasi Pengiriman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar" style="background-color: #000;" data-bs-theme="light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 p-2 h1" style="color: #fff;">Autonomous Logistics</span>
        </div>
    </nav>

    <div class="alert alert-success text-center" role="alert" style="background-color: #000; opacity: 0.7; margin-top: 50px; padding: 10px;">
        <h2 class="alert-heading" style="color: #fff; font-family: times; font-size: clamp(1.5rem, 5vw, 2rem); padding-top: 20px; padding-bottom: 10px;">Pendaftaran Berhasil!</h2>
    </div>

    <main class="d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 56px);">
        <div class="w-100" style="max-width: 600px;">
            <div class="alert alert-success text-center" role="alert" style="background-color: #000; opacity: 0.9;">
                <h2 class="alert-heading" style="color: #fff; font-family: times; font-size: clamp(1.5rem, 5vw, 2rem); padding-top: 20px; padding-bottom: 10px;"><ins>Konfirmasi Pendaftaran</ins></h2>
                <p style="color: #fff; font-family: times; font-size: clamp(0.9rem, 2.5vw, 1rem);">
                    Nama: <?php echo $nama; ?> <br>
                    Email: <?php echo $email; ?> <br>
                    Jumlah Paket: <?php echo $jumlah; ?> <br>
                    Layanan: <?php echo $layanan; ?> <br>
                    Alamat: <?php echo $alamat; ?> <br>
                </p>
                <br><br>
                <h2 class="alert-heading" style="color: #fff; font-family: times; font-size: clamp(1.5rem, 5vw, 2rem); padding-bottom: 10px;"><ins>Daftar Paket</ins></h2>
                <p style="color: #fff; font-family: times; font-size: clamp(0.9rem, 2.5vw, 1rem);">
                    <?php
                    for ($i = 1; $i <= $jumlah; $i++) {
                        echo "Paket ke-$i <br>";
                    }
                    ?>

                    Total Biaya: Rp<?php echo $total; ?> <br>

                    GPS: 
                    <?php
                    if ($gps) {
                        echo "Aktif";
                    } else {
                        echo "Tidak Aktif";
                    }
                    ?>
                    
                </p>
            </div>

            <div class="text-center" style="margin-top: 20px;">
                <a href="form.html" class="btn btn-outline-secondary">Kembali ke Form</a>
            </div>
        </div>
    </main>

</body>
</html>