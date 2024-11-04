class Blog {

    constructor() {
        this.make
        this.model
        this.jahr_from
        this.jahr_up 
        this.kw_from
        this.kw_up
        this.image1 
        this.image2
    }

    setInfo(make, model, jahr_from, jahr_up, kw_from, kw_up, image1, image2, image3, image4) {
        this.make = make;
        this.model = model;
        this.jahr_from = jahr_from;
        this.jahr_up = jahr_up;
        this.kw_from = kw_from;
        this.kw_up = kw_up;
        this.image1 = image1;
        this.image2 = image2;
        this.image3 = image3;
        this.image4 = image4;
    }

    getInfo() {
        return [ this.make, this.model, this.jahr_from, this.jahr_up, this.kw_from, this.kw_up, this.image1, this.image2, this.image3, this.image4 ];
    }

    async save() {
        try {
            const response = await fetch('http://localhost:5000/api/posts/createPost', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    make: this.make,
                    model: this.model,
                    jahr_from: this.jahr_from,
                    jahr_up: this.jahr_up,
                    kw_from: this.kw_from,
                    kw_up: this.kw_up,
                    image1: this.image1,
                    image2: this.image2,
                    image3: this.image3,
                    image4: this.image4
                })
            });
            const data = await response.json();
            return data;
        } catch (err) {
            console.log(err)
        }
    }
}