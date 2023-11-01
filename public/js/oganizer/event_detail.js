const imageInput = $("#image");
const previewImage = $("#imagePreview");
$('.js-example-basic-multiple').select2({
    tags: true,
    maximumSelectionLength: 5
});

$('#summernote').summernote({
    height: 200
});

$('#updateButton').hide();
$('#changeButton').click(function () {
    $('#updateButton').show();
    $('.possibleChange').prop('disabled', false);
    $('#changeButton').hide();
})

imageInput.on("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            previewImage.attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
    } else {
        previewImage.attr("src", "#");
    }
});

const copyButton = $("#copy");
const textInput = $("#attender_url");
const copyFeedback = $("#copy-feedback");

copyButton.on("click", function (event) {
    event.preventDefault(); // Prevent form submission
    const textToCopy = textInput.val();
    navigator.clipboard.writeText(textToCopy)
        .then(() => {
            copyFeedback.css("display", "block");
            setTimeout(function () {
                copyFeedback.css("display", "none");
            }, 2000);
        })
        .catch((error) => {
            console.error("Failed to copy text: ", error);
        });
});

function go_eventlist() {
    window.location.href = "index.php?action=event_list";
}

$("#eventForm").on("submit", function (event) {
    event.preventDefault(); // Prevent form submission

    // Get form field values
    var eventID = $("#eventID").val();
    var eventDateTime = $("#eventDateTime").val();
    var eventName = $("#eventName").val();
    var venue = $("#venue").val();
    var address = $("#address").val();
    var url = $("#url").val();
    var participationFee = $("#participationFee").val();
    var numParticipants = $("#numParticipants").val();
    var matchingRestrictions = $("#matchingRestrictions").val();
    var image = $("#image")[0];
    var file = image.files[0];
    var img_flg = image.files.length == 0 ? false : true;
    var content = $("#content").val();

    var formData = new FormData(this);
    var tags = $('.js-example-basic-multiple').val();

    // Append the tags to the form data
    formData.set("event_id", eventID);
    formData.set("eventDateTime", eventDateTime);
    formData.set("eventName", eventName);
    formData.set("venue", venue);
    formData.set("address", address);
    formData.set("url", url);
    formData.set("participationFee", participationFee);
    formData.set("numParticipants", numParticipants);
    formData.set("matchingRestrictions", matchingRestrictions);
    formData.set("image", file);
    formData.set("tags", tags);
    formData.set("content", content);
    formData.set("action", "event_update");
    formData.set("img_flg", img_flg);

    // Send the form data to the server using AJAX
    $.ajax({
        url: "index.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response === "success") {
                alert("変更成功");
                window.location.href = "index.php?action=event_list";
            }
        }
    });
});
