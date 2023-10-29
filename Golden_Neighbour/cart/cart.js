// Fetch data from the JSONPlaceholder API
fetch('https://jsonplaceholder.typicode.com/albums')
    .then(response => response.json())
    .then(data => {
        // Get the booking-history element where you want to insert the cards
        const bookingHistory = document.querySelector('.booking-history');

        // Iterate through the API response and generate cards
        data.forEach(album => {
            // Create a card element
            const card = document.createElement('div');
            card.className = 'card';

            // Create the card content
            const heading = document.createElement('h2');
            heading.textContent = `Booking #${album.id}`;

            const userIdParagraph = document.createElement('p');
            userIdParagraph.textContent = `User ID: ${album.userId}`;

            const titleParagraph = document.createElement('p');
            titleParagraph.textContent = `Title: ${album.title}`;

            // Append the content to the card
            card.appendChild(heading);
            card.appendChild(userIdParagraph);
            card.appendChild(titleParagraph);

            // Append the card to the booking-history section
            bookingHistory.appendChild(card);
        });
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
	
