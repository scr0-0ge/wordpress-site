# Projektlogg (optimerad)
> Tidsperiod: 2025-06-17 → 2025-07-20

## 2025-07-18  ✅

### Framsteg

* **Visma-supporten har gått med på att sätta upp integrationen innan webbplatsen är färdig**

  1. Kontaktpersonen på företaget sa att han vill få igång länken så snart som möjligt så att man kan testa ordersynkningen, så jag mejlade Visma-supporten i går och bad dem starta integreringen omgående, även om webbplatsen inte är helt färdig – vi betalar dem hellre för eventuella problem i efterhand. I dag svarade de att det går bra att börja. Bokad tid är nästa onsdag eller torsdag.
  2. Kontaktpersonen har hamnat i konflikt med ägaren och har redan sagt upp sig. Börjar förbereda för min avgång också.

* **Raderat produkter med risk för upphovsrättsproblem**

  1. Eftersom chefen inte längre vill plagiera bilder tog jag bort alla produkter vars bilder hade kopierats från andra webbplatser.

* arbeta med excel 

---

## 2025-07-17  ✅

### Framsteg

* **Godkänd acceptans**

  1. B2B-beställning utan betalning har godkänts.
  2. B2C-betalning i sandbox-läge har godkänts.

* **WPML installerat och betalt**

  1. Kan börja översätta de engelska sidorna.

* **Uppdragsgivaren säger att bilder inte ska plagieras, men att produktdatatabeller får kopieras från andra webbplatser**

---

## 2025-07-16  ✅

### Framsteg

* **B2B v2-pluginet installerat**

  1. Stöd för flera språk.
  2. Kan kringgå Apple Pay.
     `https://github.com/scr0-0ge/wordpress-site/blob/main/plugin/b2b%20v2.php`

* arbeta med excel

### Problem

* **Enligt kontraktet måste vi ändå ladda upp 500 produkter, även om de inte tillhandahåller produktdata**

  1. Som sagt måste jag själv hitta material – minst 180 produkter.
  2. Om det inte går får vi dra oss ur enligt kontraktet.

---

## 2025-07-14  ✅

### Framsteg

* **Svar från Visma**

  1. Funktionen Stock management måste vara aktiverad vid uppladdning, eller så kan man mass-redigera i webbshoppen.
  2. Rekommenderar att vi laddar upp 800 produkter först och synkar därefter – avråder från att koppla ihop systemen när bara hälften av produkterna finns.

* **Nya Attribut tillagda och visas nu även vid massuppladdning**

* arbeta med excel 
---

## 2025-07-11  ✅

### Framsteg
- **Massuppladdning av produktbilder**  
  1. Sätt bilderna i Google Drive till “Alla med länken” och kopiera delningslänken  
     `https://drive.google.com/file/d/…/view?usp=drive_link`  
  2. Ändra länken till nedladdningsformat  
     `https://drive.google.com/uc?export=download&id=…`  
  3. Åtgärdar problemet att bilder inte följer med CSV-importen  
- **Massändra Product Categories**  
  - Produktlista → **Bulk actions › Edit**, markera varor och klicka **Apply**  
- **Skript för automatisk länkändring testat med lyckat resultat**  
  - Se repo <https://github.com/scr0-0ge/wordpress-site/blob/main/plugin/%E6%89%B9%E9%87%8F%E7%BB%99%E6%9B%B4%E6%94%B9%E9%93%BE%E6%8E%A5%20excel>

### Problem / Lösning
- **HEIF-uppladdning (iPhone-skärmavbilder) krånglar**  
  1. Fortsätt använda nedladdningslänk  
  2. Hämta miniatyr → konvertera till JPG → spara i min privata Drive  
  3. Dela igen och generera ny nedladdningslänk  
- Repo version 3.0: <https://github.com/scr0-0ge/wordpress-site/blob/main/plugin/%E6%89%B9%E9%87%8F%E7%BB%99%E6%9B%B4%E6%94%B9%E9%93%BE%E6%8E%A5%20excel>

### Okända problem
Ett test misslyckades med JPG-konverteringen; originall HEIF i Drive blev en felaktig 4-bitars-fil (ska vara ≈2 MB). Troligen p.g.a. skriv­behörighet. Har nu satt filerna till “läsa endast”. Ladda inte upp för många original samtidigt – om de korruptas finns ingen backup.

### Mall för massuppladdning
Två mallar finns; den gamla kan inte tas bort. Den nya heter **add new only** – lägger endast till nya produkter och ändrar inga befintliga, vilket är tryggare.

---

## 2025-07-10  ✅

### Framsteg
- **WebToffee Import / Export** massimport fungerar bättre än Woo-inbyggda  
  - Varje kolumn måste mappas, särskilt `attribute:*`  
- **Attributtips**  
  - `attribute:pa_country` ➡︎ visar landsflagga  
  - Undvik `attribute_data:*` (renderas ej)  
- Har bekräftat att bilder och kategorier också kan importeras i bulk (process finslipas)

* arbeta med excel 

### Risk
- Arbetsgivaren ger inte de flesta livsmedelsdata → vi måste researcha själva → mycket mer arbete  

---

## 2025-07-09  ✅

### Framsteg
- one.com-inlogg erhållen; testmiljön återställd och plugins uppdaterade  
- Prod-sajt: Elementor varnar men fungerar; bildverktyg i Elementor kan användas för optimering

* arbeta med excel 

### Att göra
- **WPML** saknar licens → ingen uppdatering / tvåspråk → chef måste lösa  
- Visma-betal­koppling felsöks i morgon  

---

## 2025-07-08  ⚠️

### Framsteg
- one.com bekräftar att felet troligen beror på barntema; kräver serverfix  
- Del av produktbilder sorterade

* arbeta med excel 

### Hinder
- Server­inloggning saknas från förra ansvarig; drar det ut → kontrakts­uppsägning & avräkning kan bli aktuellt  

---

## 2025-07-07  ⚠️

### Visma-synklogik
1. Order skapas i WooCommerce  
2. Synkas till Visma  
3. Endast 100 % namnmatch arkiveras, annars skapas ny kund  
4. Rekommenderat: skriv unikt **kund-ID** i Woo-fältet `meta` för säker matchning

### Akut
- Efter uppdatering kraschar både front- och backend; inlogg blockeras  
- one.com kontaktad för återställning  

---

## 2025-07-06  ✅

### Framsteg
- Köpt AI-bildoptimering

* arbeta med excel 

### Teknik
- Synk av Visma-ID kräver sannolikt server­skript  

---

## 2025-07-03  ✅

### Avtal & krav
- Kontrakt signerat med uppdragsgivaren  
- **Visma-krav**  
  - Behåll lokal Visma Administration 1000  
  - Synka order + kunder via automatiseramera-pluginet  
- **Produkter**: 855 st, sv/eng → ~ 1 710 SKU → ladda upp asap  
- Rensning av skräpkonton godkänd; juridiskt ansvar klargjort

### Risk
- Måste bekräfta om Visma kan synka SKU / pris / allergier etc.  
- Dataflöde bör vara **Visma → webb** för att undvika bortfall  

---

## 2025-07-02  ✅

### Kommunikation
- Möte med **Spiris** + **automatiseramera**: lokal Visma-direktkoppling möjlig  
- Kontrakt signeras i morgon

---

## 2025-06-25  ✅

### Planändring
- Återbetalning Wetail → byter till **Spiris** (”one-stop-shop”)  
- Kostnads­uppskattning:  
  - Lokal direktkoppling 1 000 order/mån ≈ 850 kr  
  - Server-relay ≈ 350 kr  

---

## 2025-06-23  ✅

### Framsteg
- Köpt och konfigurerat Wetail-Visma-plugin (väntar på chefs-inlogg till Visma)  
- AI-friläggning ger transparent bakgrund

### Begränsningar
- AI-friläggning har begränsat antal; uppgradera konto  
- 1 900 artiklar → bara ~ 500 bilder, ~ 100 kompletta attribut; produkttexter pausas  

---

## 2025-06-21  ✅

### Databearbetning
- Hand­skriven beskrivning för 25 kompletta produkter (≈ 8 min/st)  
- CSV-import & manuell komplettering av saknade data (≈ 25 min/st)

### Obs
- Brist­fälliga data innebär juridiskt ansvar → kräver kund­granskning  
- Woo standardvolym är **kg**; t.ex. 640 ml tolkas som 640 kg → måste korrigeras  

---

## 2025-06-19  ✅

### Användar­hantering
- Fixat B2B-kassan för flera språk  
- Säkerhetskopierat & tagit bort misstänkta bot-konton

### Att lösa
- Bekräftelsemejl skickas ej; företagskod kan anges fritt → bör automatiskt verifieras  

---

## 2025-06-17  ✅

### Första dag – resultat
- Återställde lösenord, installerade plugin för användar­grupper, rensade testkonton  
- Skapade B2B-grupp; öppnade produkter (**WooCommerce › Settings › Site visibility › Live**)  
- “Förfrågan”-låtsas-betal­gateway för B2B testad med lyckat resultat

### Historiska problem
- Ej admin såg inte produkter (åtgärdat)  
- Temauppdatering kraschade sajten (återställd)  
- B2B-betalblock v1.0 misslyckades; behöver förbättras
