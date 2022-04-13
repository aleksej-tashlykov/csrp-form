document.addEventListener("DOMContentLoaded", () => {
  const url = "/core/update_user.php";
  const logout = document.getElementById("logout");
  const btnUpdate = document.getElementById("button-update");
  const formField = document.querySelectorAll(".form-field");
  const message = document.querySelector(".message-wrap");
  const messageText = document.querySelector(".message-text");
  const formDataValue = [];

  //Создание сообщения о результатах отпраки формы
  function createMessageSubmit(elem, elemText, arg) {
    elem.style.borderColor = arg.borderColor;
    elem.style.opacity = 1;
    elemText.textContent = arg.text;
    //Удаление сообщения о результатах отпраки формы
    setTimeout(() => {
      elem.style.borderColor = "transparent";
      elem.style.opacity = 0;
      elemText.textContent = "";
      location.href = "/admin";
    }, 2000);
  }

  //Обработка данных, полученных от сервера
  function getResponseServer(response) {
    if (response.answer == "success") {
      createMessageSubmit(message, messageText, {
        borderColor: "#3E90B2",
        text: "Данные успешно отредактированны и сохранены!",
      });
    } else {
      createMessageSubmit(message, messageText, {
        borderColor: "#B35060",
        text: "Что-то пошло не так. Обновите страницу и попробуйте еще раз",
      });
    }
  }

  formField.forEach((elem) => {
    elem.addEventListener("focus", removeError);
    elem.addEventListener("blur", checkEmptyField);
    elem.addEventListener("keydown", deleteLastCharacter);
  });

  logout.onclick = () => {
    let cookie = document.cookie;
    let date = new Date();
    date.setTime(date.getTime() - 10 * 60 * 1000);
    let expires = date.toUTCString();
    document.cookie = `${cookie}; expires=${expires}; path=/`;
    location.href = "/login";
  };

  btnUpdate.onclick = function (event) {
    event.preventDefault();
    if (checkValueFieldsBeforeSubmit(formField)) {
      getFormValue(formField, formDataValue);
      sendAjaxQuery(url, "POST", getResponseServer, formDataValue);
    } else {
      return false;
    }
  };
});
