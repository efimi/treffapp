$(document).ready(function () {
// Function um eine Preview des Bildes zu ermöglichen
    $(function () {
        $("#file").change(function () {
            var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                $('#previewing').attr('src', 'noimage.png');
                return false;
            }
            else {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function imageIsLoaded(e) {
        $("#file").css("color", "green");
        $('#image_preview').css({"display": "block", "opacity": "1"});
        // $('#previewing').attr('src', e.target.result);
        $('#previewing').attr({"width": "250px", "height": "230px", "src": e.target.result});
    }
});