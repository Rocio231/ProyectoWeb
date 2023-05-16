class FormValidator {
    constructor(form) {
      this.form = form;
      this.errorMsg = document.getElementById('error-msg');
    }
  
    validate() {
      this.form.addEventListener('submit', (event) => {
        event.preventDefault(); // Evitar el envío del formulario
  
        const user = this.form.user.value.trim();
        const pass = this.form.pass.value.trim();
  
        if (user === '' || pass === '') {
          this.showError('Por favor, complete todos los campos.');
        } else {
          this.form.submit(); // Enviar el formulario si los campos no están vacíos
        }
      });
    }
  
    showError(message) {
      this.errorMsg.style.display = 'block';
      this.errorMsg.innerText = message;
    }
  }
  
  // Instanciar la clase FormValidator y llamar al método validate
  const formValidator = new FormValidator(document.forms.forma);
  formValidator.validate();
  