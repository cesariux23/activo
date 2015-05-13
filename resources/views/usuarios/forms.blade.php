<div class="form-group">
	{!!Form::label('title','Nombre Usuario') !!}
	{!!Form::text('NombreUsr', @$NombreUsr, array("class"=>"form-control","placeholder"=>"Nombre Usuario","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
</div>
<div class="form-group">
	{!!Form::label('title','Contraseña') !!}
	{!!Form::text('llave', @$llave, array("class"=>"form-control","placeholder"=>"Contraseña"))!!}
</div>


@include('forms.botones',['txt_btn' => $txt_btn, 'path'=>'usuarios'])


