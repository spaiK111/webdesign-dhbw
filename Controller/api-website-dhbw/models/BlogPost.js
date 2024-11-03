const mongoose = require('mongoose');

const BlogPostSchema = new mongoose.Schema({
    uid: {type: String, required: true},
    hsn: {type: Number, required: true},
    tsn: {type: String, required: true},
    make: {type: String, required: true},
    model: {type: String, required: true},
    year: { type: Array, default: [] },
    kw: {type: Array, default: [] },
    category: {type: String, required: true},
    engine: {type: String, required: true},
    fuelType: {type: String, required: true},
    image_1: {type: String, required: true},
    image_2: {type: String, required: true},
    image_3: {type: String, required: true},
    image_4: {type: String, required: true},
});


const BlogPost = mongoose.model('cars_blogs', BlogPostSchema);

module.exports = BlogPost;