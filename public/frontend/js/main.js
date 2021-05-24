$(document).ready(function () {
    let closHTML = '<button class="btn btn__clos"></button>'
let menuClass = $('.menu')
let addonMenu = $('.addon-menu')
function openMenu() {
    let menuList = $('.menu__list')
    for (let index = 6; index <= menuList.length; index++) {
        menuList.eq(index).addClass('menu__list--right')
    }

    $('.btn__menu').on('click', function () {
        addonMenu.toggleClass('active')
        $('body').toggleClass('open__body')
        menuClass.prepend(closHTML)
        closMenu()
    })
}
function closMenu() {
    function removeMenu() {
        addonMenu.removeClass('active')
        $('.btn').removeClass('btn__clos')
        $('body').removeClass('open__body')
    }
    $('.addon-menu__container').on('click', function (e) {
        if (!menuClass.is(e.target) && menuClass.has(e.target).length === 0) {
            removeMenu()
        }
    })
    $('.btn__clos').on('click', function () {
        removeMenu()
    })
}
function dowMenu() {
    $('.btn__toggle').on('click', function () {
        let _ = $(this).parent('li').children('ul')
        let _sub = $(this).parents('.menu__list').children('ul ')
        let _togleSub = $(this).parents('.menu__list').children('.btn__toggle')
        $('.menu .menu__list ul').not(_).not(_sub).slideUp()

        $('.btn__toggle').not(this).not(_togleSub).removeClass('active')
        _.slideToggle()
        $(this).toggleClass('active')
    })
}
function menu() {
    var has = $('.menu li:has("ul")')
    var hasSub = $('.menu li ul li:has("ul")')
    if (has) {
        has.addClass('menu__list--sub')
        has.append('<button class="btn btn__toggle"></button>')
    }
    if (hasSub) {
        hasSub.addClass('menu__list--sub')
        hasSub.append('<button class="btn btn__toggle"></button>')
    }
    $('.menu .menu__list ul li:has("ul")').addClass('menu__list--sub')
    dowMenu()
    openMenu()
}
menu()

$(window).on('scroll', function () {
    var height = $('#header').height()

    if ($(this).scrollTop() > height) {
        $('.header__scroll').addClass('scroll')
        $('.btn__backtop-home').addClass('active')
    } else {
        $('.header__scroll').removeClass('scroll')
        $('.btn__backtop-home').removeClass('active')
    }
})
$('.btn__backtop-home').on('click', function () {
    $('.btn__backtop-home').removeClass('active')
    $('html, body').animate(
        {
            scrollTop: 0,
        },
        1000
    )
})
;
    $(".banner__slide").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  dots: true,
  autoplay: true,
});
;
    function search() {
    let formSearch = $('.form__search')
    $('.btn__toggle--search').on('click', function () {
        $('body').toggleClass('active-modal')
        formSearch.toggleClass('active')
    })
    $('.search').on('click', function (event) {
        event.stopPropagation()
    })
    $(document).on('click', function () {
        formSearch.removeClass('active')
        $('body').removeClass('active-modal')
    })
}
search()
;
    function slidePartner() {
    $('.partner__slide').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 4,
        autoplay: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 1199.98,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3,
                    infinite: true,
                },
            },
            {
                breakpoint: 991.98,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 767.98,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 575.98,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 479.98,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    })
}
slidePartner()
;
    function line() {
    let offsetTop = $('.control-list__item.active')[0].offsetTop + 'px'
    let offsetHeight = $('.control-list__item.active')[0].offsetHeight + 'px'
    $('.line').css({
        top: offsetTop,
        height: offsetHeight,
    })
}
function tabLocalhost(tabsList) {
    if (tabsList) {
        const tabs = $(".control-list__item[tab-show='" + tabsList + "']")
        tabs.addClass('active')
        tabs.siblings().removeClass('active')
        $(tabs.attr('tab-show')).slideDown(300)
        $(tabs.attr('tab-show')).siblings().slideUp(300)
        tabs.parent('.control-list').removeClass('active')
        line()
    }
}
function addonTab() {
    const tabsList = $(location).attr('hash')

    $(window).on('hashchange', function () {
        tabLocalhost($(location).attr('hash'))
        line()
    })
    tabLocalhost(tabsList)
    $('.control-list__item').click(function () {
        $(this).addClass('active')
        $(this).siblings().removeClass('active')
        $($(this).attr('tab-show')).slideDown(300)
        $($(this).attr('tab-show')).siblings().slideUp(300)
        $(this).parent('.control-list').removeClass('active')
        line()
    })
}
addonTab()
;

    function coupleSlide() {
        $('.couple__slide').slick({
            autoplay: false,
            arrows:true,
            dost:false,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    }
    coupleSlide();


     function newSlide(){

          $('.new__slide').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows:true,
            responsive: [

                {
                  breakpoint: 991.98,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                    breakpoint: 575.98,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  },

              ]
          });
     }
     newSlide();
     function home__cells(){

        $('.home__cells').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          dots: false,
          arrows:true,
          autoplay: true,
          responsive: [

              {
                breakpoint: 991.98,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1
                }
              },
              {
                  breakpoint: 575.98,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },

            ]
        });
   }
   home__cells();
})
