<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion=0 data-api="tree">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      
      <li class="nav-item">
        <a href="/home" class="nav-link">
          <i class="nav-icon fas fa-house-user"></i>
          <p>Home</p>
        </a>
      </li>
      
    @if (Auth::user()->role == 'Registrar' || Auth::user()->role == 'Super Admin')
      <li class="nav-item">
        <a href="javascript:void(0)" 
          class="nav-link {{ Request::is('teacher*') ? 'active' : '' }}" onclick="$('#teachListForm').submit()">
          <i class="fas fa-chalkboard-teacher nav-icon"></i>
          <p>Teachers</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('goTo_promotionList.index') }}" 
          class="nav-link {{ Request::is('students/promotion-list') ? 'active' : '' }}" >
          <i class="fas fa-user nav-icon"></i>
          <p>Students</p>
        </a>
      </li>

      <li class="nav-item">
            <a href="{{ route('goTo_enrollment.index') }}" 
              class="nav-link {{ Request::is('students/enrolling-list') ? 'active' : '' }}" >
              <i class="fas fa-clipboard nav-icon"></i>
              <p>Enrollment List</p>
            </a>
      </li>   
      
      <li class="nav-item">
        <a href={{ url('/classes') }}
          class="nav-link {{ Request::is('classes*') ? 'active' : '' }}">
          <i class="fas fa-clipboard-list nav-icon"></i>
          <p>Class Offerings</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('acadPeriods.index') }}"
          class="nav-link {{ Request::is('acadPeriods*') ? 'active' : '' }}">
          <i class="fas fa-calendar-alt nav-icon"></i>
          <p>Academic Time</p>
        </a>
      </li>
    @endif

    @if (Auth::user()->role == 'Student')
      {{-- FOR STUDENT MENU --}}
      <li class="nav-header"><b>STUDENT</b></li>

        @if(Auth::user()->Person->Student->isEnrolled == 1 || Auth::user()->Person->Student->isNew != 1 )
        <li class="nav-item">
          <a href="javascript:void(0)" class="nav-link {{ Request::is('student/*/grades') ? 'active' : '' }}" onclick="$('#gradesForm').submit()">
            <i class="nav-icon fas fa-address-card"></i>
            <p>My Grades</p>
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a href="javascript:void(0)" class="nav-link {{ Request::is('student/courses/curriculum') ? 'active' : '' }}" onclick="$('#curricForm').submit()">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>My Curriculum</p>
          </a>
        </li>

        @if(Auth::user()->Person->Student->isEnrolled == 0 && Auth::user()->Person->Student->isPass == 1 )
        <li class="nav-item">
          <a href="javascript:void(0)" class="nav-link {{ Request::is('student/prereg') ? 'active' : '' }}" onclick="$('#preregForm').submit()">
            <i class="nav-icon fas fa-book-reader"></i>
            <p>My Prereg</p>
          </a>
        </li>
        @endif

        @if(!(Auth::user()->Person->Student->StudentUpdate->isEmpty()) )
        <li class="nav-item">
          <a href="{{ route('balance', Auth::user()->person_id)}}"
            class="nav-link {{ Request::is('student/*/balance') ? 'active' : '' }}">
            <i class="fas fa-calendar-alt nav-icon"></i>
            <p>My Balance</p>
          </a>
        </li>
        @endif
      {{-- /FOR STUDENT MENU --}}
  
    @endif

    @if (Auth::user()->role == 'Teacher')
      <li class="nav-item">
        <a href="{{ route('teacher.classes', Auth::user()->Person->Teacher->id)}}"
          class="nav-link {{ Request::is('/teacher/*/current-classes') ? 'active' : '' }}" >
          <i class="fas fa-clipboard-list nav-icon"></i>
          <p>Active Classes</p>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="{{ route('teacher.allclasses', Auth::user()->Person->Teacher->id)}}"
          class="nav-link {{ Request::is('/teacher/*/all-classes') ? 'active' : '' }}" >
          <i class="fas fa-clipboard-list nav-icon"></i>
          <p>Classes History</p>
        </a>
      </li>
    @endif

    @if (Auth::user()->role == 'Finance')
      <li class="nav-item">
        <a href="{{ route('registrar.index') }}"
          class="nav-link {{ Request::is('finance/index') ? 'active' : '' }}">
          <i class="fas fa-users nav-icon"></i>
          <p>SOAs</p>
        </a>
      </li>

    @endif

    
      <li class="nav-header"><b>ACCOUNT</b></li>
                       
      <li class="nav-item" >
        <a href="{{ url('/profile') }}" class="nav-link {{ Request::is('profile') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>Profile</p>
        </a>
      </li>

      <li class="nav-item" >
        <a href="{{ route('logout') }}" class="nav-link"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
      

    </ul>
    
  </nav>

  @if (Auth::user()->role == 'Student')
    {!! Form::open(['id' => 'gradesForm','method' => 'GET', 'route' => ['grades.show', 'id' => Auth::user()->Person->Student->id] ]) !!}
    {!! Form::close() !!}

    {!! Form::open(['id' => 'curricForm','method' => 'GET', 'route' => 'courseProgramme.show' ]) !!}
    {!! Form::hidden('id', Auth::user()->person_id ) !!}
    {!! Form::close() !!}

    {!! Form::open(['id' => 'preregForm','method' => 'GET', 'route' => 'goTo_prereg' ]) !!}
    {!! Form::hidden('id', Auth::user()->person_id ) !!}
    {!! Form::hidden('acadYear', \App\Models\AcadPeriod::latest()->value('acadYear') ) !!}
    {!! Form::hidden('acadSem', \App\Models\AcadPeriod::latest()->value('acadSem') ) !!}
    {!! Form::close() !!}
    
  @endif

  


  @if (Auth::user()->role == 'Registrar' || Auth::user()->role == 'Super Admin')
    {!! Form::open(['id' => 'teachListForm','method' => 'GET', 'route' => 'teacher.list' ]) !!}
    {!! Form::close() !!}


  @endIf