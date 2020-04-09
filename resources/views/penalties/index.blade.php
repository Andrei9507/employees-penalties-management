@extends('layouts.app')

@section('content')
<div class="padd">
<h1>List of penalties</h1>
</div>
<table class="ui table">
	<tr>
		
		<td>Penalty</td>
		
	</tr>
	@foreach ($penalties as $penalty)
	<tr>
		<td>{{ $penalty->penalty}}</td>
		@if (Auth::user())
			@if (Auth::user()->role == '2')
				<td >
					<button onclick="myModal({{$penalty->id}});" class="ui red button"><i class="remove icon"></i>Delete</button>	
						<div class="ui modal employee_{{$penalty->id}}" >
							<i class="close icon"></i>
							<div class="header">
								Delete penalty
							</div>
							<div class="content">
								<h3>Do you want to delete penalty?
									<p >{{$penalty->penalty }}</p>
								</h3>
							</div>
							<div class="actions">
								<div class="ui deny button">Cancel</div>

								<form action="{{ route(('penalties.destroy'), $penalty->id) }}" method="post" style="display:inline;">
								{{csrf_field()}}
								{{ method_field('DELETE') }}
					
								<button class="ui red button " type="submit"><i class="remove icon"></i>Delete</button>
							</form>
							</div>
						</div>
					<a href="{{ route(('penalties.edit'), $penalty->id) }}"><button  type="submit" class="ui blue button " ><i class="pencil icon"></i>Edit</button></a>
					
				</td>
			@endif
		@endif
	</tr>
	@endforeach
</table>

@endsection