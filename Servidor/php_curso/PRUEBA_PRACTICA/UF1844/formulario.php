<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario atractivo</title>
 
  <style>
    body {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

.contenedor {
  width: 80%;
  max-width: 600px;
  margin: 40px auto;
  padding: 30px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: #333;
  margin-bottom: 30px;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
}

textarea {
  resize: vertical;
}

button {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0056b3;
}

/* Colores responsivos (ejemplos) */

@media (max-width: 768px) {
  input[type="text"],
  input[type="email"],
  textarea {
    margin-bottom: 15px;
  }
}

@media (max-width: 480px) {
  .contenedor {
    width: 95%;
  }
}

  </style>
</head>
<body>
  <div class="contenedor">
    <h1>Formulario de contacto</h1>

    <form method="post" action="enviarFormulario.php">

      <label for="nombre">Nombre de usuario:</label>
      <input type="text" id="nombre" name="username" placeholder="Introduce tu nombre" required>

      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" placeholder="Introduce tu correo" required>


      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" placeholder="Introduce tu Contraseña" required></input>

      <button type="submit">Enviar formulario</button>

    </form>
  </div>
</body>
</html>
