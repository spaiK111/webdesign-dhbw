document.addEventListener('DOMContentLoaded', () => {
    const likeCheckbox = document.getElementById('heart');
    const login = getCookie('login');
    const _id = window.location.search.split('=')[1];

    likeCheckbox.addEventListener('change', async () => {

        const isLiked = likeCheckbox.checked;
        console.log(isLiked);
        console.log(login);
        console.log(_id);


        try {
            const response = await fetch(`http://localhost:5000/api/posts/${isLiked ? 'like' : 'unlike'}Blog?login=${login}&_id=${_id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();
            console.log('Success:', data);
            alert(`Blog ${isLiked ? 'liked' : 'unliked'} successfully`);
        } catch (error) {
            console.error('Error:', error);
        }
    })

    })

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}