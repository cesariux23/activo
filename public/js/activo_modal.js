// EMPLEADOS
$("#idemp").on("keyup", function () {
	// selecciona de la lista de proveedores de acuerdo al id ingresado
	$("#descemp").val($("#idemp").val());
});

$("#idemp").on("focusout", function () {
	opcion=$('#descemp option:selected');
	if(opcion.length==0){
		alert('Ingrese un ID valido');
		$("#descemp").val('');
		$("#idemp").val('');
		$("#idemp").focus();
	}
	else{
		$("#descemp").change();
	}
});

$("#descemp").on("change", function () {
	// asigna el valor de la lista al campo texto
	valor=$("#descemp").val();
	$("#idemp").val(valor);

	//busca el valor de la oficina y asigna el valor al campo
	claveoficna=oficinas[valor];
	$('#ubicacion').val(claveoficna);
	$('#idubicacion').val(claveoficna);
	txtoficina=$('#ubicacion option:selected').text();
	$('#departamento').text(txtoficina);

});


function llenaDetalle () {
	// Toma los valores seleccionados
	detalle.IdEmp=$("#idemp").val();
	detalle.Ubicac=$('#ubicacion').val();
	detalle.oficina=$('#departamento').text();
}

