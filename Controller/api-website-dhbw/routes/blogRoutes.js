const express = require('express');
const blogController = require('../controllers/blogController');

const router = express.Router();

// Erstelle einen Blogpost
router.post('/', blogController.createPost);

// Hole alle Blogposts
router.get('/', blogController.getAllPosts);

router.get('/makeOptions', blogController.getMakeOptions);

router.get('/users', blogController.getUsers);

// Register
router.post('/register', blogController.register);

router.post('/postBlog', blogController.postBlog);

router.get('/loginUser', blogController.login);

// Zähle alle Blogposts
router.get('/count', blogController.countPosts);

// Zähle die 5 Blogposts per Page
router.get('/gPPP', blogController.getPostsPerPage);

// Hole einen Blogpost nach ID
router.get('/getPostById', blogController.getPostById);

// Aktualisiere einen Blogpost
router.put('/:id', blogController.updatePost);

// Lösche einen Blogpost
router.delete('/:id', blogController.deletePost);

// Beispieldaten einfügen
router.post('/seed', blogController.seedPosts);

module.exports = router;