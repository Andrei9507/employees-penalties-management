@extends('layouts.app')

@section('content')
@if (Auth::check())
<header>
    <h1 align="center" class="upper" > Welcome to employee penalty manager </h1>
</header>
<body>


<div class="ui centered grid">
@if (Auth::user()->role == '2' )
	<div class="computer only row upper " display="inline">
  	 <h2 class="dist ">Choose an employee to add penalty: </h2>
  		
  		<select onchange="getEmployee(event)" name="employee_id" class="ui dropdown dist ">
          <option disabled selected value> -- Select Employee -- </option>
           @foreach($employees as $employee)

          <option  value="{{$employee->id}}">{{$employee->firstname}} {{$employee->lastname}}
          </option>

          
          @endforeach
          
          </select>
              <a id="jsAddPenalty" href="#{{ route('employees.createpenalty', $employee->id) }}" class="ui green button "><i class="expand icon "></i>Add penalty</a>

		

	</div>
  @endif
	  <div class="equal width upper row">
      <div class="column">
    	    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
          </div>
      </div>
	
      <div class="column">
        <div id="cont" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto">
		    </div>
      </div>
    </div>

</div>
<script>getPieChart({!! $behaviors !!})</script>
<script>getTopFive({!! $top_employees !!})</script>
@else
		  <div align="center" class="ui padd">
			   <h1 class="ui"> To access this page please login</h1>
			   <a href="{{ url('/login') }}" class="ui button teal" align="center">Login</a>
      </div>             
@endif

@endsection

