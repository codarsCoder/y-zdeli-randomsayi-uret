<?php

// Her sayının kaç kez çıktığını tutmak için bir dizi oluştur.
$frequencies = array();

// Dizinin tüm elemanlarını sıfırla.
for ($i = 1; $i <= 24; $i++) {
    $frequencies[$i] = 0;
}

// 1000 kez rastgele sayı üret ve diziyi güncelle.
for ($j = 1; $j <= 1000; $j++) {
    $randomNumber = random_int(1, 24); // 1 ile 24 arasında rastgele bir sayı üret.
    $frequencies[$randomNumber]++; // Üretilen sayının frekansını bir arttır.
}

// Diziyi ekrana yazdır.
foreach ($frequencies as $number => $frequency) {
    echo "$number sayısı $frequency kez çıktı.<br>";
}

?>
