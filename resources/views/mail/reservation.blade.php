<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Hallo {{ $location->name }} Team,</h1>
        <p>Die Padermeet.de App hat heute einen Tisch mit {{ $location->max_places }}für Sie vollgemacht - es wäre nett, wenn sie diesen reservieren könnten.</p>

        <p>Für
            <a href="padermeet.de/feedback">Feedback, Anregungen oder Wünsche</a>
            wären wir Ihnen sehr dankbar!
        </p>

        <p>Mit freundlichen Grüßen</p>
        <p>Ihr Padermeet Team</p>

        <p>
            <a href="padermeet.de/impressum">Impressum</a> | <a href="padermeet.de/FAQ">FAQ</a>
        </p>

        <p>Falls keine Reservierung möglich ist klicken Sie bitte auf den folgenden link</p>
        <a href="padermeet.de/noreservation/{{$location->id}}"></a>
        <p>Falls dennoch Gäste mit der Reservierung "Padermeet" vorbeikommen, bitten Sie diese bitte einfach nochmal auf der Seite nachzuschauen, mit dem Hinweis, dass Sie leider keine Reservierung machen konnten.</p>

    </body>
</html>
