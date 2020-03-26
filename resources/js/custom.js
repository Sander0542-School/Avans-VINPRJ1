$(document).ready(function () {
    $(".clickable a").click(function (e) {
        e.stopPropagation();
    });
});
