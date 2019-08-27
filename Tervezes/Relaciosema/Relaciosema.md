# Relaciosema
## Jelolesek:
* A szabvanytol elteroen az elsodleges kulcsokat csak vastagitottam
* [szoveg] -> Kulso kulcs 

Egyedek:
---

Szemely(__ID__, Nev, Tel, Email, Lakcim)

RendszeresUt(__ID__, Varos, Nap, Idopont, Hely)

Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)

Szallitas(__ID__, Szakasz, Allapot)

Allomas(__ID__, Varos, Utca, Hazszam, KoordSz, KoordH)

Allat(__ID__, Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam, Azonosito)

Kapcsolatok:
---

Az *Utazik* kapcsolat 1:1 a Szemely es a RendszeresUt kozt, tehat beolvasztom a RendszeresUt ID-jat:

> Szemely(__ID__, Nev, Tel, Email, Lakcim, [RendszeresUt.ID])

A *Resze* kapcsolat N:1 a RendszeresUt es az Ut kozt, tehat az N oldaliba (RendszeresUt) olvasztom az Ut ID-jat:

> RendszeresUt(__ID__, Varos, Nap, Idopont, Hely, [Ut.ID])

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
> Ujraolvasva a leirasodat ami alapjan az EK-t keszitettem, a rendszeres utnal lehet hogy modositom a kepet, mivel most nezem, hogy abbol ahogy lekepeztem nem latszik a kezdo varos/nap/idopont es ugyanez a vegcelnel. Ezt is meg szeretnenk kulonboztetni, feltetelezem. :)  









