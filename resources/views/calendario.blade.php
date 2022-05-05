<!doctype html>
<html lang="es">

<head>
	<title>Calendario</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="{{ URL::asset('style-calendario.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('style.css') }}">
	<link rel="icon" href="{{ URL::asset('images/logo_tasiva.png') }}">
</head>

<body>
	<div class="logo-calendario text-center">
		<a href="{{ url('/') }}"><img src="{{ URL::asset('images/logo_tasiva.png') }}" class="logo-tasiva-archivos" alt="logotipo de la empresa Tasiva Vision"></a>
	</div>
	<div class="col-md-12 calendario">
		<div class="elegant-calencar d-md-flex">
			<div class="wrap-header d-flex align-items-center img" style="background-image: url(images/foto_camara.jpg);">
				<p id="reset">Hoy</p>
				<div id="header" class="p-0">
					<div class="head-info">
						<div class="head-month"></div>
						<div class="head-day"></div>
					</div>
				</div>
			</div>
			<div class="calendar-wrap">
				<div class="w-100 button-wrap">
					<div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
					<div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
				</div>
				<table id="calendar">
					<thead>
						<tr>
							<th>Lun</th>
							<th>Mar</th>
							<th>Mie</th>
							<th>Jue</th>
							<th>Vie</th>
							<th>Sab</th>
							<th>Dom</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-12 resultados-calendario">
		<div class="resultados-hoy">

		</div>
		<div class="resultados-otros">

		</div>
	</div>
	<div class="eliminado-correctamente">
		<div class="alert alert-success eliminado" role="alert"></div>
	</div>
	<div class="insertar-actividad">
		<div class="enviar-actividad">
			<a href="{{ url('/añadirActividad') }}"><button type="submit" name="añadir-actividad" class="btn btn-primary btn-pagina-añadir-actividad"><i class="bi bi-plus-circle mr-2"></i>Añadir Actividad</button></a>
		</div>
		</form>
	</div>
	<div class="navbar-calendario">
		<div class="text-center botones">
			<div class="primero">
				<a href="{{ url('/subir') }}"><i class="bi bi-cloud-arrow-up subir"></i></a>
			</div>
			<div class="segundo">
				<a href="{{ url('/archivos/all') }}"><i class="bi bi-cloud-arrow-down-fill archivos"></i></a>
			</div>
			<div class="tercero">
				<a href="{{ url('/calendario') }}"><i class="bi bi-calendar-check actual"></i></a>
			</div>
			<div class="cuarto">
				<a href="{{ route('cerrarSesion.cerrarSesion') }}"><i class="bi bi-x cerrar-sesion"></i></a>
			</div>
		</div>
	</div>
	<script src="{{ URL::asset('jquery.min.js') }}"></script>
	<script src="{{ URL::asset('main.js') }}"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>
	window.addEventListener('load', function() {
		//Para que cuando cargue la pagina haga una consulta Ajax y muestre las actividades del dia y del dia seleccionado.
		hacerConsulta();
		//Para capturar el dia seleccionado del calendario.
		let seleccionado = document.querySelector(".selected");
		//Comprueba si hay algun dia seleccionado y si es asi llama hacerConsulta cada 500 milisegundos.
		setInterval(function() {
			let ahoraSeleccionado = document.querySelector(".selected");
			if (seleccionado != ahoraSeleccionado) {
				hacerConsulta();
				seleccionado = document.querySelector(".selected");
			}
			//Para que si no hay ninguna actividad se oculte el div de los resultados.
			if (document.querySelector(".resultados-hoy").innerText == "" && document.querySelector(".resultados-otros").innerText == "") {
				document.querySelector(".resultados-calendario").style.display = "none";
			} else {
				document.querySelector(".resultados-calendario").style.display = "block";
			}

		}, 500);
		//Para que cuando se de en el boton de siguiente mes llame a hacerConsulta.
		document.querySelector(".next-button").addEventListener('click', function() {
			hacerConsulta();
		});
		//Para que cuando se de en el boton de mes anterior llame a hacerConsulta.
		document.querySelector(".pre-button").addEventListener('click', function() {
			hacerConsulta();
		});
		//Para que cuando se de en el boon de "Hoy" llame a hacerConsulta.
		document.querySelector("#reset").addEventListener('click', function() {
			hacerConsulta();
		});

		//Hace una peticion post que luego se capturara en CalendarioController.
		function hacerConsulta() {
			let url = '{{ url("/calendario") }}';
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				url: url,
				data: {
					mes: document.querySelector(".head-month").innerText.split('-')[0].trim(),
					año: document.querySelector(".head-month").innerText.split("-")[1].trim()
				}
			}).done(function(res) {
				//Para que cuando el CalendarioController devuelva la consulta.
				let hoy;
				let seleccionado;
				//Se captura el div donde se añadiran todas las actividades del dia.
				let resultadosHoy = document.querySelector(".resultados-hoy");
				//Se captura el div donde se añadiran todos las otras actividades del dia.
				let resultadosOtros = document.querySelector(".resultados-otros");
				/* Se comprueba si el dia de hoy es el mes en que esta el calendario y si es
				asi se captura el dia. */
				if (document.querySelector("#today") != null) {
					hoy = document.querySelector("#today").innerText;
				}
				/* Se comprueba si el dia seleccionado esta es el mes en que esta el calendario
				y si es asi se captura el dia.*/
				if (document.querySelector('.selected') != null) {
					seleccionado = document.querySelector('.selected').innerText
				}
				//Se captura el mes y el año y se guarda cada una en su variable.
				let mes = document.querySelector(".head-month").innerText.split('-')[0].trim();
				let año = document.querySelector(".head-month").innerText.split('-')[1].trim();
				//Se capturan todos los dias del mes.
				let dias = document.querySelectorAll(".dia");
				let ultimoDiaMes = 0;
				//Se obtiene cual es el ultimo dia del mes.
				for (let i = 0; i < dias.length; i++) {
					if (!dias[i].getAttribute("id")) {
						ultimoDiaMes = dias[i].innerText;
					}
				}

				//Para que si el dia de hoy y el seleccionado son menores a 10 que se ponga un 0 delante.
				if (parseInt(hoy) < 10) {
					hoy = "0" + hoy;
				}
				if (parseInt(seleccionado) < 10) {
					seleccionado = "0" + seleccionado;
				}
				//Para resetar el resultado de hoy y de otros y que no se acumulen las actividades.
				resultadosHoy.innerHTML = "";
				resultadosOtros.innerHTML = "";
				//Se recorren todas las actividades del usuario.
				for (let i = 0; i < res.length; i++) {
					//Si la actividad es del dia de hoy.
					if (res[i].fecha == año + "-" + devolverNumeroMes(mes) + "-" + hoy) {
						//Se crea el boton.
						let boton = document.createElement("button");
						let texto = document.createTextNode(res[i].actividad);
						boton.appendChild(texto);
						boton.classList.add("btn", "actividades-hoy");
						boton.setAttribute("type", "button");
						boton.setAttribute("data-toggle", "modal");
						boton.setAttribute("data-target", "#modal" + res[i].id);
						//Se crea el modal.
						let modal = document.createElement("div");
						modal.classList.add("modal");
						modal.setAttribute("tabindex", "-1");
						modal.setAttribute("id", "modal" + res[i].id);
						let modalDialog = document.createElement("div");
						modalDialog.classList.add("modal-dialog");
						let modalContent = document.createElement("div");
						modalContent.classList.add("modal-content");
						let modalHeader = document.createElement("div");
						modalHeader.classList.add("modal-header");
						let tituloModal = document.createElement("h5");
						tituloModal.classList.add("modal-title");
						let textoTituloModal = document.createTextNode(res[i].actividad);
						tituloModal.appendChild(textoTituloModal);
						let modalBody = document.createElement("div");
						modalBody.classList.add("modal-body");
						let parrafoBody = document.createElement("p");
						let textoBody = document.createTextNode(res[i].descripcion);
						let fechaBody = document.createElement("p");
						fechaBody.classList.add("font-weight-bold");
						let textoFechaBody = document.createTextNode("Fecha: " + res[i].fecha);
						fechaBody.appendChild(textoFechaBody);
						parrafoBody.appendChild(textoBody);
						parrafoBody.appendChild(fechaBody);
						modalBody.appendChild(parrafoBody);
						let botonEliminar = document.createElement("button");
						let textoBotonEliminar = document.createTextNode("Eliminar");
						botonEliminar.setAttribute("type", "button");
						botonEliminar.setAttribute("name", res[i].id);
						botonEliminar.classList.add("btn", "btn-danger", "btn-eliminar-actividad");
						botonEliminar.appendChild(textoBotonEliminar);
						let modalFooter = document.createElement("div");
						modalFooter.classList.add("modal-footer");
						let botonCerrar = document.createElement("button");
						botonCerrar.setAttribute("type", "button");
						botonCerrar.classList.add("btn", "btn-secondary");
						botonCerrar.setAttribute("data-dismiss", "modal");
						let textoBoton = document.createTextNode("Cerrar");
						//Se añaden unos elementos dentro de otros.
						botonCerrar.appendChild(textoBoton);
						modalFooter.appendChild(botonEliminar);
						modalFooter.appendChild(botonCerrar);
						modalHeader.appendChild(tituloModal);
						modalContent.appendChild(modalHeader);
						modalContent.appendChild(modalBody);
						modalContent.appendChild(modalFooter);
						modalDialog.appendChild(modalContent);
						modal.appendChild(modalDialog);
						//Se añade el modal y el boton al DOM.
						resultadosHoy.appendChild(modal);
						resultadosHoy.appendChild(boton);
						/* Se añade al evento de click al boton de eliminar para
						que si se clicka llame a eliminarActividad y borre la actividad. */
						botonEliminar.addEventListener('click', function() {
							$('#modal' + res[i].id).modal('hide');
							eliminarActividad(res[i].id);
						});
					}
					//Si la actividad es del dia seleccionado.
					else if (res[i].fecha == año + "-" + devolverNumeroMes(mes) + "-" + seleccionado) {
						//Se crea el boton.
						let boton = document.createElement("button");
						let texto = document.createTextNode(res[i].actividad);
						boton.appendChild(texto);
						boton.classList.add("btn", "actividades-otros");
						boton.setAttribute("type", "button");
						boton.setAttribute("data-toggle", "modal");
						boton.setAttribute("data-target", "#modal" + res[i].id);
						//Se crea el modal.
						let modal = document.createElement("div");
						modal.classList.add("modal");
						modal.setAttribute("tabindex", "-1");
						modal.setAttribute("id", "modal" + res[i].id);
						let modalDialog = document.createElement("div");
						modalDialog.classList.add("modal-dialog");
						let modalContent = document.createElement("div");
						modalContent.classList.add("modal-content");
						let modalHeader = document.createElement("div");
						modalHeader.classList.add("modal-header");
						let tituloModal = document.createElement("h5");
						tituloModal.classList.add("modal-title");
						let textoTituloModal = document.createTextNode(res[i].actividad);
						tituloModal.appendChild(textoTituloModal);
						let modalBody = document.createElement("div");
						modalBody.classList.add("modal-body");
						let parrafoBody = document.createElement("p");
						let textoBody = document.createTextNode(res[i].descripcion);
						let fechaBody = document.createElement("p");
						fechaBody.classList.add("font-weight-bold");
						let textoFechaBody = document.createTextNode("Fecha: " + res[i].fecha);
						fechaBody.appendChild(textoFechaBody);
						parrafoBody.appendChild(textoBody);
						parrafoBody.appendChild(fechaBody);
						modalBody.appendChild(parrafoBody);
						let botonEliminar = document.createElement("button");
						botonEliminar.setAttribute("type", "button");
						botonEliminar.setAttribute("name", res[i].id);
						botonEliminar.classList.add("btn", "btn-danger", "btn-eliminar-actividad");
						let textoBotonEliminar = document.createTextNode("Eliminar");
						botonEliminar.appendChild(textoBotonEliminar);
						let modalFooter = document.createElement("div");
						modalFooter.classList.add("modal-footer");
						let botonCerrar = document.createElement("button");
						botonCerrar.setAttribute("type", "button");
						botonCerrar.classList.add("btn", "btn-secondary");
						botonCerrar.setAttribute("data-dismiss", "modal");
						let textoBoton = document.createTextNode("Cerrar");
						//Se añaden unos elementos dentro de otros.
						botonCerrar.appendChild(textoBoton);
						modalFooter.appendChild(botonEliminar);
						modalFooter.appendChild(botonCerrar);
						modalHeader.appendChild(tituloModal);
						modalContent.appendChild(modalHeader);

						modalContent.appendChild(modalBody);
						modalContent.appendChild(modalFooter);
						modalDialog.appendChild(modalContent);
						modal.appendChild(modalDialog);
						//Se añade el modal y el boton al DOM.
						resultadosOtros.appendChild(modal);
						resultadosOtros.appendChild(boton);
						/* Se añade al evento de click al boton de eliminar para
						que si se clicka llame a eliminarActividad y borre la actividad. */
						botonEliminar.addEventListener('click', function() {
							$('#modal' + res[i].id).modal('hide');
							eliminarActividad(res[i].id);
						});
					}
					//Se recorren todos los dias del mes.
					for (let j = 1; j <= ultimoDiaMes; j++) {
						//Para que si el dia es menor a 10, se coloque un 0 delante.
						let x = j;
						if (x < 10) {
							x = "0" + x;
						}
						//Si la fecha es la misma que la del calendario.
						if (res[i].fecha == año + "-" + devolverNumeroMes(mes) + "-" + x) {
							//Se capturen todos los dias.
							let todosLosDias = document.querySelectorAll(".dia");
							//Se recorren todos los dias.
							for (let z = 0; z < todosLosDias.length; z++) {
								//Si el dia seleccionado no es un dia vacio.
								if (!todosLosDias[z].getAttribute("id")) {
									//Se comprueba si el dia del calendario es el mismo que el mes.
									if (parseInt(todosLosDias[z].innerText) == j) {
										/* Se le añade la clase azul al elemento, lo que hace es cambiar
										el color de fondo. */
										todosLosDias[z].classList.add("azul");
									}
								}
							}
						}
					}
				}
			});
		}


		/**
		 * 
		 * Para que pasandole el nombre del mes devuelva el numero de dicho mes.
		 * @param mes el nombre del mes.
		 * 
		 */

		function devolverNumeroMes(mes) {
			let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
			let devolver = 0;
			for (let i = 0; i < meses.length; i++) {
				if (meses[i].toUpperCase() == mes.toUpperCase()) {
					devolver = i + 1;
				}
			}
			if (devolver < 10) {
				devolver = "0" + devolver;
			}
			return devolver;
		}


		/**
		 * 
		 * Funcion para eliminar una actividad pasando la id de la actividad.
		 * Despues de eliminar la actividad aparece un mensaje de que se ha eliminado correctamente
		 * y despues de 5 segundos desaparece el mensaje.
		 * @param id la id de la actividad.
		 * 
		 */

		function eliminarActividad(id) {
			let url = '{{ url("/calendario") }}';
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				url: url,
				data: {
					consulta: 'eliminar',
					id: id
				}
			}).done(function(res) {
				if (document.querySelector(".eliminado") != null && document.querySelector(".resultados-calendario") != null) {
					document.querySelector(".eliminado").style.display = "block";
					document.querySelector(".resultados-calendario").style.display = "none";
					document.querySelector(".eliminado").innerText = res;
					setTimeout(function() {
						document.querySelector(".eliminado").innerText = "";
						document.querySelector(".eliminado").style.display = "none";
						document.querySelector(".resultados-calendario").style.display = "block";
						hacerConsulta();
					}, 5000);
				}

			});
		}
	});
</script>

</html>