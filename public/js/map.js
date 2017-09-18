$(document).ready(function () {

    if ($("#framemap").length) {
        var timeout = setTimeout(showPage, 3500);
    }

    function showPage() {
        $("#loader").remove();
        $("#framemap").toggleClass('hidden');
    }
});

