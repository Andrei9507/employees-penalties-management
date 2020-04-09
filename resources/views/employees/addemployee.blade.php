@extends('layouts.app')


@section('content')
<div class="padd">
<h1 class="ui header  ">Add employee</h1>
</div>
<form action="{{ route('employees.store') }}" method="post" onsubmit="return ValidationFieldsForEmployee()" >
<div class="ui large form segment">
    <div class="field">
    {{csrf_field()}}
      <label>First Name</label>
      <input placeholder="First Name" autocomplete="off" name="firstname" id="firstname" type="text" onkeydown="removeWarningForFirstname()">
      <span id="check-firstname" style="color:red" class="ui red"></span>
    </div>
    <div class="field">
      <label>Last Name</label>
      <input placeholder="Last Name" autocomplete="off" name="lastname" id="lastname" type="text" onkeydown="removeWarningForLastname()">
      <span id="check-lastname" style="color:red" class="ui red"></span>
    </div>
    <div class="field">
      <label>Adress</label>
      <input placeholder="Adress" autocomplete="off" name="adress" id="adress" type="text" onkeydown="removeWarningForAdress()">
      <span id="check-adress" style="color:red" class="ui red"></span>
    </div>
    <div class="field">
      <label>Phone</label>
      <input placeholder="Phone" autocomplete="off" name="phone" id="phone" type="number" onkeydown="removeWarningForPhone()">
      <span id="check-phone" style="color:red" class="ui red"></span>
    </div>

    <input type="submit" class="ui teal button"  value="Add">
    </div>
</form>
@endsection
