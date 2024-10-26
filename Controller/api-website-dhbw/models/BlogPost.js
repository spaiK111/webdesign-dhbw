const mongoose = require('mongoose');

const BlogPostSchema = new mongoose.Schema({
    make: String,
    model: String,
    year: Number,
    color: String,
    engine: String,
    fuelType: String,
    transmission: String,
    mileage: Number,
    vin: String,
    licensePlate: String,
    registrationDate: Date,
    owner: String,
    price: Number,
    image_front: String,
    image_back: String,
    image_side: String,
    image_interior: String
});



const BlogPost = mongoose.model('cars', BlogPostSchema);

module.exports = BlogPost;