import { CarsBuilder } from "./CarsBuilder.js";
import { PaginationBuilder } from "./PaginationBuilder.js";

document.addEventListener('DOMContentLoaded', async () => {
    const searchInputHsn = document.getElementById('search-hsn');
    const searchInputTsn = document.getElementById('search-tsn');
    const search_btn = document.getElementById('filter-tsn-hsn-button');    


    search_btn.addEventListener('click', async () => {
        const hsn = searchInputHsn.value;
        const tsn = searchInputTsn.value;
        console.log('Selected value:', hsn, tsn);

        const uid = `${hsn +"_"+ tsn}`;

        try{
            await fetch(`http://localhost:5000/api/posts/getPostByUid/?uid=${uid}`)
            window.location.href = `http://127.0.0.1:5500/view/preset.php?uid=${uid}`
        }
        catch(err){
            console.log(err)
        }
    })

});