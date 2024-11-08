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

//Email User validation

router.get('/checkVerification', blogController.checkVerification);

router.post('/sendValidationEmail', blogController.sendValidationEmail);

router.get('/validateUser', blogController.validateUser);

//Stats
router.get('/getStats', blogController.getStats);

// Hole alle Blogposts
router.get('/', blogController.getAllPosts);

router.get('/getCarByUid', blogController.getCarByUid);

router.post('/restrictUser', blogController.restrictUser)

router.get('/checkRestriction', blogController.checkRestriction)

router.get('/users', blogController.getUsers);

router.post('/resetLoginAttempts', blogController.resetLoginAttempts )

router.get('/getUserData', blogController.getUserData)

//Likes

router.post('/likeBlog', blogController.like)

router.post('/unlikeBlog', blogController.unlike)

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

module.exports = router;