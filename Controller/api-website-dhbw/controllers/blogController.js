const BlogPost = require("../models/BlogPost");
const MakeOptions = require("../models/MakeOptions");
const Blog = require("../models/Blog");
const User = require("../models/User");
const xml2js = require("xml2js");
const bcrypt = require("bcrypt");
const fs = require("fs");
const exp = require("constants");
const CryptoJS = require("crypto-js");
const nodemailer = require("nodemailer");

// Erstelle einen neuen Blogpost
exports.createCar = async (req, res) => {
  try {
    const {
      hsn,
      tsn,
      make,
      model,
      year,
      kw,
      category,
      engine,
      fuelType,
      hubraum,
      co2,
      antrieb,
      backVolumen,
      maxSpeed,
      image_1,
      image_2,
      image_3,
      image_4,
      author,
    } = req.query;
    const uid = `${hsn}_${tsn}`;
    const createdAt = Date.now();
    const postJSON = {
      uid: uid,
      hsn: hsn,
      tsn: tsn,
      make: make,
      model: model,
      year: year,
      kw: kw,
      category: category,
      engine: engine,
      fuelType: fuelType,
      hubraum: hubraum,
      co2Wert: co2,
      antriebsart: antrieb,
      backVolumen: backVolumen,
      maxSpeed: maxSpeed,
      image_1: image_1,
      image_2: image_2,
      image_3: image_3,
      image_4: image_4,
      createdAt: createdAt,
      author: author,
    };
    const post = new BlogPost({
      uid: uid,
      hsn: hsn,
      tsn: tsn,
      make: make,
      model: model,
      year: year,
      kw: kw,
      category: category,
      engine: engine,
      fuelType: fuelType,
      hubraum: hubraum,
      co2Wert: co2,
      antriebsart: antrieb,
      backVolumen: backVolumen,
      maxSpeed: maxSpeed,
      image_1: image_1,
      image_2: image_2,
      image_3: image_3,
      image_4: image_4,
      createdAt: createdAt,
      author: author,
    });
    await post.save();
    convertAndSaveToXML(postJSON);
    res.status(201).json(post);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};

const convertAndSaveToXML = async (post) => {
  const builder = new xml2js.Builder({ headless: true });
  const newEntry = { Entry: post };

  fs.readFile("data.xml", "utf8", (err, data) => {
    // Datei existiert, füge neuen Eintrag hinzu
    xml2js.parseString(data, (err, result) => {
      if (err) {
        console.error("Error parsing XML:", err);
        return;
      }

      if (!result.root.Entry) {
        result.root.Entry = [];
      }

      result.root.Entry.push(post);

      const updatedXml = builder.buildObject(result);
      fs.writeFile("data.xml", updatedXml, (err) => {
        if (err) {
          console.error("Error writing XML to file:", err);
        } else {
          console.log("XML successfully updated in data.xml");
        }
      });
    });
  });
};

exports.decreaseLoginAttempt = async (req, res) => {
  try {
    const { login } = req.query;
    const userToDecrease = await User.findOneAndUpdate(
      { login: login },
      { $inc: { login_attempts: 1 } },
      { new: true } // Optional: returns the updated document
    );
    res.status(201).json(userToDecrease);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};

exports.restrictUser = async (req, res) => {
  try {
    const { login } = req.query;
    await User.findOneAndUpdate(
      { login: login },
      { $set: { restricted: true } },
      { new: true } // Optional: returns the updated document
    );
    res.status(201).json(updatedUser);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};

exports.unlike = async (req, res) => {
  try {
    const { _id, login } = req.query;
    console.log("blogunlike", _id, login);
    const blogToLike = await Blog.findOneAndUpdate(
      { _id: _id },
      {
        $pull: { likes: login }, // Füge den login zum likes-Array hinzu
      },
      { new: true } // Optional: returns the updated document
    );
    res.status(201).json(blogToLike);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};


exports.like = async (req, res) => {
  try {
    const { _id, login } = req.query;
    console.log("bloglike", _id, login);
    const blogToLike = await Blog.findOneAndUpdate(
      { _id: _id },
      {
        $push: { likes: login }, // Füge den login zum likes-Array hinzu
      },
      { new: true } // Optional: returns the updated document
    );
    res.status(201).json(blogToLike);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};

exports.decreaseLoginAttempt = async (req, res) => {
  try {
    const { login } = req.query;
    const userToDecrease = await User.findOneAndUpdate(
      { login: login },
      { $inc: { login_attempts: 1 } },
      { new: true } // Optional: returns the updated document
    );
    res.status(201).json(userToDecrease);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};

exports.postBlog = async (req, res) => {
  try {
    const {
      heading,
      short_dsc,
      long_dsc,
      image,
      authorFirstname,
      authorLastname,
    } = req.query; // Use req.body to get data from POST request
    const blog = new Blog({
      heading: heading,
      short_dsc: short_dsc,
      long_dsc: long_dsc,
      image: image,
      created_By: `${authorFirstname} ${authorLastname}`,
    });
    await blog.save();
    res.status(201).json(blog);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};

exports.register = async (req, res) => {
  try {
    const { login, hashedPassword, firstName, lastName } = req.query; // Use req.body to get data from POST request
    console.log(login);
    console.log(hashedPassword);
    console.log(firstName);
    console.log(lastName);

    const user = new User({
      login: login,
      firstName: firstName,
      lastName: lastName,
      password: hashedPassword,
    });
      await user.save()
      res.status(201).json(user);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};
// RESET
// exports.resetLoginAttempts = async (req, res) => {
//   try {
//     const { login, password } = req.body; // Use req.body to get data from POST request
//     const hashedPassword = await bcrypt.hash(password, 10);
//     const user = new User({
//       login: login,
//       firstName: firstName,
//       lastName: lastName,
//       password: hashedPassword,
//     });
//     await user.save();
//     res.status(201).json(user);
//   } catch (err) {
//     res.status(400).json({ error: err.message });
//   }
// };



exports.validateUser = async (req, res) => {
  try {
      const { email } = req.query;
      const user = await User.findOneAndUpdate(
          { login: email },
          { $set: { verified: true } },
          { new: true }
      );

      if (!user) {
          return res.status(404).json({ error: 'User not found' });
      }

      res.status(200).json({ message: 'User validated', user });
  } catch (err) {
      res.status(500).json({ error: err.message });
  }
};

exports.sendValidationEmail = async (req, res) => {
  try {
      const { email } = req.query;
      const user = await User.findOne({ login: email });

      if (!user) {
          return res.status(404).json({ error: 'User not found' });
      }

      const validationLink = `http://localhost:5000/api/posts/validateUser?email=${encodeURIComponent(email)}`;

      // Erstelle einen Nodemailer-Transporter
      const transporter = nodemailer.createTransport({
        host: "smtp.gmail.com",
        port: 465,
        secure: true, // true for port 465, false for other ports
        auth: {
          user: "maks.bogachenkov@gmail.com",
          pass: "pmdp xrxs lafj scrw",
        },
      });

      // E-Mail-Optionen
      const mailOptions = {
          from: '"AutomobileInsider" <maks.bogachenkov@gmail.com>"',
          to: email,
          subject: 'Validate your account',
          text: `Please click the following link to validate your account: ${validationLink}`
      };

      // Sende die E-Mail
      await transporter.sendMail(mailOptions);  

      res.status(200).json({ message: 'Validation email sent' });
  } catch (err) {
      res.status(500).json({ error: err.message });
  }
};




exports.getStats = async (req, res) => {
  try {
    const users = await User.find().countDocuments();
    const posts = await BlogPost.find().countDocuments();
    const blogs = await Blog.find().countDocuments();
    
    const result = await Blog.aggregate([
      { $unwind: "$likes" }, // Entpackt das likes-Array
      { $group: { _id: null, totalLikes: { $sum: 1 } } } // Gruppiert und summiert die Likes
    ]);

    const totalLikes = result.length > 0 ? result[0].totalLikes : 0;
    res.json({ users: users, posts: posts, blogs: blogs, likes: totalLikes });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.getCarById = async (req, res) => {
  try {
    const { uid } = req.query;
    const blog = await BlogPost.findById(uid);
    console.log(blog);
    res.json(blog);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.getBlogById = async (req, res) => {
  try {
    const { _id } = req.query;
    const blog = await Blog.findById(_id);
    console.log(blog);
    res.json(blog);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.getBlogs = async (req, res) => {
  try {
    const blogs = await Blog.find();
    console.log(blogs);
    res.json(blogs);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.checkAdmin = async (req, res) => {
  try {
    const { login } = req.query;
    const user = await User.findOne({ login: login });
    res.json({ admin: user.admin });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.checkRestriction = async (req, res) => {
  try {
    const { login } = req.query;
    const user = await User.findOne({ login: login });
    res.json({ restricted: user.restricted });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.checkVerification = async (req, res) => {
  try {
    const { login } = req.query;
    const user = await User.findOne({ login: login });
    res.json({ verified: user.verified });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.login = async (req, res) => {
  try {
    const { login, hashedPassword } = req.query;
    const user = await User.findOne({ login: login });

    if (user != null) {
      // Compare the hashed password with the stored hashed password
      if (hashedPassword === user.password) {
        res.status(200).json(user); // Successful login
      } else {
        res.status(401).json({ error: "Invalid login or password" }); // Invalid password
      }
    } else {
      res.status(401).json({ error: "Invalid login or password" }); // User not found
    }
  } catch (err) {
    res.status(500).json({ error: err.message }); // Server error
  }
};

exports.getUsers = async (req, res) => {
  try {
    const users = await User.find();
    res.json(users);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.getUserData = async (req, res) => {
  try {
    const { login, hashedPassword } = req.query;
    console.log(login);
    console.log(hashedPassword);
    const user = await User.findOne({ login: login, password: hashedPassword });
    console.log(user);
    res.json(user);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.getMakeOptions = async (req, res) => {
  try {
    const options = await MakeOptions.find();
    res.json(options);
  } catch (err) {
    res.status(500).json({ error: err.message });
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

exports.getAllMakePosts = async (req, res) => {
  try {
    const { make } = req.query;
    const posts = await BlogPost.find({ make: make });
    res.json(posts);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.getPostsPerPage = async (req, res) => {
  //gPPP
  try {
    const { pagination, make, model, ps1, ps2, category, fueltype } = req.query;
    const query = {};
    console.log("Make: ", make);
    console.log("Model: ", model);
    console.log("PS1: ", ps1);
    console.log("PS2: ", ps2);
    console.log("Category: ", category);
    console.log("Fueltype: ", fueltype);

    if (make) {
      query.make = make;
    }

    if (model) {
      query.model = model;
    }

    if (category) {
      query.category = category;
    }

    if (fueltype) {
      query.fuelType = fueltype;
    }

    // if (ps1 && ps2) {
    //     query.kw = { $elemMatch: { $gte: parseInt(ps1), $lte: parseInt(ps2) } };
    // } else if (ps1) {
    //     query.kw = { $elemMatch: { $gte: parseInt(ps1) } };
    // } else if (ps2) {
    //     query.kw = { $elemMatch: { $lte: parseInt(ps2) } };
    // }
    const page = parseInt(pagination); // Default to page 0 if pagination is not provided
    const limit = 5; // Number of posts per page

    const posts = await BlogPost.find(query)
      //.sort({ price: -1 })
      .skip(page * limit)
      .limit(limit);

    res.json(posts);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

// Hole einen Blogpost nach ID
exports.getPostById = async (req, res) => {
  try {
    const { uid } = req.query;
    const post = await BlogPost.findOne({ uid: uid });
    console.log(post);
    if (!post) {
      return res.status(404).json({ error: "Post nicht gefunden" });
    }
    res.json(post);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.countPosts = async (req, res) => {
  try {
    const { make } = req.query;
    const query = make
      ? { make: { $regex: new RegExp(`^${make}$`, "i") } }
      : {};
    console.log("Make-count: ", req.query.make);
    const posts = await BlogPost.countDocuments(query);
    res.json({ count: posts });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

// Aktualisiere einen Blogpost
exports.updatePost = async (req, res) => {
  try {
    const post = await BlogPost.findOneAndUpdate(
      { id: req.params.id },
      req.body,
      { new: true }
    );
    if (!post) {
      return res.status(404).json({ error: "Post nicht gefunden" });
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
      return res.status(404).json({ error: "Post nicht gefunden" });
    }
    res.json({ message: "Post gelöscht" });
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
        author_img:
          "https://images.unsplash.com/photo-1727767968533-6c6b679fdac7?q=80&w=2535&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
        img: "https://images.unsplash.com/photo-1719937050446-a121748d4ba0?q=80&w=2672&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      },
      {
        title: "Zweiter Blogeintrag",
        subtitel: "Fortsetzung",
        content: "Dies ist der Inhalt des zweiten Blogeintrags.",
        author: "Autor 2",
        author_img:
          "https://images.unsplash.com/photo-1727807232404-78c35fd9dd31?q=80&w=2535&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
        img: "https://images.unsplash.com/photo-1727807232486-aedfe30b02d8?q=80&w=2535&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      },
      {
        title: "Dritter Blogeintrag",
        subtitel: "Weiter geht's",
        content: "Dies ist der Inhalt des dritten Blogeintrags.",
        author: "Autor 3",
        author_img:
          "https://plus.unsplash.com/premium_photo-1670619666485-c13a485eea65?q=80&w=2669&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
        img: "https://plus.unsplash.com/premium_photo-1668917805021-a97c2c9f23f3?q=80&w=2574&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      },
      {
        title: "Vierter Blogeintrag",
        subtitel: "Abschluss",
        content: "Dies ist der Inhalt des vierten Blogeintrags.",
        author: "Autor 4",
        author_img:
          "https://plus.unsplash.com/premium_photo-1668917805105-2d5d9e49af87?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
        img: "https://plus.unsplash.com/premium_photo-1668917804851-931f1d3888ac?q=80&w=2574&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      },
    ];
    await BlogPost.insertMany(samplePosts);
    res.status(201).json({ message: "Beispieldaten erfolgreich eingefügt" });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};
