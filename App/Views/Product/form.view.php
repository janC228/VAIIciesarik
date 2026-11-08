<?php
/** @var \App\Models\Motorcycle $motorcycle */
/** @var string[] $errors */
/** @var string $priceInput */
/** @var \Framework\Support\LinkGenerator $link */
?>

<section class="filters motorcycle-form">
    <h1>
        <?= $motorcycle->getId() === null
                ? 'Pridať motocykel'
                : 'Upraviť motocykel' ?>
    </h1>

    <?php foreach ($errors as $error): ?>
        <p class="form-error"><?= e($error) ?></p>
    <?php endforeach; ?>

    <form method="post" action="<?= $link->url('product.save') ?>">
        <input type="hidden" name="id"
               value="<?= (int)($motorcycle->getId() ?? 0) ?>">

        <div class="form-field">
            <label for="name">Názov motocykla</label>
            <input id="name" name="name" type="text"
                   maxlength="150" required
                   value="<?= e($motorcycle->getName() ?? '') ?>">
        </div>

        <div class="form-field">
            <label for="brand">Značka</label>
            <input id="brand" name="brand" type="text"
                   maxlength="100" required
                   value="<?= e($motorcycle->getBrand() ?? '') ?>">
        </div>

        <div class="form-field">
            <label for="category">Kategória</label>
            <input id="category" name="category" type="text"
                   maxlength="100" required
                   value="<?= e($motorcycle->getCategory() ?? '') ?>">
        </div>

        <div class="form-field">
            <label for="price">Cena (€)</label>
            <input id="price" name="price" type="number"
                   min="0" max="10000000" step="1" required
                   value="<?= e($priceInput) ?>">
        </div>

        <div class="form-field">
            <label for="description">Popis</label>
            <textarea id="description" name="description"
                      rows="4" required><?= e($motorcycle->getDescription() ?? '') ?></textarea>
        </div>

        <div class="form-actions">
            <button class="button button-primary" type="submit">
                Uložiť motocykel
            </button>

            <a class="button button-outline"
               href="<?= $link->url('product.index') ?>">
                Späť do katalógu
            </a>
        </div>
    </form>
</section>
