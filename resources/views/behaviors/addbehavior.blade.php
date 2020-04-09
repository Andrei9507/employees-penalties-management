@extends('layouts.app')

@section('content')
<div class="padd">
<h1 class="ui header  ">Add behavior</h1>
</div>

<form action="{{ route('behaviors.store') }}" method="post" onsubmit="return ValidationFieldsForBehavior()" >
<div class="ui large form segment">
    <div class="field">
    {{csrf_field()}}
      <label>Behavior</label>
      <input placeholder="Behavior"  autocomplete="off" name="behavior" type="text" id="behavior" 
        onkeydown="removeWarningForBehavior()">
      <span id="check-behavior" style="color:red" class="ui red"></span>
    </div>
    <div class="field">
      <label>Penalty </label>
      
      <select name="penalty_id" class="ui dropdown" id="penalty" onchange="removeWarningForPenalty()">
        <option value="">Select option </option>
        @foreach($penalties as $penalty)
          <option  value="{{$penalty->id}}">{{$penalty->penalty}}</option> 
        @endforeach
      </select>
      <span id="check-penalty" style="color:red" class="ui red"></span>
    </div>

      <input type="submit" class="ui teal button"  value="Add">
    </div>
</form>
@endsection