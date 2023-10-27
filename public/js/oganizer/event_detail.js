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