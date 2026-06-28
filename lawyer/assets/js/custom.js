// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()


// Checking Input is Number or Not
function isInputNumber(evt){
  var ch = String.fromCharCode(evt.which);
  if(!(/[0-9]/.test(ch))){
      evt.preventDefault();
  }
}


// Cheking input is Alphabet or Not
function isInputAlphabet(evt){
  var ch = String.fromCharCode(evt.which);
  if(!(/[a-zA-Z\s]/.test(ch))){
      evt.preventDefault();
  }
} 