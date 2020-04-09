    <form action="{{route('employees.storeNotification', $employee->id) }}" method="post">
      {{csrf_field()}}

      <div class="field">
        <label>Behavior  </label>

        <select onchange="getPenalty(event)" name="behavior_id" class="ui dropdown">

          <option disabled selected value> -- select an option -- </option>
          @foreach($behaviors as $behavior)
          <option  value="{{$behavior->id}}">{{$behavior->behavior}}</option>
          @endforeach

        </select>
        </div>
        <div class="field">
          <label>Comment</label>
          <input placeholder="Comment" name="comment" type="text">
        </div>
        <div class="field">
          <label>Expire date</label>
          <input placeholder="Expire date" name="expire" type="date">
          <input id="penalty_id" placeholder="Penalty ID" name="penalty_id" type="text">
          Apply penalty<p id="penalty_name" >please select a behavior</p>
        </div>
        <button type="submit" class="ui button teal " >Submit</button>
      </form>