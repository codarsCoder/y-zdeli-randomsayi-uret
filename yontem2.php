<?php

// Boş bir obje oluştur.
$numbers = new stdClass();

// Objeye istediğiniz özellikleri ekleyin.
$numbers->{"1"} = 0.1; // 1'in çıkma ihtimali binde 1.
$numbers->{"2"} = 0.2; // 2'nin çıkma ihtimali binde 2.
$numbers->{"3"} = 0.3; // 3'ün çıkma ihtimali binde 3.
// ...
$numbers->{"24"} = 0.24; // 24'ün çıkma ihtimali binde 24.

// Objedeki tüm yüzdelere göre bir kümülatif dağılım oluştur.
$cumulativeDistribution = array();
$sum = 0;
foreach ($numbers as $number => $percentage) {
    $sum += $percentage;
    $cumulativeDistribution[$number] = $sum;
}

// 0 ile kümülatif dağılımın son değeri arasında rastgele bir ondalıklı sayı üret.
$randomDecimal = mt_rand(0, 10000) / 1000;

// Üretilen ondalıklı sayının hangi kümülatif dağılım aralığına düştüğünü bul.
$lowerBound = null;
foreach ($cumulativeDistribution as $number => $value) {
    if ($randomDecimal <= $value) {
        $lowerBound = $value;
        break;
    }
}

// Bulunan kümülatif dağılım değerinin objedeki hangi sayıya karşılık geldiğini bul.
$randomNumber = null;
foreach ($numbers as $number => $percentage) {
    if ($lowerBound == $cumulativeDistribution[$number]) {
        $randomNumber = $number;
        break;
    }
}

// Rastgele sayıyı ekrana yazdır.
echo "Rastgele sayınız: $randomNumber";

?>
