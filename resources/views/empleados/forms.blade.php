<div class="form-group">
	{!!Form::label('title','Nombre Completo') !!}
	{!!Form::text('DescEmp', @$DescEmp, array("class"=>"form-control","placeholder"=>"NOMBRE(S) PATERNO MATERNO","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
</div>

<div class="form-group">
	<label class="control-label" for="oficina">Oficina - Adscripcion</label>
		<select name="oficina" id="oficina" class="form-control">
			<option value="">--Seleccione--</option>
				@foreach ($oficinas as $ofcna)
					<option value="{{ $ofcna->IdOfna }}">{{ $ofcna->DescOfna }}</option>
				@endforeach
	</select>
</div>

@include('forms.botones',['txt_btn' => $txt_btn, 'path'=>'empleados'])
 