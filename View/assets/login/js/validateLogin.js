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
        if(login.value === '' || password.value === '') {
            error.style.display = 'flex'
            errorParagraph.textContent = 'Please fill in all fields';
        }
        else {
            const response = await fetch(`http://localhost:5000/api/posts//login?login=${login.value}&password=${password.value}`);
            const data = await response.json();
            if(data == null) {
                error.style.display = 'flex'
                errorParagraph.textContent = 'Invalid login or password';
            }
             else {
                 window.location.href = 'http://localhost:3000/View/admin.php';	
             }
        }

    })




})