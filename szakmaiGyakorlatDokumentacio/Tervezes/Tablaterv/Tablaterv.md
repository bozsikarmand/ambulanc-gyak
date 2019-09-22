# Tablaterv

> Az atlathatosag miatt az N:M kapcsolatok letrejovo kapcsolotablajat nem az EK-ban megadott neven jeloltem, hanem egy beszedesebben. Elotte jeleztem viszont hogy mikent neveztem az EK-ban a kapcsolatot

## Egyedek
### 1. Szemely

| Kulcs | Nev               | Adattipus | Limit          | Megjegyzes                                                          |
| :---- | :---------------- | :-------- | :------------- | ------------------------------------------------------------------- |
| I     | ID                | INT       | 11             | A szemely azonositoja                                               |
| N     | Vezeteknev        | VARCHAR   | 2000 karakter  | A szemely vezetekneve                                               |
| N     | Keresztnev        | VARCHAR   | 2000 karakter  | A szemely keresztneve                                               |
| N     | Utonev            | VARCHAR   | 2000 karakter  | A szemely utoneve                                                   |
| N     | VezetekesTel      | VARCHAR   | 15 karakter    | A szemely vezetekes telefonszama                                    |
| N     | MobilTel          | VARCHAR   | 15 karakter    | A szemely mobil telefonszama                                        |
| N     | Email             | VARCHAR   | 254 karakter   | A szemely email cime                                                |
| N     | IRSZ              | SMALLINT  | 4              | A szemely iranyitoszama                                             |
| N     | Varos             | VARCHAR   | 32 karakter    | A szemely altal megadott varos                                      |
| N     | KozteruletNeve    | VARCHAR   | 48 karakter    | A szemely altal megadott kozterulet neve                            |
| N     | KozteruletJellege | VARCHAR   | 48 karakter    | A szemely altal megadott kozterulet tipus (pl. utca, ter, ut, stb.) |
| N     | Hazszam           | INT       | nem korlatozom | A szemely altal megadott hazszam                                    |
| N     | Epulet            | VARCHAR   | 48 karakter    | A szemely altal megadott epulet                                     |

### 2. RendszeresUt

 | Kulcs | Nev               | Adattipus | Limit          | Megjegyzes                          |
 | :---- | :---------------- | :-------- | :------------- | ----------------------------------- |
 | I     | ID                | INT       | nem korlatozom | A rendszeres ut azonositoja         |
 | N     | IndVaros          | VARCHAR   | 32 karakter    | A rendszeres ut indulo varosa       |
 | N     | ErkVaros          | VARCHAR   | 32 karakter    | A rendszeres ut erkezesi varosa     |
 | N     | IndDatum          | DATE      | nem korlatozom | A rendszeres ut indulasi datuma     |
 | N     | ErkDatum          | DATE      | nem korlatozom | A rendszeres ut erkezesi datuma     |
 | N     | IndIdo            | TIME      | nem korlatozom | A rendszeres ut indulasi ideje      |
 | N     | ErkIdo            | TIME      | nem korlatozom | A rendszeres ut erkezesi ideje      |
 | N     | HetiRendszeresseg | TINYINT   | 255            | A rendszeres ut heti rendszeressege |
 | N     | Hely              | TINYINT   | 255            | A ferohelyek szama                  |

### 3. Napok

| Kulcs | Nev  | Adattipus | Limit          | Megjegyzes        |
| :---- | :--- | :-------- | :------------- | ----------------- |
| I     | ID   | INT       | nem korlatozom | A nap azonositoja |
| N     | Nap  | VARCHAR   | 9              | A nap neve        |

 ### 4. Ut

 | Kulcs | Nev           | Adattipus  | Limit          | Megjegyzes             |
 | :---- | :------------ | :--------- | :------------- | ---------------------- |
 | I     | ID            | INT        | nem korlatozom | Az ut azonositoja      |
 | N     | Indulas       | DATETIME   | nem korlatozom | Az ut indulo varosa    |
 | N     | Erkezes       | DATETIME   | nem korlatozom | Az ut erkezo varosa    |
 | N     | Surgos        | TINYINT(1) | 0/1            | Surgosseg jelzese      |
 | N     | Allapot       | VARCHAR    | 2000 karakter  | Allapot                |
 | N     | AtadoSzemely  | VARCHAR    | 6100 karakter  | Az atado szemely neve  |
 | N     | AtvevoSzemely | VARCHAR    | 6100 karakter  | Az atvevo szemely neve |

 ### 5. Szallitas

 | Kulcs | Nev     | Adattipus  | Limit          | Megjegyzes              |
 | :---- | :------ | :--------- | :------------- | ----------------------- |
 | I     | ID      | INT        | nem korlatozom | Az ut azonositoja       |
 | N     | Szakasz | TINYINT(2) | 32             | Az ut aktualis szakasza |
 | N     | Allapot | VARCHAR    | 100 karakter   | Allapot                 |

 ### 6. Allomas

 | Kulcs | Nev               | Adattipus | Limit          | Megjegyzes                                                         |
 | :---- | :---------------- | :-------- | :------------- | ------------------------------------------------------------------ |
 | I     | ID                | INT       | nem korlatozom | Az allomas azonositoja                                             |
 | N     | IRSZ              | SMALLINT  | 9000           | Az allomas iranyitoszama                                           |
 | N     | Varos             | VARCHAR   | 32 karakter    | Az allomas varosa                                                  |
 | N     | KozteruletNeve    | VARCHAR   | 48 karakter    | Az allomashoz megadott kozterulet neve                             |
 | N     | KozteruletJellege | VARCHAR   | 48 karakter    | Az allomashoz megadott kozterulet tipusa (pl. utca, ter, ut, stb.) |
 | N     | Hazszam           | INT       | nem korlatozom | Az allomashoz megadott hazszam                                     |
 | N     | Epulet            | VARCHAR   | 2000 karakter  | Az allomashoz megadott epulet                                      |
 | N     | KoordSz           | DOUBLE    | nem korlatozom | Az allomas szelessegi koordinataja                                 |
 | N     | KoordH            | DOUBLE    | nem korlatozom | Az allomas hosszusagi koordinataja                                 |

### 7. Allat

 | Kulcs | Nev       | Adattipus  | Limit          | Megjegyzes                     |
 | :---- | :-------- | :--------- | :------------- | ------------------------------ |
 | I     | ID        | INT        | nem korlatozom | Az allat azonositoja           |
 | N     | Faj       | VARCHAR    | 9000 karakter  | Az allatfaj megnevezese        |
 | N     | HordozoSz | SMALLINT   | nem korlatozom | A hordozo szelessege           |
 | N     | HordozoM  | SMALLINT   | nem korlatozom | A hordozo magassaga            |
 | N     | HordozoH  | SMALLINT   | nem korlatozom | A hordozo hosszusaga           |
 | N     | Veszelyes | TINYINT(1) | 0/1            | Az allat(ok) veszelyes(ek)-e   |
 | N     | Sulyos    | TINYINT(1) | 0/1            | Az allat(ok) allapota sulyos-e |
 | N     | EgyedSzam | TINYINT    | nem korlatozom | A szallitando egyedek szama    |

 ### 8. Jog

 | Kulcs | Nev  | Adattipus | Limit          | Megjegyzes        |
 | :---- | :--- | :-------- | :------------- | ----------------- |
 | I     | ID   | INT       | nem korlatozom | A jog azonositoja |
 | N     | Nev  | VARCHAR   | 9000 karakter  | A jog megnevezese |

 ### 9. Jelszo

 | Kulcs | Nev  | Adattipus | Limit          | Megjegyzes           |
 | :---- | :--- | :-------- | :------------- | -------------------- |
 | I     | ID   | INT       | nem korlatozom | A jelszo azonositoja |
 | N     | Hash | VARCHAR   | nem korlatozom | A jelszo hash        |

## N:M kapcsolatok
### 1. RendszeresUtNapok 

 | Kulcs | Nev            | Adattipus | Limit          | Megjegyzes                  |
 | :---- | :------------- | :-------- | :------------- | --------------------------- |
 | I     | RendszeresUtID | INT       | nem korlatozom | A rendszeres ut azonositoja |
 | I     | NapokID        | INT       | nem korlatozom | A nap azonositoja           |

### 2. SzemelyekUtjai

| Kulcs | Nev            | Adattipus | Limit          | Megjegyzes                  |
| :---- | :------------- | :-------- | :------------- | --------------------------- |
| I     | SzemelyID      | INT       | nem korlatozom | A szemely azonositoja       |
| I     | RendszeresUtID | INT       | nem korlatozom | A rendszeres ut azonositoja |

### 3. SzemelyUt

| Kulcs | Nev       | Adattipus | Limit          | Megjegyzes            |
| :---- | :-------- | :-------- | :------------- | --------------------- |
| I     | UtID      | INT       | nem korlatozom | Az ut azonositoja     |
| I     | SzemelyID | INT       | nem korlatozom | A szemely azonositoja |

### 4. AllatUton 

 | Kulcs | Nev     | Adattipus | Limit          | Megjegyzes           |
 | :---- | :------ | :-------- | :------------- | -------------------- |
 | I     | UtID    | INT       | nem korlatozom | Az ut azonositoja    |
 | I     | AllatID | INT       | nem korlatozom | Az allat azonositoja |

 ### 5. SzemelyJog

| Kulcs | Nev       | Adattipus | Limit          | Megjegyzes            |
| :---- | :-------- | :-------- | :------------- | --------------------- |
| I     | SzemelyID | INT       | nem korlatozom | A szemely azonositoja |
| I     | JogID     | INT       | nem korlatozom | A jog azonositoja     |

### 6. AllatSzallitas

| Kulcs | Nev     | Adattipus | Limit          | Megjegyzes           |
| :---- | :------ | :-------- | :------------- | -------------------- |
| I     | UtID    | INT       | nem korlatozom | Az ut azonositoja    |
| I     | AllatID | INT       | nem korlatozom | Az allat azonositoja |