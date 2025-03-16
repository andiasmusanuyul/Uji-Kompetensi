<?php
function hitungDiskon($totalBelanja) {
    if ($totalBelanja >= 100000) {
        return 0.10; // 10% diskon
    } elseif ($totalBelanja >= 50000) {
        return 0.05; // 5% diskon
    } else {
        return 0; // Tidak ada diskon
    }
}

function tampilkanHasil($totalBelanja) {
    $diskonPersen = hitungDiskon($totalBelanja) * 100;
    $jumlahDiskon = $totalBelanja * hitungDiskon($totalBelanja);
    $totalBayar = $totalBelanja - $jumlahDiskon;

    echo "<h2>Struk Belanja</h2>";
    echo "Total Belanja: Rp. " . number_format($totalBelanja, 0, ',', '.') . "<br>";
    echo "Diskon: $diskonPersen% (Rp. " . number_format($jumlahDiskon, 0, ',', '.') . ")<br>";
    echo "<strong>Total Bayar: Rp. " . number_format($totalBayar, 0, ',', '.') . "</strong><br>";
}

$totalBelanja = 120000;
tampilkanHasil($totalBelanja);
?>