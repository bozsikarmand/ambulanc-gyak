# Tablaterv
## 1. Szemely

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

## 2. RendszeresUt

 | Kulcs | Nev         | Adattipus | Limit          | Megjegyzes                         |
 | :---- | :---------- | :-------- | :------------- | ---------------------------------- |
 | I     | ID          | INT       | 4294967295     | A rendszeres ut azonositoja        |
 | N     | IndVaros    | VARCHAR   | 32 karakter    | A rendszeres ut indulo varosa      |
 | N     | IndDatumIdo | DATETIME  | nem korlatozom | A rendszeres ut indulasi idopontja |
 | N     | ErkDatumIdo | DATETIME  | nem korlatozom | A rendszeres ut erkezesi idopontja |
 | N     | ErkVaros    | VARCHAR   | 32 karakter    | A rendszeres ut erkezesi varosa    |
 | N     | Hely        | TINYINT   | 255            | A ferohelyek szama                 |
