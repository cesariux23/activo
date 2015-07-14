@extends('app')
@section('content')
<h1>Bienes del empleado -- {{$empleado->DescEmp}}</h1>

@include('activofijo.tablabienes',['activofijo'=>$empleado->bienes]);


@stop