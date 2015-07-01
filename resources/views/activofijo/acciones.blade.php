	<a class="btn btn-warning" href="{{ url('/'.$tipo.'/activofijo/'.$af->Movto.'/edit') }}" title="Editar información del bien"><i class="fa fa-edit"></i> </a>
	<a class="btn btn-info" href="{{ url('/'.$tipo.'/activofijo/'.$af->Movto) }}" title="Detalles del bien"> <i class="fa fa-file"></i></a>
	<a href="{{ route('vales.show',$af->Movto) }}" class="btn btn-primary" target="blanck_" title="Imprimir vale de resguardo"><i class="fa fa-newspaper-o"></i></a>
	
