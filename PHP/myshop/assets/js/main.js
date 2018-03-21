document.addEventListener("DOMContentLoaded", ready);

function ready() {

    function barIcon(th) {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
        th.classList.toggle("change");
    }

    document.getElementsByClassName("icon")[0].addEventListener("click", function () {
        barIcon(this);
    });

    var ancs = document.getElementsByTagName("a");
    if (location.href == "http://myshop/") {
        $(".topnav > a:first-child").addClass("active");
    }
    for (i = 0; i < ancs.length; i++) {
        if (ancs[i].getAttributeNode("href")) {
            if (location.href.includes(ancs[i].getAttributeNode("href").value) && ancs[i].getAttributeNode("href").value != "/") {
                ancs[i].className = "active";
            }
        }
    }
    if (document.getElementById("hero-slider")) {
        var heroSlideIndex = 1;
        var hitSlideIndex = 1;
        console.log("hero: " + heroSlideIndex + ", hit: " +
            hitSlideIndex);
        heroShowSlides("hero-slider", heroSlideIndex);
        hitShowSlides("hit-slider", hitSlideIndex);




        function heroPlusSlides(id, n) {
            heroSlideIndex += n;
            heroShowSlides(id, heroSlideIndex);
            console.log("hero: " + heroSlideIndex + ", hit: " +
                hitSlideIndex);
        }

        function hitPlusSlides(id, n) {
            hitShowSlides(id, hitSlideIndex += n);
            console.log("hero: " + heroSlideIndex + ", hit: " +
                hitSlideIndex);
        }

        function heroCurrentSlide(id, n) {
            heroShowSlides(id, heroSlideIndex = n);
            console.log("hero: " + heroSlideIndex + ", hit: " +
                hitSlideIndex);
        }

        function hitCurrentSlide(id, n) {
            hitShowSlides(id, hitSlideIndex = n);
            console.log("hero: " + heroSlideIndex + ", hit: " +
                hitSlideIndex);
        }

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
            console.log("hero: " + heroSlideIndex + ", hit: " +
                hitSlideIndex);
        }

        function hitShowSlides(id, n) {
            var i;
            var slides = document.getElementById(id).getElementsByClassName("mySlides");

            var dots = document.getElementById(id).getElementsByClassName("dot");
            if (n > slides.length) {
                hitSlideIndex = 1;
            }
            if (n < 1) {
                hitSlideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" dotactive", "");
            }
            slides[hitSlideIndex - 1].style.display = "block";
            dots[hitSlideIndex - 1].className += " dotactive";
            console.log("hero: " + heroSlideIndex + ", hit: " +
                hitSlideIndex);
        }

        document.getElementById("hit-slider").getElementsByClassName("prev")[0].addEventListener("click", function () {
            hitPlusSlides("hit-slider", -1);
        });
        document.getElementById("hit-slider").getElementsByClassName("next")[0].addEventListener("click", function () {
            hitPlusSlides("hit-slider", 1);
        });

        for (i = 0; i < document.getElementById("hit-slider").getElementsByClassName("dot").length; i++) {

            document.getElementById("hit-slider").getElementsByClassName("dot")[i].addEventListener("click", function (e) {
                hitCurrentSlide("hit-slider", e.target.getAttributeNode("data-id").value);
            });
        }
        document.getElementById("hero-slider").getElementsByClassName("prev")[0].addEventListener("click", function () {
            heroPlusSlides("hero-slider", -1);
        });
        document.getElementById("hero-slider").getElementsByClassName("next")[0].addEventListener("click", function () {
            heroPlusSlides("hero-slider", 1);
        });
        for (i = 0; i < document.getElementById("hero-slider").getElementsByClassName("dot").length; i++) {

            document.getElementById("hero-slider").getElementsByClassName("dot")[i].addEventListener("click", function (e) {
                heroCurrentSlide("hero-slider", e.target.getAttributeNode("data-id").value);
            });
        }

        var catSlideIndex = 1;
        var catSlidersNum = document.getElementsByClassName("category-slider").length;
        for (i = 0; i < catSlidersNum; i++) {
            catShowSlides("category-slider-" + (i + 1), catSlideIndex);
        }

        function catPlusSlides(id, n) {

            catShowSlides(id, catSlideIndex += n);
        }

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
                slides[i].style.display = "none";
            }
            slides[catSlideIndex - 1].style.display = "table-cell";
            slides[catSlideIndex].style.display = "table-cell";
            if (window.innerWidth > 600) {
                slides[catSlideIndex + 1].style.display = "table-cell";
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

//    window.onscroll = function () {
//        stickyFunction()
//    };
//
//    var navbar = document.getElementsByClassName("catalog-cats")[0];
//    var sticky = navbar.offsetTop;
//
//    function stickyFunction() {
//        if (window.pageYOffset >= sticky) {
//            navbar.classList.add("sticky")
//        } else {
//            navbar.classList.remove("sticky");
//        }
//    }

}
