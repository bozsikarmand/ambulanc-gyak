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

Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, VezetekesTel, MobilTel, Email, IRSZ, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet)

RendszeresUt(__ID__, IndVaros, ErkVaros, IndDatum, ErkDatum, IndIdo, ErkIdo, HetiRendszeresseg, Hely)

Napok(__ID__, Nap)

Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)

Szallitas(__ID__, Szakasz, Allapot)

Allomas(__ID__, Varos, IRSZ, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, KoordSz, KoordH)

Allat(__ID__, Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam)

Jog(__ID__, Nev)

Jelszo(__ID__, Hash)

Kapcsolatok:
---

A *Megtortenik* kapcsolat N:M a RendszeresUt es a Napok kozt, tehat uj kapcsolotablat kell letrehoznom, RendszeresUtNapok neven:

> __Marad:__ RendszeresUt(__ID__, IndVaros, ErkVaros, IndDatum, ErkDatum, IndIdo, ErkIdo, HetiRendszeresseg, Hely)
> 
> __Marad:__ Napok(__ID__, Nap)
>
> __Letrejon:__ RendszeresUtNapok(__RendszeresUtID__, __NapokID__)

Az *Utazik* kapcsolat N:M a Szemely es a RendszeresUt kozt, tehat elozohoz hasonloan jarok el:

> __Marad__: Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, VezetekesTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, IRSZ)
> 
> __Marad:__ RendszeresUt(__ID__, IndVaros, ErkVaros, IndDatum, ErkDatum, IndIdo, ErkIdo, HetiRendszeresseg, Hely)
> 
> __Letrejon:__ SzemelyekUtjai(__SzemelyID__, __RendszeresUtID__) 

A *Kapcsolodik* kapcsolat N:M az Ut es a Szemely kozt. Az N:M kapcsolat nem olvaszthato be, igy kapcsolo tablat hozok letre Kapcsolodik neven.

> __Marad:__ Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)
>
> __Marad:__ Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, VezetekesTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, IRSZ)
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

A *Rendelkezik* a Szemely es a Jog kozott N:M, igy kapcsolotablat hozok letre:

> __Marad:__ Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, VezetekesTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, IRSZ)
> 
> __Marad:__ Jog(__ID__, Nev)
>
> __Letrejon:__ SzemelyJog(__SzemelyID__, __JogID__)

A *Tartozik* a Szemely es a Jelszo kozott 1:1, igy a Jelszo entitasna olvasztom a Szemely ID-jat (mivel ott meg kevesebb az attributum, atlathatobb)

> __Marad:__ Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, VezetekesTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, IRSZ)
>
> __Modosul:__ Jelszo(__ID__, Hash, [Szemely.ID])

A *Resze* az Allat es az Ut kozott N:M, tehat kapcsolotablat hozok letre AllatUt neven:

> __Marad:__ Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)
>
> __Marad:__ Allat(__ID__, Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam)
> 
> __Letrejon:__ AllatUt(__UtID__, __AllatID__) 

---
> Modositottam a megbeszelteknek megfeleloen