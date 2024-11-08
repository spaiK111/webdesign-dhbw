import { CarsBuilder } from "./CarsBuilder.js";
import { PaginationBuilder } from "./PaginationBuilder.js";

document.addEventListener('DOMContentLoaded', async () => {
    const paginationBuilder = new PaginationBuilder();
    const carsBuilder = new CarsBuilder();

    const make = document.getElementById("make")
    const model = document.getElementById('model')
    const ps1 = document.getElementById('ps1')
    const ps2 = document.getElementById('ps2')
    const category = document.getElementById('category')
    const fueltype = document.getElementById('fueltype')

    const modelValue = model.value
    const ps1Value = ps1.value
    const ps2Value = ps2.value
    const categoryValue = category.value
    const fueltypeValue = fueltype.value
    const makeValue = make.value;

    const submit = document.getElementById('filter-button')
    const error = document.getElementById('error')


    let pagination = 0;

    await paginationBuilder.buildPagination(pagination, makeValue);
    await paginationBuilder.changeActivePage();
    await carsBuilder.fetchBlogPosts(pagination, makeValue, modelValue, ps1Value,ps2Value, categoryValue, fueltypeValue)


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
        const modelValue = model.value
        const ps1Value = ps1.value
        const ps2Value = ps2.value
        const categoryValue = category.value
        const fueltypeValue = fueltype.value
        const makeValue = make.value;
        const errorParagraph = error.querySelector('p');
            const result = await validateFields();
            if(!result){
                error.style.display = 'block'
                errorParagraph.textContent = 'Fehler bei der Eingabe';
            }

            await carsBuilder.deleteOldPosts(); 
            await carsBuilder.fetchBlogPosts(pagination, makeValue, modelValue, ps1Value,ps2Value, categoryValue, fueltypeValue)



    })




    const paginationItems = document.querySelectorAll('.pagination2 li a.page');
    
    paginationItems.forEach(item => {
        item.addEventListener('click', async function() {
            const pagination = parseInt(this.textContent) - 1;
            const modelValue = model.value
            const ps1Value = ps1.value
            const ps2Value = ps2.value
            const categoryValue = category.value
            const fueltypeValue = fueltype.value
            const makeValue = make.value;
            await carsBuilder.deleteOldPosts(); 
            await carsBuilder.fetchBlogPosts(pagination, makeValue, modelValue, ps1Value,ps2Value, categoryValue, fueltypeValue)
        });
    });
    const ff_Item = document.querySelector('.pagination2 li a.ff');
    const bb_Item = document.querySelector('.pagination2 li a.bb');
    ff_Item.addEventListener('click', async () => {
        pagination = await paginationBuilder.getPagesCount() - 1;

        await carsBuilder.deleteOldPosts(); 

        const modelValue = model.value
        const ps1Value = ps1.value
        const ps2Value = ps2.value
        const categoryValue = category.value
        const fueltypeValue = fueltype.value
        const makeValue = make.value;

        await carsBuilder.fetchBlogPosts(pagination, makeValue, modelValue, ps1Value,ps2Value, categoryValue, fueltypeValue)

        await paginationBuilder.setActivePage(pagination + 1);
        
    })

    make.addEventListener('change', async () => {
       
        if(make.value !== '') {
            console.log("111")
            model.removeAttribute("disabled");
            await createmake();
        }
        else {
            console.log("222")
            model.setAttribute("disabled", "true");
            clearOptionsExceptDefault('model')
        }
    })

    bb_Item.addEventListener('click', async () => {
        pagination = 0;

        await carsBuilder.deleteOldPosts(); 

        const modelValue = model.value
        const ps1Value = ps1.value
        const ps2Value = ps2.value
        const categoryValue = category.value
        const fueltypeValue = fueltype.value
        const makeValue = make.value;

        await carsBuilder.fetchBlogPosts(pagination, makeValue, modelValue, ps1Value,ps2Value, categoryValue, fueltypeValue)

        await paginationBuilder.setActivePage(pagination + 1);
    })

    async function validateFields() {


        if(ps1Value > ps2Value) {
            alert('PS1 darf nicht größer als PS2 sein');
            return false;
        }

        if(ps1Value < 0 || ps2Value < 0) {
            alert('PS darf nicht negativ sein');
            return false;
        }


        if(ps1Value > 1000 || ps2Value > 1000) {
            alert('PS darf nicht größer als 1000 sein');
            return false;
        }

        return true;

    }

    async function createmake() {
        try {
            const makeValue = make.value
            const response = await fetch(`http://localhost:5000/api/posts/getAllMakePosts?make=${makeValue}`); // Replace with your actual API endpoint
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = await response.json();
            console.log('Data:', data);
    
            clearOptionsExceptDefault('model')
            // Create a set to store unique models
            const uniqueModels = new Set();
    
            // Iterate over the entries and add models to the set
            data.forEach(entry => {
                if (entry.model) {
                    uniqueModels.add(entry.model);
                }
            });
    
            // Create options from the unique models
            console.log("Unique-Models", uniqueModels)
            const selectElement = document.getElementById('model'); // Replace with your actual select element ID
            uniqueModels.forEach(model => {
                const option = document.createElement('option');
                option.value = model;
                option.textContent = model;
                selectElement.appendChild(option);
            });
    
            console.log('Unique models:', Array.from(uniqueModels));
        } catch (err) {
            console.error('Error:', err);
        }
    }

    function clearOptionsExceptDefault(selectElementId) {
        const selectElement = document.getElementById(selectElementId);
        const options = selectElement.options;
    
        for (let i = options.length - 1; i >= 0; i--) {
            if (options[i].value !== "") {
                selectElement.remove(i);
            }
        }
    }

});