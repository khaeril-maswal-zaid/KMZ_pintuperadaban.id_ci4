ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    })
    .then((editor) => {
        theEdiot = editor;
    });



    $(document).on('keyup', '.ck-content', function(){
        let e = $('#artikelpost').val($('.ck-content').html());
        console.log(e);
    });

//Atur penulis artikel
$(document).on("change", "#olehselect", function () {
    if ($('#olehselect').val() === "") {
        $("#penuliscustom").removeAttr("disabled");
        $("#penuliscustom").attr("placeholder", "Isikan identitas penulis");
    } else {
        $("#penuliscustom").attr("disabled", "disabled");
        $("#penuliscustom").attr("placeholder", "Jika memilih penulis custom");
    }
})