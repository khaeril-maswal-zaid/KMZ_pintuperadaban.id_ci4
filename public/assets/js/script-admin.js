$(document).ready(function () {
  // const baseUrl = 'https://pintuperadaban.com/';
  const baseUrl = "http://localhost:8080/";

  //Datatable script
  //.........................................................................
  var table = $("#example").DataTable({
    lengthChange: false,
    paging: false,
    buttons: ["excel", "csv", "print", "copy"],
    scrollX: true,
    scrollCollapse: true,
    scrollY: 460,
  });

  table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");

  //Hapus class btn-group agar tidak masuk dalam btn yang tergerup
  $("div.col-md-6 .dt-buttons").removeClass("btn-group");
  //Hapus class btn-secondary agar button bisa diberi warna
  $("div.dt-buttons button").removeClass("btn-secondary");

  //Beri warna pada Button
  $("div.dt-buttons button.buttons-excel").addClass("btn-outline-success mb-2");
  $("div.dt-buttons button.buttons-csv").addClass("btn-outline-dark mb-2");
  $("div.dt-buttons button.buttons-print").addClass(
    "btn-outline-danger mb-2 ml-5"
  );
  $("div.dt-buttons button.buttons-copy").addClass("btn-dark mb-2");

  //Ganti isi tulisan pada button
  $("div.dt-buttons button.buttons-csv").html(
    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text-fill" viewBox="0 0 16 16"><path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/></svg>Unduh Csv'
  );
  $("div.dt-buttons button.buttons-excel").html(
    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16"><path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68L8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"></path></svg> Unduh Excel'
  );
  $("div.dt-buttons button.buttons-print").html(
    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16"><path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/><path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/></svg> Print'
  );
  $("div.dt-buttons button.buttons-copy").html(
    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16"><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/><path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/></svg> Copy'
  );

  //Atur margin-top pagination
  $("ul.pagination").addClass("mt-3");
  //------------------------------------------------------------------

  //Edit Endors.......................................................
  $(document).on("click", ".edit-endors", function () {
    const id = $(this).data("id");

    $.ajax({
      url: baseUrl + "adminpp/queriajaxeditendors",
      method: "post",
      data: {
        id: id,
      },
      dataType: "json",
      success: function (data) {
        $("#input-brand").val(data.brand);
        $("#input-idbrand").val(data.idbrand);
        $("#input-wa").val(data.wa);
        $("#input-chat").val(data.chat);

        $("#hidden-id").val(data.id);
      },
    });
  });
});
