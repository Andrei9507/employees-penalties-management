@extends('layouts.app')

@section('content')
<div class="padd">
<h1 class="ui header  ">List of employees</h1>
</div>
<table class="ui table "  >
	<tr>
		
		<td>Firstname</td>
		<td>Lastname</td>
		<td>Adress</td>
		<td>Phone</td>
	</tr>
	
		@foreach ($employees as $employee) 
			
			<tr >
				
				<td>{{ $employee->firstname }}</td>
				<td>{{ $employee->lastname }}</td>
				<td>{{ $employee->adress }}</td>
				<td>{{ $employee->phone }}</td>
				@if (Auth::user())

				<td >
				@if (Auth::user()->role == '2')
				
				<button onclick="myModal({{$employee->id}});" class="ui red button"><i class="remove icon"></i>Delete</button>	
				<div class="ui modal employee_{{$employee->id}}" >
 						<i class="close icon"></i>
 						<div class="header">
 						   Delete employee
 						</div>
 						<div class="content">
								<h3>Do you want to delete employee?
     							<p >{{$employee->firstname }} {{$employee->lastname}}</p>
    							</h3>
  						</div>
  						<div class="actions">
    						<div class="ui deny button">Cancel</div>
 
							<form action="{{ route(('employees.destroy'), $employee->id) }}" method="post" style="display:inline;">
							{{csrf_field()}}
							{{ method_field('DELETE') }}				
								<button class="ui red button" type="submit">Yes
								</button>
							</form>
  						</div>
				</div>	
				
				<a href="{{ route('employees.edit', $employee->id) }}" class="ui blue button "><i class="pencil icon"></i>Edit</a>
				<a href="{{ route('employees.createpenalty', $employee->id) }}" class="ui green button "><i class="expand icon"></i>Add penalty</a>
				@endif
				@if (Auth::user()->role != '3' )
				<a href="{{ route('employees.show', $employee->id) }}" class="ui yellow button"><i class="info icon"></i>Show</a>
				@endif
				</td>
				@endif
				@endforeach
			</tr>
		

</table>




@endsection