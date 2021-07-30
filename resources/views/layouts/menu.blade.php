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
            Admission
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
            <ul class="nav nav-treeview">

                <li class="nav-item ">
                    <a href="{{ route('admission.index') }}" class="nav-link {{ Request::is('admission') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending Requests</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('admission.acceptedList') }}" class="nav-link {{ Request::is('acceptedList') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Accepted Admissions</p>
                    </a>
                </li>

                <li class="nav-item ">
                  <a href="{{ route('register.index') }}" class="nav-link {{ Request::is('register') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ongoing Registrations</p>
                  </a>
              </li>
                

                <li class="nav-item">
                    <a href="{{ route('students.index') }}" class="nav-link {{ Request::is('students') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registered Students</p>
                    </a>
                </li>
 
            </ul>
      </li> --}}

      <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Enrollment
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">

              <li class="nav-item ">
                    <a href="{{ route('goTo_enrollment.index') }}" 
                      class="nav-link {{ Request::is('students/enrolling-list') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>New Enrollment</p>
                    </a>
              </li>
                
            </ul>

            <ul class="nav nav-treeview">

              <li class="nav-item ">
                    <a href="{{ route('goTo_courseProgramme') }}" 
                      class="nav-link {{ Request::is('student/courses') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Student Courses</p>
                    </a>
              </li>
                
            </ul>
      </li>

      


      

      <li class="nav-header">ACCOUNT</li>
                       
      <li class="nav-item" >
        <a href="/register_admin" class="nav-link">
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


{{--
<li class="nav-item">
    <a href="{{ route('courses.index') }}"
       class="nav-link {{ Request::is('courses*') ? 'active' : '' }}">
        <p>Courses</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('studentCourses.index') }}"
       class="nav-link {{ Request::is('studentCourses*') ? 'active' : '' }}">
        <p>Student  Courses</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('personDetails.index') }}"
       class="nav-link {{ Request::is('personDetails*') ? 'active' : '' }}">
        <p>Person Details</p>
    </a>
</li>
 --}}

