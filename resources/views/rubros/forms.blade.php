<div class="form-group">
	<label>Descripción Rubro</label>
	{!!Form::text('DescRub', @$DescRub, array("class"=>"form-control","placeholder"=>"Nombre del Rubro", "style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}

</div>

@include('forms.botones',['txt_btn' => $txt_btn, 'path'=>'rubros'])