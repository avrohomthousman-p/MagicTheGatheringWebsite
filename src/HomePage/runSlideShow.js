var timer;
var i = 0;
var pics = ["images/blue.jpg", "images/black.jpg", "images/red.jpg", "images/green.jpg", "images/white.jpg"];


function nextSlide(){
    i = (i + 1) % pics.length;
    document.querySelector('#slideShowLeft img').src = pics[i];
    document.querySelector('#slideShowRight img').src = pics[i];
}


window.onload = function(){
    //preload all images
    for(var j = 0; j < pics.length; j++){
        var image = new Image();
        image.src = pics[j];
    }
    timer = setInterval(nextSlide, 2000);
};

