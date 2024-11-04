document.addEventListener('DOMContentLoaded', async () => {


    const clearButton = document.getElementById('clear_blog');
    const addButton = document.getElementById('add_blog_txt');

    const heading = document.getElementById('entry-heading').value;
    const short_dsc = document.getElementById('entry-short-dsc').value;
    const long_dsc = document.getElementById('entry-long-dsc').value;
    const main_img = document.getElementById('entry-main-image').value;

    addButton.addEventListener('click', async () => {  

        const headingValue = heading.value;
        const short_dscValue = short_dsc.value;
        const long_dscValue = short_dsc.value;
        const main_imgValue = main_img.value;

        // Viet Form
        const heading = document.getElementById('entry-heading').value;
        const short_dsc = document.getElementById('entry-short-dsc').value;
        const long_dsc = document.getElementById('entry-long-dsc').value;
        const main_img = document.getElementById('entry-main-image').value;


        // Main Form
        const hsn = document.getElementById('entry-hsn').value;


        try {
            const response = await fetch(`http://localhost:5000/api/posts/createBlogTxt?heading=${heading}&short_dsc=${short_dsc}&long_dsc=${long_dsc}&image=${main_img}`, {
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
            alert('Blogpost created successfully');
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