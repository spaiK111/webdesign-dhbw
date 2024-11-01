const mongoose = require('mongoose');

const MakeOptionsSchema = new mongoose.Schema({
    make: { type: String, unique: true },
    options: {type : Array , default : [] },
});



const MakeOptions = mongoose.model('make_options', MakeOptionsSchema);

module.exports = MakeOptions;