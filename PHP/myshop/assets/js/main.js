//добавление в корзину через ajax
$(document).ready(function () {
    $(".add-to-basket").on('click', function (e) {
        var id = $(this).attr("data-id");
        $.post("/basket/addAjax/" + id, {}, function (data) {
            $("#basket-count").html(data);
        });
        return false;
    });

});



document.addEventListener("DOMContentLoaded", ready);

function ready() {

//    Анимация иконки, сэндвич превращается в крестик в хедере
    function barIcon(th) {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
        th.classList.toggle("change");
    }

    if (document.getElementsByClassName("icon")[0]) {
        document.getElementsByClassName("icon")[0].addEventListener("click", function () {
            barIcon(this);
        });
    }

//    Выделение активной ссылки (добавление класса active)
    var ancs = document.getElementsByTagName("a");
    if (location.href == "http://myshop/") {
        $(".topnav > a:first-child").addClass("active");
    } 
    if(location.href.includes("category")) {
        $(".topnav .dropdown a").addClass("active");
    }
    if(location.href.includes("product")) {
        $(".topnav .dropdown a").addClass("active");
    }
    for (i = 0; i < ancs.length; i++) {
        if (ancs[i].getAttributeNode("href")) {
            if (!location.href.includes("admin") && location.href.includes(ancs[i].getAttributeNode("href").value) && ancs[i].getAttributeNode("href").value != "/") {
                ancs[i].className = "active";
            }
        }
    }

//    Слайдеры: hero - с акциями, hit - рекомендуемые
    if (document.getElementById("hero-slider")) {
//номер активного слайда
        var heroSlideIndex = 1;
        var hitSlideIndex = 1;
//функции показа слайдов
        heroShowSlides("hero-slider", heroSlideIndex);
        hitShowSlides("hit-slider", hitSlideIndex);
//интервал для хиро слайдера
        var heroInterval = setInterval(function () {
            heroShowSlides("hero-slider", heroSlideIndex += 1);
        }, 3000);
//функция для кнопок след и пред
        function hitPlusSlides(id, n) {
            hitShowSlides(id, hitSlideIndex += n);
        }
//функция для точек хиро слайдера
        function currentSlide(id, n) {
            heroShowSlides(id, heroSlideIndex = n);
        }
//функция для хиро слайдера
        function heroShowSlides(id, n) {
            var i;
            var slides = document.getElementById(id).getElementsByClassName("mySlides");
            var dots = document.getElementById(id).getElementsByClassName("dot");
            if (n > slides.length) {
                heroSlideIndex = 1;
            }
            if (n < 1) {
                heroSlideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" dotactive", "");
            }
            slides[heroSlideIndex - 1].style.display = "block";
            dots[heroSlideIndex - 1].className += " dotactive";
        }

        document.getElementById("dot1").addEventListener("click", function() {
            currentSlide("hero-slider", 1);
        });
        document.getElementById("dot2").addEventListener("click", function() {
            currentSlide("hero-slider", 2);
        });
        document.getElementById("dot3").addEventListener("click", function() {
            currentSlide("hero-slider", 3);
        });
        document.getElementById("dot4").addEventListener("click", function() {
            currentSlide("hero-slider", 4);
        });
//слайдер рекомендуемых товаров
        function hitShowSlides(id, n) {
            var i;
            var slides = document.getElementById(id).getElementsByClassName("mySlides");
            if (n > slides.length) {
                hitSlideIndex = 1;
            }
            if (n < 1) {
                hitSlideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[hitSlideIndex - 1].style.display = "block";
        }

        document.getElementById("hit-slider").getElementsByClassName("prev")[0].addEventListener("click", function () {
            hitPlusSlides("hit-slider", -1);
        });
        document.getElementById("hit-slider").getElementsByClassName("next")[0].addEventListener("click", function () {
            hitPlusSlides("hit-slider", 1);
        });

//        Слайдеры для категорий
        var catSlideIndex = 1;
//количество слайдеров по категориям
        var catSlidersNum = document.getElementsByClassName("category-slider").length;
        for (i = 0; i < catSlidersNum; i++) {
            catShowSlides("category-slider-" + (i + 1), catSlideIndex);
        }
//фия для кнопок след и пред
        function catPlusSlides(id, n) {
            catShowSlides(id, catSlideIndex += n);
        }
//фия для самого слайдера по категориям
        function catShowSlides(id, n) {
            var i;
            var slides = document.getElementById(id).getElementsByClassName("cat-slide");
            if (window.innerWidth <= 600) {
                if (n > slides.length - 1) {
                    catSlideIndex = 1;
                }
                if (n < 1) {
                    catSlideIndex = slides.length - 1;
                }
            } else {
                if (n > slides.length - 2) {
                    catSlideIndex = 1;
                }
                if (n < 1) {
                    catSlideIndex = slides.length - 2;
                }
            }
            for (i = 0; i < slides.length; i++) {
                for (i = 0; i < slides.length; i++) {

                    slides[i].style.display = "none";
                }
                slides[catSlideIndex - 1].style.display = "table-cell";
                slides[catSlideIndex].style.display = "table-cell";
                if (window.innerWidth > 600) {
                    slides[catSlideIndex + 1].style.display = "table-cell";
                }
            }
        }

        for (i = 0; i < catSlidersNum; i++) {
            var catSliderId = "category-slider-" + (i + 1);
            document.getElementById(catSliderId).getElementsByClassName("prev")[0].addEventListener("click", function (e) {
                catPlusSlides(e.target.parentElement.getAttributeNode("id").value, -1);
            });
            document.getElementById(catSliderId).getElementsByClassName("next")[0].addEventListener("click", function (e) {
                catPlusSlides(e.target.parentElement.getAttributeNode("id").value, 1);
            });
        }
    }
}
