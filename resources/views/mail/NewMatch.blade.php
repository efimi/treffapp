@component('mail::message')

@component('mail::panel', ['url' => 'http://www.padermeet.de/'])
Padermeet - die Treffapp für Paderborn!
@endcomponent


# Hallo {{ $user->name }}!

Die Padermeet.de App für dich einen neue Location ausgesucht, weil die vorherige Locaiton heute leider keinen ganzen Tisch für alle reservieren konnte.
Deine Neue Location lautet:

# {{ $user->locationToday()->name }}
in der
{{  $user->locationToday()->adress }}

Viel Spass!



Für Feedback wären wir dir sehr dankbar:

@component('mail::button', ['url' => 'http://www.padermeet.de/feedback'])
Feedback
@endcomponent

Mit freundlichen Grüßen,<br>
Ihr {{ config('app.name') }} Team.

<br>
<br>
<a href="http://www.padermeet.de/impressum">Impressum</a> | <a href="http://www.padermeet.de/FAQ">FAQ</a>

Falls du doch nocheinmal selber eine Location suchen willst, clicke auf den folgenden Button:

@component('mail::button', ['url' =>  config('app.url') . '/choseOneMoreTime/' . $user->id . '/' . $user->remember_token . '/' . Carbon\Carbon::now() ])
Ich will nochmal auf dem Button klicken und mir selber eine Location aussuchen
@endcomponent


<p>Falls dennoch Gäste mit der Reservierung "Padermeet" vorbeikommen, bitten Sie diese bitte einfach nochmal auf der Seite bzw. ihren Emails nachzuschauen.</p>
<p>Weisen sie die Kunden bitte dann freundliche drauf hin, dass Sie leider keinen Platzt heute haben, weil schon alles reserveriert wrude.</p>

@endcomponent
