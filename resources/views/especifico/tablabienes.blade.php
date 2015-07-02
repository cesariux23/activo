<table class="table table-bordered">
  <thead class="well">
    <tr>
      <th width="220px" rowspan="2">Número Inventario</th>
      <th colspan="5">Descripción del Artículo</th>
      <th width="180px" class="hidden-print" rowspan="2">Acciones</th>
    </tr>
    <tr>

      <th>Responsable
        @if(!isset($oficina))
        / Ubicación
        @endif
      </th>
      <th>Estado</th>
      <th>Adq.</th>
      <th>Rubro</th>
      <th>Costo</th>
    </tr>
  </thead>

  @foreach($activofijo as $af)
  <tr>
    <td rowspan="2" class="borde">
      <b>{{$af->numeroInventario}}</b>
      <br>
      <span class="text-muted">{{$af->Denomin}}</span>
    </td>
    <td colspan="5">{{$af->DescArt}}</td>
    <td rowspan="2" class="hidden-print borde">@include('activofijo.acciones',['tipo'=>strtolower($af->tipob)])</td>

  </tr>
  <tr>
    <td class="borde">
      <b>{{$af->DescEmp}}</b>
      @if(!isset($oficina))
      <br>
      <span class="text-muted">{{$af->DescOfna}}</span>
      @endif

    </td>
    <td class="borde"> <span class="text-success">{{$af->Edo}}</span></td>
    <td class="borde">
      {{$af->IdTipAdq}}
    </td>
    <td class="borde">
      {{$af->IdRub}}
    </td>
    <td class="borde">
      {{$af->Costo}}
    </td>
  </tr>
  @endforeach
</table>