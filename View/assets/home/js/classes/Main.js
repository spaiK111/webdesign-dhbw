import { CarsBuilder } from "./CarsBuilder.js";
import { PaginationBuilder } from "./PaginationBuilder.js";

document.addEventListener('DOMContentLoaded', async () => {
    const paginationBuilder = new PaginationBuilder();
    const carsBuilder = new CarsBuilder();

    const options = document.getElementById("make")

    const selectedValue = options.value;
    const model = document.getElementById('model')

    let pagination = 0;

    await paginationBuilder.buildPagination(pagination, selectedValue);
    await paginationBuilder.changeActivePage();
    await carsBuilder.fetchBlogPosts(pagination, selectedValue);


    

    const search_btn = document.getElementById('filter-button')

    search_btn.addEventListener('click', async () => {
        const selectedValue = options.value;
        console.log('Selected value:', selectedValue);

        await carsBuilder.deleteOldPosts(); 
        await carsBuilder.fetchBlogPosts(pagination, selectedValue);


    })

    const paginationItems = document.querySelectorAll('.pagination2 li a.page');
    paginationItems.forEach(item => {
        item.addEventListener('click', async function() {
            const pagination = parseInt(this.textContent) - 1;
            const selectedValue = options.value;


            await carsBuilder.deleteOldPosts(); 
            await carsBuilder.fetchBlogPosts(pagination, selectedValue);
        });
    });
    const ff_Item = document.querySelector('.pagination2 li a.ff');
    const bb_Item = document.querySelector('.pagination2 li a.bb');
    ff_Item.addEventListener('click', async () => {
        pagination = await paginationBuilder.getPagesCount() - 1;

        await carsBuilder.deleteOldPosts(); 

        const selectedValue = options.value;

        await carsBuilder.fetchBlogPosts(pagination, selectedValue);

        await paginationBuilder.setActivePage(pagination + 1);
        
    })

    options.addEventListener('change', async () => {
       
        if(options.value !== ' ') {
            model.removeAttribute("disabled");
            await createOptions();
        }
    })

    bb_Item.addEventListener('click', async () => {
        pagination = 0;

        await carsBuilder.deleteOldPosts(); 

        const selectedValue = options.value;

        await carsBuilder.fetchBlogPosts(pagination, selectedValue);

        await paginationBuilder.setActivePage(pagination + 1);
    })

    async function createOptions() {
        try {
            const response = await fetch('http://localhost:5000/api/posts/makeOptions'); // Replace with your actual API endpoint
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = await response.json();
            console.log('Data:', data);
            
            const model = document.getElementById('model');

            model.innerHTML = ''; // Clear existing options

            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Beliebig';
            model.appendChild(defaultOption);

            for(let i = 0; i < data.length; i++) {
                for(let j = 0; j < data[i].options.length; j++) {
                    const optionElement = document.createElement('option');
                    optionElement.value = data[i].options[j];
                    optionElement.textContent = data[i].options[j];
                    model.appendChild(optionElement);
                 }
            }   
            
            
        } catch (error) {
            console.error('There was a problem with the fetch operation:', error);
        }
    }

});