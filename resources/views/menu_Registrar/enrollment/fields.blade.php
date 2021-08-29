<!-- ipa nice ang ui design, basic way lang to-->


<!-- programme ID Field -->
@php( $programme = \App\Models\Programme::all())
<div class="form-group row">
    {!! Form::label('programme_id', 'Programme:',array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">
        <select class="select2" style="width:100%" id="progCode" name="progCode" data-live-search="true" data-style="btn-info" >
                <option></option>
                @foreach($programme as $programme)
                    <option name="programme_id" data-tokens="{{ $programme->name }}" value="{{ $programme->progCode }}">{{ $programme->name }}</option>
                @endforeach
        </select>
    </div>
    
</div>


<!-- 
    prog desc Field
(0)degree/major, (1)minor, (2)certificate
-->
<div class="form-group row">
    {!! Form::label('description', 'Programme Description:',array('class' => 'col-sm-2 col-form-label')) !!}
    <div class="col-sm-10 form-control">
        <select class="select2" style="width:100%" id="description" name="description" data-style="btn-info" >
            <option></option>
            <option value="Major">Degree/Major</option>
            <option value="Minor">Minor</option>
            <option value="Certificate">Certificate</option>
        </select>
    </div>


</div>


@push('scripts')
<!-- For Select Input program/Course Id Field -->
<script>
    $(document).ready(function() {
        $('#progCode').select2({
            width: 'resolve',
            theme: "bootstrap",
            
            
        });
        $('#description').select2({
            width: 'resolve',
            theme: "bootstrap",
            
        });
        
    });

</script>
@endpush
