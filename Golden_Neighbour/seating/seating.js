document.addEventListener('DOMContentLoaded', () => {
    const seatMap = document.querySelector('.seat-map');
    const addtocartButton = document.getElementById('addtocart-button');
    const paynowButton = document.getElementById('paynow-button');
    const totalSelectedSeats = document.getElementById('total-selected-seats');
    const totalPrice = document.getElementById('total-price');
    let selectedSeats = [];

    // Simulated data for seat availability (replace with your data)
    const seatAvailability = [
        [1, 0, 1, 1, 0],
        [0, 1, 0, 1, 1],
        [1, 1, 1, 0, 0],
        [0, 1, 1, 1, 0],
    ];

    // Function to update the total selected seats and price
    function updateSelectionInfo() {
        totalSelectedSeats.textContent = selectedSeats.length;
        totalPrice.textContent = selectedSeats.length; // Replace with your pricing logic
    }

    // Function to generate the seat grid based on seatAvailability
    function generateSeatGrid() {
        seatMap.innerHTML = '';

        for (let i = 0; i < seatAvailability.length; i++) {
            const row = document.createElement('div');
            row.classList.add('seat-row');

            for (let j = 0; j < seatAvailability[i].length; j++) {
                const seat = document.createElement('div');
                seat.classList.add('seat');

                if (seatAvailability[i][j] === 1) {
                    seat.textContent = 'X';
                    seat.classList.add('occupied');
                } else {
                    seat.textContent = '';
                    seat.addEventListener('click', () => selectSeat(i, j));
                }

                row.appendChild(seat);
            }

            seatMap.appendChild(row);
        }
    }

    // Function to handle seat selection
    function selectSeat(row, col) {
        if (!seatAvailability[row][col]) {
            const seat = seatMap.querySelector(`.seat-row:nth-child(${row + 1}) .seat:nth-child(${col + 1})`);

            if (!selectedSeats.includes(`${row}-${col}`)) {
                selectedSeats.push(`${row}-${col}`);
                seat.classList.add('selected');
            } else {
                const index = selectedSeats.indexOf(`${row}-${col}`);
                if (index > -1) {
                    selectedSeats.splice(index, 1);
                    seat.classList.remove('selected');
                }
            }

            // Enable Continue button if seats are selected
            if (selectedSeats.length > 0) {
                addtocartButton.removeAttribute('disabled');
            } else {
                addtocartButton.setAttribute('disabled', 'true');
            }

            // Update selection info
            updateSelectionInfo();
        }
    }

    // Generate the initial seat grid and update selection info
    generateSeatGrid();
    updateSelectionInfo();
});
