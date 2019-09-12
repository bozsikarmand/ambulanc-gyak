# Normalizalas

A lentiek alapjan a normalizalas:

Az adatbazis __1NF__-ben van, mert:

* Az attributumok egyszeruek, nem osszetettek, atomiak
* Nincsenek tobberteku attributumaim
* Nem fordul elo ismetlodo adat

Az adatbazis __2NF__-ben van, mert:

* 1NF-ben van
* A kulcsok egy attributumbol allnak
* Nincs funkcionalis fuggoseg
* Minden masodlagos attributum teljesen fugg az elsodleges kulctol

Az adatbazis __3NF__-ben van, mert:

* 2NF-ben van
* Nincs tranzitiv funkcionalis fuggoseg
* Minden masodlagos attributum kozvetlenul fugg az elsodleges kulcstol

---

# Relaciosema
## Jelolesek:
* A szabvanytol elteroen az elsodleges kulcsokat csak vastagitottam
* [szoveg] -> Kulso kulcs 

Egyedek:
---

Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, OtthoniTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet)

RendszeresUt(__ID__, IndVaros, IndNap, IndIdopont, ErkIdopont, ErkVaros, ErkNap, Hely)

Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)

Szallitas(__ID__, Szakasz, Allapot)

Allomas(__ID__, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, KoordSz, KoordH)

Allat(__ID__, Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam)

Kapcsolatok:
---

Az *Utazik* kapcsolat 1:1 a Szemely es a RendszeresUt kozt, tehat beolvasztom a RendszeresUt ID-jat:

> Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, OtthoniTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, [RendszeresUt.ID])

A *Kapcsolodik* kapcsolat N:M az Ut es a Szemely kozt. Az N:M kapcsolat nem olvaszthato be, igy kapcsolo tablat hozok letre Kapcsolodik neven.

> __Marad:__ Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)
>
> __Marad:__ Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, OtthoniTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, [RendszeresUt.ID])
>
> __Letrejon:__ Kapcsolodik(__UtID__, __SzemelyID__)

A *Visz* kapcsolat az Ut es az Allat kozott N:M, tehat az elozohoz hasonlo az eljaras.

> __Marad:__  Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)
>
> __Marad:__ Allat(__ID__, Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam, Azonosito)
> 
> __Letrejon:__ Visz(__UtID__, __AllatID__)

Az *InduloAllomas* az Ut es az Allomas kozott 1:1, tehat beolvasztom az Ut-ba az Allomas ID-jat:

> __Modosul:__ Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely, [InduloAllomas.ID])

A *CelAllomas* az Ut es az Allomas kozott 1:1, tehat beolvasztom az Ut-ba Az Allomas ID-jat:

> __Modosul:__ Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely, [InduloAllomas.ID], [CelAllomas.ID])

Az *Indulo* a Szallitas es az Allomas kozott N:1, igy az N oldali relaciosemaba elhelyezem az Allomas kulcsat:

> __Modosul:__ Szallitas(__ID__, Szakasz, Allapot, [InduloAllomas.ID])

A *Jelenlegi* a Szallitas es az Allomas kozott N:1, igy az N oldali relaciosemaba elhelyezem az Allomas kulcsat:

> __Modosul:__ Szallitas(__ID__, Szakasz, Allapot, [InduloAllomas.ID], [JelenlegiAllomas.ID])

A *Cel* a Szallitas es az Allomas kozott N:1, igy az N oldali relaciosemaba elhelyezem az Allomas kulcsat:

> __Modosul:__ Szallitas(__ID__, Szakasz, Allapot, [InduloAllomas.ID], [JelenlegiAllomas.ID], [CelAllomas.ID])

---
> Javitva  









