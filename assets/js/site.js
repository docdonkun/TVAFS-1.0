function message(url, message) {
    $.ajax({
        type: "post",
        url: url,
        data: "message=" + message,
        success: function (t) {
            $(".alertType").stop(true);
            $(".alertType").show("0");
            $(".alertType").html(t);
            $(".alertType").delay("2000").hide("0");
        }});
}

function couleurAlerteClass(element, css) {
    $(element).stop(true);
    $(element).addClass(css);
    setTimeout(function () {
        $(element).removeClass(css);
    }, 5000);
}

function couleurAlerteCss(element, css, cssOrigine) {
    $(element).stop(true);
    $(element).css(css);
    setTimeout(function () {
        $(element).css(cssOrigine);
    }, 5000);
}
$(document).ready(function () {
    var mess_required = "<span class='mess_required'>Ce champ est obligatoire.</span>";
    var mdp_required = "<span class='mess_required'>Les mots de passe sont différents.</span>";
    var mail_required = "<span class='mess_required'>Les mails sont différents.</span>";
    var mdp_identique_required = "<span class='mess_required'>Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.</span>";

    var iniPopUp = 0;
    $('body').click(function (e) {
        if (e.target.id === "popUpConnexion") {
            if (iniPopUp === 0) {
                $('.connexion_popin').show();
                iniPopUp = 1;
            } else {
                $('.connexion_popin').hide();
                iniPopUp = 0;
            }
        } else {
            if ($(e.target).closest('.connexion_popin').length === 0) {
                if (iniPopUp === 1) {
                    $('.connexion_popin').hide();
                    iniPopUp = 0;
                }
            }
        }

    });

    //popup login connexion
    $('#popup_input_connexion').click(function () {
        $('.connexion_form.login span.mess_required').remove();
        $('.content-inscription p.failed').removeClass("failed");
        var submit = true;
        $('.connexion_form.login input.required').each(function () {
            if ($(this).val() == '') {
                $($(this).parent().parent()).append(mess_required);
                $($(this).parent()).toggleClass('failed');
                submit = false;
            }
        });
        return submit;
    });

    //popup login inscription
    $('#popup_login_inscription').click(function () {
        $('.connexion_form.bottom span.mess_required').remove();
        $('.content-inscription p.failed').removeClass("failed");
        var submit = true;
        $('.connexion_form.bottom input.required').each(function () {
            if ($(this).val() == '') {
                $($(this).parent().parent()).append(mess_required);
                $($(this).parent()).toggleClass('failed');
                submit = false;
            }
        });
        return submit;
    });

    //page inscription
    $('#bouton_page_inscription').click(function () {
        $('.content-inscription span.mess_required').remove();
        $('.content-inscription p.failed').removeClass("failed");
        var submit = true;
        $('.content-inscription input.required').each(function () {
            if ($(this).val() == '') {
                $($(this).parent().parent()).append(mess_required);
                $($(this).parent()).toggleClass('failed');
                submit = false;
            }
        });

        if (submit) {
            if ($(".content-inscription input.mail").val() != $(".content-inscription input.cmail").val()) {
                $(".content-inscription .une_row.cmail").append(mail_required);
                $(".content-inscription .une_row.mail p").toggleClass('failed');
                submit = false;
            }
        }

        if (submit) {
            if ($(".content-inscription input.mdp").val() != $(".content-inscription input.cmdp").val()) {
                $(".content-inscription .une_row.cmdp").append(mdp_required);
                $(".content-inscription .une_row.mdp p").toggleClass('failed');
                submit = false;
            }

            var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
            if (!regex.test($(".content-inscription input.mdp").val())) {
                $(".content-inscription .une_row.cmdp").append(mdp_identique_required);
                $(".content-inscription .une_row.mdp p").toggleClass('failed');
                submit = false;
            }
        }
        return submit;
    });

    //page connexion
    $('#input_page_connexion').click(function () {
        $('.content-connexion span.mess_required').remove();
        $('.content-connexion p.failed').removeClass("failed");
        var submit = true;
        $('.content-connexion input.required').each(function () {
            if ($(this).val() == '') {
                $($(this).parent().parent()).append(mess_required);
                $($(this).parent()).toggleClass('failed');
                submit = false;
            }
        });
        return submit;
    });

    //page contact
    $('#bouton_envoi_contact').click(function () {
        $('.content-contact span.mess_required').remove();
        $('.content-contact span.mess_required').remove();
        $('.content-contact p.failed').removeClass("failed");
        $('.content-contact textarea.failed').removeClass("failed");
        var submit = true;
        $('.content-contact input.required').each(function () {
            if ($(this).val() == '') {
                $($(this).parent().parent()).append(mess_required);
                $($(this).parent()).toggleClass('failed');
                submit = false;
            }
        });

        if ($('.content-contact textarea.required').val() == '') {
            $($('.content-contact textarea.required').parent()).append(mess_required);
            $($('.content-contact textarea.required')).toggleClass('failed');
            submit = false;
        }

        return submit;
    });
});
