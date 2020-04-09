@extends('layouts.app')

@section('content')
<div class="padd">
<h1 class="ui header  ">Edit penalty</h1>
</div>
<form action="{{ route(('penalties.update'), $penalty->id) }}" method="post" onsubmit="return ValidationFieldsForPenalty()" >
  <div class="ui large form segment">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
    <div class="field">
      <label>Insert the new penalty</label>
      <input value="{{$penalty->penalty}}" autocomplete="off" name="penalty" type="text" id="penalty"
        onkeydown="removeWarningForPenalty()">
      <span id="check-penalty" style="color:red" class="ui red"></span>
    </div>
   
      <input type="submit" class="ui teal button"  value="Update">
  </div>
</form>

@endsection