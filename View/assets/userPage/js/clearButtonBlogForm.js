const clearButton = document.getElementById('clear_blog');

document.addEventListener('DOMContentLoaded', async () => {

    clearButton.addEventListener('click', async () => {
        const heading = document.getElementById('entry-heading');
            if (heading) heading.value = '';
        const short_dsc = document.getElementById('entry-short-dsc');
            if (short_dsc) short_dsc.value = '';
        const long_dsc = document.getElementById('entry-long-dsc');
            if (long_dsc) long_dsc.value = '';
        const main_image = document.getElementById('entry-main-image');
            if (main_image) main_image.value = '';
    });

})
