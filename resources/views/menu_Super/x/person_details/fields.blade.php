<!-- Fname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fname', 'Fname:') !!}
    {!! Form::text('fname', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Lname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lname', 'Lname:') !!}
    {!! Form::text('lname', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Mname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mname', 'Mname:') !!}
    {!! Form::text('mname', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Sname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sname', 'Sname:') !!}
    {!! Form::text('sname', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Birthdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthdate', 'Birthdate:') !!}
    {!! Form::text('birthdate', null, ['class' => 'form-control','id'=>'birthdate']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#birthdate').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush