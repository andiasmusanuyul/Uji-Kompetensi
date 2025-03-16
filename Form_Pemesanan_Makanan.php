<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Makanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center text-primary">Form Pemesanan Makanan</h2>
    <form method="post">
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Daftar menu dengan harga
                $menu = [
                    "Nasi Goreng" => 10000,
                    "Ayam Goreng" => 12000,
                    "Es Teh" => 2000,
                    "Kopi" => 3000
                ];
                
                // Loop untuk menampilkan menu
                foreach ($menu as $makanan => $harga) {
                    echo "<tr>
                            <td>$makanan</td>
                            <td>Rp. " . number_format($harga, 0, ',', '.') . "</td>
                            <td><input type='number' name='jumlah[$makanan]' value='1' min='0' class='form-control'></td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary w-100">Pesan</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $totalHarga = 0;
        echo "<h3 class='mt-4 text-success'>Detail Pesanan</h3>";
        echo "<ul class='list-group'>";
        
        foreach ($_POST['jumlah'] as $makanan => $jumlah) {
            if ($jumlah > 0) {
                $subtotal = $menu[$makanan] * $jumlah;
                $totalHarga += $subtotal;
                echo "<li class='list-group-item'>$makanan ($jumlah x Rp. " . number_format($menu[$makanan], 0, ',', '.') . ") = Rp. " . number_format($subtotal, 0, ',', '.') . "</li>";
            }
        }
        
        echo "</ul>";
        echo "<h4 class='mt-3 text-danger'>Total Bayar: Rp. " . number_format($totalHarga, 0, ',', '.') . "</h4>";
    }
    ?>
</div>

</body>
</html>