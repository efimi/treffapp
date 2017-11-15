

 Was machen wenn alle locations voll sind. 



Fehler beim Facebooklogin: 
	Wenn man auf "abbrechen" auf der facebook seite drückt
		Client error: `POST https://graph.facebook.com/v2.10/oauth/access_token` resulted in a `400 Bad Request` response:
{"error":{"message":"Missing authorization code","type":"OAuthException","code":1,"fbtrace_id":"ChxTUjBMDjs"}}

		at Client->request('post', 'https://graph.facebook.com/v2.10/oauth/access_token', array('form_params' => array('client_id' => '1534184019997838', 'client_secret' => 'c85ec491dc4063856fa88ed8ed173bf5', 'code' => null, 'redirect_uri' => 'http://pader.dev/auth/facebook/callback'), 'synchronous' => true))
in Client.php (line 89)


fehler: Rekonstrutkion: kein user, neu login, erstelln von user,fun
		dann klick auf button, fun
		Dann fehler, wenn eine location schon bis auf einen voll ist.
		-> location wird hochgezählt, aber nicht beim user hinterlegt.
		-> beim neu laden, wird der Button wieder angezeigt, user kann ergo zweimal draufklicken und bekommt eine andere Locaitons angezeigt. 

			Fehler: keine Anzeige on Location (wäre ein Platz frei)

					aber hochzegählt in der Datenbank
			beim neu laden, wird die nächste location angezeit 


locations einmal am tag reseten, oder mit las used_times


"Ich würde gerne informiert werden"
	Per Facebook Kontaktiveren? Padermeet.de facebook?

<?php // TODO: mit Mermkal from visitor->Location(location)->merkmale ?>
in visitors.current

Abmelden der mescnhen, neue location aussuchen. 
	wenn alle Locations schon belegt, dann mäglichkeit der Locaiton die Reservierung zu stoinieren
	user sollt eirgendwie Benachrichtigt werden

Facebook event erstellen jeden tag neu mit durchzählen, sobald jemand das event erstellt hat. 

Locaiton -> get facebookpage like button


Location bekommt einen link, mit dem sie die Seite bearbeiten können, sonst keinen zugriff

