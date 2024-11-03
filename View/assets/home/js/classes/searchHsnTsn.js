document.addEventListener('DOMContentLoaded', async () => {
    const searchInputHsn = document.getElementById('hsn-input');
    const searchInputTsn = document.getElementById('tsn-input');
    const search_btn = document.getElementById('first-filter-button-btn');    


    search_btn.addEventListener('click', async () => {
        const hsn = searchInputHsn.value;
        const tsn = searchInputTsn.value;
        if(!hsn || !tsn) {
            alert('Bitte geben Sie HSN und TSN ein');
            return;
        }
        const validated = await validateFields(hsn, tsn);
        console.log('Selected value:', hsn, tsn);

        if(validated){
            const uid = `${hsn +"_"+ tsn}`;

            try{
                await fetch(`http://localhost:5000/api/posts/getPostByUid/?uid=${uid}`)
                window.location.href = `http://127.0.0.1:5500/View/preset.php?uid=${uid}`
            }
            catch(err){
                console.log(err)
            }
        }

       
    })


});

async function validateFields(hsn, tsn) {

    if(hsn < 0 || tsn < 0) {
        alert('HSN und TSN dürfen nicht negativ sein');
        return false;
    }

    return true;

}