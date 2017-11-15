@component('mail::message')

@component('mail::panel', ['url' => 'www.padermeet.de/'])
Padermeet - die Treffapp für Paderborn!
@endcomponent


# Hallo {{ $location->name }} Team

Die Padermeet.de App hat heute einen Tisch mit {{ $location->max_places }}für Sie vollgemacht - es wäre nett, wenn sie diesen reservieren könnten.

für Feedback währen wir Ihnen sehr dankbar.

@component('mail::button', ['url' => 'www.padermeet.de/feedback'])
Feedback
@endcomponent

Mit freundlichen Grüßen,<br>
Ihr {{ config('app.name') }} Team.

<br>
<br>
<a href="www.padermeet.de/impressum">Impressum</a> | <a href="www.padermeet.de/FAQ">FAQ</a>

<p>Falls keine Reservierung möglich ist klicken Sie bitte auf den folgenden link</p>
<a href="www.padermeet.de/noreservation/{{$location->id}}"></a>
<p>Falls dennoch Gäste mit der Reservierung "Padermeet" vorbeikommen, bitten Sie diese bitte einfach nochmal auf der Seite nachzuschauen, mit dem Hinweis, dass Sie leider keine Reservierung machen konnten.</p>

@endcomponent
