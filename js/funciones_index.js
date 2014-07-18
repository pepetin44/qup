	function Ocultar(id)
	{
		$("#"+id).slideUp();
		stop();
	};

	function Mostrar(id)
	{
		
		$("#"+id).slideDown();
		stop();
	};
	
	
	
	
	
$().ready(function() {	
	// Configuramos la validación de los distintos campos del formulario
	$("#registerNow").validate({
		// Empezamos por las reglas
		rules: {
			nombre: "required", // Para el campo firstname(nombre) pedimos que sea requerido.
			apellido: "required",  // Lo mismo para el campo lastname.
			username: { // Cuando hay mas de una regla abriremos llaves, aqui validamos username
				required: true, // Tienes que ser requerido
				minlength: 2    // Tiene que tener un tamaño mayor o igual a dos caracteres
			},
			contrasena: {  // reglas para el campo password
				required: true, // Tienes que ser requerido
				minlength: 5    // Tiene que tener un tamaño mayor o igual a cinco caracteres
			},
			confirmar: { // reglas para el campo confirm_password
				required: true, // Tienes que ser requerido 
				minlength: 5,   // Tiene que tener un tamaño mayor o igual a cinco caracteres
				equalTo: "#contrasena"  // Tiene que ser igual que el campo password y para ello indicamos su id
			},
			correo: {  // un nuevo caso es identificar que es un email valido osea que tiene formato de email
				required: true, 
				email: true  // para ello el metodo email: true comprobara esta validación
			},
		
			terminoCondiciones: "required"  // Este input es de typo checkbox si quiero que sea obligatorio marcarlo le doy el valor required
		},
		messages: { // La segunda parte es configurar los mensajes, por lo que tengo que ir indicando para cada campo y cada regla el mensaje que quiero mostrar si no se cumple.
			nombre: "Por favor, introduzca su Nombre",
			apellido: "Por favor, introduzca sus Apellidos",
			username: {
				required: "Por favor, introduzca su Nombre de Usuario",
				minlength: "El Nombre de usuario debe de tener al menos 2 caracteres"
			},
			contrasena: {
				required: "Por favor, introduzca su password",
				minlength: "Su password debe de tener al menos 5 caracteres"
			},
			confirmar: {
				required: "Por favor, introduzca de nuevo su password",
				minlength: "Su password debe de tener al menos 5 caracteres",
				equalTo: "Las password introducidas no son iguales"
			},
			correo: "Por favor, introduzca un email valido",
			
			terminoCondiciones: "Por favor acepte nuestra politica"
		}
	});
});