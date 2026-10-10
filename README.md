# MotorBike – Internetový obchod s motocyklami a príslušenstvom

Ján Ciesarík

5ZYI31

## Stručný opis projektu
MotorBike je webová aplikácia internetového obchodu zameraná na predaj motocyklov a motocyklového príslušenstva. Jej cieľom je umožniť zákazníkom jednoducho vyhľadávať, prezerať a nakupovať produkty na jednom mieste. V ponuke sa budú nachádzať rôzne typy motocyklov, napríklad športové, cestovné, či enduro, ale aj príslušenstvo ako prilby, topánky alebo motocyklové oblečenie.
Aplikáciu budú môcť používať návštevníci, registrovaní zákazníci a administrátor obchodu. Návštevníci si budú môcť prezerať ponuku produktov, zatiaľ čo registrovaní zákazníci budú môcť pridávať produkty do nákupného košíka, vytvárať objednávky a sledovať ich stav. Administrátor bude mať na starosti správu produktov, kategórií a prijatých objednávok.

## Role v projekte
V aplikácii budú existovať tri používateľské role, ktoré sa budú líšiť svojimi oprávneniami.

Návštevník - Neprihlásený používateľ, ktorý si môže prezerať ponuku motocyklov a príslušenstva, vyhľadávať a filtrovať produkty, ale aj zobrazovať ich podrobné informácie, má možnosť vytvoriť si účet.

Registrovaný zákazník - Prihlásený používateľ, ktorý má okrem možností návštevníka prístup aj k nákupnému košíku. Môže pridávať a odoberať produkty z košíka, vytvárať objednávky, prezerať si históriu svojich objednávok a sledovať ich aktuálny stav. Zároveň môže spravovať údaje svojho používateľského účtu.

Administátor - Používateľ s rozšírenými oprávneniami, ktorý zabezpečuje správu internetového obchodu. Môže pridávať, upravovať a odstraňovať produkty a kategórie, spravovať obrázky produktov a prezerať a aktualizovať stav prijatých objednávok.

## Prípady použitia podľa rolí
Návštevník
-	Prezrie si ponuku motocyklov a motocyklového príslušenstva.
-	Vyhľadá produkt podľa názvu.
-	Filtruje produkty podľa kategórie, značky alebo ceny.
-	Zobrazí si detail produktu vrátane popisu, ceny, parametrov a obrázkov.
-	Zaregistruje si nový používateľský účet.
  
Registrovaný zákazník
-	Vykonáva všetky činnosti dostupné návštevníkovi.
-	Prihlási sa do existujúceho účtu.
-	Odhlási sa zo svojho účtu.
-	Pridá vybraný produkt do nákupného košíka.
-	Upraví množstvo produktov v košíku alebo z neho produkty odstráni.
-	Upraví svoje osobné a kontaktné údaje.
  
Administrátor
-	Prihlási sa do administračnej časti aplikácie.
-	Zobrazí si zoznam produktov a ich podrobné informácie.
-	Pridá nový produkt do ponuky.
-	Upraví informácie o existujúcom produkte.
-	Odstráni produkt z ponuky.
-	Pridá, upraví alebo odstráni kategóriu produktov.
-	Zmení stav objednávky, napríklad na spracovávanú, odoslanú alebo dokončenú.

## Plánované entity
1.	Používateľ
   
Reprezentuje registrovaného používateľa aplikácie. Uchováva jeho prihlasovacie a kontaktné údaje a určuje jeho rolu v systéme.
-	Atribúty: id, meno, priezvisko, email, heslo, telefón, adresa, rola
-	Vzťahy: Jeden používateľ môže vytvoriť viacero objednávok.

2.	Produkt
   
Reprezentuje motocykel alebo príslušenstvo, ktoré je dostupné v internetovom obchode.
-	Atribúty: id, názov, popis, cena, značka, množstvo_na_sklade, kategória_id
-	Vzťahy: Produkt patrí do jednej kategórie, môže mať viacero obrázkov a môže sa nachádzať vo viacerých položkách objednávok.

3.	Kategória
   
Slúži na rozdelenie produktov do jednotlivých skupín, napríklad športové motocykle, cestovné motocykle, prilby alebo oblečenie.
-	Atribúty: id, názov, popis
-	Vzťahy: Jedna kategória môže obsahovať viacero produktov.

4.	Objednávka
   
Uchováva informácie o objednávke vytvorenej registrovaným zákazníkom.
-	Atribúty: id, používateľ_id, dátum_vytvorenia, stav, celková_cena, doručovacia_adresa
-	Vzťahy: Objednávka patrí jednému používateľovi a obsahuje jednu alebo viacero položiek objednávky.

5.	Položka objednávky
   
Reprezentuje konkrétny produkt v objednávke spolu s jeho množstvom a cenou v čase nákupu.
-	Atribúty: id, objednávka_id, produkt_id, množstvo, jednotková_cena
-	Vzťahy: Každá položka patrí do jednej objednávky a odkazuje na jeden produkt.

## Vzťahy medzi entitami
-	Používateľ – Objednávka (1:M): Jeden používateľ môže vytvoriť viacero objednávok, pričom každá objednávka patrí iba jednému používateľovi.
-	Kategória – Produkt (1:M): Jedna kategória môže obsahovať viacero produktov, pričom každý produkt patrí iba do jednej kategórie.
-	Objednávka – Položka objednávky (1:M): Jedna objednávka môže obsahovať viacero položiek, pričom každá položka patrí iba do jednej objednávky.
-	Objednávka – Produkt (M:N): Jedna objednávka môže obsahovať viacero produktov a jeden produkt sa môže nachádzať vo viacerých objednávkach.

## Hlavné stránky aplikácie
1.  Domovská stránka - Úvodná stránka internetového obchodu, ktorá bude obsahovať základné informácie o obchode, vybrané produkty a odkazy na jednotlivé kategórie motocyklov a príslušenstva.

2. Katalóg produktov - Stránka zobrazujúca ponuku všetkých dostupných produktov. Používatelia budú môcť produkty vyhľadávať, filtrovať podľa kategórie, značky alebo ceny a prejsť na ich detail.

3. Detail produktu - Stránka s podrobnými informáciami o vybranom produkte, ako sú názov, popis, cena, dostupnosť, parametre a obrázky. 

4. Prihlásenie a registrácia - Stránka umožňujúca návštevníkom vytvoriť si nový používateľský účet alebo sa prihlásiť do existujúceho účtu.

5. Nákupný košík - Stránka dostupná prihláseným zákazníkom, na ktorej sa zobrazia vybrané produkty, ich množstvo a celková cena. Zákazník bude môcť upravovať obsah košíka a vytvoriť objednávku.

## Rozdelenie funkcionality
Základné funkcie
-	Registrácia, prihlásenie a odhlásenie používateľov.
-	Rozdelenie používateľov na zákazníkov a administrátorov s rôznymi oprávneniami.
-	Zobrazenie katalógu motocyklov a motocyklového príslušenstva.
-	Zobrazenie detailných informácií o produktoch.
-	Vyhľadávanie a filtrovanie produktov podľa kategórie, značky alebo ceny.
-	Pridávanie produktov do nákupného košíka, úprava množstva a odstraňovanie produktov z košíka.
-	Vytváranie objednávok.
-	Správa produktov a kategórií administrátorom (pridávanie, zobrazovanie, úprava a mazanie).
  
Rozširujúce funkcie
-	Porovnávanie vybraných motocyklov podľa technických parametrov.
-	Hodnotenie produktov a pridávanie recenzií.
-	Zobrazenie štatistík predaja v administrácii.
-	Zľavy na produkty – administrátor bude môcť nastaviť zľavu na vybrané produkty, pričom zákazníkovi sa zobrazí pôvodná aj zľavnená cena.
