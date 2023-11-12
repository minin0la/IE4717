// Function to navigate to signup.html
function navigateToSignup() {
  window.location.href = "../signup";
}

// Function to navigate to forgotpw.html
function navigateToForgetPw() {
  window.location.href = "../forgotpw/forgotpw.html";
}

// Function to handle the "Sign Up" button click event
function handleSignUpButtonClick() {
  const signUpButton = document.querySelector(".signup-button");
  signUpButton.addEventListener("click", navigateToSignup);
}

// Function to handle the "Forgot Password?" button click event
function handleForgotPwButtonClick() {
  const ForgotPwButton = document.querySelector(".forgot-password-button");
  ForgotPwButton.addEventListener("click", navigateToForgetPw);
}

// Initialize the login module
function load() {
  handleSignUpButtonClick();
  handleForgotPwButtonClick();
}

// Call the load function when the DOM is ready
document.addEventListener("DOMContentLoaded", load);
