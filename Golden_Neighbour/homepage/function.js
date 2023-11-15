function toggleCollapsible() {
    var content = document.getElementById("collapsibleContent");

    if (content.style.maxHeight === "0px" || content.style.maxHeight === "") {
        content.style.maxHeight = content.scrollHeight + "px";
        setTimeout(function() {
            content.style.display = "block";
        }, 500); // 500 milliseconds (0.5 seconds) delay
    } else {
        content.style.maxHeight = "0";
        setTimeout(function() {
            content.style.display = "none";
        }, 500); // 500 milliseconds (0.5 seconds) delay
    }
}

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
    // Get input value and convert to lowercase for case-insensitive search
    var input = document.getElementById("searchBar").value.toLowerCase();
    
    // Get all movie divisions
    var movies = document.getElementsByClassName("division");
  
    // Loop through each movie division
    for (var i = 0; i < movies.length; i++) {
      // Get the movie title from the current division and convert to lowercase
      var title = movies[i].getElementsByTagName("p")[0].innerHTML.toLowerCase();
      
      // Check if the input string is found in the movie title
      if (title.includes(input)) {
        movies[i].style.display = "";  // Show the movie division
      } else {
        movies[i].style.display = "none";  // Hide the movie division
      }
    }
  }
  
  