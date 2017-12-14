# UseCaseDescriptions


## Szenarien

Die Hauptthese dieser Arbeit ist - je weniger Wahlmöglichkeiten gegeben sind, desto zufriedener sind die Menschen mit ihrer "Wahl".

Beim Design der Applikation gab es sehr viele Punkte der Programmflusses, über welche sich Gedanken gemacht wurden. Aus der Frage ob man bisherige Design-Prinzipien(viele Auswahlmöglichkeiten) bieten sollte oder gänzlich darauf verzichten sollte, ergeben sich viele in Details unterschiedliche Varianten.

### Folgende Szenarien habe ich mir vorgestellt...

Der Nutzer loggt sich zunächst ein. Sofern er noch nicht registiert ist muss er sich mit
* Facebook
* Instagram
* Email
oder
* Handynummer
regisiteren.

Wenn er eingeloggt ist darf er auf einen Button clicken.

Beim Buttonclick wird eine Location aus der Datenbank gesucht, welche dem User präsentiert wird.

__Variante A1:__
Der Nutzer bekommt nur eine Location pro Tag zugewisen ohne die Möglichkeit anzusagen. Bei der Zuweisung wird drauf geachtet, dass der User nicht die selbe Location zugewiesen bekommt, wie bei seinem Letzen mal.

__Variante A2:__
Dieser hat die Möglichkeit binnen 5 Sekunden zu besätigen, dass er die Location annimmt. Falls er das nicht tut, kann er in 10 minuten wieder auf den Button klicken.

__Variante A3:__
Der Nutzer muss binnen 5 Sekunden Absagen, ansonsten wird er zu einer Location gematcht. Dies passiert zwei mal absagen, sonst muss er 10 minuten warten,



Der Nutzer hat die Möglichkeit in seinem Dashboard seine Email zu hinterlegen/zu edditieren - so dass man ihn Benachrichtigen kann, falls sich Änderungen ergeben. Änderungen können sich ergeben, wenn die Location eine Reservierung absagt oder anpasst.


__Variante C1:__
Eine __Reservierungmail an die Location__ wird rausgesendet, sobald die maximale Anzahl an Personen erreicht wurde. In der Email wird ein Link zur Verfügung gestellt, welcher bei Click eine Reservierung des heutigen Tages stoniert und die beteiligenten Nutzer einer neuen Location zuweist. Die Nuter bekommen im folgenden eine Benachrichtigungsmail mit der neuen Location.

__Variante C2:__
Die Locations bekommen eine Benachrichtigungsmail, sobald die Location bis zur maximalen Anzahl von der Personen voll gemacht wurde, ohne die Möglichkeit die Reservierung abzubrechen.

__Variante C3:__
Die Location passt die Reservierung an. In der Mail, wird ein Link zur einer Reservierunganpass Seite gestellt.
Dort hat die Location die Möglichkeit einzustellen, wie viele Menschen in der jetzigen Resevierung aufnehmen kann. 

__Variante D1:__
In der __Benachrichtigungsmail für den Nutzer__, wird ein Link mitgeschickt, bei welchen die Location
*	abgesagt 	(a)
*	bestätigt	(b)
 werden muss.

 * (a) Wenn eine Location nicht abgesagt wird, gilt sie als bestätigt.
 * (b) Wenn ein Nutzer nicht auf den 'besätigen' Button binnen der nächsten 10 minuten clickt, wird er aus der Location ausgetragen.  


__Variante D2:__
 Die Nutzer bekommen eine Benachrichtigungsmail mit der neu zugewiesen Location ohne die Möglichkeit sich davon abzumelden.


Wenn alle Treffpunkte auf die maximale Anzahl aufgefüllt wurden, werden alle nachfolgenden Nutzer gleichmäßig auf die Locations verteilt.




# Diskussion

Beim Betrachten der Varianten __C1__ und folgende scheinen auf den Ersten Blick einleuchtend zu sein. Locations, die nicht genügend Platz haben, möchten ihre Besucher nicht verunglimpfen und ihnen schon im vorraus Bescheid geben, dass sie keine bzw. nur eine angepasste (weniger Leute) Reservierung tätigen können. Im nachhinein würde mann dann die Nutzer neu zuweisen müssen. Da die Locations allerdings begrenzt sind und bei zu vielen Teilnehmern schon befüllte Locations überfüllt werden, macht es hier keinen Unterschied, ob die Location den Platz reservieren kann, oder nicht. 
