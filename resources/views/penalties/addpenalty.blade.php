@extends('layouts.app')

@section('content')
<div class="padd">
<h1 class="ui header  ">Add penalty</h1>
</div>
<form action="{{ route('penalties.store') }}" method="post" onsubmit="return ValidationFieldsForPenalty()" >
<div class="ui large form segment">
    <div class="field">
    {{csrf_field()}}
      <label>Insert the penalty</label>
      <input placeholder="Penalty"  autocomplete="off" name="penalty" type="text" id="penalty"
        onkeydown="removeWarningForPenalty()">
      <span id="check-penalty" style="color:red" class="ui red"></span>
    </div>
      <input type="submit" class="ui teal button"  value="Add">
    </div>
</form>

@endsection