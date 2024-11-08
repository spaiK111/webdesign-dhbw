document.addEventListener('DOMContentLoaded', async () => {

    const addButton = document.getElementById('add_blog_txt');
    const addButtonCar = document.getElementById('add_blog_default');

    // Blog Form
    const heading = document.getElementById('entry-heading')
    const short_dsc = document.getElementById('entry-short-dsc')
    const long_dsc = document.getElementById('entry-long-dsc')
    const main_img = document.getElementById('entry-main-image')


    const authorFirstname = addButton.getAttribute('authorFirstname');
    const authorLastname = addButton.getAttribute('authorLastname');


    addButton.addEventListener('click', async () => {  

        const headingValue = heading.value;
        const short_dscValue = short_dsc.value;
        const long_dscValue = long_dsc.value;
        const main_imgValue = main_img.value;

        try {
            const response = await fetch(`http://localhost:5000/api/posts/createBlogTxt?heading=${headingValue}&short_dsc=${short_dscValue}&long_dsc=${long_dscValue}&image=${main_imgValue}&authorFirstname=${authorFirstname}&authorLastname=${authorLastname}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();

            alert('Blogpost wurde erfolgreich erstellt');
        } catch (error) {
            console.error('Fehler beim Erfassen:', error);
        }
    })

})