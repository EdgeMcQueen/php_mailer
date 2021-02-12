// перебираем все формы на странице с помощью массива
let forms = document.querySelectorAll('form');

forms.forEach(form => {
    let phone = form.querySelector('[data-fm="Phone"]');
    let submit = form.querySelector('[type="submit"]');

    // исключаем перезагрузку страницы после отправки
    // перехватываем событие по нажатию на кнопуку отправки
    submit.addEventListener('click', function (e) {
        e.preventDefault();
        ajaxHandler(form);
    });
});


function ajaxHandler(form) {
    // получаем поля формы
    const data = new FormData(form);
console.log(data);

    axios.post('/js/handlers/client.php', data)
        .then(function (response) {
            // let message = document.querySelector('.wpcf7-response-output');
            //   message.insertAdjacentHTML("afterend", "<span class='success'>Ваша заявка успешно отправлена!</span>")
            console.log('Success!');
        })
        .catch(function (error) {
            // let message = document.querySelector('.wpcf7-response-output');
            // message.insertAdjacentHTML("afterend", "<span class='error'>Ваша заявка не отправлена!</span>")
            console.log('Error!');
        })
};