document.addEventListener('DOMContentLoaded', async () => {


    const clearButton = document.getElementById('clear_blog');
    const addButton = document.getElementById('add_blog_txt');
    const addButtonCar = document.getElementById('add_blog_default');

    // Viet Form

    const heading = document.getElementById('entry-heading')
    const short_dsc = document.getElementById('entry-short-dsc')
    const long_dsc = document.getElementById('entry-long-dsc')
    const main_img = document.getElementById('entry-main-image')


    //Main Form

    // Main Form
    const hsn = document.getElementById('entry-hsn')
    const tsn = document.getElementById('entry-tsn')
    const make = document.getElementById('entry-make-area')
    const model = document.getElementById('entry-model-area')
    const year_from = document.getElementById('entry-year-from')
    const year_up = document.getElementById('entry-year-up')
    const kw_from = document.getElementById('entry-kw-from')
    const kw_up = document.getElementById('entry-kw-up')
    const category = document.getElementById('entry-category')
    const engine = document.getElementById('entry-engine')
    const fueltype = document.getElementById('entry-fueltype')
    const image1 = document.getElementById('entry-image1')
    const image2 = document.getElementById('entry-image2')
    const image3 = document.getElementById('entry-image3')
    const image4 = document.getElementById('entry-image4')


    addButtonCar.addEventListener('click', async () => {
            
            const hsnValue = hsn.value;
            const tsnValue = tsn.value;
            const makeValue = make.value;
            const modelValue = model.value;
            const year_fromValue = year_from.value;
            const year_upValue = year_up.value;
            const kw_fromValue = kw_from.value;
            const kw_upValue = kw_up.value;
            const categoryValue = category.value;
            const engineValue = engine.value;
            const fueltypeValue = fueltype.value;
            const image1Value = image1.value;
            const image2Value = image2.value;
            const image3Value = image3.value;
            const image4Value = image4.value;
    
            try {
                const response = await fetch(`http://localhost:5000/api/posts/createCar?hsn=${hsnValue}&tsn=${tsnValue}&make=${makeValue}&model=${modelValue}&year_from=${year_fromValue}&year_up=${year_upValue}&kw_from=${kw_fromValue}&kw_up=${kw_upValue}&category=${categoryValue}&engine=${engineValue}&fuelType=${fueltypeValue}&image_1=${image1Value}&image_2=${image2Value}&image_3=${image3Value}&image_4=${image4Value}`, {
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
                alert('Car created successfully');
            } catch (error) {
                console.error('Error fetching pagination:', error);
            }
    })


    addButton.addEventListener('click', async () => {  

        const headingValue = heading.value;
        const short_dscValue = short_dsc.value;
        const long_dscValue = long_dsc.value;
        const main_imgValue = main_img.value;


        try {
            const response = await fetch(`http://localhost:5000/api/posts/createBlogTxt?heading=${headingValue}&short_dsc=${short_dscValue}&long_dsc=${long_dscValue}&image=${main_imgValue}`, {
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