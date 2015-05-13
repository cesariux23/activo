@if(URL::previous()==URL::current())
{!! link_to('/'.$path, 'Cancelar', ['class' => 'btn btn-default']) !!}
@else
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
@endif
{!!Form::submit($txt_btn,array('class'=>'btn btn-success'))!!}

{!!Form::close()!!}