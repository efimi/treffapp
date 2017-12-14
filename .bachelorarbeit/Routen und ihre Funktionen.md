# Routen und ihre Funktionen

Wie bei Laravel Webapplikationen üblich, werden die einzelnen Funktionen durch sogenannte 'routes' getriggert. D.h. dass zunächst eine URL angesteuert wird, welche wiederum bei einem Controller zum aufrufen einer bestimmen Funktion führt und ggf. zu einer neunen Ansicht, einem sogenannten 'VIEW' führt.

Bei dem Padermeet Projekt verwende ich 27 verschiedene URL, wie auf der folgenden Übersicht zu sehen.

[Bilder von routes/web.php]

Neben URLS die eifnach nur eine Statische Seite ansteuern, so wie '/faq' oder '/impressum', gibt es auch URLS die einen Befehl per Ajax an die Datenbank triggern und Rückgabewerte in den bisherigen view wieder eingliedern. Für die einfachsten Verssionen absolute Grundvoraussetzung sind die Routen '/getplace' und die Basis Route '/'.


