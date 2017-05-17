<div class = "main-body">
	<h2>OOA lähenemine</h2>

	<h3>Objektid</h3>

	<table>
		<tr>
			<th>Objekt</th>
			<th>Identifikaator</th>
			<th>Käitumine</th>
			<th>Olekud</th>
		</tr>
		<tr>
			<td>Konkurss</td>
			<td>Konkurssi identifikaator</td>
			<td>Kandidaatide valimine</td>
			<td>Aktiivne <br> Mitteaktiivne <br> Arhiveeritud</td>
		</tr>
		<tr>
			<td>Test</td>
			<td>Testi identifikaator</td>
			<td>Kontrollib testi tegija oskusi</td>
			<td>Tegemisel <br> Ootel</td>
		</tr>
		<tr>
			<td>Kandidaat</td>
			<td>Isikukood</td>
			<td>Konkurssil kandideerimine</td>
			<td>Kandideeriv <br> Mitte sobilik</td>
		</tr>
		<tr>
			<td>Konsultant</td>
			<td>Isikukood</td>
			<td>Kandidaatide valimine</td>
			<td>Juhib konkurssi <br> Ei juhi konkurssi</td>
		</tr>
		<tr>
			<td>Intervjuu</td>
			<td>Intervjuu identifikaator</td>
			<td>Konsultandi ja kandidaadi kohtumine</td>
			<td>Tulemas <br> Olnud </td>
		</tr>
	</table>

	<h3>Tegijad</h3>
	<table>
		<tr>
			<th>Tegija</th>
			<th>Tegevus</th>
		</tr>
		<tr>
			<td>Klient</td>
			<td>Tellib konkurssi</td>
		</tr>
		<tr>
			<td>Kandidaat</td>
			<td>Osaleb konkurssil <br>Teeb testi<br>Osaleb intervjuus</td>
		</tr>
		<tr>
			<td>Konsultant</td>
			<td>Korraldab konkurssi <br>Osaleb intervjuus<br>Valib kandidaate</td>
		</tr>
		<tr>
			<td>Administratiiv töötaja</td>
			<td>Lepib kokku intervjuu ajad<br>Abistab testide tegemisel</td>
		</tr>
	</table>

	<h3>Kasutajalood</h3>
	<ol>
		<li>Konsultandina soovin avada uue konkurssi</li>
		<li>Konsultandina soovin määrata kandidaatidele testi</li>
		<li>Konsultandina soovin määrata kandidaadile intervjuud</li>
		<li>Kandidaadina soovin teha testi</li>
		<li>Kandidaadina soovin võta osa intervjuus</li>
	</ol>

	<h3>Stsenaariumid</h3>
	<p><strong>1. Konsultandina soovin avada uue konkurssi</strong></p>
	<p>Kui leping on allkirjastatud, konsulatant logib CRM-i sisse ning avab uue konkurssi, pannes kirja selle kirjeldus, tööandja ootused ja pakkumised, kestvuse,
	eelarve, meediakanalid reklaami jaoks.</p>
	<p><strong>2. Konsultandina soovin määrata kandidaatidele testi</strong></p>
	<p>Konsultant logib CRM-i, vaatab läbi konkurssi kandideerijate nimekirja, valib sobiva hulga paremaid kandidaate ja määrab neile vajalikud testid. Seejuures, 
	kui kandidaat on hiljuti juba teinud testi, siis ta ei pea seda enam tegema, ning talle ei määrata testi. Administratiivtöötaja lepib kandidaadiga ajas, millal
	ta saab tulla testi tegema.</p>
	<p><strong>3. Konsultandina soovin määrata kandidaadile intervjuud</strong></p>
	<p>Konsultant logib CRM-i ning vaatab kandidaatide testide tulemusi, valib paremaid ning avaldab soovi nendega kohtuda, pakkudes talle sobilikud ajaj ja kohad.
	Seejärel administratiivtöötaja lepib kandidaatidega kokku kohtumise aja ja koha, niimoodi, et see sboiks nii konsultandile, kui ka kandidaadile.</p>
	<p><strong>4. Kandidaadina soovin teha testi</strong></p>
	<p>Kandidaat saab teate, et edasiseks kandideerimiseks ta peab sooritama teste. Administratiivtöötajaga lepib ta ajas, millal ta saab tulla testi teha. Kandidaat
	õigeaegselt ilmub kohale ja teeb testi, mille järele jääb ootama testi tulemusi ning teate, kas ta osutub valituks järgmiseks konkurssi etapiks või mitte. Testide 
	staatus, sooritamisaeg ja tulemused läevad CRM-i kirja.</p>
	<p><strong>5. Kandidaadina soovin võta osa intervjuus</strong></p>
	<p>Kandidaat saab teate, et konsultant soovib temaga kohtuda. Administratiivtöötajaga lepivad nad ajas ja kohas, mis sobiks nii kandidaadile, kui ka konsultandile.
	Intervjuu aeg, koht ja staatus lähevad CRM-i kirja.</p>

	<h3>Klassid</h3>
	<table>
		<tr>
			<th>Klass</th>
			<th>Kriteerium</th>
		</tr>
		<tr>
			<td>Isik</td>
			<td>Abstract superklass</td>
		</tr>
		<tr>
			<td>Kandidaat</td>
			<td>Isik childclass</td>
		</tr>
		<tr>
			<td>Konsultant</td>
			<td>Isik childclass</td>
		</tr>
		<tr>
			<td>Administratiivtöötaja</td>
			<td>Isik childclass</td>
		</tr>
		<tr>
			<td>Sündmus</td>
			<td>Abstract superclass</td>
		</tr>
		<tr>
			<td>Test</td>
			<td>Sündmus childclass</td>
		</tr>
		<tr>
			<td>Kohtumine</td>
			<td>Sündmus childclass</td>
		</tr>
		<tr>
			<td>Konkurss</td>
			<td></td>
		</tr>
	</table>

	<h3>Klassidiagramm</h3>

	<p><img src="pics/class-diagram.png" alt="Class Diagram"></p>

	<h3>Lisaiteratsiooni vajadus</h3>
	<p>Kuna projekti arendav meeskond on üsna väike, siis lisaiteratsiooni jaoks ei ole piisavalt ajalist resurssi.</p>

	<table>
		<tr>
			<th></th>
			<th></th>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
	</table>
</div>