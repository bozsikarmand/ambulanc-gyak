<?php

/**
 * Van benne eddig:
 * szemely
 * rendszeresut
 * rendszeresutnapok
 * napok
 * allomas
 * ut
 * allatszallitas
 * allat
 * 
 * a starttime = szta
 * 
 * SELECT szemely.Vezeteknev, szemely.Keresztnev, szemely.Utonev, VezetekesTel, MobilTel, IRSZ, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet
 * FROM szemely, rendszeresut, allomas
 * WHERE rendszeresut.IndVaros = :startCity,
 * AND rendszeresut.IndVaros = allomas.Varos, 
 * AND ut.Indulas = :startTime
 * AND ut.Erkezes = :endTime
 * AND allat.ID = allatszallitas.AllatID 
 * AND allatszallitas.UtID = Ut.ID 
 * AND szemely.ID = szemelyekutjai.SzemelyID
 * AND rendszeresut.ID = szemelyekutjai.RendszeresUtID
 * 
 * rendszeresuton jarnak A-bol B-be 
 * es rendszersut.ID = rendszeresutnapok.RendszeresUtID
 * es napok.ID = rendszeresutnapok.NapokID
 * adott napokon (rendszeresutnapok es napok)
 */