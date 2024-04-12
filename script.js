document.getElementById("search-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    const keywords = document.getElementById("search-box").value;

    // Clear previous search results
    const searchResult = document.getElementById("search-result");
    searchResult.innerHTML = "";

    // Search for files based on keywords
    searchFiles(keywords);
});

function searchFiles(keywords) {
    fetch(`search.php?keywords=${keywords}`)
        .then(response => response.json())
        .then(files => {
            const searchResult = document.getElementById("search-result");
            if (files.length === 0) {
                searchResult.innerHTML = "<p>No files found.</p>";
            } else {
                files.forEach(file => {
                    const button = document.createElement("button");
                    button.classList.add("search-result-button");
                    button.textContent = file;
                    button.addEventListener("click", function() {
                        window.open(`uploads/${file}`, "_blank");
                    });
                    searchResult.appendChild(button);
                });
            }
        })
        .catch(error => {
            console.error("Error searching files:", error);
            const searchResult = document.getElementById("search-result");
            searchResult.innerHTML = "<p>An error occurred while searching files.</p>";
        });
}
