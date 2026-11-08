CREATE TABLE
    IF NOT EXISTS motorcycles (

        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(150) NOT NULL,
        brand VARCHAR(100) NOT NULL,
        category VARCHAR(100) NOT NULL,
        price INT NOT NULL,
        description TEXT NOT NULL)
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;

INSERT INTO motorcycles
(name, brand, category, price, description)
VALUES
    ('Honda CRF250R', 'Honda', 'Enduro', 7490,
     'Motocykel vhodný do terénu a najnáročnejších podmienok.'),

    ('Yamaha MT-07', 'Yamaha', 'Cestné', 8990,
     'Ľahký a obratný motocykel na každodenné jazdenie.'),

    ('KTM 1290 Super Adventure', 'KTM', 'Adventure', 13790,
     'Motocykel určený pre zdolávanie dlhých jázd.'),

    ('BMW S1000RR', 'BMW', 'Športové', 27990,
     'Najvýkonnejší stroj pre najrýchlejších jazdcov.');