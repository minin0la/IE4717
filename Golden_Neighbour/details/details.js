// Function to navigate to signup.html
function navigateToSignup() {
    window.location.href = '../signup/signup.html';
}

// Function to handle the "Sign Up" button click event
function handleSignUpButtonClick() {
    const signUpButton = document.querySelector('.signup-button');
    signUpButton.addEventListener('click', navigateToSignup);
}

// Initialize the login module
function load() {
    handleSignUpButtonClick();
}

// Call the load function when the DOM is ready
document.addEventListener('DOMContentLoaded', load);

document.addEventListener("DOMContentLoaded", function () {
    const selectDate = document.getElementById("selectDate");
    const today = new Date();
  
    for (let i = 0; i <= 20; i++) {
      const optionDate = new Date(today);
      optionDate.setDate(today.getDate() + i);
      const option = document.createElement("option");
      option.value = optionDate.toISOString().slice(0, 10);
      option.textContent = optionDate.toDateString();
      selectDate.appendChild(option);
    }
  });
  