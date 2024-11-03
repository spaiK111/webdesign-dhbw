const mongoose = require('mongoose');

const BlogPostSchema = new mongoose.Schema({
    heading: {type: String, required: true},
    short_dsc: {type: String, required: true},
    long_dsc: {type: String, required: true},
    image: {type: String, required: true},
});


const BlogPost = mongoose.model('Blogbeiträge', BlogPostSchema);

module.exports = BlogPost;