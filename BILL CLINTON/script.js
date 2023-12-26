document.addEventListener("DOMContentLoaded", function () {
    // Get references to HTML elements by their IDs
    const searchInput = document.getElementById("search-input");
    const searchButton = document.getElementById("search-button");
    const searchResults = document.getElementById("search-results");

    // Add a click event listener to the search button
    searchButton.addEventListener("click", function () {
        // Get the search query from the input field
        const query = searchInput.value;

        // Clear previous search results
        searchResults.innerHTML = "";

        // Send an AJAX request using the fetch() API
        fetch("search.php", {
            method: "POST", // Use the POST method for sending data
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `query=${query}` // Send the query as the request body
        })
        .then(response => response.text()) // Assuming the response is text
        .then(result => {
            // Update the search results container with the response
            searchResults.innerHTML = result;
        })
        .catch(error => {
            console.error("An error occurred:", error);
        });
    });
});
