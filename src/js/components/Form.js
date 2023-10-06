import IMask from 'imask';

export default function Form() {
  // открытие/закрытие селекта
  const selectHead = document.querySelector('.form-select .form-select-head');
  if (selectHead) {
    selectHead.addEventListener('click', function (e) {
      const selectContainer = this.parentElement;
      if (selectContainer.classList.contains('--open')) {
        selectContainer.classList.remove('--open');
      } else {
        selectContainer.classList.add('--open');
      }
    });
  }

  // Навешивание событий на элементы выпадающего списка
  const selectType = document.querySelector('#select-type');
  const selectsItems = document.querySelectorAll('.form-select .form-select-body__item');
  if (selectsItems) {
    selectsItems.forEach((selectItem) => {
      selectItem.addEventListener('click', function (e) {
        const openSelect = document.querySelector('.form-select.--open');
        if (openSelect) {
          openSelect.classList.remove('--open');
        }
        const headElem = this.closest('.form-select').querySelector('.form-select-head__text');
        headElem.innerHTML = this.innerHTML;
        selectType.value = this.innerHTML;
      });
    });
  }

  // прикрепление файлов
  const dropArea = document.querySelector('.form-file__area');
  const dropList = document.querySelector('.form-file-list');
  let elements = [];

  if (dropArea) {
    // сброс событий по умолчанию
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
      dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
      e.preventDefault();
      e.stopPropagation();
    }

    // ховер при наведении файла
    ['dragenter', 'dragover'].forEach(eventName => {
      dropArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
      dropArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
      dropArea.classList.add('highlight');
    }

    function unhighlight(e) {
      dropArea.classList.remove('highlight');
    }

    // обработка загрузки
    dropArea.addEventListener('drop', handleDrop, false)

    function handleDrop(e) {
      let dt = e.dataTransfer;
      let files = dt.files;

      handleFiles(files);
    }

    const input = document.querySelector('#fileElem');
    input.addEventListener('change', (e) => {
      handleFiles(e.target.files);
      input.value = "";
    });

    // работа с массивом файлов
    function handleFiles(files) {
      elements = [...files];
      let bodyList = '';
      let checked = false;
      const errText = dropArea.closest('.form-file').querySelector('.form-file__err');
      if (elements.length > 0) {
        elements.forEach(element => {
          let ext = element.name.split('.').pop();
          if ((ext === 'jpg' || ext === 'png' || ext === 'docx' || ext === 'pdf') && (element.size <= 10 * 1024 * 1024)) {
            checked = true;
          }
          bodyList +=
            `<div class="form-file-list__item">
              <div class="form-file-list__info">
                  <img src="${dropList.dataset.filePath}" width="24" height="24" loading="lazy" decoding= "async" alt="">
                  <span>`+ element['name'] + `</span>
              </div>
              <div class="form-file-list__delete">
                  <img src="${dropList.dataset.deletePath}" width="24" height="24" loading="lazy" decoding= "async" alt="">
              </div>
            </div>`;
        });
        if (checked) {
          errText.classList.remove('--visible');
          dropList.innerHTML = bodyList;
          dropArea.classList.add('--hidden');
          let deleteBtns = dropList.querySelectorAll('.form-file-list__delete');
          deleteBtns.forEach(btn => {
            btn.addEventListener('click', () => {
              const btnParent = btn.closest('.form-file-list__item');
              const elementName = btnParent.querySelector('span').innerHTML;
              btnParent.remove();
              elements.forEach((element, index) => {
                if (element['name'] === elementName) {
                  elements.splice(index, 1);
                  if (elements.length < 1) {
                    dropArea.classList.remove('--hidden');
                  };
                }
              });
            });
          });
        } else {
          elements = [];
          dropArea.closest('.form-file').querySelector('.form-file__input').value = "";
          errText.classList.add('--visible');
        }
      }
    }

    // маска для телефона
    const phoneInput = document.querySelector('#form #phone');
    const phoneMask = new IMask(phoneInput, {
      mask: "+{7} (000) 000 00-00",
    });

    //Валидация
    function CheckText(element) {
      if (element.value !== '') {
        element.closest('.form__item').classList.remove('err');
        return true;
      } else {
        element.closest('.form__item').classList.add('err');
      }
    }

    function CheckPhone(element) {
      if (phoneMask.masked.isComplete && element.value !== '') {
        element.closest('.form__item').classList.remove('err');
        return true;
      } else {
        element.closest('.form__item').classList.add('err');
      }
    }

    function CheckBox(element) {
      if (element.checked) {
        element.closest('.form__item').classList.remove('err');
        return true;
      } else {
        element.closest('.form__item').classList.add('err');
      }
    }

    function CheckSelect(element) {
      if (element.value !== '0') {
        element.closest('.form__item').classList.remove('err');
        return true;
      } else {
        element.closest('.form__item').classList.add('err');
      }
    }

    function CheckValidate(form) {
      const name = CheckText(form.querySelector('#fio'));
      const phone = CheckPhone(form.querySelector('#phone'));
      const confidence = CheckBox(form.querySelector('#confidence'));
      const selectType = CheckSelect(form.querySelector('#select-type'));
      return name && phone && confidence && selectType;
    }

    const form = document.querySelector('#form');
    // отправка формы
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const completed = document.querySelector('#form-completed');
      const modalContainer = completed.closest('.modal__inner');
      const button = form.querySelector('button');

      const checkVal = CheckValidate(form);
      if (checkVal) {

        button.setAttribute('disabled', '');
        button.querySelector('.button-text').innerHTML = 'Отправка...';

        const FData = new FormData(form);
        if (elements.length > 0) {
          elements.forEach((element, i) => {
            FData.append('file-' + i, element);
          });
        }
        FData.append('action', 'formSend');
        fetch("/wp-admin/admin-ajax.php", {
          method: "POST",
          body: FData,
        })

          .then((response) => {
            if (response.status !== 200) {
              return Promise.reject();
            }
            return response.text()
          })
          .then((response) => {
            console.log(response);
            form.classList.add('--hidden');
            completed.classList.remove('--hidden');
            modalContainer.classList.add('completed');
            button.removeAttribute('disabled');
            button.querySelector('.button-text').innerHTML = 'Отправить';
            form.reset();
            document.querySelector('.form-select-head__text').innerHTML = 'Выберите тип помещения';
            elements = [];
            dropArea.classList.remove('--hidden')
            dropList.innerHTML = '';
            dropArea.closest('.form-file').querySelector('.form-file__input').value = "";
          })
          .catch((err) => console.log(err))
      }
    })
  }
}