@extends('layouts.app')

@section('content')
<div>
<h1 class="padd">List of behaviors</h1>
</div>
<table class="ui table">
	<tr>
		<td>Behavior</td>
		<td>Penalty </td>
	</tr>
	
	@foreach ($behaviors as $behavior) 
		
		<tr>
			<td>{{ $behavior->behavior }}</td>
			<td>{{ $behavior->penalty->penalty }}</td>
			@if (Auth::user())
				@if (Auth::user()->role == '2')
				<td>

					<button onclick="myModal({{$behavior->id}});" class="ui red button"><i class="remove icon"></i>Delete</button>	
					<div class="ui modal employee_{{$behavior->id}}" >
						<i class="close icon"></i>
						<div class="header">
							Delete behavior
						</div>
						<div class="content">
							<h3>Do you want to delete behavior?
								<p >{{$behavior->behavior }}</p>
							</h3>
						</div>
						<div class="actions">
							<div class="ui deny button">Cancel</div>

								<form action="{{ route(('behaviors.destroy'), $behavior->id) }}" method="post" style="display:inline;">
									{{csrf_field()}}
									{{ method_field('DELETE') }}
					
									<button class="ui red button" type="submit"><i class="remove icon"></i>Yes
									</button>
								</form>
							</div>
						</div>
					</div>
					<a href="{{ route(('behaviors.edit'), $behavior->id) }}"><button  type="submit" class="ui blue button " ><i class="pencil icon"></i>Edit</button></a>
				
				</td>
				@endif
			@endif
		</tr>
	@endforeach
</table>
@endsection	