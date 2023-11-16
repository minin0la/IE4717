// function toggleCollapsible() {
//     var content = document.getElementById("collapsibleContent");
//     content.style.display = (content.style.display === "none" || content.style.display === "") ? "block" : "none";

//     if (content.style.maxHeight === "0px" || content.style.maxHeight === "") {
//         content.style.maxHeight = content.scrollHeight + "px";
//         setTimeout(function() {
//             content.style.display = "block";
//         }, 500); // 500 milliseconds (0.5 seconds) delay
//     } else {
//         content.style.maxHeight = "0";
//         setTimeout(function() {
//             content.style.display = "none";
//         }, 500); // 500 milliseconds (0.5 seconds) delay
//     }
// }

const maxStars = 5; // Total number of stars
let currentRating = 3.3; // Initial rating value

const ratingDisplay = document.getElementById("ratingDisplay");
const starRating = document.getElementById("starRating");

// Function to update the rating display
function updateRatingDisplay() {
  ratingDisplay.innerHTML = `Rating: ${currentRating.toFixed(1)}/${maxStars}`;
}

// Function to generate the star rating interface
function generateStarRating() {
  starRating.innerHTML = ""; // Clear existing stars

  for (let i = 1; i <= maxStars; i++) {
    const star = document.createElement("span");
    star.innerHTML = "★";
    star.classList.add("rated");
    if (i > currentRating) {
      star.classList.remove("rated");
    }
    star.addEventListener("click", () => {
      currentRating = i;
      updateRatingDisplay();
      generateStarRating();
    });
    starRating.appendChild(star);
  }

  updateRatingDisplay();
}

generateStarRating();

function searchMovies() {
  var input, filter, movieDiv, movies, title, i;

  // Get the input element (search bar) by its ID
  input = document.getElementById("searchBar");
  // Convert the input value to uppercase to make the search case-insensitive
  filter = input.value.toUpperCase();
  // Get the container element for movies by its ID
  movieDiv = document.getElementById("movie");

  // Get all elements with the class 'division' inside the movie container
  movies = movieDiv.getElementsByClassName("division");

  // Loop through each movie element
  for (i = 0; i < movies.length; i++) {
    // Get the text content of the first <p> element inside each movie
    title =
      movies[i].getElementsByTagName("p")[0].textContent ||
      movies[i].getElementsByTagName("p")[0].innerText;

    // Check if the uppercase title contains the uppercase filter string
    if (title.toUpperCase().indexOf(filter) > -1) {
      // If the title matches the filter, display the movie
      movies[i].style.display = "";
    } else {
      // If the title does not match the filter, hide the movie
      movies[i].style.display = "none";
    }
  }
}

function filmClassification() {
  // Get the selected value from the Film Classification dropdown
  var selectedClassification = document.getElementById(
    "classificationDropdown"
  ).value;

  // Get the container element for movies by its ID
  var movieDiv = document.getElementById("movie");

  // Get all elements with the class 'division' inside the movie container
  var movies = movieDiv.getElementsByClassName("division");

  // Loop through each movie element
  for (var i = 0; i < movies.length; i++) {
    // Get the value of the selected option in the dropdown for the current movie

    var classification =
      movies[i].getElementsByTagName("p")[2].textContent ||
      movies[i].getElementsByTagName("p")[2].innerText;

    console.log(`Movie ${i + 1} Classification: ${classification}`);

    // Check if the selected classification is empty or matches the movie's classification
    if (
      selectedClassification === "" ||
      classification === selectedClassification
    ) {
      // If the classification matches, display the movie
      movies[i].style.display = "";
    } else {
      // If the classification does not match, hide the movie
      movies[i].style.display = "none";
    }
  }
}

function validateDecimal(input) {
  // Remove any non-numeric characters and keep up to one decimal place
  input.value = input.value.replace(/[^0-9.]/g, "");

  // Allow only one decimal place
  var parts = input.value.split(".");
  if (parts.length > 1) {
    input.value = parts[0] + "." + parts[1].slice(0, 1);
  }
}

function searchGenre() {
  // Get the selected value from the Film Classification dropdown
  var selectedGenre = document.getElementById("genreDropdown").value;

  // Get the container element for movies by its ID
  var movieDiv = document.getElementById("movie");

  // Get all elements with the class 'division' inside the movie container
  var movies = movieDiv.getElementsByClassName("division");

  // Loop through each movie element
  for (var i = 0; i < movies.length; i++) {
    // Get the value of the selected option in the dropdown for the current movie

    var genres =
      movies[i].getElementsByTagName("p")[3].textContent ||
      movies[i].getElementsByTagName("p")[3].innerText;

    console.log(`Movie ${i + 1} Genre:${genres}`);

    // Check if the selected classification is empty or matches the movie's classification
    if (selectedGenre === "" || genres === selectedGenre) {
      // If the classification matches, display the movie
      movies[i].style.display = "";
    } else {
      // If the classification does not match, hide the movie
      movies[i].style.display = "none";
    }
  }
}

function toggleCollapsible() {
  var collapsibleContent = document.getElementById("collapsibleContent");
  collapsibleContent.style.display =
    collapsibleContent.style.display === "none" ||
    collapsibleContent.style.display === ""
      ? "block"
      : "none";
}

function filterMovies() {
  const selectedGenre = document.getElementById("genreDropdown").value;
  const selectedClassification = document.getElementById(
    "classificationDropdown"
  ).value;
  const searchQuery = document.getElementById("searchBar").value.toLowerCase();
  window.location.href = `?genre=${selectedGenre}&classification=${selectedClassification}&search=${searchQuery}`;
}
