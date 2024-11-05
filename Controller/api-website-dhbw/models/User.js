const mongoose = require('mongoose');

const UserSchema = new mongoose.Schema({
    uid: { type: Number, autoIncrement: true }, // Auto-Increment wird üblicherweise durch ein Plugin wie "mongoose-auto-increment" verwaltet
    login: { type: String, unique: true, required: true },
    password: { type: String, required: true },
    admin: { type: Boolean, default: false },
    lastName: { type: String, required: true },
    firstName: { type: String, required: true },
    profile: { type: String, default: "" },
    verified: { type: Boolean, default: false },
    created_At: { type: Number, default: Date.now() },
    changed_At: { type: Number, default: Date.now() },
    login_attempts: { type: Number, default: 0 },
    restricted: {type: Boolean, default: false }
});

// Hier kannst du ein Auto-Increment Plugin hinzufügen, wenn benötigt

const User = mongoose.model('users', UserSchema);

module.exports = User;