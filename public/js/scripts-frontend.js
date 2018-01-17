(function ($) {
    // DOM ready, take it away
    $(".voted").click(function (e) {
        e.preventDefault();
        var user = $(this).data('user');

        $('.modal-title').text(user.firstName + ' ' + user.lastName);
        $('#joueurId').val(user.id);


        $("#modal").modal();
    });


    var defaultpopupaction = "check";
    $("#votantForm").submit(function (e) {
        e.preventDefault();
        var action = $(this).attr('action');
        e.preventDefault();
        //  alert(action);
        var email = $("#email").val()
        var lastName = $("#lastName").val()
        var firstName = $("#firstName").val();
        var joueurId = $("#joueurId").val();
        var formData = {
            'email': email,
            'lastName': lastName,
            'firstName': firstName,
            'joueurId': joueurId,
            'todo': defaultpopupaction,
        };
        var yetVoted = 0;
        $.ajax({
            url: action,
            method: 'POST',
            data: {
                formData: formData,
                _token: window.Laravel.csrfToken
            },
            dataType: 'json',

            success: function (response) {
                if (response.todo == "wanttoave") {
                    defaultpopupaction = "wanttoave";
                    $('#suiteofform').show();
                }
                if (response.todo == "saved") {

                    swal("Parfait!", "Votre vote a été pris en compte", "success");

                    setTimeout(function () {
                        location.reload();
                    }, 500);
                }

                if(response.todo == "delete"){

                    formData.todo="delete";
                    formData.votantId=response.votantId;

                    confirmDelete(action,formData);
                }
                if(response.todo == "update"){

                    //defaultpopupaction = "update";
                    formData.todo="update";
                    formData.votantId=response.votantId;
                    formData.lastjoueur=response.lastjoueur;

                    confirmUpdate(action,formData);
                }


                // swal("Done!", "It was succesfully deleted!", "success");
                //location.reload();
            },
            error: function (e) {
                swal("Erreur", "Le serveur ne repond pas");
            }
        });

    });


    function confirmDelete(href,data) {

        swal({
            title: "Êtes vous sure de vouloir supprimer votre ancien vote?",
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
                data: {
                    formData: data,
                    _token: window.Laravel.csrfToken
                },
                dataType: 'json',

                success: function (data) {
                  swal("Done!", "Suppression réussie!", "success");
                    setTimeout(function () {
                        location.reload();
                    }, 2000);

                  location.reload();
                },
                error: function (e) {
                    swal("Erreur du serveur!", "Réessayer plutard", "error");
                }
            });


        });
    }

    function confirmUpdate(href,data) {

        swal({
            title: "Êtes vous sure d'attribuer le vote à ce nouveau joueur?",
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
                data: {
                    formData: data,
                    _token: window.Laravel.csrfToken
                },
                dataType: 'json',

                success: function (data) {
                    swal("Done!", "Modification réussie!", "success");
                    setTimeout(function () {
                        location.reload();
                    }, 2000);

                    location.reload();
                },
                error: function (e) {
                    swal("Erreur du serveur!", "Réessayer plutard", "error");
                }
            });


        });
    }
    $(document).on("click","#menu_right_toggle,#menu_right_toggle_1",function(){
        $("#right_menu").addClass("open");
    });

    $(document).on("click","#close_right_menu",function(){
        $("#right_menu").removeClass("open");
    });
})(jQuery);