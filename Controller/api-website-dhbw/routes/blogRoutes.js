const express = require('express');
const blogController = require('../controllers/blogController');

const router = express.Router();

// Erstelle einen Blogpost
router.post('/', blogController.createPost);

// Hole alle Blogposts
router.get('/', blogController.getAllPosts);

// Hole einen Blogpost nach ID
router.get('/:id', blogController.getPostById);

// Aktualisiere einen Blogpost
router.put('/:id', blogController.updatePost);

// Lösche einen Blogpost
router.delete('/:id', blogController.deletePost);

// Beispieldaten einfügen
router.post('/seed', blogController.seedPosts);

module.exports = router;