function validateNIF() {
	// Obtener el valor del input
	const nif = document.getElementById("nif").value;

	// Construir la URL con el parámetro nif
	const apiUrl = `http://daw206.isauces.local/206DWESAplicacionFinal/api/validateNIF.php?nif=${nif}`;

	// Realizar la solicitud fetch
	fetch(apiUrl, {
	  method: "GET",
	  headers: {
		"Content-Type": "application/json",
	  },
	})
	  .then((response) => response.json())
	  .then((data) => {
		// Manejar la respuesta
		document.getElementById(
		  "resultado"
		).innerHTML = `<p>${data.resultado}</p>`;
	  })
	  .catch((error) => {
		// Manejar errores
		console.error("Error:", error);
		document.getElementById("resultado").innerHTML =
		  "<p>Error al procesar la solicitud</p>";
	  });
  }