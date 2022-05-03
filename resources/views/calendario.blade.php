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
	<div class="col-md-12 calendario">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section"></h2>
			</div>
		</div>
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
	<div class="resultados-calendario">
		<div class="resultados-hoy">

		</div>
		<div class="resultados-otros">

		</div>
	</div>
	<div class="insertar-actividad">
		<div class="enviar-actividad">
			<a href="{{ url('/añadirActividad') }}"><button type="submit" name="añadir-actividad" class="btn btn-primary btn-añadir-actividad"><i class="bi bi-plus-circle mr-2"></i>Añadir Actividad</button></a>
		</div>
		</form>
	</div>
	<div class="navbar-calendario">
		<div class="text-center botones">
			<div class="primero">
				<a href="{{ url('/subir') }}"><i class="bi bi-cloud-arrow-up subir"></i></a>
			</div>
			<div class="segundo">
				<a href="{{ url('/archivos') }}"><i class="bi bi-cloud-arrow-down-fill actual"></i></a>
			</div>
			<div class="tercero">
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
		hacerConsulta();
		let seleccionado = document.querySelector(".selected");
		setInterval(function() {
			let ahoraSeleccionado = document.querySelector(".selected");
			if (seleccionado != ahoraSeleccionado) {
				hacerConsulta();
				seleccionado = document.querySelector(".selected");
			}
		}, 500);

		function hacerConsulta() {
			let url = '{{ url("/calendario") }}'
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
				console.log(res);
				let hoy;
				let seleccionado;
				let resultadosHoy = document.querySelector(".resultados-hoy");
				let resultadosOtros = document.querySelector(".resultados-otros");
				if (document.querySelector("#today") != null) {
					hoy = document.querySelector("#today").innerText;
				}
				if (document.querySelector('.selected') != null) {
					seleccionado = document.querySelector('.selected').innerText
				}
				let mes = document.querySelector(".head-month").innerText.split('-')[0].trim();
				let año = document.querySelector(".head-month").innerText.split('-')[1].trim();
				console.log(devolverNumeroMes(mes));
				console.log(mes);
				if (parseInt(hoy) < 10) {
					hoy = "0" + hoy;
				}
				if (parseInt(seleccionado) < 10) {
					seleccionado = "0" + seleccionado;
				}
				for (let i = 0; i < res.length; i++) {
					if (res[i].fecha == año + "-" + devolverNumeroMes(mes) + "-" + hoy) {
						let boton = document.createElement("button");
						let texto = document.createTextNode(res[i].actividad);
						boton.appendChild(texto);
						boton.classList.add("btn", "actividades-hoy");
						boton.setAttribute("type", "button");
						boton.setAttribute("data-toggle", "collapse");
						boton.setAttribute("data-target", "#collapse" + res[i].id);
						boton.setAttribute("aria-expanded", "false");
						boton.setAttribute("aria-controlls", "collapseexample");
						let div = document.createElement("div");
						div.classList.add("collapse");
						div.setAttribute("id", "collapse" + res[i].id);
						let otroDiv = document.createElement("div");
						otroDiv.classList.add("card");
						otroDiv.classList.add("card-body");
						let textoDiv = document.createTextNode(res[i].descripcion);
						otroDiv.appendChild(textoDiv);
						div.appendChild(otroDiv);
						resultadosHoy.appendChild(boton);
						resultadosHoy.appendChild(div);
					}
				}
			});
		}

		function devolverNumeroMes(mes) {
			let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
			let devolver = 0;
			for (let i = 0; i < meses.length; i++) {
				if (meses[i].toUpperCase() == mes) {
					devolver = i + 1;
				}
			}
			if (devolver < 10) {
				devolver = "0" + devolver;
			}
			return devolver;
		}
	});
</script>

</html>