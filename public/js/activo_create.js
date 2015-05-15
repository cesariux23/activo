// PROVEEDORES
$("#prov").on("keyup", function () {
	// selecciona de la lista de proveedores de acuerdo al id ingresado
	$("#idprov").val($("#prov").val());
});

$("#prov").on("focusout", function () {
	opcion=$('#idprov option:selected');
	if(opcion.length==0){
		alert('Ingrese un ID valido');
		$("#idprov").val('');
		$("#prov").val('');
		$("#prov").focus();
	}
});

$("#idprov").on("change", function () {
	// asigna el valor de la lista al campo texto
	$("#prov").val($("#idprov").val());
});

// ADQUISICIONES
$("#idadq").on("keyup", function () {
	// selecciona de la lista de adquisiciones de acuerdo al id ingresado
	$("#adq").val($("#idadq").val());
});

$("#idadq").on("focusout", function () {
	opcion=$('#adq option:selected');
	if(opcion.length==0){
		alert('Ingrese un ID valido');
		$("#adq").val('');
		$("#idadq").val('');
		$("#idadq").focus();
	}
});

$("#adq").on("change", function () {
	// asigna el valor de la lista al campo texto
	$("#idadq").val($("#adq").val());
});
//RUBROS
$("#idrub").on("keyup", function () {
	// selecciona de la lista de adquisiciones de acuerdo al id ingresado
	$("#rubdesc").val($("#idrub").val());
});

$("#idrub").on("focusout", function () {
	opcion=$('#rubdesc option:selected');
	if(opcion.length==0){
		alert('Ingrese un ID valido');
		$("#rubdesc").val('');
		$("#idrub").val('');
		$("#idrub").focus();
	}
});

$("#rubdesc").on("change", function () {
	// asigna el valor de la lista al campo texto
	$("#idrub").val($("#rubdesc").val());
});

$("#FecAlta").datepicker({
				changeMonth:true,
				changeYear:true,
				showOn: "button",
				buttonImage: "/activo/public/css/images/ico.png",
				buttonImageOnly: true,
				showButtonPanel: true,
			});