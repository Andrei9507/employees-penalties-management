  @extends('layouts.app')

  @section('content')
 
<div class="padd">
<h1 class="ui header  ">Show employee details</h1>
</div>
@include('partials.empdetail')
       <label>Behavior / Penalty/ Expire date/ Comment</label>
            
              <div class="field">
                  <ol>
                      @foreach($employee->validPenalties as $validPenalties)
                         @if($validPenalties->behavior)
                          <li>
                            {{ $validPenalties->behavior->behavior }} /
                            {{ $validPenalties->penalty->penalty }} / 
                            {{date('d-m-Y', strtotime($validPenalties->expire))}} /
                            {{$validPenalties->comment}}
                          </li>
                        @endif
                      @endforeach
                  </ol>
              </div>
      </div>
    </div>
  </div>


  @endsection