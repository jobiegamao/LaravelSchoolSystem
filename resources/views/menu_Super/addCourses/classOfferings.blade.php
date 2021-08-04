
    <div class="clearfix"> @include('flash::message')</div>
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Class Offerings</h1>
                </div>
                
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-body p-10">
            {{-- Search Class Code --}}
            
            
            {!! Form::open(['route' => 'courseProgramme.show']) !!}
                    <div class="input-group">
                        
                            {{-- need these 4 data to load courseProgramme w/ classofferings --}}
                        <input type="text" class="col-sm-3 form-control" name="subjCode"
                            placeholder="Search Course Code (Subject Code)" value="{{ old('subjCode') }}" required> 
                        <input type="hidden"  name="year" id="year" value = {{ $year }}>
                        <input type="hidden"  name="semester" id="semester" value = {{ $semester }}>
                        {!! Form::hidden('id', $person->id ) !!}

                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                    </div>

            
            {!! Form::close() !!}

            
        </div>

       
        <div class="card-body p-10">
            <?php $classes = Session::get('classes'); ?>
            @if(isset($classes))
                {{-- Show Class Offerings --}}
                @include('menu_Super/addCourses/class_offerings_table')
            @endif
        </div>

    </div>
   


