

document.getElementById("form").addEventListener("submit", function (event) {
  event.preventDefault();
    const data =  new FormData(document.getElementById("form"));
    fetch(path + "iniciar-sesion", {
      method: "POST",
      body: data,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error al enviar el formulario");
        }
        return response.text();
      })
      .then((data) => {
        // Manejar la respuesta del servidor
        console.log(data);
      })
      .catch((error) => {
        // Manejar errores
        console.error("Error:", error);
      });
  });
  