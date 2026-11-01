
<?php
/** @var LinkGenerator $link */

use Framework\Support\LinkGenerator;

?>

<section>
    <p class="eyebrow">Vitajte v MotorBike</p>
    <h1>Motocykle a príslušenstvo</h1>
    <p class="intro">
        Objav našu ponuku motocyklov, prilieb a vybavenia.
    </p>

    <p>
        Vyber si motocykel alebo výbavu, ktorá ti sadne.
    </p>

    <a class="button button-outline"
       href="<?= $link->url('product.index') ?>">
        Prejsť do katalógu
    </a>
</section>