import { CarsBuilder } from "./CarsBuilder.js";
import { PaginationBuilder } from "./PaginationBuilder.js";

document.addEventListener('DOMContentLoaded', async () => {
    const paginationBuilder = new PaginationBuilder();
    const carsBuilder = new CarsBuilder();

    let pagination = 0;

    await paginationBuilder.buildPagination(pagination);
    await paginationBuilder.changeActivePage();
    await carsBuilder.fetchBlogPosts(pagination);

    const paginationItems = document.querySelectorAll('.pagination2 li');
        paginationItems.forEach(item => {
                item.addEventListener('click', async function() {
                    pagination = parseInt(this.querySelector('a').textContent) - 1;
    
                    await carsBuilder.deleteOldPosts(); 
    
                    await carsBuilder.fetchBlogPosts(pagination);
                })
        })

});