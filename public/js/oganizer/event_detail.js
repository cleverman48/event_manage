document.getElementById("tag").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      event.preventDefault(); // Prevent form submission

      var tagInput = document.getElementById("tag");
      var tag = tagInput.value.trim();
      if (tag) {
        var tagContainer = document.getElementById("tagContainer");

        // Create tag component
        var tagComponent = document.createElement("div");
        tagComponent.classList.add("tag-component");

        // Create tag text
        var tagText = document.createElement("span");
        tagText.classList.add("tag-text");
        tagText.textContent = tag;

        // Create delete button
        var deleteButton = document.createElement("span");
        deleteButton.classList.add("delete-button");
        deleteButton.innerHTML = "&#x2716;"; // Unicode for "✖"

        // Delete button click event handler
        deleteButton.addEventListener("click", function() {
          tagContainer.removeChild(tagComponent);
        });

        // Append tag text and delete button to tag component
        tagComponent.appendChild(tagText);
        tagComponent.appendChild(deleteButton);

        // Append tag component to tag container
        tagContainer.appendChild(tagComponent);

        tagInput.value = "";
      }
    }
});
function removeTag(event)
{
    var tag = event.target.parentNode;
    var tagContainer = document.getElementById("tagContainer");
    tagContainer.removeChild(tag);
}
const imageInput = document.getElementById('image');
const previewImage = document.getElementById('image-input');

  imageInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        previewImage.src = e.target.result;
      };
      reader.readAsDataURL(file);
    } else {
      previewImage.src = '#';
    }
});

const copyButton = document.getElementById('copy');
const textInput = document.getElementById('attender_url');
const copyFeedback = document.getElementById('copy-feedback');

copyButton.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission
    const textToCopy = textInput.value;
    navigator.clipboard.writeText(textToCopy)
    .then(() => {
        copyFeedback.style.display = 'block';
        setTimeout(function() {
          copyFeedback.style.display = 'none';
        }, 2000);
    })
    .catch((error) => {
        console.error('Failed to copy text: ', error);
    });
});

function go_eventlist()
{
    window.location.href = "index.php?action=event_list";
}

document.getElementById("eventForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get form field values
    var eventID = document.getElementById("eventID").value;
    var eventDateTime = document.getElementById("eventDateTime").value;
    var eventName = document.getElementById("eventName").value;
    var venue = document.getElementById("venue").value;
    var address = document.getElementById("address").value;
    var url = document.getElementById("url").value;
    var participationFee = document.getElementById("participationFee").value;
    var numParticipants = document.getElementById("numParticipants").value;
    var matchingRestrictions = document.getElementById("matchingRestrictions").value;
    var image = document.getElementById("image");
    var file = image.files[0];
    var img_flg = image.files.length==0?false:true;
    var content = document.getElementById("content").value;

    
    var formData = new FormData(this);

    // Get the tag container and tag text elements
    var tagContainer = document.getElementById("tagContainer");
    var tagTextElements = tagContainer.getElementsByClassName("tag-text");

    // Extract the tag text contents and join them with dots
    var tags = Array.from(tagTextElements).map(function(element) {
      return element.textContent.trim();
    }).join(",");
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
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        if(xhr.responseText=="success") {
            alert("変更成功");
            window.location.href = "index.php?action=event_list";
        };
        //document.getElementById("eventForm").reset();
      }
    };
    xhr.send(formData);
});

