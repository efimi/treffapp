@extends('layouts.master_static')

@section('content')
    <div class="jumbotron">
        <div class="text">
            <h2>Wollen Sie mit ihrer Location teilnehmen?</h2>
            <h3>Füllen Sie bitte folgendes Anfrageformular aus:</h3>
        </div>

        <form id="locations" enctype="multipart/form-data" method="POST" action="/locations/edit">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="mail">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
                <small id="name" class="form-text text-muted">Der Name des Locals.</small>
            </div>
            <div class="form-group">
                <label for="email">Email Addresse</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">Ihre Emailadresse wird zukünftig als login gelten.</small>
            </div>
            <div class="form-group">
                <label for="password">Passwort</label>
                <input type="password" class="form-control" id="password" name="passwort" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="closed_on">Ruhetag am</label>
                <select class="form-control" id="closed_on" name="closed_on">
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
                <input type="text" class="form-control" id="address" name="address" placeholder="Am Kamp 35">
                <small id="address" class="form-text text-muted">Strasse + Hausnummer in Paderborn.</small>
            </div>

            <div class="form-group">
                <label for="slogan">Slogan</label>
                <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Bei uns gibts den besten Café...">
            </div>


            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="file"/>
                <small id="fileHelp" class="form-text text-muted">Laden sie ihr Logo hoch. Unterstützte Formate: .jpg, .png.</small>
                <div id="image_preview"><img class="img-responsive"  style="margin:auto !important;" id="previewing" src=""/></div>
            </div>

            <button type="submit" class="btn btn-primary">Ich will mitmachen</button>
        </form>

        <br>
        <div class="hidden bg-success well-lg col-md-12" id="alert"></div>
    </div>


@endsection
