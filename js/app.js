document.getElementById('feedbackForm').addEventListener('submit', function (e) {
    let isValid = true;

    // Очистка предыдущих ошибок
    document.querySelectorAll('.error').forEach((el) => (el.textContent = ''));

    // Проверка имени
    const name = document.getElementById('name').value.trim();
    if (name.length < 2 || name.length > 50) {
        document.getElementById('nameError').textContent = 'Имя должно быть от 2 до 50 символов.';
        isValid = false;
    }

    // Проверка email
    const email = document.getElementById('email').value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Введите корректный Email.';
        isValid = false;
    }

    // Проверка сообщения
    const message = document.getElementById('message').value.trim();
    if (message.length < 10 || message.length > 500) {
        document.getElementById('messageError').textContent = 'Сообщение должно быть от 10 до 500 символов.';
        isValid = false;
    }

    if (!isValid) {
        e.preventDefault(); // Остановить отправку формы, если есть ошибки
    }
});