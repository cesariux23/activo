<div class="form-group">
	<label>Nombre</label>
	{!!Form::text('DescOfna', @$DescOfna, array("class"=>"form-control","placeholder"=>"Nombre de la Oficina","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
</div>

<div class="form-group">
	<label>Dirección</label>
	{!!Form::text('DirOfna', @$DirOfna, array("class"=>"form-control", "placeholder"=>"Dirección de la Oficina","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
</div>

@include('forms.botones',['txt_btn' => $txt_btn, 'path'=>'activofijos'])
 