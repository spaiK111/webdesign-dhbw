export async function validateFields(ps1Value, ps2Value) {
    console.log(ps1Value, ps2Value)
    if(parseInt(ps1Value) > parseInt(ps2Value)) {
        alert('PS1 darf nicht größer als PS2 sein');
        return false;
    }

    if(ps1Value < 0 || ps2Value < 0) {
        alert('PS darf nicht negativ sein');
        return false;
    }


    if(parseInt(ps1Value) > 1000 || parseInt(ps2Value) > 1000) {
        alert('PS darf nicht größer als 1000 sein');
        return false;
    }

    return true;
}