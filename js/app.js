$(document).foundation()

$(".title-bar-title").click(function () {
    $(".fi-list").toggleClass("color");
});

$(document).ready(function () {
    new Vivus(
        "my-svg-m",
        {
            duration: 300,
            file: path.dir + "/images/template/logo-m.svg",
        },
        null
    );

    new Vivus(
        "my-svg",
        {
            duration: 300,
            file: path.dir + "/images/template/logo.svg",
        },
        null
    );
});