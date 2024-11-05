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
            const checkUser = await fetch(`http://localhost:5000/api/posts/checkUser?login=${login.value}`)
            const checkUserRestrictuion = await checkUser.json();
            console.log(checkUserRestrictuion)
            if(checkUserRestrictuion.restricted == true){
                alert("Der Benutzer ist gesperrt, bitte wenden Sie sich an den Adminsitrator!")
                return 
            }
            const response = await fetch(`http://localhost:5000/api/posts/loginUser?login=${login.value}&password=${password.value}`);
            const data = await response.json();
            console.log(data.login, data.password)
            if(response.status == 401) {
                const decreaseAttempt = await fetch(`http://localhost:5000/api/posts/decreaseLoginAttempt?&login=${login.value}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });
                
                const data = await decreaseAttempt.json();
                console.log(data.login_attempts)
                if(data.login_attempts > 3){
                    const restrictUser = await fetch(`http://localhost:5000/api/posts/restrictUser?&login=${login.value}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    });
                    if(restrictUser.status == 201){
                        alert("Invalides Login oder Passwort")
                    }

                }
                alert("Invalides Login oder Passwort")
            }
             else {
                const resetLoginAttempts = await fetch(`http://localhost:5000/api/posts/resetLoginAttempts?login=${login.value}&password=${password.value}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                });
                const data = await resetLoginAttempts.json();
                if(data){
                 window.location.href = 'http://localhost:3000/View/admin.php';	
             }
            }
        }

    })




})