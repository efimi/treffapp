@extends('layouts.master_static')

@section('content')
    <div class="text">
        <form>
  <div class="form-group">
    <label for="email">Email Addresse</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleSelect1">Ruhetag am</label>
    <select class="form-control" id="exampleSelect1">
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
    <label for="logo">Logo Upload</label>
    <input type="file" class="form-control-file" id="logo" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Laden sie ihr Logo hoch. Unterstützte Formate: .jpg, .png.</small>
  </div>

  <button type="submit" class="btn btn-primary">Ich will mitmachen</button>
</form>

    </div>

@endsection
