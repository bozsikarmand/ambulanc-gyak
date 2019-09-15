# Relaciosema
## Jelolesek:
* A szabvanytol elteroen az elsodleges kulcsokat csak vastagitottam
* [szoveg] -> Kulso kulcs 

Egyedek:
---

Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, VezetekesTel, MobilTel, Email, IRSZ, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet)

RendszeresUt(__ID__, IndVaros, IndDatumIdo, ErkDatumIdo, ErkVaros, Hely)

Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)

Szallitas(__ID__, Szakasz, Allapot)

Allomas(__ID__, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, KoordSz, KoordH)

Allat(__ID__, Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam)

Jog(__ID__, Nev)

Jelszo(__ID__, Hash)

Kapcsolatok:
---

Az *Utazik* kapcsolat 1:1 a Szemely es a RendszeresUt kozt, tehat beolvasztom a RendszeresUt ID-jat:

> Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, VezetekesTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, IRSZ, [RendszeresUt.ID])

A *Kapcsolodik* kapcsolat N:M az Ut es a Szemely kozt. Az N:M kapcsolat nem olvaszthato be, igy kapcsolo tablat hozok letre Kapcsolodik neven.

> __Marad:__ Ut(__ID__, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)
>
> __Marad:__ Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, VezetekesTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, IRSZ, [RendszeresUt.ID])
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

> __Marad:__ Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, VezetekesTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, IRSZ, [RendszeresUt.ID])
> 
> __Marad:__ Jog(__ID__, Nev)
>
> __Letrejon:__ SzemelyJog(__SzemelyID__, __JogID__)

A *Tartozik* a Szemely es a Jelszo kozott 1:1, igy a Jelszo entitasna olvasztom a Szemely ID-jat (mivel ott meg kevesebb az attributum, atlathatobb)

> __Marad:__ Szemely(__ID__, Vezeteknev, Keresztnev, Utonev, VezetekesTel, MobilTel, Email, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, IRSZ, [RendszeresUt.ID])
>
> __Modosul:__ Jog(__ID__, Nev, [Szemely.ID])

---
> Bovitettem  









