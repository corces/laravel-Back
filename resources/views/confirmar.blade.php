contenido correo
<h2>Confirmacion de Usuario</h2>
Nombre: {{ $usuario['nombre'] }}<br>
Rut: {{ $usuario['rut'] }}<br>
Telefono: {{ $usuario['telefono'] }}<br>
<a href="http://localhost:8000/api/confirmar/{{ $usuario['id']}}/">Confirmar usuario</a>
