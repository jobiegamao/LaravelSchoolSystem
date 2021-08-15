<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion=0 data-api="tree">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      
      <li class="nav-item">
        <a href="/home" class="nav-link">
          <i class="nav-icon fas fa-house-user"></i>
          <p>
            Home
          </p>
        </a>
      </li>

     

      {{-- <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Student
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
          <ul class="nav nav-treeview">

            <li class="nav-item ">
                  <a href="{{ route('goTo_promotionList.index') }}" 
                    class="nav-link {{ Request::is('students/promotion-list') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Student List</p>
                  </a>
            </li>
              
          </ul>

      </li> --}}

      <li class="nav-item">
        <a href="{{ route('goTo_promotionList.index') }}"
           class="nav-link {{ Request::is('students/promotion-list') ? 'active' : '' }}">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Students List
          </p>
        </a>
      </li>

      <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Enrollment
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                    <a href="{{ route('goTo_enrollment.index') }}" 
                      class="nav-link {{ Request::is('students/enrolling-list') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Enrollment List</p>
                    </a>
              </li>
                
            </ul>

            <ul class="nav nav-treeview">

              <li class="nav-item ">
                    <a href="{{ route('goTo_courseProgramme') }}" 
                      class="nav-link {{ Request::is('student/courses') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Student Curriculum</p>
                    </a>
              </li>
                
            </ul>

            <ul class="nav nav-treeview">

              <li class="nav-item ">
                    <a href="{{ route('goTo_prereg') }}" 
                      class="nav-link {{ Request::is('student/prereg') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add/Drop</p>
                    </a>
              </li>
                
            </ul>
      </li>
      <li class="nav-item">
        <a href={{ route('classOfferings.show') }}
           class="nav-link {{ Request::is('classes*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Class Offerings
          </p>
        </a>
      </li>
      
      <li class="nav-item">
        <a href={{ route('teachers') }}
           class="nav-link {{ Request::is('teacher*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Teachers
          </p>
        </a>
      </li>

      

      <li class="nav-item">
        <a href="{{ route('acadPeriods.index') }}"
           class="nav-link {{ Request::is('acadPeriods*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Academic Time
          </p>
        </a>
      </li>
      

      <li class="nav-header">ACCOUNT</li>
                       
      <li class="nav-item" >
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Register</p>
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






