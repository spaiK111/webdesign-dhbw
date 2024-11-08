document.addEventListener('DOMContentLoaded', async () => {

    const addButton = document.getElementById('add_blog_txt');
    const addButtonCar = document.getElementById('add_blog_default');

    // Blog Form
    const heading = document.getElementById('entry-heading')
    const short_dsc = document.getElementById('entry-short-dsc')
    const long_dsc = document.getElementById('entry-long-dsc')
    const main_img = document.getElementById('entry-main-image')

    // Cars Form
    const hsn = document.getElementById('entry-hsn')
    const tsn = document.getElementById('entry-tsn')
    const make = document.getElementById('entry-make-area')
    const model = document.getElementById('entry-model-area')
    const year = document.getElementById('entry-year-area')
    const kw = document.getElementById('entry-kw-area')
    const category = document.getElementById('entry-category')
    const engine = document.getElementById('entry-engine')
    const fueltype = document.getElementById('entry-fueltype')

    // Cars Form Extended
    const hubraum = document.getElementById('entry-hubraum-area')
    const co2Wert = document.getElementById('entry-co2-area')
    const antriebsart = document.getElementById('entry-antrieb')
    const backVolumen = document.getElementById('entry-backVolumen-area')
    const maxSpeed = document.getElementById('entry-maxSpeed-area')

    // Cars Form Bilder 
    const image1 = document.getElementById('entry-image1')
    const image2 = document.getElementById('entry-image2')
    const image3 = document.getElementById('entry-image3')
    const image4 = document.getElementById('entry-image4')

    addButtonCar.addEventListener('click', async () => {
            
            // Werte auslesen
            const hsnValue = hsn.value;
            const tsnValue = tsn.value;
            const makeValue = make.value;
            const modelValue = model.value;
            const yearValue = year.value;
            const kwValue = kw.value;
            const categoryValue = category.value;
            const engineValue = engine.value;
            const fueltypeValue = fueltype.value;
            const image1Value = image1.value;
            const image2Value = image2.value;
            const image3Value = image3.value;
            const image4Value = image4.value;
            const author = "Login_user"

            const hubraumValue = hubraum.value;
            const co2WertValue = co2Wert.value;
            const antriebsartValue = antriebsart.value;
            const backVolumenValue = backVolumen.value;
            const maxSpeedValue = maxSpeed.value;

            try {

                const response = await fetch(`http://localhost:5000/api/posts/createCar?hsn=${hsnValue}&tsn=${tsnValue}&make=${makeValue}&model=${modelValue}&year=${yearValue}&kw=${kwValue}&category=${categoryValue}&engine=${engineValue}&fuelType=${fueltypeValue}&hubraum=${hubraumValue}&co2=${co2WertValue}&antrieb=${antriebsartValue}&backVolumen=${backVolumenValue}&maxSpeed=${maxSpeedValue}&image_1=${image1Value}&image_2=${image2Value}&image_3=${image3Value}&image_4=${image4Value}&author=${author}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                });
    
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
    
                const data = await response.json();

                alert('Das Fahrzeug wurde erfolgreich erstellt');
            } catch (error) {
                console.error('Fehler beim Erfassen von Fahrzeugen:', error);
            }
    })


    addButton.addEventListener('click', async () => {  

        const headingValue = heading.value;
        const short_dscValue = short_dsc.value;
        const long_dscValue = long_dsc.value;
        const main_imgValue = main_img.value;

        const authorFirstname = addButton.getAttribute('authorFirstname')
        const authorLastname = addButton.getAttribute('authorLastname');
        console.log("authorFirstname", authorFirstname)
        console.log("authorLastname", authorLastname)
        
        try {
            

            const response = await fetch(`http://localhost:5000/api/posts/createBlogTxt?heading=${headingValue}&short_dsc=${short_dscValue}&long_dsc=${long_dscValue}&image=${main_imgValue}&authorFirstname=${authorFirstname}&authorLastname=${authorLastname}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
            });

            if (!response.ok) {
                throw new Error('API Anfrage bei Blogeinträgen ist fehlgeschlagen');
            }

            const data = await response.json();

            alert('Blogeintrag wurde erfolgreich erstellt');
        } catch (error) {
            console.error('API Anfrage fehlgeschlagen:', error);
        }
    })

})