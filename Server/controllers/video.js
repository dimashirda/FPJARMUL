var timer = require('timers');
var formidable = require('formidable');
var videoService = require('../services/video');
var http = require('http'),
    fs = require('fs'),
    util = require('util');
_this = this;

exports.getVideos = async function(req, res, next) {
    var page = req.query.page ? req.query.page : 1;
    var limit = req.query.limit ? req.query.limit : 40;

    try {
        var videos = await videoService.getVideos({}, page, limit);
        return res.status(200).json({status: 200, data: videos, message: "Successful get Videos"});
    } catch (error) {
        return res.status(400).json({status: 400, message: error.message});
    }
}

exports.getVideosByCategory = async function(req, res, next){
    var page = req.query.page ? req.query.page : 1;
    var limit = req.query.limit ? req.query.limit : 10;
    var category = req.params.category.toLowerCase();
    try {
        var videos = await videoService.getVideoByCategory({category: category}, page, limit);
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
        return res.status(200).json({status: 200, data: videos, message: "Successfully get Videos"});        
    } catch (error) {
        return res.status(400).json({status: 400, message: error.message });        
    }
}
exports.getTrendingVideos = async function(req, res, next){
    var page = req.query.page ? req.query.page : 1;
    var limit = req.query.limit ? req.query.limit : 10;

    try {
        var videos = await videoService.getTrendingVideos({}, page, limit);
        return res.status(200).json({ status: 200, data: videos, message: "Successfully Get Trending Videos"});
    } catch (error) {
        return res.status(200).json({ status: 400, message: "Error finding Videos "+ error});     
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
                        res.redirect('http://10.151.34.157:8000');
                        // res.status(200).json({ status: 200, data: savedVideo, message: "Successfully Upload Video"});
                    }, 5000);
            })
    });
}

exports.getSingleVideo = async function(req, res, next){
    var id = req.params.id;
    console.log("masuk");
    try {
        var video = await videoService.getSingleVideo(id);
        console.log(video);
        return res.status(200).json({ status: 200, data: video, message: "Successfully get Video"});        
    } catch (error) {
        console.log(video);
        return res.status(400).json({ status: 400, message: error});
    }    
}

exports.getVideoByUser = async function(req, res, next){
    var id = req.params.id;

    try {
        var video = await videoService.getVideoByUser(id);
        return res.status(200).json({status: 200, data: video, message: "Successfully get Video"});
    } catch (error) {
        return res.status(400).json({ status: 400, message: error});
    }
}

exports.searchVideo = async function (req, res, next) {
    var keyword = req.query.keyword;
    try {
        var video = await videoService.searchVideos(keyword);
        console.log(video);
        return res.status(200).json({status: 200, data:video, message: "succes search"});
        
    } catch (error) {
        return res.status(400).json({ status: 400, message: error});      
    }
    
}

exports.streamVideo = async function(req, res, next){
    var id = req.params.id;

    try {
        var video = await videoService.getSingleVideo(id);
    } catch (error) {
        res.status(400).json({ status: 400, message: "Cannot find video"});
    }
    switch (req.params.quality) {
        case 'low':
            var path = video.lowPath;
            break;
        case 'high':
            var path = video.highPath;
            break;
        default:
            res.status(404).json({ status: 404, message: "Cannot find Quality"});
            break;
    }
    var stat = fs.statSync(path);
    var total = stat.size;
    if (req.headers['range']) {
      var range = req.headers.range;
      var parts = range.replace(/bytes=/, "").split("-");
      var partialstart = parts[0];
      var partialend = parts[1];
  
      var start = parseInt(partialstart, 10);
      var end = partialend ? parseInt(partialend, 10) : total-1;
      var chunksize = (end-start)+1;
      console.log('RANGE: ' + start + ' - ' + end + ' = ' + chunksize);
  
      var file = fs.createReadStream(path, {start: start, end: end});
      res.writeHead(206, { 'Content-Range': 'bytes ' + start + '-' + end + '/' + total, 'Accept-Ranges': 'bytes', 'Content-Length': chunksize, 'Content-Type': 'video/mp4' });
      file.pipe(res);
    } else {
      console.log('ALL: ' + total);
      res.writeHead(200, { 'Content-Length': total, 'Content-Type': 'video/mp4' });
      fs.createReadStream(path).pipe(res);
  }
}
