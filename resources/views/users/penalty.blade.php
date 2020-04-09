@extends('layouts.app')

@section('content')
<div class="padd">
<h1 class="ui header  ">Valid Penalty on this user</h1>
</div>
<table class="ui table ">
	<tr>
		<td>Behavior</td>
		<td>Penalty</td>
		<td>Comment</td>
		<td>Expire date</td>
	</tr>
	@foreach($users as $validPenalty)
		<tr>
			<td>                       
		        {{ $validPenalty->behavior->behavior }} 
		    </td> 
		    <td>                       
		        {{ $validPenalty->penalty->penalty }} 
		    </td> 
		    <td class = "collapsing">
			    <textarea disabled rows="4" cols="30" 
			    style="background-color: white;color:black; border:none; border-color: Transparent; overflow: auto;  resize: none;  ">
			    {{ $validPenalty->comment }}
			</textarea>                       
		    </td>

		    <td>                       
		        {{ date('d-m-Y', strtotime($validPenalty->expire)) }} 
		    </td> 
	    </tr>
	@endforeach
</table>
@endsection

	         
	         
	    
			    

				




