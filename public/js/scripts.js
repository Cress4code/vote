

$(document).ready(function () {
    function confirmDelete(href) {

        swal({
            title: "Êtes vous sure de vouloir supprimer?",
            text: "Cette action n'est pas réversible",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Oui",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url: href,
                method: 'POST',
                data:  {
                    _method : "DELETE",
                    _token: window.Laravel.csrfToken
                },
                dataType: 'json',

                success: function (data) {
                    swal("Done!", "It was succesfully deleted!", "success");
                    location.reload();
                },
                error: function (e) {
                    swal("Error deleting!", "Please try again", "error");
                }
            });


        });
    }

    $('.delete').click(function (e) {


        var href = $(this).attr('href');
        e.preventDefault();


        if(confirmDelete(href)){
            $(this).parent().parent().remove();
        }


    });

    $('.dropify').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });



    $('.datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('.datepicker').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
});

