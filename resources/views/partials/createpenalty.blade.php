<form action="{{route('employees.storePenalty', $employee->id) }}" method="post" onsubmit="return ValidationFieldsForEmployeePenalty()">
  {{csrf_field()}}

  <div class="field">
    <label>Behavior  </label>

    <select onchange="getPenalty(event); removeWarningForBehaviorPenalty()" name="behavior_id" class="ui dropdown" id="behavior">

      <option disabled selected value=""> -- select an option -- </option>
      @foreach($behaviors as $behavior)
        <option  value="{{$behavior->id}}">{{$behavior->behavior}}</option>
      @endforeach

    </select>
    <span id="check-behavior" style="color:red" class="ui red"></span>
  </div>
  <div class="field">
    <label>Comment</label>
    <input placeholder="Comment"  autocomplete="off" name="comment" type="text" id="comment" onkeydown="removeWarningForComment()">
    <span id="check-comment" style="color:red" class="ui red"></span>
  </div>

  <div class="field">
    <label>Expire date</label>
    <input placeholder="Expire date" class="datepicker"  autocomplete="off" name="expire" id="expire" onchange="removeWarningForDate()"  >
    <input id="penalty_id" name="penalty_id" type="hidden">
    <span id="check-date" style="color:red" class="ui red"></span>
    <hr>
    Apply penalty<p id="penalty_name" >please select a behavior</p>
    <input name="active" type="hidden" value="1">
  </div>

  <button type="submit" class="ui button teal " >Submit</button>

</form>
<script type="text/javascript">
  initDate();
</script>