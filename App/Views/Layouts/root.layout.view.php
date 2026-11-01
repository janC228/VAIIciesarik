<?php
/** @var string $contentHTML */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MotorBike – motocykle a príslušenstvo.">
    <title>MotorBike</title>
    <link rel="stylesheet" href="<?= $link->asset('css/style.css') ?>">
</head>
<body>

<header class="site-header">
    <div class="header-top container">
        <a class="brand" href="<?= $link->url('home.index') ?>">
            <span class="brand-mark">MB</span>
            <span class="brand-text">
                <strong>MotorBike</strong>
                <small>Motocykle a príslušenstvo, jednoducho a výhodne</small>
            </span>
        </a>

        <div class="header-actions">
            <span class="header-link">Prihlásenie</span>
            <span class="header-link">Obľúbené</span>
            <span class="header-link cart-link">🛒 Košík</span>
        </div>
    </div>

    <nav class="main-nav" aria-label="Hlavná navigácia">
        <div class="container nav-inner">
            <a href="<?= $link->url('home.index') ?>">Domov</a>
            <a href="<?= $link->url('product.index') ?>">Motocykle</a>
        </div>
    </nav>
</header>

<main class="container page-content">
    <?= $contentHTML ?>
</main>

<footer class="site-footer">
    <div class="container footer-inner">
        <div>
            <strong>MotorBike</strong>
            <p>Motocykle a príslušenstvo, jednoducho a výhodne.</p>
        </div>

        <div class="footer-links">
            <span>Informácie o obchode</span>
            <span>Doprava a platba</span>
            <span>Kontakt</span>
        </div>

        <p class="copyright">© 2026 MotorBike</p>
    </div>
</footer>

</body>
</html>