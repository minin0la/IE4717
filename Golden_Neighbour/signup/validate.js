// Form elements
const firstnameContent = document.getElementById('first-name')
const lastnameContent = document.getElementById('last-name')
const emailContent = document.getElementById('email')

// Error messages
const errorfirstname = document.getElementById('error-first-name')
const errorlastname = document.getElementById('error-last-name')
const errorEmail = document.getElementById('error-email')

/**
 * Listens to the <name> field and show error message on blur, if applicable.
 */
firstnameContent.addEventListener('blur', (event) => {
    if (firstnameContent.value === '') {
      errorfirstname.textContent = 'This field is compulsory!'
    } else if (isValidName(firstnameContent.value)) {
      errorfirstname.textContent = ''
    } else {
      errorfirstname.textContent = 'Enter characters and whitespaces only!'
    }
  })

lastnameContent.addEventListener('blur', (event) => {
    if (lastnameContent.value === '') {
      errorlastname.textContent = 'This field is compulsory!'
    } else if (isValidName(lastnameContent.value)) {
      errorlastname.textContent = ''
    } else {
      errorlastname.textContent = 'Enter characters and whitespaces only!'
    }
  })

/**
 * Listens to the <email> field and show error message on blur, if applicable.
 */
emailContent.addEventListener('blur', (event) => {
    if (emailContent.value === '') {
      errorEmail.textContent = 'This field is compulsory!'
    } else if (isValidEmail(emailContent.value)) {
      errorEmail.textContent = ''
    } else {
      errorEmail.textContent = 'Your email contains invalid symbols!'
    }
  })

function isValidName (value)
{
    const rule = /^[a-zA-Z ]+$/
    value.trim()

    return (rule.test(value))
}

function isValidEmail (value) {
    const rule = /^[\w][\w.-]*@([\w][\w-]*\.){1,3}[a-zA-Z]{2,3}$/
  
    value.trim()
  
    return (rule.test(value))
  }