<div class="form-group">
	<label>Descripción Adquisicion</label>
	{!!Form::text('DescAdq', @$DescAdq, array("class"=>"form-control","placeholder"=>"Descripción Adquisicion"))!!}
</div>

@include('forms.botones',['txt_btn' => $txt_btn, 'path'=>'tipoadquisiciones'])