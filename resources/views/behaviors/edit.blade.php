@extends('layouts.app')

@section('content')
<div class="padd">
<h1 class="ui header  ">Edit behavior</h1>
</div>
<form action="{{ route(('behaviors.update'), $behavior->id )}}" method="post" onsubmit="return ValidationFieldsForBehavior()" >
<div class="ui large form segment">
    <div class="field">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
      <label>Behavior</label>
      <input value="{{$behavior->behavior}}"  autocomplete="off" name="behavior" type="text" id="behavior" 
        onkeydown="removeWarningForBehavior()">
      <span id="check-behavior" style="color:red" class="ui red"></span>
    </div>
    <div class="field">
      <label>Penalty </label>
      
      <select name="penalty_id" class="ui dropdown" id="penalty" onchange="removeWarningForPenalty()">
        @foreach($penalties as $penalty)
     
        <option value="{{$penalty->id}}" 
        @if($penalty->id == $behavior->penalty_id) selected @endif > {{$penalty->penalty}}</option>
      
        @endforeach
      </select>
      <span id="check-penalty" style="color:red" class="ui red"></span>
    </div>
    
      <input type="submit" class="ui teal button"  value="Update">
    </div>
</form>
@endsection