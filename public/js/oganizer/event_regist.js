$(document).ready(function () {
    $('.js-example-basic-multiple').select2({ 
        tags: true,
        maximumSelectionLength: 5 
    });

    $('#summernote').summernote({
        height: 200

    });
    $('#image').change(function () {
        var input = this;
        var preview = $('#imagePreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    $("#eventForm").submit(function (event) {
        event.preventDefault(); // Prevent form submission

        // Get form field values
        var eventDateTime = $("#eventDateTime").val();
        var eventName = $("#eventName").val();
        var venue = $("#venue").val();
        var address = $("#address").val();
        var url = $("#url").val();
        var participationFee = $("#participationFee").val();
        var numParticipants = $("#numParticipants").val();
        var matchingRestrictions = $("#matchingRestrictions").val();
        var image = $("#image")[0].files[0];
        var content = $("#content").val();

        if ($("#image")[0].files.length == 0) {
            alert("画像を入力してください！");
            return;
        }

        var formData = new FormData(this);
        var tags = $('.js-example-basic-multiple').val();

        // Append the tags to the form data
        formData.set("eventDateTime", eventDateTime);
        formData.set("eventName", eventName);
        formData.set("venue", venue);
        formData.set("address", address);
        formData.set("url", url);
        formData.set("participationFee", participationFee);
        formData.set("numParticipants", numParticipants);
        formData.set("matchingRestrictions", matchingRestrictions);
        formData.set("image", image);
        formData.set("tags", tags);
        formData.set("content", content);
        formData.set("action", "event_insert");

        // Send the form data to the server using AJAX
        $.ajax({
            url: "index.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response == "success") {
                    alert("登録成功");
                    window.location.href = "index.php?action=event_list";
                }
            }
        });
    });

    $('#tag').keypress(function (event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent form submission

            var tagValue = $(this).val().trim();

            if (tagValue !== '') {
                // Do something with the tag value, e.g., add it to a list of tags
                console.log('Tag:', tagValue);

                // Clear the input field
                $(this).val('');
            }
        }
    });
    
});

function go_eventlist() {
    window.location.href = "index.php?action=event_list";
}
