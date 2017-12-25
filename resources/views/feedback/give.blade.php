@extends('layouts.master_static')
@section('content')
<form action="" method="post" accept-charset="utf-8">
	 {{ csrf_field() }}
		<div class="form-group row">
		  <label for="example-text-input" class="col-2 col-form-label">Feedback</label>
		  <div class="col-10">
		    <input class="form-control" type="text" placeholder="Ich fande es toll ... " id="example-text-input">
		  </div>
		</div>	
		
</form>

@endsection