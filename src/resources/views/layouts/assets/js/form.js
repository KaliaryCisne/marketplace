$('.custom-file input').change(function (e) {
    var files = [];
    for (var i = 0; i < $(this)[0].files.length; i++) {
        files.push($(this)[0].files[i].name);
    }
    $(this).next('.custom-file-label').html(files.join(', '));
});

Inputmask("(99) 9 9999-9999").mask("#celular");
Inputmask("(99) 9 9999-9999").mask("#whatsapp");
