document.addEventListener('DOMContentLoaded', async () => {

    const login = document.getElementById('login')
    const password = document.getElementById('password')
    const firstName = document.getElementById('firstName')
    const lastName = document.getElementById('lastName')
    const submit = document.getElementById('submit')
    const error = document.getElementById('error')

    submit.addEventListener('click', async () => {
        const errorParagraph = error.querySelector('p');
        const hashedPassword = CryptoJS.SHA256(password).toString();

        if (!validateEmail(login.value)) {
            alert('Bitte geben Sie eine gültige E-Mail-Adresse ein.');
            return;
        }

        try {
            const response = await fetch(`http://localhost:5000/api/posts/register?login=${login.value}&hashedPassword=${hashedPassword}&lastName=${lastName}&firstName=${firstName}`, {
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
                    // setCookie('login', login.value, 7);
                    // setCookie('password', hashedPassword, 7);

                    //window.location.href = `http://localhost:3000/View/admin.php?login=${login.value}&hashedPassword=${hashedPassword}`; // Weiterleitung zur admin.php
            } else {
                const errorData = await response.json();
                error.style.display = 'flex';
                errorParagraph.textContent = errorData.error || 'Registration failed';
            }
        } catch (err) {
            error.style.display = 'flex';
            errorParagraph.textContent = 'An error occurred. Please try again later.';
            console.error('Error:', err);
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