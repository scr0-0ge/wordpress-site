# Arbetslogg

## Dag 5 – 2025-06-25

### 1 · Byte av Visma-plugin-leverantör
#### 1.1 Bakgrund  
Arbetsgivaren har ingen molnbaserad Visma-licens utan kör **Visma Administration 1000 med Visma Integration** lokalt. WordPress-pluginet stöder inte detta API, vilket gör att vi måste hitta en alternativ lösning.

#### 1.2 Åtgärd  
Den tidigare leverantören **Wetail** klarar inte lokal koppling → återbetalning begärd.

#### 1.3 Ny leverantör: Spiris  
Spiris är ett avknoppat bolag från Visma och erbjuder en *“allt-i-ett”*-tjänst:
- synkronisera lokal **Visma Administration 1000** till deras moln,
- tillhandahålla API-anslutning till WordPress.

#### 1.4 Kostnadsjämförelse  
| Scenario | Pris | Kommentar |
| -------- | ---- | --------- |
| Direktkoppling vår server → Spiris-plugin | **≈ 850 kr/månad** (upp till 1000 order) | Dyrt; hög etableringsinsats för Spiris. |
| Synk via Spiris-moln → WordPress | **≈ 350 kr/månad** | Billigare; enklare för Spiris att hantera. |

### 2 · Kontrakt med arbetsgivaren  
Arbetet med kontraktsskrivning är påbörjat.

<details>
<summary><strong>Problem (klicka för att visa)</strong></summary>

* Hittar ingen support-e-post till Spiris → mejl skickat till deras marknadsavdelning.
</details>

---

## Dag 4 – 2025-06-23

### Utfört
1. Köpte **Visma Plugin by Wetail**  
2. Skapade Wetail-konto  
3. Följde manualen fram till Visma-inloggning  
4. AI-frilade produktbilder → transparent bakgrund

<details>
<summary><strong>Problem</strong></summary>

* Chefen måste själv logga in på Visma-kontot.  
* AI-friläggning tar 5–8 min/bild och har dagskvot → kräver premium.  
* Av ~1900 produkter har bara ~500 bilder och ~100 kompletta attribut; publicering prioriteras över fullständiga beskrivningar.
</details>

---

## Dag 3 – 2025-06-21

### Utfört
- Skrev beskrivningar för 25 produkter (≈ 8 min/st).  
- Testade CSV-import av produkter (fortsatt uppföljning).  
- Försökte lägga till produkter med ofullständig data manuellt (≈ 25 min/st).

<details>
<summary><strong>Problem</strong></summary>

1. Endast frontbild → saknas innehåll, allergener, varumärke, förvaring m.m.  
2. Kopiera texter online medför juridiskt ansvar → osäkerhet.  
3. All publicerad info kräver manuell kvalitetskontroll.  
4. Volym för vätskor tolkas som kg (ex. 640 ml → 640 kg).
</details>

---

## Dag 2 – 2025-06-19

### Utfört
- Fixade flerspråkig kassa (B2B, engelska).  
- Säkerhetskopierade ~90 raderade konton (möjligen bottar).

<details>
<summary><strong>Problem</strong></summary>

* Ingen bekräftelse-e-post vid registrering → användare blir aktiva direkt.  
* Företagskod kan fyllas i fritt → alla blir B2B.  
* Överväger automatisk verifiering av B2B via företagskod.
</details>

---

## Dag 1 – 2025-06-17

### Utfört
1. Bytte lösenord.  
2. Installerade plugin för användarsegmentering.  
3. Rensade ~90 testkonton, nedgraderade gammalt adminkonto.  
4. Skapade B2B-grupp; testning påbörjad.  
5. Gjorde produkter synliga för besökare (**WooCommerce → Settings → Site visibility → Live**).  
6. Implementerade falsk “offert”-betalningsgateway i `functions.php` för B2B-test.

<details>
<summary><strong>Problem</strong></summary>

* Icke-admin-användare såg inte produkter → löst.  
* Temauppdatering kraschade sajten → återställd.  
* Första versionen av B2B-betalningsblockering misslyckades → “ogiltig betalningsmetod”.
</details>
