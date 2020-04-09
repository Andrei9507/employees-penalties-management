@extends('layouts.app')

@section('content')
<div class="ui middle aligned center aligned grid">
    <div class="row">
        <div >
        <!-- REGISTER NEW USER WITH EMPLOYEE ID -->
            <div class="ui teal image header large">
                <div class="ui teal image header">Register</div>
                <div class="ui stacked segment">
                    <form class="ui large form" method="POST" action="{{ route('register') }}" onsubmit="return ValidationFieldsForUser()">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" autocomplete="off" id="uname">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>

                        
                        <!-- To be cotinued user role selector  -->
                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">

                                <select name="role"  class="ui fluid dropdown form-control" id="role">
                                    <option  selected value> -- select an option -- </option>
                                    <option  value="1">Human Resource</option>
                                    <option  value="2">Team Leader</option>
                                    <option  value="3">Employee</option>
                                    <option  value="4">CEO</option>
                                </select>
                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" id="email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group"> 
                        <label for="employee" class="col-md-4 control-label">Employee</label>
                            <div class="col-md-6">
                                 <select name="employee_id"  class="ui fluid dropdown form-control"  id="employee">
                                    <option  selected value> -- select an option -- </option>
                                    @foreach($employees as $employee)
                                        <option  value="{{$employee->id}}">{{$employee->firstname}} {{$employee->lastname}}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('employee_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employee') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" id="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" id="cpassword" required>
                            </div>
                        </div>

                        <div class="space">
                            
                            <button type="submit" class="ui fluid large teal submit button">
                                Register
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
