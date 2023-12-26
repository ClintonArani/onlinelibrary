// Wait for the DOM to be fully loaded before executing the script
document.addEventListener('DOMContentLoaded', function () {
    // Fetch books from the server when the page is loaded
    fetchBooks();
});

// Function to fetch books from the server using a PHP script
function fetchBooks() {
    // Make a GET request to the 'connect.php' script
    fetch('connect.php')
        // Parse the response as JSON
        .then(response => response.json())
        // Call the displayBooks function with the retrieved data
        .then(data => displayBooks(data))
        // Log an error if the fetch operation fails
        .catch(error => console.error('Error fetching books:', error));
}

// Function to display books in the HTML container
function displayBooks(books) {
    // Get the HTML container element by its ID
    const container = document.getElementById('bookContainer');

    // Iterate through each book in the retrieved data
    books.forEach(book => {
        // Create a new div element for each book
        const bookElement = document.createElement('div');
        // Set the class name for styling purposes
        bookElement.className = 'book';

        // Create a link element
        const linkElement = document.createElement('a');
        // Set the href attribute to the content link from the database
        linkElement.href = book.content;
        // Open the link in a new tab
        linkElement.target = "_blank";

        // Populate the inner HTML of the link element with title and author
        linkElement.innerHTML = `<h3>${book.title}</h3><h2>${book.author}</h2><p>${book.description}</p>`;

        // Append the link element to the book element
        bookElement.appendChild(linkElement);

        // Add a click event listener to each book element
        bookElement.addEventListener('click', function (event) {
            // Prevent the default behavior of the link (opening a new tab)
            event.preventDefault();
            // Redirect to the website specified in the content column
            window.open(book.content, '_blank');
        });

        // Append the book element to the HTML container
        container.appendChild(bookElement);
    });
}
