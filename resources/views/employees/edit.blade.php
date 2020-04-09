@extends('layouts.app')

@section('content')
<h1>Edit the employee</h1>
<form action="{{ route(('employees.update'), $employee->id) }}" method="post" onsubmit="return ValidationFieldsForEmployee()" >
<div class="ui large form segment">
    <div class="field">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
      <label>First Name</label>
      <input name="firstname" value="{{$employee->firstname}}" id="firstname" autocomplete="off" type="text" onkeydown="removeWarningForFirstname()">
      <span id="check-firstname" style="color:red" class="ui red"></span>
    </div>
    <div class="field">
      <label>Last Name</label>
      <input  value="{{$employee->lastname}}" name="lastname" id="lastname" autocomplete="off" type="text" onkeydown="removeWarningForLastname()">
      <span id="check-lastname" style="color:red" class="ui red"></span>
    </div>
    <div class="field">
      <label>Adress</label>
      <input  value="{{$employee->adress}}" name="adress" id="adress" autocomplete="off" type="text" onkeydown="removeWarningForAdress()">
      <span id="check-adress" style="color:red" class="ui red"></span>
    </div>
    <div class="field">
      <label>Phone</label>
      <input  value="{{$employee->phone}}" name="phone" id="phone" autocomplete="off" type="text" onkeydown="removeWarningForPhone()">
      <span id="check-phone" style="color:red" class="ui red"></span>
    </div>
    <input type="submit" class="ui teal button"  value="Update">
    </div>
</form>

@endsection