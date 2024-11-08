require("dotenv").config();
const express = require("express");
const cors = require("cors");
const mongoose = require("mongoose");
const blogRoutes = require("./routes/blogRoutes"); 
const parseAndUpdate = require("./parseAndUpdate"); 
const updateMakeOptions = require("./updateMakeOptions");
const app = express();
const port = 5000;

// Middleware
app.use(express.json());
app.use(cors());

// MongoDB-Verbindung
mongoose
  .connect(process.env.MONGODB_URI, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
  })
  .then(async (connection) => {
    console.log("Mit MongoDB verbunden");
    const database = connection.connection.db; 
    await parseAndUpdate(database); 
  })
  .catch((err) => {
    console.error("MongoDB-Verbindung fehlgeschlagen:", err.message);
  });

// Routen
app.use("/api/posts", blogRoutes); // Nutzt die Blog-Routen

// Server starten
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
