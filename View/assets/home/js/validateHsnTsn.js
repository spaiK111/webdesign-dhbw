export async function validateHsnTsn(hsn, tsn) {

    if(parseInt(hsn) < 0 || tsn < 0) {
        alert('HSN und TSN dürfen nicht negativ sein');
        return false;
    }

    return true;

}