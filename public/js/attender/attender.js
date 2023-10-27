function add_favorite(id) {
    var item = '#add_favorite\\[' + id + '\\]'; // Escape the square brackets in the ID selector
    $(item).toggleClass('far fas text-danger');
}

function event_share() {

}
$(document).ready(function () {
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
});