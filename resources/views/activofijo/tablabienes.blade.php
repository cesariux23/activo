@if(isset($costoTotal))
  <p><b>Número de bienes:</b> {{sizeof($activofijo)}}</p>
  <p><b>Costo total de los bienes:</b> {{$costoTotal}}</p>
@endif

<table class="table table-bordered">
  <thead class="well">
    <tr>
      <th width="220px" rowspan="2">Número Inventario / Id Proveedor</th>
      <th colspan="3">Descripción del Artículo</th>
      <th colspan="2">Fecha Alta/Factura</th>
      <th rowspan="2">
        Costo
      </th>
      @if (!isset($imprime))
        <th class="hidden-print" rowspan="2" width="150px">
          Acciones
        </th>
      @endif
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
      <th>Factura</th>
    </tr>
  </thead>

  @foreach($activofijo as $af)
  <tr>
    <td rowspan="2" class="borde">
      <p><b>{{$af->numeroInventario}}</b></p>
      <p>{{$af->IdProv}} -- {{$af->DescProv}}</p>
      <p class="text-muted">{{$af->Denomin}}</p>
    </td>

    <td colspan="3">{{$af->DescArt}}</td>
    <td colspan="2">
      <p><b>{{$af->FecAlta}}</b></p>
      <p>{{$af->FecFact}}</p>
    </td>
    <td rowspan="2">
    {{$af->Costo}}
    </td>
    @if (!isset($imprime))
      <td rowspan="2" class="hidden-print">
        @include('activofijo.acciones',['tipo'=>strtolower($af->tipob)])
      </td>
    @endif
  </tr>

  <tr>
    <td class="borde">
      <b>{{$af->IdEmp}} -- {{$af->DescEmp}}</b>
      @if(!isset($oficina))
      <br>
      <span class="text-muted">{{$af->Ubicac}} -- {{$af->DescOfna}}</span>
      @endif

    </td>
    <td class="borde"> 
      <span class="text-success">{{$af->Edo}}</span></td>
    <td class="borde">
      {{$af->IdTipAdq}} -- {{$af->DescAdq}}
    </td>
    <td class="borde">
      {{$af->IdRub}}
    </td>
    <td class="borde">
      {{$af->NumFact}}
    </td>
  </tr>
  @endforeach
</table>
