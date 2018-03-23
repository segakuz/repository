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

        heroShowSlides("hero-slider", heroSlideIndex);
        hitShowSlides("hit-slider", hitSlideIndex);

        var heroInterval = setInterval(function () {
            heroShowSlides("hero-slider", heroSlideIndex += 1);
        }, 3000);

        function hitPlusSlides(id, n) {
            hitShowSlides(id, hitSlideIndex += n);
        }

        function heroShowSlides(id, n) {
            var i;
            var slides = document.getElementById(id).getElementsByClassName("mySlides");
            if (n > slides.length) {
                heroSlideIndex = 1;
            }
            if (n < 1) {
                heroSlideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[heroSlideIndex - 1].style.display = "block";
        }

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
//                slides[i].style.transform = "translate(-100%, 0)";
//                var catTimeout1 = setTimeout(function () {
//                    for (i = 0; i < slides.length; i++) {
//                        slides[i].style.visibility = "hidden";
//                        slides[i].style.transition = "all 0s ease 0s";
//                        slides[i].style.transform = "translate(0, 0)";
//                    }
//
//                }, 300);
//                var catTimeout3 = setTimeout(function () {
                    for (i = 0; i < slides.length; i++) {

                        slides[i].style.display = "none";
                    }
//                }, 600);
//                var catTimeout4 = setTimeout(function () {
                    slides[catSlideIndex - 1].style.display = "table-cell";
                    slides[catSlideIndex].style.display = "table-cell";
                    if (window.innerWidth > 600) {
                        slides[catSlideIndex + 1].style.display = "table-cell";
                    }
//                }, 650);
//                var catTimeout2 = setTimeout(function () {
//                    for (i = 0; i < slides.length; i++) {
//                        slides[i].style.transition = "0.3s ease-in-out";
//                        slides[i].style.visibility = "visible";
//                    }
//                }, 900);

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
