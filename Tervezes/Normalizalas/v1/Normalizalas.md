# Normalizalas

A lentiek alapjan a normalizalas:

Az adatbazis 1NF-ben van, mert:

* Az attributumok egyszeruek, nem osszetettek, atomiak
* Nincsenek tobberteku attributumaim
* Nem fordul elo ismetlodo adat (Megjegyzes: Az allapot benne van az utban is, de a specifikacio alapjanugy ertelmeztem, hogy, az ut kozbeni allapotvaltozas logolasat szolgalna ez)

Az adatbazis 2NF-ben van, mert:

* 1NF-ben van
* A kulcsok egy attributumbol allnak
* Nincs funkcionalis fuggoseg
* Minden masodlagos attributum teljesen fugg az elsodleges kulctol

Az adatbazis 3NF-ben van, mert:

* 2NF-ben van
* Nincs trqanzitiv funkcionalis fuggoseg
* Minden masodlagos attributum kozvetlenul fugg az elsodleges kulcstol

---

# Relaciosema
## Jelolesek:
* A szabvanytol elteroen az elsodleges kulcsokat csak vastagitottam
* [szoveg] -> Kulso kulcs 

Egyedek:
---

Szemely(__ID__, Nev, Tel, Email, Lakcim)

RendszeresUt(__ID__, IndVaros, IndNap, IndIdopont, ErkIdopont, ErkVaros, ErkNap, Hely)

Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)

Szallitas(__ID__, Szakasz, Allapot)

Allomas(__ID__, Varos, Utca, Hazszam, KoordSz, KoordH)

Allat(__ID__, Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam, Azonosito)

Kapcsolatok:
---

Az *Utazik* kapcsolat 1:1 a Szemely es a RendszeresUt kozt, tehat beolvasztom a RendszeresUt ID-jat:

> Szemely(__ID__, Nev, Tel, Email, Lakcim, [RendszeresUt.ID])

A *Resze* kapcsolat N:1 a RendszeresUt es az Ut kozt, tehat az N oldaliba (RendszeresUt) olvasztom az Ut ID-jat:

> RendszeresUt(__ID__, IndVaros, IndNap, IndIdopont, ErkIdopont, ErkVaros, ErkNap, Hely, [Ut.ID])

A *Kapcsolodik* kapcsolat N:M az Ut es a Szemely kozt. Az N:M kapcsolat nem olvaszthato be, igy kapcsolo tablat hozok letre Kapcsolodik neven.

> __Marad:__ Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)
>
> __Marad:__ Szemely(__ID__, Nev, Tel, Email, Lakcim, [RendszeresUt.ID])
>
> __Letrejon:__ Kapcsolodik(__UtID__, __SzemelyID__)

A *Visz* kapcsolat az Ut es az Allat kozott N:M, tehat az elozohoz hasonlo az eljaras.

> __Marad:__  Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)
>
> __Marad:__ Allat(__ID__, Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam, Azonosito)
> 
> __Letrejon:__ Visz(__UtID__, __AllatID__)

A *Tartozik* kapcsolat N:1 az Ut es a Szallitas kozt. A *Resze* kapcsolathoz hasonloan jarok el.

> Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely, [Szallitas.ID])

A *Megvalosul* 1:N a Szallitas es az Allomas kozt. A tartozikhoz hasonloan jarok el:

Allomas(__ID__, Varos, Utca, Hazszam, KoordSz, KoordH, [Szallitas.ID])

---
> Javitva elozo kommentem alapjan.  










