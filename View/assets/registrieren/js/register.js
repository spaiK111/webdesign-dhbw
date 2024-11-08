document.addEventListener('DOMContentLoaded', async () => {

    const login = document.getElementById('login')
    const password = document.getElementById('password')
    const firstName = document.getElementById('firstName')
    const lastName = document.getElementById('lastName')
    const submit = document.getElementById('submit')
    const error = document.getElementById('error')

    submit.addEventListener('click', async () => {
        const errorParagraph = error.querySelector('p');

        const hashedPassword = CryptoJS.SHA256(password.value).toString();

        if (!validateEmail(login.value)) {
            alert('Bitte geben Sie eine gültige E-Mail-Adresse ein.');
            return;
        }

        try {
            const response = await fetch(`http://localhost:5000/api/posts/register?login=${login.value}&hashedPassword=${hashedPassword}&lastName=${lastName.value}&firstName=${firstName.value}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
            });
            const data = await response.json();

            if (response.status === 201) {
                    if (!data.validated) {
                        alert('Bitte validieren Sie Ihr Konto. Eine E-Mail wurde an Ihre Adresse gesendet.');
                        await fetch(`http://localhost:5000/api/posts/sendValidationEmail?email=${data.login}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                        });
                        return;
                    }

                    window.location.href = `http://localhost:3000/View/login.php`; // Weiterleitung zur admin.php
            } else {
               alert('Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.');
            }
        } catch (err) {
            alert('Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.');
        }

    })

    function setCookie(name, value, days) {
        const d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    function emptyCookie(name) {
        document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

})