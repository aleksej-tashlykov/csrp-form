document.addEventListener("DOMContentLoaded", () => {
  const url = "/core/delete_user.php";
  const logout = document.getElementById("logout");
  const btnDelete = document.querySelectorAll(".icon-table-delete");
  const modal = document.querySelector(".modal");
  const modalBtnDelete = document.querySelector(".modal-button-delete");
  const modalBtnCancel = document.querySelector(".modal-button-cancel");
  const popup = document.querySelector(".popup");
  const popupWrap = document.querySelector(".popup-wrap");
  const popupText = document.querySelector(".popup-text");
  let data = {};

  //Показать всплывающее окно
  function showPopup(borderColor, text) {
    popup.classList.remove("visually-hidden");
    popupWrap.style.borderColor = borderColor;
    popupText.textContent = text;
    //Удалить всплывающее окно
    setTimeout(() => {
      popup.classList.add("visually-hidden");
      location.reload();
    }, 2000);
  }

  //Обработка данных, полученных от сервера
  function getResponseServer(response) {
    if (response.answer == "success") {
      showPopup(
        "#3E90B2",
        "Запись удалена. Страница обновиться автоматически."
      );
    } else {
      showPopup(
        "#B35060",
        "Что-то пошло не так. Обновите страницу и попробуйте еще раз."
      );
    }
  }

  btnDelete.forEach((elem) => {
    elem.addEventListener("click", function (event) {
      event.preventDefault();
      let id = +event.target.dataset.id;
      data["id"] = id;
      modal.classList.remove("visually-hidden");
      modalBtnDelete.onclick = () => {
        sendAjaxQuery(url, "POST", getResponseServer, data);
        modal.classList.add("visually-hidden");
      };
      modalBtnCancel.onclick = () => {
        if (!modal.classList.contains("visually-hidden"))
          modal.classList.add("visually-hidden");
      };
    });
  });

  logout.onclick = () => {
    let cookie = document.cookie;
    let date = new Date();
    date.setTime(date.getTime() - 10 * 60 * 1000);
    let expires = date.toUTCString();
    document.cookie = `${cookie}; expires=${expires}; path=/`;
    location.href = "login";
  };
});
