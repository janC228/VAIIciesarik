<?php
/** @var \App\Models\Motorcycle[] $motorcycles */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="page-heading" aria-labelledby="page-title">
    <div>
        <h1 id="page-title">Katalóg produktov</h1>
        <p class="intro">Vyber si motocykel, ktorý spĺňa tvoje požiadavky.</p>
    </div>

    <form class="search-form" role="search">
        <label class="visually-hidden" for="product-search">Hľadať produkt</label>
        <input id="product-search" type="search" placeholder="Hľadať produkt…">
        <button type="submit">Hľadať</button>
    </form>
</section>

<div class="catalog-layout">
    <aside class="filters" aria-labelledby="filters-title">
        <div class="filters-heading">
            <h2 id="filters-title">Filtre</h2>
        </div>

        <form>
            <fieldset>
                <legend>Kategória</legend>
                <label class="check-option"><input type="checkbox"> Adventure</label>
                <label class="check-option"><input type="checkbox"> Cestné</label>
                <label class="check-option"><input type="checkbox"> Enduro</label>
                <label class="check-option"><input type="checkbox"> Športové</label>
            </fieldset>

            <fieldset>
                <legend>Značka</legend>
                <label class="check-option"><input type="checkbox"> BMW</label>
                <label class="check-option"><input type="checkbox"> Honda</label>
                <label class="check-option"><input type="checkbox"> KTM</label>
                <label class="check-option"><input type="checkbox"> Yamaha</label>
            </fieldset>

            <fieldset>
                <legend>Cena (€)</legend>
                <div class="price-inputs">
                    <label>
                        <span class="visually-hidden">Cena od</span>
                        <input type="number" min="0" placeholder="Od">
                    </label>
                    <span aria-hidden="true">–</span>
                    <label>
                        <span class="visually-hidden">Cena do</span>
                        <input type="number" min="0" placeholder="Do">
                    </label>
                </div>
            </fieldset>

            <button class="button button-primary filter-button" type="submit">Použiť filtre</button>
            <button class="button button-quiet filter-reset" type="reset">Zrušiť výber</button>
        </form>
    </aside>

    <section class="products-section" aria-labelledby="products-title">
        <div class="products-toolbar">
            <div>
                <h2 id="products-title">Ponuka motocyklov</h2>
                <p class="result-count">Zobrazené produkty: <?= count($motorcycles) ?></p>
            </div>

            <label class="sort-control">
                <span>Zobraziť podľa</span>
                <select aria-label="Zoradiť produkty">
                    <option>Ceny – vzostupne</option>
                    <option>Ceny – zostupne</option>
                    <option>Názvu A – Z</option>
                    <option>Názvu Z – A</option>
                </select>
            </label>
        </div>
        <p>
            <a class="button button-primary"
               href="<?= $link->url('product.add') ?>">
                Pridať motocykel
            </a>
        </p>

        <div class="product-grid">
            <?php foreach ($motorcycles as $motorcycle): ?>
                <article class="product-card">
                    <div class="product-image motorcycle-image">
                <span class="product-badge">
                    <?= e($motorcycle->getBrand() ?? '') ?>
                </span>
                        <span class="illustration" aria-hidden="true">🏍️</span>
                    </div>

                    <div class="product-info">
                        <p class="product-category">
                            <?= e($motorcycle->getCategory() ?? '') ?>
                        </p>

                        <h3><?= e($motorcycle->getName() ?? '') ?></h3>

                        <p class="product-description">
                            <?= e($motorcycle->getDescription() ?? '') ?>
                        </p>

                        <div class="product-bottom">
                            <strong class="price">
                                <?= number_format($motorcycle->getPrice() ?? 0, 0, ',', ' ') ?> €
                            </strong>

                            <div class="crud-actions">
                                <a class="button button-outline"
                                   href="<?= $link->url('product.edit', [
                                           'id' => $motorcycle->getId()
                                   ]) ?>">
                                    Upraviť
                                </a>

                                <form method="post"
                                      action="<?= $link->url('product.delete') ?>">
                                    <input type="hidden" name="id"
                                           value="<?= (int)$motorcycle->getId() ?>">
                                    <button class="button button-outline"
                                            type="submit">
                                        Odstrániť
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

    </section>
</div>
