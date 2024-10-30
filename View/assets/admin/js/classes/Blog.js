class Blog {

    constructor(make, jahr, link) {
        this.jahr = jahr; 
        this.make = make;   
        this.link = link;
    }

    setJahr(jahr) {
        this.jahr = jahr;
    }

    setMake(make) {
        this.make = make;
    }

    setLinkOne(link_one) {
        this.link_one = link_one;
    }

    getJahr() {
        return this.jahr;
    }

    getMake() {
        return this.make;
    }

    getLinkOne() {
        return this.link_one;
    }

}