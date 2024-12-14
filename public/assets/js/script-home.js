$(document).ready(function () {
  const baseUrl = "http://localhost:8080/";
  // const baseUrl = "https://pintuperadaban.com/";

  //Form Validasi................
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }

          form.classList.add("was-validated");
        },
        false
      );
    });
  })();

  //Post foto ajax
  //..................................
  $(document).on("change", "#pictureartikel", function () {
    var name = document.getElementById("pictureartikel").files[0].name;
    var form_data = new FormData();
    var ext = name.split(".").pop().toLowerCase();

    var judulberita = document.getElementById("judulberita").value;
    var lokasi = $("#submit").val();

    if (judulberita == "") {
      alert("Isi judul terlebih dahulu");
      return false;
    }

    if (jQuery.inArray(ext, ["png", "jpg", "jpeg"]) == -1) {
      alert("Format gambar tidak sesusai");
      return false;
    }

    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("pictureartikel").files[0]);
    var f = document.getElementById("pictureartikel").files[0];
    var fsize = f.size || f.fileSize;

    if (fsize > 510000) {
      alert("Ukuran maksimal file 500 KB");
    } else {
      form_data.append(
        "file",
        document.getElementById("pictureartikel").files[0]
      );

      $.ajax({
        url:
          baseUrl +
          "postfotoajaxl/" +
          judulberita +
          "/" +
          lokasi.toLowerCase().split(" ").join(""),
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
          $("#uploaded").html(
            "<label class='text-success'>Sedang Mengupload Gambar...</label>"
          );
        },
        success: function (data) {
          $("#uploaded").html(data);
          // console.log(data);
        },
      });
    }
  });
});
