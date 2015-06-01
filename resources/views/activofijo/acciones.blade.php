	<a class="btn btn-sm btn-info btn-sm" href="{{ url('/'.$tipo.'/activofijo/'.$o->Movto.'/edit') }}"> Editar</a>
	<a class="btn btn-sm btn-default btn-sm" href="{{ url('/'.$tipo.'/activofijo/'.$o->Movto) }}"> Movimentos</a>
	<a href="{{ route('vales.show',$o->Movto) }}" class="btn btn-primary" target="blanck_"><i class="fa fa-file"></i> Vale de resguardo</a>

