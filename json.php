<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos en formato JSON</title>
</head>
<style>
body {
  margin-left: 80px;
}

body * {
  font-family: monospace;
  font-size: 20px;
}

button {
  background-color: #4648b6;
  width: 40%;
  padding: 12px;
  font-size: 18px;
  font-weight: bold;
  margin: 20px 0;
  cursor: pointer;
  color: #fff;
  display: block;
  border: 1px solid transparent;
}

button:hover {
  background-color: white;
  color: #4648b6;
  border: 1px solid #4648b6;
}

</style>
<body>
  <h3>Datos en formato JSON</h3>
  <button type="button" id="btnMostrar">Mostrar datos</button>
  <div id="resultado"></div>

  <script type="text/javascript">
    const btnMostrar = document.getElementById('btnMostrar');
    const resultado = document.getElementById('resultado');

    btnMostrar.addEventListener('click', function() {
      const xhr = new XMLHttpRequest();

      xhr.open('POST', 'index.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        if (xhr.status === 200) {
          resultado.innerHTML = xhr.responseText;
        } else {
          console.error('Error al cargar datos:', xhr.statusText);
        }
      };

      xhr.send();
    });

  </script>

</body>
</html>
