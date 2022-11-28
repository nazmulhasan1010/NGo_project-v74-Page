
// $('#lanBtn').click(function () {
//     axios.post('language').then(function (response) {
//         if (response.status === 200 ) {
//             window.location.reload();
//         }
//     }).catch(function (error) {
//         console.log(error);
//     });
// });


// top button And  sticky nav

var navbar = document.getElementById("header");
var sticky = navbar.offsetTop;

var mbutton = document.getElementById("top-button");

window.onscroll = function () {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mbutton.style.display = "block";
    } else {
        mbutton.style.display = "none";
    }

    // sticky nav
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
};

$('#top-button').click(function () {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});


// FAQ Collapse

$('.faq-qna').click(function () {
    if ($(this).hasClass('active-faq')) {
        $(this).removeClass('active-faq').children('.faq-qu').children('.fa-solid').addClass('fa-plus').removeClass('fa-minus');
    } else {
        $(this).addClass('active-faq').children('.faq-qu').children('.fa-solid').addClass('fa-minus').removeClass('fa-plus');
        $('.faq-qna').not(this).removeClass('active-faq').children('.faq-qu').children('.fa-solid').addClass('fa-plus').removeClass('fa-minus');
    }
});

// galleries

$('.gallery-coll').click(function () {
    if ($(this).hasClass('active-gallery')) {
        if ($('#photoShow').hasClass('show')) {
            return;
        } else {
            $(this).removeClass('active-gallery');
        }

    } else {
        $(this).addClass('active-gallery');
        $('.gallery-coll').not(this).removeClass('active-gallery');
    }
});
let galleryLength = $('.gallery-coll').length;
for (var i = 0; i < galleryLength; i++) {
    let photosOnAlbum = $('.gallery-coll').eq(i).children('.phptos').children('.col-md-3').length;
    $('.gallery-coll').eq(i).children('.coll-heading').children('.left').children('.counter').children('.total-photos').html(photosOnAlbum);
}

// image gallery
$('.gallery-image').click(function () {
    let imgLink = $(this).children('img').attr('src');
    let description = $(this).children('input').val();
    $('#modalBody img').attr('src', imgLink);
    $('.modal-content .img-description').html(description);
    $('#photoShow').modal('show').addClass('show');
});

// active menus
let menus = document.querySelectorAll('.menus ul li');
menus.forEach(button => {
    button.addEventListener('click', function () {
        menus.forEach(btn => btn.classList.remove('active'));
        // menu active
        this.classList.add('active');

        // menu click
        if ($(this).children('.option-main').css('display') === 'block') {
            // if menu active
            $(this).children('.option-main').css('display', 'none');
            $(this).children('.option-main').children('.menu-option').css('display', 'none');
            $(this).children('.option-head').children('.fa-caret-right').css('transform', 'rotate(0deg)');
        } else {
            //  when menu not active
            $(this).children('.option-main').css('display', 'block');
            $(this).children('.option-main').children('.menu-option').css('display', 'block');
            $(this).children('.option-head').children('.fa-caret-right').css('transform', 'rotate(90deg)')
            $('.menus ul li').not(this).children('.option-main').children('.menu-option').css('display', 'none');
            $('.menus ul li').not(this).children('.option-main').css('display', 'none');
        }
    });

    // menu button hover
    button.addEventListener("mouseover", function () {
        // active hovered menu
        $(this).children('.option-main').children('.menu-option').css('display', 'block');
        $(this).children('.option-main').css('display', 'block');
        $(this).children('.option-head').children('.fa-caret-right').css('transform', 'rotate(90deg)')

        // deactivate others menu
        $('.menus ul li').not(this).children('.option-main').children('.menu-option').css('display', 'none');
        $('.menus ul li').not(this).children('.option-main').css('display', 'none');
        $(this).children('.option-head').children('.fa-caret-right').css('transform', 'rotate(0deg)')
    });
    button.addEventListener("mouseout", function () {
        // deactivate others menu
        $(this).children('.option-main').css('display', 'none');
        $(this).children('.option-main').children('.menu-option').css('display', 'none');
    })
});

// menu show & close

$(document).click(function (e) {
    if (e.target.id === 'menuShow') {
        $('.header .menu_bar .menus').css('display', 'block')
        $('#menuBar').children().addClass('menuExe')
    } else if (e.target.id === 'menuClose') {
        $('.header .menu_bar .menus').css('display', 'none')
    }
})

$('.mapShow').click(function () {
    let link = $(this).data('link');
    // alert(link)
    $('#modalBody').html(link);
    $('#modalBody iframe').css({
        'width': '100%',
    });
    $('#mapShow').modal('show');
});

// modal hide

$('.modal-close').click(function () {
    $('.modal').modal('hide');
});
