$(".goto").click(function() {
    $('body').animate({
        scrollTop: document.getElementById("goto").offsetTop
    }, 2000);
});