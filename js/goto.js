$(".goto").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#goto").offset().top
    }, 2000);
});