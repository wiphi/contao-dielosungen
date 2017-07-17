# Die Losungen - Contao Modul
Importiere und zeige die Herrnhuter Losungen tagesaktuell in der Contao Website an.
Bitte beachte unbedingt die Nutzungsbedingungen der Herrnhuter Brüdergemeinde für Publizierung der Losung auf deiner Seite!

## Nutzungsbedinungen  
Es gelten die Nutzungsbedingungen der Herrnhuter Brüdergemeinde. https://www.losungen.de/download/nutzungsbedingungen/

## Installation
Derzeit ist das Modul noch nicht unter dem Package-Manager auffindbar, kann aber durch einen manuellen Eintrag in die composer.json installiert werden.
<pre>
    "repositories": [
        {
            "url": "https://github.com/wiphi/contao-dielosungen.git",
            "type": "git"
        }
    ],
</pre>

Anschließend kann nach <code>wiphi/contao-dielosungen</code> das Modul gesucht und installiert werden.

## Import
Um Losungen anzeigen zu können, müssen diese erst als XML importiert werden. Diese wird auf https://www.losungen.de/download/ bereit gestellt. Die entpackte XML-Datei kann dann im Modul unter "Die Losung importieren" eingelesen werden.

## Ausgabe im Frontend
Zur Anzeige im Frontend muss das Modul "Die Losung" eingebunden und konfiguriert werden. Das Template <code>mod_dielosung.html5</code> kann natürlich angepasst werden.

## Showcase
Auf https://www.evgemeinde-badelster.de/startseite kann das Modul im Frontend angesehen werden.

## Hinweise
Das Modul ist derzeit nur kompatibel mit Contao 3.5. Eine Anpassung auf Contao 4 ist in Planung.

## Haftungsausschluss
Das Modul steht in keiner Beziehung zu der Herrnhuter Brüdergemeinde.
Lizenz: MIT License
