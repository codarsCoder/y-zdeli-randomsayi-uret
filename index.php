<?php

$start = time(); // Başlangıç zamanını al

echo "Başladı <br>";
function generateRandomNumber() {
    // Sayının çıkma şansını sayının karesi olarak belirle
    $chance = array(
        1 => 1,
        2 => 4,
        3 => 9,
        4 => 16,
        5 => 25,
        6 => 36,
        7 => 49,
        8 => 64,
        9 => 81,
        10 => 100,
        11 => 121,
        12 => 144,
        13 => 169,
        14 => 196,
        15 => 225,
        16 => 256,
        17 => 289,
        18 => 324,
        19 => 361,
        20 => 400,
        21 => 441,
        22 => 484,
        23 => 529,
        24 => 576
    );

    // PHP'nin kendi rand() fonksiyonunu kullan
    $randomNumber = rand(1, array_sum($chance));

    foreach ($chance as $number => $probability) {
        if ($randomNumber <= $probability) {
            return $number;
        } else {
            $randomNumber -= $probability;
        }
    }

    return null;
}

$numberOfRuns = 10000000;
$numberCounts = array();

for ($i = 1; $i <= $numberOfRuns; $i++) {
    $randomNumber = generateRandomNumber();
    if (!isset($numberCounts[$randomNumber])) {
        $numberCounts[$randomNumber] = 1;
    } else {
        $numberCounts[$randomNumber]++;
    }
}

$end = time(); // Bitiş zamanını al
$executionTime = ($end - $start); // İşlem süresini hesapla

?>
<div class="temizle"> <?php 
echo "Deneme adedi: ".$numberOfRuns."<br>";
echo "İşlem $executionTime saniye sürdü\n";
echo "Çıkma Frekansları:\n";

// Keylere göre büyükten küçüğe sıralayarak sonuçları yazdır
arsort($numberCounts);

// Çıkmayanları bul ve sona eklemek için 1'den 24'e döngü ile kontrol et
for ($i = 1; $i <= 24; $i++) {
    if (!isset($numberCounts[$i])) {
        $numberCounts[$i] = 0;
    }
}

foreach ($numberCounts as $number => $count) {
    echo "Sayı $number: $count kere <br>";
}
?>
</div>
