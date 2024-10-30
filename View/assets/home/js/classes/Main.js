import { CarsBuilder } from "./CarsBuilder.js";
import { PaginationBuilder } from "./PaginationBuilder.js";

document.addEventListener('DOMContentLoaded', async () => {
    const paginationBuilder = new PaginationBuilder();
    const carsBuilder = new CarsBuilder();

    const options = document.getElementById("make")

    const selectedValue = options.value;


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

    bb_Item.addEventListener('click', async () => {
        pagination = 0;

        await carsBuilder.deleteOldPosts(); 

        const selectedValue = options.value;

        await carsBuilder.fetchBlogPosts(pagination, selectedValue);

        await paginationBuilder.setActivePage(pagination + 1);
    })

});