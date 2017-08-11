<p>Deine IP:   {{ request()->ip() }}</p>

<p> Deine Jetzige Session ID:</p>
<small>  {{ Session::getId() }}</small>
<p><?php
session_start();


if (!isset($_SESSION['visited'])) {
   echo "Du hast diese Seite noch nicht besucht";
   // TODO: loadrandom palce, save with Session
   $_SESSION['visited'] = true;

} else {
   echo "Du hast diese Seite zuvor schon aufgerufen";
   // TODO: get SessionID,
   // TODO: show myplace form sessionID
}
?>
</p>
