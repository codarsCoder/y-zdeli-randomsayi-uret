<?php
function generateRandomNumber($chance) {
    $randomNumber = rand(1, 100); // 1 ile 100 arasında rastgele bir sayı üret

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
$totalResults = array();

for ($j = 1; $j <= 10; $j++) {
    $numberCounts = array();
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

    for ($i = 1; $i <= $numberOfRuns; $i++) {
        $randomNumber = generateRandomNumber($chance);
        if (!isset($numberCounts[$randomNumber])) {
            $numberCounts[$randomNumber] = 1;
        } else {
            $numberCounts[$randomNumber]++;
        }
    }

    // Keylere göre büyükten küçüğe sıralayarak sonuçları toplam sonuçlar dizisine ekle
    arsort($numberCounts);
    $totalResults[] = $numberCounts;
}

// Yüzdelik hesaplamaları yap ve sonuçları yazdır
$totalOccurrences = array_fill(1, 24, 0);

foreach ($totalResults as $results) {
    foreach ($results as $number => $count) {
        $totalOccurrences[$number] += $count;
    }
}

echo "Deneme adedi: " . ($numberOfRuns * 10) . "<br>";

for ($i = 1; $i <= 24; $i++) {
    $percentage = ($totalOccurrences[$i] / ($numberOfRuns * 10)) * 100;
    echo "Sayı $i: $percentage% <br>";
}
?>
