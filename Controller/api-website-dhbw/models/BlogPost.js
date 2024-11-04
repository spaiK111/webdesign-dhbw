const mongoose = require('mongoose');

const BlogPostSchema = new mongoose.Schema({
    uid: {type: String, required: true},
    hsn: {type: Number, required: true},
    tsn: {type: String, required: true},
    make: {type: String, required: true},
    model: {type: String, required: true},
    year: { type: Number, required: true },
    kw: { type: Number, required: true }, // Wert muss weg da die Werte in KW_FROM und KW_UP gespeichert werden
    category: {type: String, required: true},
    engine: {type: String, required: true},
    fuelType: {type: String, required: true},
    image_1: {type: String, required: true},
    image_2: {type: String, required: true},
    image_3: {type: String, required: true},
    image_4: {type: String, required: true},
    createdAt: { type: Number, default: Date.now() },
    author: { type: String, default: "Unknown" },
    // Neue Attribute:
    hubraum: { type: Number, deafult: 1993 }, // in ccm
    co2Wert: { type: Number, default: 120 }, // in g/km
    antriebsart: { type: String, default: "Unbekannt" },
    backVolumen: { type: Number, default: 2 }, // in Litern
    maxSpeed: { type: Number, default: 100 }, // in km/h
    
});


const BlogPost = mongoose.model('cars_blogs', BlogPostSchema);

module.exports = BlogPost;