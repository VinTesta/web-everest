let toastList = [];
$(document).ready(() => {
  console.log("> Ready to use");

  const toastElList = document.querySelectorAll('.toast')
  toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl, {}))
})