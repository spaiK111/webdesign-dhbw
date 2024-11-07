const express = require('express');
const blogController = require('../controllers/blogController');

const router = express.Router();

// Erstelle einen Blogpost
router.post('/createBlogTxt', blogController.postBlog);

router.post('/createCar', blogController.createCar);

router.get('/checkAdmin', blogController.checkAdmin);

router.get('/getBlogs', blogController.getBlogs);

router.get('/getBlogById', blogController.getBlogById);

router.get('/getCarById', blogController.getCarById);

// Hole alle Blogposts
router.get('/', blogController.getAllPosts);

router.get('/makeOptions', blogController.getMakeOptions);

router.post('/restrictUser', blogController.restrictUser)

router.get('/checkRestriction', blogController.checkRestriction)

router.get('/users', blogController.getUsers);

router.post('/resetLoginAttempts', blogController.resetLoginAttempts )

router.get('/getUserData', blogController.getUserData)

//Likes

router.post('/like', blogController.like)

router.post('/decreaseLoginAttempt', blogController.decreaseLoginAttempt )
// Register
router.post('/register', blogController.register);

router.post('/loginUser', blogController.login);

// Zähle alle Blogposts
router.get('/count', blogController.countPosts);

// Zähle die 5 Blogposts per Page
router.get('/gPPP', blogController.getPostsPerPage);

router.get('/getAllMakePosts', blogController.getAllMakePosts )

// Hole einen Blogpost nach ID
router.get('/getPostById', blogController.getPostById);

// Aktualisiere einen Blogpost
router.put('/:id', blogController.updatePost);

// Lösche einen Blogpost
router.delete('/:id', blogController.deletePost);

// Beispieldaten einfügen
router.post('/seed', blogController.seedPosts);

module.exports = router;