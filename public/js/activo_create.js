$("#idprov").on("focusout", function () {
	// selecciona de la lista de proveedores de acuerdo al id ingresado
	$("#prov").val($("#idprov").val());
});
$("#idadq").on("focusout", function () {
	// selecciona de la lista de adquisiciones de acuerdo al id ingresado
	$("#adq").val($("#idadq").val());
});

$("#idrub").on("focusout", function () {
	// selecciona de la lista de adquisiciones de acuerdo al id ingresado
	$("#rubdesc").val($("#idrub").val());
});