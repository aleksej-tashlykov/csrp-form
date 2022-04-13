//Получение данных из полей формы
function getFormValue(data, arr) {
  data.forEach((elem) => {
    arr[elem.name] = elem.value;
  });
  return arr;
}

//Формирование строки данных для отправки GET/POST запроса
function convertFormData(data) {
  let query = "";
  for (const key in data) {
    query += `${key}=${data[key]}&`;
  }
  return query;
}

//Отправка AJAX-запроса и передача данных
function sendAjaxQuery(url, method, handlerResponse, data) {
  let xhttp = new XMLHttpRequest();
  xhttp.open(method, url, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.responseType = "json";
  xhttp.send(convertFormData(data));
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      handlerResponse(this.response);
    }
  };
}

//Сброс выпадающего списка до значения по умолчанию
function resetFormSelect(elem) {
  let options = elem.options;
  let parent = elem.parentNode;
  for (let i = 0; i < options.length; i++) {
    options[i].selected = options[i].defaultSelected;
  }
  parent.classList.remove("valid");
}

//Очищение полей формы
function clearFormTextField(elem) {
  for (let i = 0; i < elem.length; i++) {
    elem[i].value = "";
    elem[i].classList.remove("valid");
  }
}

//Замена нескольких пробелов на один пробел
function replaceLongSpace(elem) {
  return elem.value.replace(/\s+/g, " ").trim();
}

//Проверка текстовых полей формы на пустое значение
function checkEmptyField(event) {
  let item = event.target;
  item.value = item.value.trim();
  if (item.value.length == 0) {
    item.nextElementSibling.textContent = "Заполните поле";
    item.classList.add("invalid");
  } else {
    item.classList.add("valid");
  }
}

//Удаление сообщения об ошибке при валидации полей формы
function removeError(event) {
  let item = event.target;
  if (item.tagName === "SELECT") {
    let error = item.parentElement.nextElementSibling;
    if (error.length !== 0) {
      error.textContent = "";
      item.parentElement.classList.remove("invalid");
    }
  } else {
    let error = item.nextElementSibling;
    if (error.length !== 0) {
      error.textContent = "";
      item.classList.remove("invalid");
    }
  }
}

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
  }, 2000);
}

//Проверка полей формы на пустое значение перед оптравкой данных AJAX-запросом
function checkValueFieldsBeforeSubmit(elem) {
  let error = true;
  for (let i = 0; i < elem.length; i++) {
    elem[i].value = elem[i].value.trim();
    if (elem[i].value.length == 0) {
      error = false;
      if (elem[i].tagName === "SELECT") {
        elem[i].parentElement.nextElementSibling.textContent =
          "Выберите один из вариантов";
        elem[i].parentElement.classList.add("invalid");
      } else {
        elem[i].nextElementSibling.textContent = "Заполните поле";
        elem[i].classList.add("invalid");
      }
    }
  }
  return error;
}

//Удаление символов в текстовых полях вормы клавишами Backspace и Delete
function deleteLastCharacter(event) {
  let item = event.target;
  if ((event.keyCode == 8 || event.keyCode == 46) && item.value.length == 1) {
    item.value = "";
  }
}
