import { CarsBuilder } from "./CarsBuilder.js";
import { PaginationBuilder } from "./PaginationBuilder.js";
import { validateFields }  from "../validateFileds.js";

const ff_Item = document.querySelector('.pagination2 li a.ff');
const bb_Item = document.querySelector('.pagination2 li a.bb');

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


    const paginationItems = document.querySelectorAll('.pagination2 li a.page');

    let pagination = 0;

    await paginationBuilder.buildPagination(pagination, makeValue);
    await paginationBuilder.changeActivePage();
    await carsBuilder.fetchBlogPosts(pagination, makeValue, modelValue, ps1Value,ps2Value, categoryValue, fueltypeValue)

    submit.addEventListener('click', async () => {
        const modelValue = model.value
        const ps1Value = ps1.value
        const ps2Value = ps2.value
        const categoryValue = category.value
        const fueltypeValue = fueltype.value
        const makeValue = make.value;
        const errorParagraph = error.querySelector('p');
            const result = await validateFields(ps1Value, ps2Value);
            if(!result){
                error.style.display = 'block'
                errorParagraph.textContent = 'Fehler bei der Eingabe';
            }
            await carsBuilder.deleteOldPosts(); 
            await carsBuilder.fetchBlogPosts(pagination, makeValue, modelValue, ps1Value,ps2Value, categoryValue, fueltypeValue)

    })
    
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
            model.removeAttribute("disabled");
            await createmake();
        }
        else {
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

    async function createmake() {
        try {
            const makeValue = make.value
            const response = await fetch(`http://localhost:5000/api/posts/getAllMakePosts?make=${makeValue}`); 
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = await response.json();
    
            clearOptionsExceptDefault('model')

            const uniqueModels = new Set();
    

            data.forEach(entry => {
                if (entry.model) {
                    uniqueModels.add(entry.model);
                }
            });
    
            const selectElement = document.getElementById('model'); 
            uniqueModels.forEach(model => {
                const option = document.createElement('option');
                option.value = model;
                option.textContent = model;
                selectElement.appendChild(option);
            });
    
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