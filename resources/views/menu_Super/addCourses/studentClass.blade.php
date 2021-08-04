
    <div class="clearfix"> @include('flash::message')</div>
    
    
    <div class="card">
        <div class="card-body p-10">
            {{-- Show Registration --}}
            
            <?php $prereg = Session::get('prereg'); ?>
            @if(isset($prereg))
                {{-- Show Class Offerings --}}
                @include('menu_Super/addCourses/studentClass_table')
            @endif
                    
            
        </div>

       
    
    </div>
   


