document.addEventListener('DOMContentLoaded', async () => {
    const login = document.getElementById('login')
    const password = document.getElementById('password')
    const submit = document.getElementById('submit')
    const error = document.getElementById('error')

    // Get all elements with class="closebtn"
    var close = document.getElementsByClassName("closebtn");
    var i;

// Loop through all close buttons
    for (i = 0; i < close.length; i++) {
  // When someone clicks on a close button
    close[i].onclick = function(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var div = this.parentElement;

    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
    setTimeout(function(){ div.style.display = "none"; }, 200);
        }
    }   

    submit.addEventListener('click', async () => {
        const errorParagraph = error.querySelector('p');
        try {
            const response = await fetch('http://localhost:5000/api/posts/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    login: login.value,
                    password: password.value
                })
            });

            if (response.status === 201) {
                const data = await response.json();
                window.location.href = 'http://localhost:3000/View/admin.php';
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
    }
)
})