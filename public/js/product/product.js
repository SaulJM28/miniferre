$(document).ready(function () {
  $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("menuDisplayed");
  });

  $("#table").DataTable({
    ajax: {
      url: path + "lista-productos",
      dataSrc: "",
    },
    columns: [
      { data: "name", width: "10%" },
      { data: "description", width: "20%" },
      { data: "category", width: "25%" },
      { data: "brand", width: "15%" },
      { data: "code", width: "15%" },
      { data: "options", width: "10%" },
    ],
  });
});

var form = document.getElementById("form");
if (form !== null) {
  form.addEventListener("submit", function (event) {
    event.preventDefault();
    const data = new FormData(document.getElementById("form"));
    var formulario = document.getElementById("form");
    var action = formulario.getAttribute("action");
    fetch(path + action, {
      method: "POST",
      body: data,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error al enviar el formulario");
        }
        return response.json();
      })
      .then((data) => {
        if (data.status == "errorValidation") {
          let errors = "";
          for (const [key, value] of Object.entries(data.message)) {
            document.getElementById(`${key}`).classList.add("is-invalid");
            errors += `${value}<br>`;
          }
          Swal.fire({
            title: "Alerta",
            html: errors,
            icon: "warning",
          });
        }
        if (data.status == "success") {
          Swal.fire({
            title: "Alerta",
            html: data.message,
            icon: "success",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si",
            cancelButtonText: `No`,
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href =
                path +
                (data.action == "create" ? "form-producto" : "productos");
            } else {
              window.location.href = path + "productos";
            }
          });
        }
      })
      .catch((error) => {
        // Manejar errores
        console.error("Error:", error);
      });
  });
}

$("body").on("click", "#btnDelete", function () {
  // Obtener el elemento padre tr del botón y luego obtener el valor del atributo 'product'
  let product = event.target.closest("tr").getAttribute("product");
  let data = {
    product: product,
  };
  // Puedes realizar cualquier otra acción que desees al hacer clic en el botón
  Swal.fire({
    title: "¿Estas seguro que desea elimiar el registro?",
    showDenyButton: false,
    showCancelButton: true,
    confirmButtonText: "Si",
    denyButtonText: `No`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      fetch(path + "eliminar-producto", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Error al enviar el formulario");
          }
          return response.json();
        })
        .then((data) => {
          if (data.status == "success") {
            Swal.fire({
              title: "Alerta",
              html: data.message,
              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Aceptar",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = path + 'productos';   
              }
            });
          }
        })
        .catch((error) => {
          // Manejar errores
          console.error("Error:", error);
        });
    } else if (result.isDenied) {
      Swal.fire("Changes are not saved", "", "info");
    }
  });
  // Puedes realizar cualquier otra acción que desees al hacer clic en el botón
});
