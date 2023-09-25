
new DataTable('#table-list');

$('.docs').change(function () {
    var fileExtension = ['jpg', 'png', 'gif', 'jpeg'];
    var selectedFile = $(this).val();
    var selectedExtension = selectedFile.split('.').pop().toLowerCase();

    if ($.inArray(selectedExtension, fileExtension) === -1) {
        Swal.fire({
            title: "Warning",
            text: "Suitable formats are " + fileExtension.join(', '),
            icon: "warning",
            confirmButtonText: 'Ok',
            dangerMode: true,
        });

        $(this).val('');
    }
});

$('.docs').bind('change', function () {
    var maxSizeKB = 1024;
    var maxSize = maxSizeKB * 1024;

    if (this.files[0].size > maxSize) {
        $(this).val("");
        Swal.fire({
            title: `Allowed file size is 1MB`,
            icon: "warning",
            confirmButtonText: 'Ok',
            dangerMode: true,
        })
        return false;
    }
});
