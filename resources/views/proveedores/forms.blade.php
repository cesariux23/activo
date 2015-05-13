<div class="form-group">
	{!!Form::label('title','Razon Social') !!}
	{!!Form::text('DescProv', @$DescProv, array("class"=>"form-control","placeholder"=>"Descripcion Proveedor","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
</div>

@include('forms.botones',['txt_btn' => $txt_btn, 'path'=>'proveedores'])
 