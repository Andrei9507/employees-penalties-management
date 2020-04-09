@extends('layouts.app')

@section('content')
<div class="ui middle aligned center aligned grid">
    <div class="align-padding-text"></div>
    <div class="row">
        <div >
            <div class="ui teal image header large">
            
                <div class="ui stacked segment ">
                    <div class="ui teal image header center"><h1>Login</h1></div>
                    <form class="ui large form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="space">
                            
                        </div>

                        <div class="form-group">
                            
                            <button type="submit" class="ui fluid large teal submit button">
                                Login
                            </button>

                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
