# Munkanapló (2019. 08. 15.)

Kezdés: 2019. 08. 15.
Befejezés: 2019. 08. 15.

## Elvégzett feladatok:

* A projekt technikai megvalósításához szükséges szoftverkomponensek kiválasztása és a fejlesztőkörnyezet üzembe helyezése, mely az alábbiakból áll. 

> * JetBrains WebStrom, JetBrains PHPStorm
> * XAMPP (MariaDB)
> * HeidiSQL

* Az adatbázis szerver és motor (MariaDB) dokumentációjának (MariaDB.com Library) áttekintése, alkalmas nyelvi elemek és eszközök keresése az előzetes specifikáció alapján megjelölt feladat elvégzéséhez (Rekurziv lekérdezések, CTE).

**A fentiekre fordított időmennyiség:** 8 óra


*Kelt:* 2019. 08. 22. 

Bozsik Armand Viktor

---
# Munkanapló (2019. 08. 16.)

Kezdés: 2019. 08. 16.
Befejezés: 2019. 08. 16.

## Elvégzett feladatok:

* A projekt technikai megvalósításához szükséges szoftverkomponenseken változtattam a felhasználható technológiák pontosítása után (a Németh Gáborral illetve Csanádi Viktorral történt egyeztetést követően): 

> * JetBrains WebStrom, JetBrains PHPStorm
> * XAMPP 7.2.21 (illetve MySQL 5.6.45 32-bit)
> * HeidiSQL

* Az adatbázis szerver és motor (MySQL) dokumentációjának (dev.mysql.com) áttekintése, alkalmas nyelvi elemek és eszközök keresése az előzetes specifikáció alapján megjelölt feladat elvégzéséhez (Rekurziv lekérdezések, CTE). Eltérések keresése MariaDB-hez képest.
* A XAMPP és a MySQL beüzemeléséhez szakirodalom és internetes források olvasása

Az adatbázis beüzemeléséhez segitséget nyújtott Németh Gábor StackOverflow találata: https://stackoverflow.com/questions/25962678/add-mysql-to-existing-xampp-installation
illetve Daniel Opitz leirása (többek közt): https://odan.github.io/2017/08/13/xampp-replacing-mariadb-with-mysql.html 

**A fentiekre fordított időmennyiség:** 8 óra


*Kelt:* 2019. 08. 22. 

Bozsik Armand Viktor

---
# Munkanapló (2019. 08. 17-20.)

Kezdés: 2019. 08. 17.
Befejezés: 2019. 08. 20.

## Elvégzett feladatok:

* A projekt technikai megvalósításához szükséges szoftverkomponenseken változtattam a felhasználható technológiák pontosítása után (a Németh Gáborral illetve Csanádi Viktorral történt egyeztetést követően): 

> * JetBrains WebStrom, JetBrains PHPStorm
> * XAMPP 7.2.21 (illetve MySQL 5.6.45 32-bit)
> * HeidiSQL

* Az adatbázis szerver és motor (MySQL) dokumentációjának (dev.mysql.com) áttekintése, alkalmas nyelvi elemek és eszközök keresése az előzetes specifikáció alapján megjelölt feladat elvégzéséhez (Rekurziv lekérdezések, CTE). Eltérések keresése MariaDB-hez képest.
* A XAMPP és a MySQL beüzemeléséhez szakirodalom és internetes források olvasása

Az adatbázis beüzemeléséhez segitséget nyújtott Németh Gábor StackOverflow találata: https://stackoverflow.com/questions/25962678/add-mysql-to-existing-xampp-installation
illetve Daniel Opitz leirása (többek közt): https://odan.github.io/2017/08/13/xampp-replacing-mariadb-with-mysql.html 

**A fentiekre fordított időmennyiség:** 8 óra


*Kelt:* 2019. 08. 22. 

Bozsik Armand Viktor

---
# Munkanapló (2019. 08. 21-22.)

Kezdés: 2019. 08. 21.
Befejezés: 2019. 08. 21.

## Elvégzett feladatok:

* A Németh Gábor által megosztott séma és attribútumlista áttekintése
* Az egyed-kapcsolat diagram megtervezése, az általam szükségesnek itélt módosításokkal
* Elküldve részére áttekintés céljából
* Egyeztetés az Informatikai Intézet (infgit) GitLab szerveréhez való hozzáférést illetően

**A fentiekre fordított időmennyiség:** 8 óra


*Kelt:* 2019. 08. 22. 

Bozsik Armand Viktor

---
# Munkanapló (2019. 08. 23.)

Kezdés: 2019. 08. 23.
Befejezés: 2019. 08. 23.

## Elvégzett feladatok:

* Regisztráció az Informatikai Intézet GitLab szerverére
* Németh Gábor EK-diagramot érintő javaslatainak áttekintése
* Felkészülés a GitLab szerveren való munkára: A GitHub repoban történt változások automatikus szinkronja GitLab-ra. 

> **Kifejtés:** Mivel ez a funkció nem érhető el sem az ingyenes sem pedig a Pro felhasználók számára GitHub-on, így
alternativát kellett keresnem. Mivel a két remote-ra commit-olás és push-olás hibára ad lehetőséget, a git clone --bare, 
git clone --mirror, git push --mirror lehetőségei pedig nehezen automatizálhatók így mélyreható keresés után a github2gitlab 
Python nyelven iródott segédprogramra (PyPI csomag) esett a választásom mely GitHub és GitLab közt elvégzi a szinkronizációt. 
(GitHub és GitLab felhasználók közt működik, a távoli szerverrel további tesztelése szükséges a holnapi napon).

* EK-diagram javitása

**A fentiekre fordított időmennyiség:** 8 óra


*Kelt:* 2019. 08. 23. 

Bozsik Armand Viktor

---
# Munkanapló (2019. 08. 24-25.)

Kezdés: 2019. 08. 24.
Befejezés: 2019. 08. 25.

## Elvégzett feladatok:

* A XAMPP 7.2.21 lecserélése XAMPP 7.2.7-re

**Magyarázat:** Egyrészt zavart a végső működési helytől való PHP verzió eltérése. A 7.2.21 telepithető verziojában 7.2.21-es PHP van, míg a tárhelyen 7.2.7. Ha lecserélem a mariadb-t (a mysql mappát átnevezem mariadb-re, az 5.6.45-os MySQL-t pedig bemásolom a mysql mappába, utána elvégzem a PHPMyAdmin által hibásnak tartott táblák javítását - ld. az előző napnál említett leírás lépései) akkor az egész control panel instabillá válik, mely rendszertelenül induló-leálló adatbázis sszerverben nyilvánul meg.

Némi Windows Subsystem for Linux-os LAMP szerver telepitési kísérlet után, illetve sikertelen EasyPHP-s kitérő után újból nekiláttam:

Kerestem egy XAMPP verziót amiben 7.2.7-es PHP van (XAMPP 7.2.7) majd pedig sikerült visszaemlékeznem arra, hogy az Irinyi Kabinetes gépeken is portable xampp van a Windows 10-es image-ben. Ezen felbuzdulva beüzemeltem a portable verziót, elvégeztem a fent részletezett műveleteket, igy most egy, a kapott szoftververziókkal teljesen egyező fejlesztőkornyezettel rendelkezem. 

**A fentiekre fordított időmennyiség:** 8 óra

*Kelt:*  2019. 08. 24.

Bozsik Armand Viktor

---
# Munkanapló (2019. 08. 26.)

Kezdés: 2019. 08. 26.
Befejezés: 2019. 08. 26.

## Elvégzett feladatok:

* Relációséma felirása
* Módositási javaslat kidolgozása az EK-diagramot illetően
* Az előző leadás óta elkészült munkáim elküldése áttekintés céljából
* Bootstrap 4 dokumentáció olvasása (https://getbootstrap.com/docs/4.3/getting-started/introduction/ illetve https://www.w3schools.com/bootstrap4/) a fejlesztés későbbi szakaszához: a szintaktikai és szemantikai szabályok áttekintése a szabványos használat érdekében.

**A fentiekre fordított időmennyiség:** 8 óra

*Kelt:* 2019. 08. 26.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 09. 02-03.)

Kezdés: 2019. 09. 02.
Befejezés: 2019. 09. 03.

## Elvégzett feladatok:

* Relációséma áttekintése
* Normalizálás
* Az előző leadás óta elkészült munkáim elküldése áttekintés céljából

**A fentiekre fordított időmennyiség:** 4 óra

*Kelt:* 2019. 09. 03.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 09. 04-07.)

Kezdés: 2019. 09. 04.
Befejezés: 2019. 09. 07.

## Elvégzett feladatok:

* Az EK módositása Németh Gáborral történt egyeztetés után

**A fentiekre fordított időmennyiség:** 2 óra

*Kelt:* 2019. 09. 07.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 09. 08-11.)

Kezdés: 2019. 09. 08.
Befejezés: 2019. 08. 11.

## Elvégzett feladatok:

* A weboldal vázának összeállítása (A főoldal, a regisztrációs űrlap, illetve a bejelentkező felület elkészítése) 
* Németh Gábor EK-t érintő javaslatainak áttekintése

**A fentiekre fordított időmennyiség:** 8 óra

*Kelt:* 2019. 09. 11.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 09. 12.)

Kezdés: 2019. 08. 12.
Befejezés: 2019. 08. 12.

## Elvégzett feladatok:

* A weboldal vázának további csiszolása (A regisztrációs űrlap megjelenítési hibáinak javítása) 
* Az EK javitása a tegnapi szerint
* Relációséma felírása a javított EK alapján
* Normalizálás
* A select2.org átolvasása a regisztrációs oldalon használt dropdown elem használati lehetőségeit illetően.

**A fentiekre fordított időmennyiség:** 8 óra

*Kelt:* 2019. 09. 12.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 09. 14-15.)

Kezdés: 2019. 09. 14.
Befejezés: 2019. 09. 15.

## Elvégzett feladatok:
 
* Az EK új ötletekkel való bővítése (pl. IRSZ feljegyzése  az állomáshoz és a segitőhöz, a jelszavak külön entitásba mozgatása, tervezés a jelszóbiztonságot szemelőtt tartva, alapvető GDPR kompatibilitás, jogosultságkezelés)
* Relációséma felírása a javított EK alapján
* Normalizálás
* Táblatervek és az üres adatbázis elkészítése
* A változtatások előterjesztése Németh Gábornak
* Áttérés SourceTree git kliensre, melyel megoldható a több remote-ba (távoli célhelyre - GitHub és InfGit szerver) való push, külső szkriptek használata nélkül  
* A weboldal váz bemutatása a megrendelő számára (visszajelzés, javaslat, kritika, módosítási igény kérése)

**A fentiekre fordított időmennyiség:** 10 óra

*Kelt:* 2019. 09. 15.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 09. 16-19.)

Kezdés: 2019. 09. 16.
Befejezés: 2019. 09. 19.

## Elvégzett feladatok:
 
* Az EK további bővítése (Rendszeres utakhoz tartozó napok feljegyzése)
* Relációséma felírása a javított EK alapján
* Normalizálás
* Táblatervek módosítása
* A változtatások előterjesztése Németh Gábornak
* A visszajelzések alapján a weboldal módosítása

**A fentiekre fordított időmennyiség:** 10 óra

*Kelt:* 2019. 09. 19.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 09. 20-26.)

Kezdés: 2019. 09. 20.
Befejezés: 2019. 09. 26.

## Elvégzett feladatok:
 
* A teszt projektjeimhez használt web és FTP szerver szolgáltatójával történt egyeztetés után a korábban közölt (PHP 7.2.7 illetve MySQL 5.6.45) verziók kerültek beállitásra a szerveren, igy megnyílt egy új lehetőség munkafolyamataim egyszerüsítésére:  
* Kezdetleges CI/CD beépítése a munkafolyamatomba
  > SourceTree segitségével ugyan szinkronizálódott a projektem az egyetemi GitLab szerver és a privát GitHub repozitóriumom között (szem előtt tartva az adatbiztonságot), ám a fájlok távoli FTP szerverre való eljuttatása körülményesnek bizonyult. Megoldásként a GitLab Pipelines-t találtam - a megfelelő gitlab-ci fájlt meg is szerkesztettem -, ám beállításához szükséges lett volna vagy egy Google Cloud Platform elöfizetés vagy pedig egy az egyetem által biztosított Kubernetes Cluster. Mivel előbbi nem áll módomban, utóbbival pedig nem tudom, hogy rendelkezik-e az egyetem, így alternativát kell keresnem.
* A relációsémák, normalizálások, táblatervek módositása (főként korlátozások feloldása némely adattipusnál) 
  * Napok tábla (a hét napjainak jelzéséhez)
  * SzemelyUt (a személyek és utak összekapcsolásához szükséges kapcsolat felvétele)
  * Szemely kibővitése (VezetekesTel, MobilTel, Epulet attribútumok)
* A táblatervek PDF exportja, és ez alapján a kezdeti adatbázis előállitása kapcsolatok és adatok nélkül
* Jelszó hashek előállítása teszt lekérdezésekhez (XLS és CSV fájlok mellékelve)
* Ezek betöltése az adatbázisba
* Személyek jogainak legenerálása
* Jogkörök meghatározása
* Regisztráció megvalósításának elkezdése
* Az FTP szerverre való fájlküldést a git-ftp-vel oldottam meg: https://github.com/git-ftp/git-ftp, http://eppz.eu/blog/git-to-ftp/ 
* Teszteltem a megoldást

**A fentiekre fordított időmennyiség:** 40 óra

*Kelt:* 2019. 09. 26.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 09. 27-2019. 10. 03)

Kezdés: 2019. 09. 27.
Befejezés: 2019. 10. 03.

## Elvégzett feladatok:
 
* A kódolási munkámat A Validity Chrome bővitménnyel (https://chrome.google.com/webstore/detail/validity/bbicmjjbohdfglopkidebfccilipgeif) teszem kónnyebbé, mely jelzi, hogy az általam megalkotott HTML markup szabványos-e. Ennek javaslatai alapján a hibákat kijavítottam.
* Az adatbázisba a jog adatok feltöltése
* A telefonszám mező eltávolítása a regisztrációs űrlapról (A vezetékes és mobil telefonszám kiváltja)
* Adatvédelmi nyilatkozat elfogadásához checkbox bevezetése.
* Elgépelések javítása a szövegben.
* Name tulajdonság rendelése az összes elemhez, hogy PHP-ból megnevezhető legyen
* Carousel alkalmazása a főoldalon, ehhez képek keresése a https://pixabay.com/images/search/bird/ oldalon
* Az adatbázis kapcsolat külön konfigurációs fájlban való megvalósítása PDO segítségével, és hibakezeléssel
* A bejelentkezési oldalon email cim kérése felhasználói név helyett
* A regisztrációs űrlap egyszerűsitése: Felhasználónevet, email cimet, jelszót, annak megerősítését kérem, illetve az adatvédelmi nyilatkozat checkbox-ának kijelölését illetve a felhasználási feltételek hasonlóképpeni elfogadását várom el (ennek ellenörzését, később vezetem be)
* Az email cimeket kivettem az email táblába: Egz felhasználóhoy tartozhat egy publikus és egz belépési email cim
* Új adatbázis előállitása a távoli szerveren való teszthez. Ebben beállitottam a Szemely ID-ja és az Email tábla IDüja közti függést (külső kulcs)
* A bejelentkezést és a regisztrációt külön modulba szervezem
* Regisztráció megvalósítása, jelszavak külön táblába helyezése (Jelszo táblában JelszoHash es ID - egy emberhez egy jelszó tartozhat: A jelszavak hasheltek, a password_hash függvény PASSWORD_DEFAULT opciójával, igz biztositva a jövőben implementált algoritmusok támogatását: https://www.php.net/manual/en/function.password-hash.php)
* A Bin2Hex és az OpenSSL segitségével véletlen hexa sorozat generálása (ez lesz az emailben kiküldött hitelesítő token)
* A felhasználó státuszát is módosítom a megadottak szerint az email hitelesítés után 
* A táblákon végzett művelteket mind nevesített paraméterekkel végzem, prepared statementekben, elkerülve az SQL injectiont.
* A https://stackoverflow.com/questions/10113562/pdo-mysql-use-pdoattr-emulate-prepares-or-not-on olvasottak megfontolását követően az EMULATE_PREPARES-t kikapcsoltam.
* Beállítottam az email táblában a BelepesiEmail és a PublikusEmail egyediségét (UNIQUE).
* Hozzáigazitottam az adatbázis kapcsolatot tároló konfigurációs fájlom a távoli szerver adataihoz
* Teszteltem a regisztráció működését
* Bekapcsoltam PHP-ban az error reportingot, hogy feltárjam a regisztráció hibás múködését
* Javítottam a feltöltés sorrendjén (külső kulcsok tábláit töltöm először)
* A szemely táblába való adatfeltöltés összevonása (felhasználónév, státusz, token) 
* Teszteltem a regisztráció működését
* Alapvetően múködik, ám az email kiküldés még nem
* Elkezdtem az email küldés megvalósítását SwiftMailer Composer modul használatával
* Az adminisztrációs felület megvalósitása

**A fentiekre fordított időmennyiség:** 40 óra

*Kelt:* 2019. 10. 03.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 10. 04-2019. 10. 06)

Kezdés: 2019. 10. 04.
Befejezés: 2019. 10. 06.

## Elvégzett feladatok:
 
* A SwiftMailer lecserélése PHPMailerre (egyértelműbb dokumentációval rendelkezik és a használata is könnyebbnek bizonyult)
* Levélküldésnél hibakezelés beállítása
* UTF-8 karakterkódolás és base64 kódolás beállitása HTML levél küldéséhez
* Az email beágyazott stiluslapjának szerkesztése
* A felhasználó email hitelesítő modulban meghatározott feltételek javitása
* Adatbázis bővitése: Az utolsó bejelentkezés időpontjának, a regisztráció időpontjának, logolása. Email hitelesítésnél az adatbázis erőforrások felszabaditása
* Bejelentkezés (még némi javításra szorul)
* Hitelesités bevezetése a weboldal eléréséhez (addig amig a debug információk megjelenitését ki nem kapcsolom): A szükséges adatokat elküldtem mind a megrendelő mind pedig Németh Gábor részére

**A fentiekre fordított időmennyiség:** 16 óra

*Kelt:* 2019. 10. 10.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 10. 13-2019. 10. 17)

Kezdés: 2019. 10. 13.
Befejezés: 2019. 10. 17.

## Elvégzett feladatok:
 
* A bejelentkező felület hibaelháritása és bővitése
* Hibakereséshez szükseges adatok kiiratása és összegyűjtése (illetve a bejelentkezés mechanizmusának vizsgálata print_r segitségével)
* A bejelentkezés gombjának name attributum adása hogy megnevezhető legyen PHP-ból
* Elgépelések javitása
* A jelszó hitelesités után következő státuszlekérdezés javitása
* A státuszfrissitő statement javitása
* A bejelentkezési folyamat bővitése (most már a felhasználó státuszát is nézi, és az alapján irányit a megfelelő helyre)
* Az első bejelentkezés utáni kötelező adatmegadó felület élesitése
* A bejelentkezés utáni státuszfrissités egyszerűsitése
* A regisztráció kibővitése. Már csak a checkboxok kipipálása után lehet regisztrálni
* Google ReCaptcha v3 láthatatlan verziójának (ügyelve a felhasználói élményre) integrálása
* A select2 kivezetése, helyette datalist használata az adatmegadó felületen a város megadására, a nem használt bower függőségek eltávolitása, a JSON fájl megfelelő formátumra hozása
* A szükséges adminisztrátori jováhagyáshoz tájékoztató oldal és szöveg készitése
* 404-es hibaoldal elkészitése
* A regisztrációs és a bejelentkező oldalon a regisztrácios/bejelentkező oldalra vezető gomb kiszervezése egy külön formba és ehhez kapcsolódóan (HTML5 szabvány szerint) a tulajdonos beállitása
* Az adatmegadás után lefutó frissitő statement hibajavitása, a NULL értékű cellák esetén frissitek csak
* A felhasználó átirányitása az adminisztrátori elfogadásról szóló oldalra, ha az adat frissités sikerrel végbement
* A bootstrap-select bevezetése a datalist helyett. 
  > Indoklás: Széleskörűbben használható, egyszerűbb a testreszabása mind funkciók mind pedig megjelenés terén
* A JSON feldolgozo javascript allomanyom atalakitasanak megkezdese, hogy illeszkedjen a select elemhez
* A select elem felhasználóbarátabbá tétele (szélesség állitása, kitöltő syüveg hozzáadása, valósidejű keresés megvalósítása)
* Az adatvédelmi nyilatkozat és felhasználói feltételek oldalak létrehozása, és feltöltése teszt szöveggel
* Ugyanitt ablak bezáró és nyomtatást kezdeményező gombok elhelyezése (működésük JS alapon biztositott) 

**A fentiekre fordított időmennyiség:** 40 óra

*Kelt:* 2019. 10. 17.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 10. 18-2019. 10. 25)

Kezdés: 2019. 10. 18.
Befejezés: 2019. 10. 25.

## Elvégzett feladatok:
 
* A JSON feldolgozo szkript hibaelharitasa
* A select tag-ek generalasanak es feltoltesenek javitasa
* A bootstrap selectbe valo JSON betoltes megvalositasa jQuery segitsegevel
* A felhasznalt jQuery fugvenykonyvtar frissitese a legfrisebb elerheto verziora (az egesz projektben)
* A select feltoltesenek atszervezese szerver oldalra (ezt csak elkezdtem, am nem fejeztem be:jelen esetben nem lattam vegul ertelmet, mivel a select elem pontosan annyira seerulekeny a kulonbozo adatmodositast hasznalo tamadasok ellen, mint egy sima szovegmezo, azok a veszelyek pedig kliens es szerveroldali ellenorzessel kivedhetok). Ezert nem is raktam adatbazisba sem a select elemeit.
* Kesobb a feltolteshez hasznalt jQuery specifikus megoldasokat helyettesitettem hagyomanyos JS megoldasokkal: igy egy kulso fuggvenykonyvtar hasznalatat mellozhettem, illetve atlathatobb kodot is tudtam kesziteni.
* Ezen szkript betoltodeset az elsok koze vettem (hogy idoben feltoltesre keruljon a kozterulet fajtakat tartalmazo lista)
* Alkalmaztam a betoltesnel a defer attributumot (https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script - ld. Attributes)
* A lista szelessegenek modositasa, a hazszambekeres javitasa
* utf8mb4 tamogatas hozzaadasa az adatbaziskapcsolathoz
* A felhasznalok kezeleseert felelos adminisztrativ funkcio tablazataba teszt adatok feltoltese
* A tablazat pozicionalasa
* A bejelentkezett felhasznalo nevenek kiiratasa
* Az admin felulet egyszerusitese es mobilbaratabba tetele
* A tablazat rendezesehez es kereshetosegehez kapcsolodo fuggosegek hozzaadasa (dataTables: https://datatables.net/)
* A nem hasznalt fuggosegek eltavolitasa
* Az admin felulet funkcioinak atstrukturalasa
* Az adminfelulet stilusainak kiszervezese, es egysegesitese
* A bejelentkezesi mechanizmus javitasa: A bekert adatok (a jelszo kivetelevel) eltarolasa munkamenetben
* Az admin felulethez Lorem Ipsum tesztszoveg adasa es a szoveg pozicionalsa
* A vezerlopult fooldalara mutato link javitasa
* A felhasznalokezelest megvalosito funkciogombok a tablazaton belul egyertelmubb szinjelolest kaptak
* A funkciok fontossagi sorrend szerint lathatobb helyre teve

**A fentiekre fordított időmennyiség:** 25 óra

*Kelt:* 2019. 10. 25.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 10. 26-2019. 11. 02)

Kezdés: 2019. 10. 26.
Befejezés: 2019. 11. 02.

## Elvégzett feladatok:

* A felhasznalokhoz (elfogadasra varo felhasznalok es felhasznalok menupontok) legordulo lista rendelese
* Minden emlitett funkciohoz FontAwesome ikonokat rendeltem funkcio szerint
* Az adatbekero oldalon a kepfeltoltes frontend megvalositasa 
  * bootstrap-fileinput segitsegevel: https://github.com/kartik-v/bootstrap-fileinput
  * A hozza tartozo dokumentacio attanulmanyozasa: https://plugins.krajee.com/file-input 
* A select feltolteseert felelos js fajl formazasa
* Font Awesome ikonok beallitasa a kepfeltoltohoz
* Font Awesome tema beallitasa a kepfeltoltonel, illetve magyar forditas betoltese.
* A felhasznaloi avatar feltoltes biztonsagos megvalositasa
  * a bulletproof fuggvenykonyvtar segitsegevel: https://github.com/samayo/bulletproof/ (lokalisan hosztolva)
* A nem hasznalt fuggosegek eltavolitasa (composer csomagok)
* A profilkep megadasanak kiszervezese kulon oldalra (atlathatobb igy mind a fejleszto, mind pedig a felhasznalo szamara. Tulsagosan sok adatot nem akartam egy oldalra zsufolni.)
* A bejelentkezesi atiranyitasok javitasa (mivel mostmar uj oldalra kerult a kepmegadas, igy nem 5 hanem 6 lepcsos a hitelesites)
* A feltolteskor tamogatott fajlformatumok korenek bovitese
* A feltoltott kep utvonalanak elmentese adatbazisba
* Alapveto session kezeles megvalositasa (folyamatban, ennek lezarultaig nemely funkcio nem elerheto)

**A fentiekre fordított időmennyiség:** 30 óra

*Kelt:* 2019. 11. 02.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 11. 03-2019. 11. 10)

Kezdés: 2019. 11. 03.
Befejezés: 2019. 11. 10.

## Elvégzett feladatok:

* Alapveto session kezeles megvalositasa
* Jelszovisszaallitas link beszurasa a bejelentkezo oldalra
* A felhasznaloi profiladat listazo megvalositasanak elkezdese (frontend)
* A felhasznalo teljes nevenek kiiratasa az vezerlopulton (udvozles)
* Elgepelesek es eleresi utvonalak javitasa

**A fentiekre fordított időmennyiség:** 4 óra

*Kelt:* 2019. 11. 10.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 11. 11-2019. 11. 18)

Kezdés: 2019. 11. 11.
Befejezés: 2019. 11. 18.

## Elvégzett feladatok:

* Jelszo visszaallito modul elkeszitese (frontend/backend)
* Felhasznalok listazasanak elkeszitese, a hasznalt tablazat strukturalis javitasa, megjelenes testreszabasa
* Email kuldo modul altalanositasa (egy komponens, amely igy mar jo a regisztracios level kikuldesehez illetve jelszo visszaallitashoz is. Kesibb jo lesz az adminisztratorok ertesitesehez is)
* Bejelentkezes atalakitasa (session tablaba jegyzem a felhasznalo bejelentkezeskori adatait - IP, UserAgent, Bejelentkezes idopontja, munkamanet kulcs). Szemelymunkamenet tabla feltoltese (igy a szemely es a munkamenet osszekapcsolasra kerul)
* Adatlekerdezo metodusok es fuggvenyek osszevonasa egy fajlba
* A regisztracio atalakitasa (azaltalanositott levelkuldo meghivasa)
* DocumentRoot megallapitasa, majd a require-ot fajlok utvonalaban a DocumentRoot alkalmazasa (igy a gyokerkonyvtarbol hivatkozok direktben a fajlokra, nem pedig egymashoz viszonyitva. Atlathatobb.)
* A munkamenet kulcs generalasa session_create_id helyett openssl_random_pseudo_bytes segitsegevel (bin2hex segitsegevel heszadecimalis stringgé alakitva. Veletlenszerubb az eredmeny, es itt pontosan ez a celom.)
* $SERVER['SERVER_NAME'] meghatarozasa, majd a getURL metodus elkeszitese (sprintf segitsegevel, a formatumsztringek tamogatasa miatt biztonsagosabb), es az alap URL meghatarozasa (protokol :// domain . tld), zaro perjel nelkul. HTTPS tamogatasa. 

**A fentiekre fordított időmennyiség:** 20 óra

*Kelt:* 2019. 11. 18.  

Bozsik Armand Viktor

---
# Munkanapló (2019. 11. 19-2019. 11. 26)

Kezdés: 2019. 11. 19.
Befejezés: 2019. 11. 26.

## Elvégzett feladatok:

* Felhasznalo regisztracioja utan email kikuldes az adminisztratorok reszere a regisztracio tenyerol.
* A felhasznalo elfogadasa utan email kikuldes a felhasznalo reszere a jovahagyas tenyevel.
* Szetcsuszott tablazatok javitasa
* Felhasznalok listazasanal megszoritas alkalmazasa: az osszes felhasznalo listazasakor csak a legmagasabb statuszu felhasznalok listazasa (6-os szint). 
Igy egyertelmubbe valt a felulet: A z elfogadasra varo felhasznalok kulon menupontba kerultek.
* Profilkep es teljes nev kiiratasa
* A munkamenet biztonsaganak novelese (a session kulcs ujrageneralasaval), a kijelentkezes idopontjanak megfelelo bejegyzese (idozona javitasa)
* Az eddig elmaradt torles funkciok megvalositasa, illetve a meglevoknel SQL lekerdezes javitasa
* A jelszovaltoztato modul javitasa
* A kijelentkezes javitasa

**A fentiekre fordított időmennyiség:** 20 óra

*Kelt:* 2019. 11. 26.  

Bozsik Armand Viktor

---
# Idoosszesites.txt
2019-08-15: 8 óra
2019-08-16-20: 8 óra
2019-08-21-22: 8 óra
2019-08-23: 8 óra
2019-08-24-25: 8 óra
2019-08-26: 8 óra
2019-09-02-03: 4 óra
2019-09-04-07: 2 óra
2019-09-08-11: 8 óra
2019-09-12: 8 óra
2019-09-14-15: 10 óra
2019-09-16-19: 10 óra
2019-09-20-26: 40 óra
2019-09-27-2019-10-03: 40 óra
2019-10-04-06: 16 óra
2019-10-13-17: 40 óra
2019-10-18-25: 25 óra
2019-10-26-11-02: 30 óra
2019-10-03-10: 4 óra
2019-10-11-18: 20 óra
2019-11-19-26: 20 óra

= 325 óra