  <div class="ui two column vertically padded grid">
    <div class="column">
        <div class="ui big form segment">
      <div class="field">
            <label>ID</label>
            <input value="{{ $employee->id }}" disabled type="text">
        </div>
        <div class="field">
            <label>First Name</label>
            <input value="{{ $employee->firstname }}" disabled type="text">
        </div>
        <div class="field">
            <label>Last Name</label>
          <input value="{{ $employee->lastname }}" disabled type="text">
        </div>
        <div class="field">
            <label>Adress</label>
            <input value="{{ $employee->adress }}" disabled type="text">
        </div>
        <div class="field">
            <label>Phone</label>
            <input value="{{ $employee->phone }}" disabled type="text">
        </div>
        
        </div>  
    </div>
    <div class="column">
    <div class="ui big form segment">