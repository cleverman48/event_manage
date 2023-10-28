function add_favorite(id) {
    var item = '#add_favorite\\[' + id + '\\]'; // Escape the square brackets in the ID selector
    $(item).toggleClass('far fas text-danger');
}

function event_share() {

}
$(document).ready(function () {
    if( $('#returnPage').val() == 'true' ){
        $('.possibleChange').prop('disabled', false);
        $('#changeButton').hide();
    }else{
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
    $('#changeButton').click(function(){
        $('#updateButton').show();
        $('.possibleChange').prop('disabled', false);
        $('#changeButton').hide();
    });
    $('#updateButton').click(function () {
        const form = $('.form-id');
        $('#action').val('updateAttender');
        form.submit();
    });

});