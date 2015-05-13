<div class="form-group">
	{!!Form::label('title','Nombre Completo') !!}
	{!!Form::text('DescEmp', @$DescEmp, array("class"=>"form-control","placeholder"=>"NOMBRE(S) PATERNO MATERNO","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
</div>

<div class="form-group">
	{!!Form::label('title','Oficina - Adscripcion') !!}
	{!!Form::select('IdOfna', $oficinas, @$IdOfna, array("class"=>"form-control" ))!!}
</div>

@include('forms.botones',['txt_btn' => $txt_btn, 'path'=>'empleados'])
 