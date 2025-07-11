# Projektlogg (optimerad)
> Tidsperiod: 2025-06-17 → 2025-07-11  

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

### Risk
- Arbetsgivaren ger inte de flesta livsmedelsdata → vi måste researcha själva → mycket mer arbete  

---

## 2025-07-09  ✅

### Framsteg
- one.com-inlogg erhållen; testmiljön återställd och plugins uppdaterade  
- Prod-sajt: Elementor varnar men fungerar; bildverktyg i Elementor kan användas för optimering

### Att göra
- **WPML** saknar licens → ingen uppdatering / tvåspråk → chef måste lösa  
- Visma-betal­koppling felsöks i morgon  

---

## 2025-07-08  ⚠️

### Framsteg
- one.com bekräftar att felet troligen beror på barntema; kräver serverfix  
- Del av produktbilder sorterade

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
- Köpt AI-bildoptimering: 2 500 kr → rabatt ~ 2 300 kr

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
