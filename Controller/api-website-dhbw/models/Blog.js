const mongoose = require('mongoose');

const BlogPostSchema = new mongoose.Schema({
    uid: { type: Number, autoIncrement: true },
    heading: {type: String, required: true},
    short_dsc: {type: String, required: true},
    long_dsc: {type: String, required: true},
    image: {type: String, required: true},
    likes: {type: Array, default: []},
    created_By: {type: String, default: "Unknown"},
    created_At: { type: Date, default: Date.now },
    changed_At: { type: Date, default: Date.now },
    changed_By: {type: String, default: "Unknown"},
});


const BlogPost = mongoose.model('Blogs', BlogPostSchema);

module.exports = BlogPost;