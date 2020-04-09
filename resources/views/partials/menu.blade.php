@if (Auth::user())    
  <div class="ui teal six item inverted menu pointing" >
    <a class="item" href="{{ route('users.penalty') }}">
      <i class="mail outline icon " id="up" data-variation="inverted"></i>
      Penalties Applied
    </a>
    
    <a class="item" href="{{ route('home') }}">
    <i class="home icon"></i>
    Home
    </a>
  
    <div class="ui dropdown item">
    <i class="users icon"></i>
    Employees
    <i class="dropdown icon"></i>
    
    <div class="menu">  
      @if(Auth::user()->role == '1')
      
        <a class="item" href="{{ route('employees.create') }}"><i class="add icon"></i>Add Employee</a>
        <a class=" item" href="{{ route('register') }}">
          <i class="add icon"></i>
          Register User
        </a>
      @endif
      <a class="item" href="{{ url('employees') }}"><i class="list icon"></i>List Employees</a>
    </div>
  </div>
  
  <div class="ui dropdown item"> 
    <span class="text"> 
      <i class="settings icon"></i>Config
    </span>
    <i class="dropdown icon"></i>
    <div class="menu">
      <div class="item">
        <i class="right dropdown icon"></i>
        <span class="text"><i class="warning sign icon"></i>
          Penalties
        </span>
        <div class="right menu">
          @if(Auth::user()->role == '2')
            <a class="item" href="{{ route('penalties.create') }}"><i class="add icon"></i>Add Penalty</a>
          @endif
          <a class="item" href="{{ url('penalties') }}"><i class="list icon"></i>List Penalties</a>
        </div>
      </div>
      <div class="item">
        <i class="dropdown icon"></i>
        <span class="text"><i class="talk icon"></i>Behaviors</span>
        <div class="right menu">
          @if(Auth::user()->role == '2')
            <a class="item" href="{{ route('behaviors.create') }}"><i class="add icon"></i>Add Behavior</a>
          @endif
          <a class="item" href="{{ url('behaviors') }}"><i class="list icon"></i>List Behaviors</a>
        </div>
      </div>
    </div>
  </div>                    
  <a  class="item" href="{{route('users.show',Auth::user()->id)}}" >
    <i class="user circle outline icon "></i>
      {{ Auth::user()->name }}
  </a>
  <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="power icon"></i>
    Logout
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>
  </a>
</div>
  <script >
    $('#up')
    .popup()
  ;
</script>
@endif 