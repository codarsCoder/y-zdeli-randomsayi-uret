<?php

$start = microtime(true); // Başlangıç zamanını al. Bu, işlem süresini ölçmek için kullanılacak.

echo "Başladı <br>"; // İşlemin başladığını ekrana yaz.

function generateRandomNumber() { // Rastgele bir sayı üreten bir fonksiyon tanımla.
    // Sayının çıkma şansını sayının karesi olarak belirle. Bu, her sayı için bir olasılık değeri içeren bir dizi oluşturur.
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

    // PHP'nin kendi rand() fonksiyonunu kullanarak, dizideki olasılık değerlerinin toplamına eşit veya daha küçük bir rastgele sayı üret.
    $randomNumber = rand(1, array_sum($chance));

    // Dizideki her sayı ve olasılık değeri için bir döngü başlat.
    foreach ($chance as $number => $probability) {
        // Eğer rastgele sayı, olasılık değerinden küçük veya eşitse, o sayıyı döndür. Bu, o sayının çıkacağı anlamına gelir.
        if ($randomNumber <= $probability) {
            return $number;
        } else {
            // Eğer rastgele sayı, olasılık değerinden büyükse, rastgele sayıdan olasılık değerini çıkar. Bu, sonraki sayılara şans tanımak için yapılır.
            $randomNumber -= $probability;
        }
    }

    // Eğer hiçbir sayı çıkmazsa, null değeri döndür. Bu durum çok nadir olur.
    return null;
}

$numberOfRuns = 1000000; // Kaç kere rastgele sayı üretileceğini belirle. Bu durumda bir milyon kere.

$numberCounts = array(); // Her sayının kaç kere çıktığını tutmak için boş bir dizi oluştur.

for ($i = 1; $i <= $numberOfRuns; $i++) { // Belirlenen sayıda rastgele sayı üretmek için bir döngü başlat.
    $randomNumber = generateRandomNumber(); // Fonksiyonu çağırarak rastgele bir sayı üret.
    if (!isset($numberCounts[$randomNumber])) { // Eğer üretilen sayının dizideki bir anahtar olarak var olup olmadığını kontrol et.
        $numberCounts[$randomNumber] = 1; // Eğer yoksa, dizide o anahtarla birlikte değeri bir olan bir eleman oluştur. Bu, o sayının ilk kez çıktığını gösterir.
    } else {
        $numberCounts[$randomNumber]++; // Eğer varsa, dizideki o anahtarın değerini bir arttır. Bu, o sayının tekrar çıktığını gösterir.
    }
}

$end = microtime(true); // Bitiş zamanını al. Bu,