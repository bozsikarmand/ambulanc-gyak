# Tablaterv

> Az atlathatosag miatt az N:M kapcsolatok letrejovo kapcsolotablajat nem az EK-ban megadott neven jeloltem, hanem egy beszedesebben. Elotte jeleztem viszont hogy mikent neveztem az EK-ban a kapcsolatot

## Egyedek
### 1. Szemely

| Kulcs | Nev               | Adattipus | Limit         | Megjegyzes                                                          |
| :---- | :---------------- | :-------- | :------------ | ------------------------------------------------------------------- |
| I     | ID                | INT       | 4294967295    | A szemely azonositoja                                               |
| N     | Vezeteknev        | VARCHAR   | 2000 karakter | A szemely vezetekneve                                               |
| N     | Keresztnev        | VARCHAR   | 2000 karakter | A szemely keresztneve                                               |
| N     | Utonev            | VARCHAR   | 2000 karakter | A szemely utoneve                                                   |
| N     | VezetekesTel      | VARCHAR   | 15 karakter   | A szemely vezetekes telefonszama                                    |
| N     | Email             | VARCHAR   | 254 karakter  | A szemely email cime                                                |
| N     | IRSZ              | SMALLINT  | 9000          | A szemely iranyitoszama                                             |
| N     | Varos             | VARCHAR   | 32 karakter   | A szemely altal megadott varos                                      |
| N     | KozteruletNeve    | VARCHAR   | 48 karakter   | A szemely altal megadott kozterulet neve                            |
| N     | KozteruletJellege | VARCHAR   | 48 karakter   | A szemely altal megadott kozterulet tipus (pl. utca, ter, ut, stb.) |
| N     | Hazszam           | INT       | 4294967295    | A szemely altal megadott hazszam                                    |

### 2. RendszeresUt

 | Kulcs | Nev         | Adattipus | Limit          | Megjegyzes                         |
 | :---- | :---------- | :-------- | :------------- | ---------------------------------- |
 | I     | ID          | INT       | 4294967295     | A rendszeres ut azonositoja        |
 | N     | IndVaros    | VARCHAR   | 32 karakter    | A rendszeres ut indulo varosa      |
 | N     | IndDatumIdo | DATETIME  | nem korlatozom | A rendszeres ut indulasi idopontja |
 | N     | ErkDatumIdo | DATETIME  | nem korlatozom | A rendszeres ut erkezesi idopontja |
 | N     | ErkVaros    | VARCHAR   | 32 karakter    | A rendszeres ut erkezesi varosa    |
 | N     | Hely        | TINYINT   | 255            | A ferohelyek szama                 |

 ### 3. Ut

 | Kulcs | Nev           | Adattipus  | Limit          | Megjegyzes             |
 | :---- | :------------ | :--------- | :------------- | ---------------------- |
 | I     | ID            | INT        | 4294967295     | Az ut azonositoja      |
 | N     | Indulas       | DATETIME   | nem korlatozom | Az ut indulo varosa    |
 | N     | Erkezes       | DATETIME   | nem korlatozom | Az ut erkezo varosa    |
 | N     | Surgos        | TINYINT(1) | 0/1            | Surgosseg jelzese      |
 | N     | Allapot       | VARCHAR    | 100 karakter   | Allapot                |
 | N     | AtadoSzemely  | VARCHAR    | 6100 karakter  | Az atado szemely neve  |
 | N     | AtvevoSzemely | VARCHAR    | 6100 karakter  | Az atvevo szemely neve |

 ### 4. Szallitas

 | Kulcs | Nev     | Adattipus  | Limit        | Megjegyzes              |
 | :---- | :------ | :--------- | :----------- | ----------------------- |
 | I     | ID      | INT        | 4294967295   | Az ut azonositoja       |
 | N     | Szakasz | TINYINT(2) | 32           | Az ut aktualis szakasza |
 | N     | Allapot | VARCHAR    | 100 karakter | Allapot                 |

 ### 5. Allomas

 | Kulcs | Nev               | Adattipus | Limit          | Megjegyzes                                                         |
 | :---- | :---------------- | :-------- | :------------- | ------------------------------------------------------------------ |
 | I     | ID                | INT       | 4294967295     | Az allomas azonositoja                                             |
 | N     | IRSZ              | SMALLINT  | 9000           | Az allomas iranyitoszama                                           |
 | N     | Varos             | VARCHAR   | 32 karakter    | Az allomas varosa                                                  |
 | N     | KozteruletNeve    | VARCHAR   | 48 karakter    | Az allomashoz megadott kozterulet neve                             |
 | N     | KozteruletJellege | VARCHAR   | 48 karakter    | Az allomashoz megadott kozterulet tipusa (pl. utca, ter, ut, stb.) |
 | N     | Hazszam           | INT       | 4294967295     | Az allomashoz megadott hazszam                                     |
 | N     | Epulet            | VARCHAR   | 2000 karakter  | Az allomashoz megadott epulet                                      |
 | N     | KoordSz           | DOUBLE    | nem korlatozom | Az allomas szelessegi koordinataja                                 |
 | N     | KoordH            | DOUBLE    | nem korlatozom | Az allomas hosszusagi koordinataja                                 |

### 6. Allat

 | Kulcs | Nev       | Adattipus  | Limit          | Megjegyzes                     |
 | :---- | :-------- | :--------- | :------------- | ------------------------------ |
 | I     | ID        | INT        | 4294967295     | Az allat azonositoja           |
 | N     | Faj       | VARCHAR    | 9000 karakter  | Az allatfaj megnevezese        |
 | N     | HordozoSz | SMALLINT   | nem korlatozom | A hordozo szelessege           |
 | N     | HordozoM  | SMALLINT   | nem korlatozom | A hordozo magassaga            |
 | N     | HordozoH  | SMALLINT   | nem korlatozom | A hordozo hosszusaga           |
 | N     | Veszelyes | TINYINT(1) | 0/1            | Az allat(ok) veszelyes(ek)-e   |
 | N     | Sulyos    | TINYINT(1) | 0/1            | Az allat(ok) allapota sulyos-e |
 | N     | EgyedSzam | TINYINT    | nem korlatozom | A szallitando egyedek szama    |

 ### 7. Jog

 | Kulcs | Nev  | Adattipus | Limit         | Megjegyzes        |
 | :---- | :--- | :-------- | :------------ | ----------------- |
 | I     | ID   | INT       | 4294967295    | A jog azonositoja |
 | N     | Nev  | VARCHAR   | 9000 karakter | A jog megnevezese |

 ### 8. Jelszo

 | Kulcs | Nev  | Adattipus | Limit          | Megjegyzes           |
 | :---- | :--- | :-------- | :------------- | -------------------- |
 | I     | ID   | INT       | 4294967295     | A jelszo azonositoja |
 | N     | Hash | VARCHAR   | nem korlatozom | A jelszo hash        |

### 9. Napok

| Kulcs | Nev  | Adattipus | Limit      | Megjegyzes        |
| :---- | :--- | :-------- | :--------- | ----------------- |
| I     | ID   | INT       | 4294967295 | A nap azonositoja |
| N     | Nap  | VARCHAR   | 9          | A nap neve        |

## N:M kapcsolatok
### 1. RendszeresUtNapok 

 | Kulcs | Nev            | Adattipus | Limit      | Megjegyzes                  |
 | :---- | :------------- | :-------- | :--------- | --------------------------- |
 | I     | RendszeresUtID | INT       | 4294967295 | A rendszeres ut azonositoja |
 | I     | NapokID        | INT       | 4294967295 | A nap azonositoja           |

### 2. SzemelyekUtjai

| Kulcs | Nev            | Adattipus | Limit      | Megjegyzes                  |
| :---- | :------------- | :-------- | :--------- | --------------------------- |
| I     | SzemelyID      | INT       | 4294967295 | A szemely azonositoja       |
| I     | RendszeresUtID | INT       | 4294967295 | A rendszeres ut azonositoja |

### 3. AllatUton 

 | Kulcs | Nev     | Adattipus | Limit      | Megjegyzes           |
 | :---- | :------ | :-------- | :--------- | -------------------- |
 | I     | UtID    | INT       | 4294967295 | Az ut azonositoja    |
 | I     | AllatID | INT       | 4294967295 | Az allat azonositoja |

 ### 4. SzemelyJog

| Kulcs | Nev       | Adattipus | Limit      | Megjegyzes            |
| :---- | :-------- | :-------- | :--------- | --------------------- |
| I     | SzemelyID | INT       | 4294967295 | A szemely azonositoja |
| I     | JogID     | INT       | 4294967295 | A jog azonositoja     |

### 5. AllatSzallitas

| Kulcs | Nev     | Adattipus | Limit      | Megjegyzes           |
| :---- | :------ | :-------- | :--------- | -------------------- |
| I     | UtID    | INT       | 4294967295 | Az ut azonositoja    |
| I     | AllatID | INT       | 4294967295 | Az allat azonositoja |