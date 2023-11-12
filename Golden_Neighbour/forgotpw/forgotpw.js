// Function to navigate to signup.html
function navigateToSignup() {
  window.location.href = "../signup";
}

// Function to handle the "Sign Up" button click event
function handleSignUpButtonClick() {
  const signUpButton = document.querySelector(".signup-button");
  signUpButton.addEventListener("click", navigateToSignup);
}

// Initialize the login module
function load() {
  handleSignUpButtonClick();
}

// Call the load function when the DOM is ready
document.addEventListener("DOMContentLoaded", load);
