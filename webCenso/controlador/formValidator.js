class FormValidator {
    constructor(formId) {
      this.form = document.getElementById(formId);
      this.formInputs = this.form.querySelectorAll('input, select');
      this.submitButton = this.form.querySelector('button[type="submit"]');
      this.initialize();
    }
  
    initialize() {
      this.submitButton.addEventListener('click', this.validateForm.bind(this));
    }
  
    validateForm(event) {
      event.preventDefault();
      let isValid = true;
  
      this.formInputs.forEach((input) => {
        if (input.value.trim() === '') {
          isValid = false;
          input.classList.add('is-invalid');
        } else {
          input.classList.remove('is-invalid');
        }
      });
  
      if (isValid) {
        this.form.submit();
      }
    }
  }
  
  // Uso de la clase para validar el formulario viviendas-form
  const viviendasFormValidator = new FormValidator('viviendas-form');
  
  // Uso de la clase para validar el formulario habitantes-form
  const habitantesFormValidator = new FormValidator('habitantes-form');
  
  // Uso de la clase para validar el formulario ocupaciones-form
  const ocupacionesFormValidator = new FormValidator('ocupaciones-form');
  