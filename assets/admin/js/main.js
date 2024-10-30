document.addEventListener('DOMContentLoaded', async () => {


    const clearButton = document.getElementById('clear_blog');
    const addButton = document.getElementById('add_blog');

    addButton.addEventListener('click', async () => {  
        const make = document.getElementById('make').value;
        const jahr = document.getElementById('year').value;
        const link = document.getElementById('link').value;

        try {
            const response = await fetch(`http://localhost:5000/api/posts?make=${make}&year=${jahr}&link=${link}`, {
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
        } catch (error) {
            console.error('Error fetching pagination:', error);
        }
    })

    clearButton.addEventListener('click', async () => {
        console.log("here")
        const make = document.getElementById('make');
        if (make) make.value = '';

        const year = document.getElementById('year');
        if (year) year.value = '';

        const link = document.getElementById('link');
        if (link) link.value = '';
    });

})