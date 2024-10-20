const mongoose = require('mongoose');

const BlogPostSchema = new mongoose.Schema({
    title: String,
    subtitel: String,
    content: String,
    author: String,
    author_img: String,
    img: String
});

const BlogPost = mongoose.model('BlogPost', BlogPostSchema);

module.exports = BlogPost;