@component('mail::message')

@component('mail::panel', ['url' => 'http://www.padermeet.de/'])
Padermeet - die Treffapp für Paderborn!
@endcomponent


# Hallo {{ $location->name }} Team

Die Padermeet.de App hat heute einen Tisch mit {{ $location->max_places }} für Sie vollgemacht - es wäre nett, wenn sie diesen reservieren könnten.

für Feedback währen wir Ihnen sehr dankbar.

@component('mail::button', ['url' => 'http://www.padermeet.de/feedback'])
Feedback
@endcomponent

Mit freundlichen Grüßen,<br>
Ihr {{ config('app.name') }} Team.

<br>
<br>
<a href="http://www.padermeet.de/impressum">Impressum</a> | <a href="http://www.padermeet.de/FAQ">FAQ</a>

<p>Falls keine Reservierung möglich ist klicken Sie bitte auf den folgenden link</p>
<p>Diejenigen die auf ihre Location gemacht wurden, werden im folgenden benachrichtigt werden.</p>
@component('mail::button', ['url' =>  config('app.url') . '/cancleReservation/' . $location->id . '/' . $location->token . '/' . Carbon\Carbon::now() ])
Die Reseriverung abbrechen
@endcomponent


<p>Falls dennoch Gäste mit der Reservierung "Padermeet" vorbeikommen, bitten Sie diese bitte einfach nochmal auf der Seite bzw. ihren Emails nachzuschauen.</p>
<p>Weisen sie die Kunden bitte dann freundliche drauf hin, dass Sie leider keinen Platzt heute haben, weil schon alles reserveriert wrude.</p>

@endcomponent
