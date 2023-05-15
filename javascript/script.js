const editBtns = document.querySelectorAll('.edit-btn');
const popup = document.querySelector('.edit-popup');
const cancelBtn = document.querySelector('.cancel-btn');
const fieldName = document.querySelector('#field-name');
const fieldText = {
	nome: document.querySelector('#name-text'),
	'e-mail': document.querySelector('#email-text'),
	'palavra-passe': document.querySelector('#password-text'),
	utilizador: document.querySelector('#username-text')
};
const editForm = document.querySelector('#edit-form');
const editInput = document.querySelector('#edit-input');

// Mostra o popup de edição quando um botão "Editar" é clicado
editBtns.forEach(btn => {
	btn.addEventListener('click', () => {
		const field = btn.getAttribute('data-field');
		fieldName.textContent = field;
		editInput.value = fieldText[field].textContent;
		popup.style.display = 'flex';
	});
});

// Encontre o botão "x"
var closeBtn = document .querySelector(".close-btn");

// Adicione um evento de clique ao botão "x"
closeBtn.addEventListener("click", () => {
    // Feche o pop-up
    popup.style.display = 'none';
});

// Envia o formulário de edição quando o botão "Salvar" é clicado
editForm.addEventListener('submit', (event) => {
	event.preventDefault();
	const field = fieldName.textContent.toLowerCase();
	const newValue = editInput.value;
	fieldText[field].textContent = newValue;
	popup.style.display = 'none';
});


function checkPasswordMatch() {
	var password1 = document.getElementById("password").value;
	var password2 = document.getElementById("password_check").value;
  
	if (password1 != password2) {
	  alert("As palavras-passe não correspondem. Por favor, tente novamente.");
	  document.getElementById("password").value = "";
	  document.getElementById("password_check").value = "";
	  document.getElementById("password").focus();
	}
  }