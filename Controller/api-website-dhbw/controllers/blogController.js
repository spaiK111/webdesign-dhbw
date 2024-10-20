const BlogPost = require('../models/BlogPost');

// Erstelle einen neuen Blogpost
exports.createPost = async (req, res) => {
    try {
        const post = new BlogPost(req.body);
        await post.save();
        res.status(201).json(post);
    } catch (err) {
        res.status(400).json({ error: err.message });
    }
};

// Hole alle Blogposts
exports.getAllPosts = async (req, res) => {
    try {
        const posts = await BlogPost.find();
        res.json(posts);
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
};

// Hole einen Blogpost nach ID
exports.getPostById = async (req, res) => {
    try {
        const post = await BlogPost.findOne({ id: req.params.id });
        if (!post) {
            return res.status(404).json({ error: 'Post nicht gefunden' });
        }
        res.json(post);
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
};

// Aktualisiere einen Blogpost
exports.updatePost = async (req, res) => {
    try {
        const post = await BlogPost.findOneAndUpdate({ id: req.params.id }, req.body, { new: true });
        if (!post) {
            return res.status(404).json({ error: 'Post nicht gefunden' });
        }
        res.json(post);
    } catch (err) {
        res.status(400).json({ error: err.message });
    }
};

// Lösche einen Blogpost
exports.deletePost = async (req, res) => {
    try {
        const post = await BlogPost.findOneAndDelete({ id: req.params.id });
        if (!post) {
            return res.status(404).json({ error: 'Post nicht gefunden' });
        }
        res.json({ message: 'Post gelöscht' });
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
};

// Beispieldaten einfügen
exports.seedPosts = async (req, res) => {
    try {
         const samplePosts = [
            {
                title: "Erster Blogeintrag",
                subtitel: "Einführung",
                content: "Dies ist der Inhalt des ersten Blogeintrags.",
                author: "Autor 1",
                author_img: "https://images.unsplash.com/photo-1727767968533-6c6b679fdac7?q=80&w=2535&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                img: "https://images.unsplash.com/photo-1719937050446-a121748d4ba0?q=80&w=2672&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            },
            {
                title: "Zweiter Blogeintrag",
                subtitel: "Fortsetzung",
                content: "Dies ist der Inhalt des zweiten Blogeintrags.",
                author: "Autor 2",
                author_img: "https://images.unsplash.com/photo-1727807232404-78c35fd9dd31?q=80&w=2535&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                img: "https://images.unsplash.com/photo-1727807232486-aedfe30b02d8?q=80&w=2535&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            },
            {
                title: "Dritter Blogeintrag",
                subtitel: "Weiter geht's",
                content: "Dies ist der Inhalt des dritten Blogeintrags.",
                author: "Autor 3",
                author_img: "https://plus.unsplash.com/premium_photo-1670619666485-c13a485eea65?q=80&w=2669&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                img: "https://plus.unsplash.com/premium_photo-1668917805021-a97c2c9f23f3?q=80&w=2574&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            },
            {
                title: "Vierter Blogeintrag",
                subtitel: "Abschluss",
                content: "Dies ist der Inhalt des vierten Blogeintrags.",
                author: "Autor 4",
                author_img: "https://plus.unsplash.com/premium_photo-1668917805105-2d5d9e49af87?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                img: "https://plus.unsplash.com/premium_photo-1668917804851-931f1d3888ac?q=80&w=2574&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            }
        ];
        await BlogPost.insertMany(samplePosts);
        res.status(201).json({ message: 'Beispieldaten erfolgreich eingefügt' });
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
};