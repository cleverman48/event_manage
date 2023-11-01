function add_favorite(id) {
    var item = '#add_favorite\\[' + id + '\\]';
    var user_id = $('#user_id').val();
    if ($(item).hasClass('far')) {
        favorite = 1;
    } else {
        favorite = 0;
    }
    $.ajax({
        url: 'index.php',
        method: 'POST',
        data: {
            action: 'add_favorite',
            event_id: id,
            user_id: user_id,
            favorite: favorite,
        },
        success: function (response) {
            console.log(response);
            $(item).toggleClass('far fas text-danger');
        },
    });
}

function event_share() {

}
$(document).ready(function () {
    // var backgroundImage = $(".background_image");
    // var backgroundImageHeight = backgroundImage.height();
    // $(".event_image_container").height(backgroundImageHeight);

    if ($('#returnPage').val() == 'true') {
        $('.possibleChange').prop('disabled', false);
        $('#changeButton').hide();
    } else {
        $('#updateButton').hide();
    }

    $('#avatarInput').change(function () {
        var input = this;
        var preview = $('#avatarPreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    });
    $('#previewButton').click(function () {
        const form = $('.form-id');
        $('#action').val('previewProfile');
        form.submit();
    });
    $('#changeButton').click(function () {
        $('#updateButton').show();
        $('.possibleChange').prop('disabled', false);
        $('#changeButton').hide();
    });
    $('#updateButton').click(function () {
        const form = $('.form-id');
        $('#action').val('updateAttender');
        form.submit();
    });
    $('#notiConfirmButton').click(function (event) {
        event.preventDefault();
        var form = $('#notificationSettingModal form');
        form.submit();
    });

});