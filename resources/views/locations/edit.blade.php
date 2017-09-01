@extends('layouts.master_static')

@section('content')
    <div class="jumbotron">
        <div class="text">
            <h2>Wollen Sie mit ihrer Location teilnehmen?</h2>
            <h3>Füllen Sie bitte folgendes Anfrageformular aus:</h3>
        </div>

        <form method="post">
          <div class="form-group">
            <label for="email">Email Addresse</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">Ihre Emailadresse wird zukünftig als login gelten.</small>
          </div>
          <div class="form-group">
            <label for="password">Passwort</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="closed_on">Ruhetag am</label>
            <select class="form-control" id="closed_on">
              <option value="0">Montag</option>
              <option value="1">Dienstag</option>
              <option value="2">Mittwoch</option>
              <option value="3">Donnerstag</option>
              <option value="4">Freitag</option>
              <option value="5">Samstag</option>
              <option value="6">Sonntag</option>
            </select>
          </div>
          <div class="form-group">
            <label for="address">Addresse</label>
            <input type="address" class="form-control" id="address" placeholder="Am Kamp 35">
            <small id="address" class="form-text text-muted">Strasse + Hausnummer in Paderborn.</small>
          </div>

          <div class="form-group">
            <label for="slogan">Slogan</label>
            <input type="slogan" class="form-control" id="slogan" placeholder="Bei uns gibts den besten Café...">
          </div>

          <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="form-control-file" id="logo" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Laden sie ihr Logo hoch. Unterstützte Formate: .jpg, .png.</small>
          </div>

          <button type="submit" class="btn btn-primary">Ich will mitmachen</button>
        </form>

    </div>

@endsection
