var mongoose = require('mongoose');
var mongoosePaginate = require('mongoose-paginate');

var VideoSchema = new mongoose.Schema({
    title: String,
    description: String,
    date: Date,
    oriPath: String,
    lowPath: String,
    highPath: String,
    thumbnailPath: String,
    idUser: Number,
    category: String,
    tags: [String],
    views: {
        type: Number,
        default: 0
    }
});
VideoSchema.index({ title: 'text', description: 'text'}, {name: 'searchIndex', weights: { title: 5, description: 2 }});
VideoSchema.plugin(mongoosePaginate);
const Video = mongoose.model('Video', VideoSchema);
module.exports = Video;