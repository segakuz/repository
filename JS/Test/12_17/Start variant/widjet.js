;
(function () {

    window.Slider = mySlider;

    function mySlider(el, objSetting) {
        this.el = el;
        this.el.classList.add('container');
        var newDiv = document.createElement('div');
        newDiv.classList.add('image-slider-wrapper');
        var elUl = document.createElement('ul');
        elUl.classList.add('image_slider');

        var elLi;
        var img;
        for (var i = 0; i < objSetting.arrImg.length; i++) {
            img = document.createElement('img');
            img.src = objSetting.arrImg[i];
            elLi = document.createElement('li');
            elLi.appendChild(img);
            elUl.appendChild(elLi);
        }
        newDiv.appendChild(elUl);
        this.el.appendChild(newDiv);
        elUl.style.width = (objSetting.image_width * objSetting.arrImg.length) + 'px';
        elUl.style.left = '-100px';
        setInterval(function() {
            var leftVal = parseInt(elUl.style.left);
            leftVal = leftVal - 1;
            elUl.style.left = leftVal + 'px';
        }, 100)
    }

}());
