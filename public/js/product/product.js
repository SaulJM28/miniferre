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
