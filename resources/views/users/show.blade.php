 @extends('layouts.app')

  @section('content')
 
    <div class="padd">
<h1 class="ui header  ">Show user detail</h1>
  </div>
      <div class="column">
        <div class="ui big form segment">
      <div class="field">
            <label>ID</label>
            <input value="{{ $user->id }}" disabled type="text">
        </div>
        <div class="field">
            <label>User Name</label>
            <input value="{{ $user->name }}" disabled type="text">
        </div>
        <div class="field">
            <label>Email</label>
          <input value="{{ $user->email }}" disabled type="text">
        </div>
        <!-- verifica daca user-ul logat are asignat un id de angajat sau nu  -->
         @if (Auth::user()->employee_id != '0')  
        <div class="field">
            <label>Employee name</label>
          <input value="{{ $user->employee->firstname }} {{ $user->employee->lastname }} " disabled type="text">
        </div>
        @endif
        <div class="field">
            <label>User Role</label>
            <input value="{{getRole(Auth::user()->role)}}" disabled type="text">
        </div>
                
        </div>  
    </div>

  


 

  @endsection