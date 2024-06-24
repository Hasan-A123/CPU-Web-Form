const form = document.getElementById('customerForm');
const submitButton = document.getElementById('submitButton');

submitButton.addEventListener('click', function(event) {
  // Prevent default form submission if validation fails
  if (!validateForm()) {
    event.preventDefault();
  }
});

function validateForm() {
  let isValid = true;

  // Check required fields
  const requiredFields = ['customer_id', 'customer_type', 'status', 'phone_number', 'email', 'street', 'city', 'postcode'];
  for (const field of requiredFields) {
    const element = document.getElementById(field);
    if (!element.value.trim()) {
      isValid = false;
      element.classList.add('error'); // Add error class for styling (optional)
    } else {
      element.classList.remove('error'); // Remove error class if fixed (optional)
    }
  }

  // Check email format (basic validation)
  const email = document.getElementById('email').value;
  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
    isValid = false;
    document.getElementById('email').classList.add('error'); // Add error class for styling (optional)
  } else {
    document.getElementById('email').classList.remove('error'); // Remove error class if fixed (optional)
  }

 

  return isValid;
}script.js