<div class="form-group">
	<label>Descripción Adquisicion</label>
	{!!Form::text('DescAdq', @$DescAdq, array("class"=>"form-control", "placeholder"=>"Dirección de la Oficina","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
</div>

@include('forms.botones',['txt_btn' => $txt_btn, 'path'=>'tipoadquisiciones'])

