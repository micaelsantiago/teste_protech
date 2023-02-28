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
})();

let inputs = document.getElementsByName('typeNote[]');
let inputsCount = 0;

for (let a = 0; a < inputs.length; a++) {
  if (inputs[a].checked) {
    inputsCount++
  }
}

if (inputsCount >= 1) {
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].removeAttribute('required');
  }
} else {
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].setAttribute('required', '');
  }
}

for (let i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('click', () => {
    if (inputs[i].checked) {
      inputsCount++;
    } else {
      inputsCount--;
    }

    if (inputsCount >= 1) {
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].removeAttribute('required');
      }
    } else {
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].setAttribute('required', '');
      }
    }
  });
}