class AgendaCreateEvent {

  constructor(form, route, modalContainer) {
    this.form = form;
    this.route = route;
    this.modalContainer = modalContainer;
  }

  validate() {
    let inputFields = this.form.querySelectorAll('.form-control');
    let formValues = {};
    for (let i = 0; i < inputFields.length; i++) {
      let field = inputFields[i];
      let name = field.getAttribute('name');
      let value = field.value;
      Object.assign(formValues, {
        [name] :value,
      });
    }

    this.sendRequest(formValues)
      .then(response => {
        return response.json();
      })
      .then(data => {
        let errorContainer = this.modalContainer.querySelector('.alert-danger');
        let successContainer = this.modalContainer.querySelector('.alert-info');
        if (data.status == false) {
          let errors = data.errors;
          for (let i = 0; i < errors.length; i++) {
            let error = errors[i];
            let errorHolder = document.createElement('li');
            errorHolder.innerText = error;
            errorContainer.querySelector('ul').appendChild(errorHolder);
          }
          successContainer.classList.add('display-none');
          errorContainer.classList.remove('display-none');
        }
        else {
          successContainer.innerText = "Evenement verzoek is verstuurd, u ontvangt een bericht wanneer deze is goedgekeurd";
          errorContainer.classList.add('display-none');
          successContainer.classList.remove('display-none');
          for (let i = 0; i < inputFields.length; i++) {
            inputFields[i].value = "";
          }
          window.scrollTo(0, 0);
          try {
            setTimeout(() => {
              this.modalContainer.remove();
            }, 5000)
          } catch (e) {}
        }
      });
  }

  sendRequest(payload) {
    return fetch(this.route, {
      method: 'POST',
      cache: 'no-cache',
      headers: {
        'X-CSRF-TOKEN': this.form.querySelector('input[name=_token]').value,
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(payload),
    });
  }

}
