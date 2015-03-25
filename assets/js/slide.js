function initialiseResponsiveSilide(id) {
    jQuery(function () {
        jQuery(id).responsiveSlides({
            auto: true,
            pager: false,
            timeout: 6000,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                jQuery('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                jQuery('.events').append("<li>after event fired.</li>");
            }
        });
    });
}
function resizeSlide() {
    if ($(".callbacks_container ul li img").height() >= (window.innerHeight - $(".header").height())) {
        $('.slider_principal').css('height', window.innerHeight);
        $('#slider_top').css('height', window.innerHeight);
        $('#slider_top li').css('height', window.innerHeight);
    } else {
        $('.slider_principal').css('height', '');
        $('#slider_top').css('height', '');
        $('#slider_top li').css('height', '');
    }
}

function  clickContenuOnglet(element) {
    $('.contenu_onglet .contenu_fiche_onglet').hide();
    $('.onglet_fiche .onglet_fiche_inner .onglet').removeClass('active');
    $('.contenu_onglet .contenu_fiche_onglet').removeClass('active');
    $('.contenu_onglet .onglet_mobile').removeClass('active');

    $(element).parent().toggleClass('active');
    $('.contenu_onglet #' + $(element).parent().attr('id')).toggleClass('active');
    $('.contenu_onglet #' + $(element).parent().attr('id') + "mobile").toggleClass('active');
    if ($(element).parent().attr('id') == 'onglet2') {
        $('.contenu_onglet #' + $(element).parent().attr('id')).show();
        centrage();
    } else {
        $('.contenu_onglet #' + $(element).parent().attr('id')).slideDown("slow");
    }
}

function  clickContenuOngletMobile(element) {
    if ($('.contenu_onglet #' + $(element).parent().attr('id')).hasClass('active')) {
        $('.contenu_onglet .contenu_fiche_onglet').slideUp("slow");
        $('.contenu_onglet .onglet_mobile').removeClass('active');
        $('.contenu_onglet .contenu_fiche_onglet').removeClass('active');
        return true;
    }
    $('.contenu_onglet .contenu_fiche_onglet').hide();
    $('.contenu_onglet .onglet_mobile').removeClass('active');
    $('.contenu_onglet .contenu_fiche_onglet').removeClass('active');

    $('.contenu_onglet #' + $(element).parent().attr('id')).toggleClass('active');
    if ($(element).parent().attr('id') == 'onglet2mobile') {
        $('.contenu_onglet .' + $(element).parent().attr('id')).show();
        centrage();
    } else {
        $('.contenu_onglet .' + $(element).parent().attr('id')).slideDown("slow");
    }

}


$(window).load(function () {
    initialiseResponsiveSilide('#slider_top');
    $('html,body').animate({scrollTop: 0}, 'slow');

    resizeSlide();
    $(window).resize(function () {
        resizeSlide();
    });

    $('.onglet_fiche_inner a').click(function (event) {
        event.preventDefault();
    });

    $('.onglet_mobile a').click(function (event) {
        event.preventDefault();
    });

    $(".onglet_fiche_inner a").click(function () {
        clickContenuOnglet(this);
    });

    $(".contenu_onglet .onglet_mobile a").click(function () {
        clickContenuOngletMobile(this);
    });
});