document.addEventListener("DOMContentLoaded", () => {
  const url = "/core/login.php";
  const loginButton = document.getElementById("login-button");
  const formFields = document.querySelectorAll(".form-field");
  const message = document.querySelector(".message-wrap");
  const messageText = document.querySelector(".message-text");
  const formDataValue = [];

  //Обработка данных, полученных от сервера
  function getResponseServer(response) {
    if (response.answer == "true") {
      let date = new Date();
      date.setTime(date.getTime() + 2 * 60 * 60 * 1000);
      let expires = date.toUTCString();
      document.cookie = `user=${response.hash}; expires=${expires}; path=/`;
      location.href = "admin";
      clearFormTextField(formFields);
    } else if (
      response.answer == "false" ||
      response.answer == "login not found"
    ) {
      createMessageSubmit(message, messageText, {
        borderColor: "#B35060",
        text: "Ошибка. Вы ввели неверный логин или пароль. Попробуйте еще раз.",
      });
      clearFormTextField(formFields);
    } else {
      createMessageSubmit(message, messageText, {
        borderColor: "#B35060",
        text: "Что-то пошло не так. Обновите страницу и попробуйте еще раз.",
      });
      clearFormTextField(formFields);
    }
  }

  for (let i = 0; i < formFields.length; i++) {
    formFields[i].onfocus = removeError;
    formFields[i].onblur = checkEmptyField;
  }

  loginButton.onclick = (event) => {
    event.preventDefault();
    if (checkValueFieldsBeforeSubmit(formFields)) {
      getFormValue(formFields, formDataValue);
      sendAjaxQuery(url, "POST", getResponseServer, formDataValue);
    } else {
      return false;
    }
  };
});
