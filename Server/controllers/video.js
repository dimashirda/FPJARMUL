var timer = require('timers');
var formidable = require('formidable');
var videoService = require('../services/video');
_this = this;

exports.getVideos = async function(req, res, next) {
    var page = req.query.page ? req.query.page : 1;
    var limit = req.query.limit ? req.query.limit : 10;

    try {
        var videos = await videoService.getVideos({}, page, limit);
        return res.status(200).json({status: 200, data: videos, message: "Successful get Videos"});
    } catch (error) {
        return res.status(400).json({status: 400, message: error.message});
    }
}

exports.getVideosByCategory = async function(req, res, next){
    var category = req.params.category.toLowerCase();
    console.log(category);
    try {
        var videos = await videoService.getVideoByCategory(category);
        return res.status(200).json({status: 200, data: videos, message: "Successfully get Videos"});
    } catch (error) {
        return res.status(400).json({status: 400, message: error.message });
    }
}

exports.getVideoSortByDate = async function(req, res, next){
    var category = req.body.category.toLowerCase();
    var order = req.body.order;

    try {
        var videos = await videoService.getVideoSortByDate(category, order);
        // console.log(videos)
        return res.status(200).json({status: 200, data: videos, message: "Successfully get Videos"});        
    } catch (error) {
        return res.status(400).json({status: 400, message: error.message });        
    }
}

exports.createVideo = async function(req, res, next){
    var clientURL = req.headers['x-forwarded-for'];
    var form = new formidable.IncomingForm();
    form.parse(req, function (err, fields, file){
        var video = {
            title: fields.title,
            description: fields.description,
            user: fields.user,
            category: fields.category.toLowerCase(),
            tags: fields.tags
        };
        videoService.createVideo(video, file)
            .then((savedVideo) => {
                    timer.setTimeout(() => {
                        console.log("UDAH");
                        // res.redirect('http://10.151.34.170:8000');
                        res.status(200).json({ status: 200, data: savedVideo, message: "Successfully Upload Video"});
                    }, 5000);
            })
    });
}

exports.getSingleVideo = async function(req, res, next){
    var range = req.headers.range;
    var positions = range.replace(/bytes=/, "").split("-");
    var start = parseInt(positions[0], 10);
    var end = partialend ? parseInt(partialend, 10) : total - 1;
    var chunksize = (end-start)+1;
    var id = req.params.id;
    try {
        var video = await videoService.getSingleVideo(id);
    } catch (error) {
        res.status(400).json({ status: 400, message: "Cannot find video"});
    }
    console.log(video);
    // switch (req.params.quality) {
    //     case 'low':
    //         var movie_mp4 = video.lowPath;
    //         break;
    //     case 'high':
    //         var movie_mp4 = video.highPath;
    //         break;
    //     default:
    //         res.status(404).json({ status: 404, message: "Cannot find Quality"});
    //         break;
    // }
    // var total = movie_mp4.length;
    // res.writeHead(206, { "Content-Range": "bytes " + start + "-" + end + "/" + total, 
    //                     "Accept-Ranges": "bytes",
    //                     "Content-Length": chunksize,
    //                     "Content-Type":"video/mp4"});
    // res.end(movie_mp4.slice(start, end+1), "binary");
}