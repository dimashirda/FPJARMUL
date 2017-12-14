var exec = require('exec');
var Video = require('../models/video');
var fs = require('fs');
const watermarkPath = '/home/lpersahabatan/Documents/FPJARMUL/Server/public/images/water.png'
const videoPath = '/home/lpersahabatan/Documents/FPJARMUL/Server/public/videos/';
const thumbnailPath = '/assets/app/';
const clientPath = '/home/lpersahabatan/Documents/FPJARMUL/Client/public/assets/app/';
var cmd = require('child_process');
var videoTitle;
_this = this;

exports.getVideos = async function (query, page, limit){

    var options = {
        page,
        limit
    };
    try {
        var videos = await Video.paginate(query, options);

        return videos;
    } catch (error) {
        throw Error('Error while paginating Videos! '+error);
    }
}

exports.getTrendingVideos = async function(query, page, limit){

    try {
        var videos = await Video.find({}).sort({'views': -1}).limit(10);
        return videos;
    } catch (error) {
        throw Error("Error while finding trending videos! " + error);
    }
}

exports.searchVideos = async function(keyword){
    try {
        var videos = await Video.find({ $text: { $search: keyword,
                                                 $caseSensitive: false}}).sort({ views: 1});
        return videos
    } catch (error) {
        throw Error("Error while Searching Videos "+ error);
    }
}

exports.createVideo = async function (video, file){

    var oldPath = file.videoUpload.path;    
    var ext = file.videoUpload.name.split('.')[1];
    videoTitle = video.title.split(' ').join('_');
    var newName = video.title.split(' ').join('_') + "."+ext;
    var userPath = videoPath + video.user+'/';
    var newPath = userPath+'ori_'+newName;
    try {
        fs.statSync(videoPath+video.user);
    } catch (error) {
        fs.mkdir(videoPath+video.user);
    }
    try {
        fs.statSync('/home/lpersahabatan/Documents/FPJARMUL/Client/public'+thumbnailPath+video.user);
    } catch (error) {
        fs.mkdir('/home/lpersahabatan/Documents/FPJARMUL/Client/public'+thumbnailPath+video.user)
    }
    fs.rename(oldPath, newPath, async function(err) {
        if(err)
            throw Error("Error while renaming"+err);
        try {
            var newVideo = new Video({
                title: video.title,
                description: video.description,
                date: new Date(),
                oriPath: userPath+newName,
                lowPath: userPath+'low_'+newName,
                highPath: userPath+'high_'+newName,
                thumbnailPath: thumbnailPath+video.user+"/thumbnail_"+videoTitle+".png",
                idUser: video.user,
                category: video.category,
                tags: video.tags
            });
            var savedVideo = newVideo.save();
            prepareVideo(newPath, userPath, newName, video.user)
                .then(() => {
                    return savedVideo;
                });
        } catch (error) {
            throw Error("Error while Preparing "+error);
        }
    });
}

exports.getSingleVideo = async function(id){
        var video = await Video.findById(id);
        console.log(video);
        video.views++;
        var saving = await video.save()
        return video;
}

exports.getVideoByCategory = async function(query, page, limit){
    var options = {
        sort: { views: 1},
        page,
        limit
    };

    try {
        var videos = await Video.paginate(query, options);

        return videos;
    } catch (error) {
        throw Error("Error while finding video by category " + error);
    }
}

exports.getVideoSortByDate = async function(category, order){
    try {
        if(category == "")
        {
            if(order == "asc"){
                var videos = await Video.find({}, null, {sort: 'date'});
            }
            else{
                var videos = await Video.find({}, null, {sort: '-date'});
            }
        }
        else{
            if(order == "asc"){
                var videos = await Video.find({ category : category}, null, {sort: 'date'});
            }
            else{
                var videos = await Video.find({ category : category}, null, {sort: '-date'});
            }
        }        
        return videos;
    } catch (error) {
        throw Error("Error while finding Video "+ error);
    }
}

async function prepareVideo(path, userPath, name, user){
    //Watermark the video
    try {
        cmd.execSync(`ffmpeg -y -i ${path} -i ${watermarkPath} -filter_complex "overlay=10:10" -strict -2 ${userPath +"water_"+ name}`);
        return Promise.all([getHighVideo(userPath, name), getLowVideo(userPath, name), getThumbnailVideo(userPath, name, path, user)]);
    } catch (error) {
        throw Error("Error while Preparing Video "+error);
    }
}

async function getHighVideo(userPath, name){
    try {
        return cmd.exec(`ffmpeg -i ${userPath +"water_"+ name} -c:v libx264 -preset slow -crf 25 -c:a copy ${userPath +"high_"+ name}`);
    } catch (error) {
        throw Error("Error while converting to high video "+error);
    }
}

async function getLowVideo(userPath, name){
    try {
        return cmd.exec(`ffmpeg -i ${userPath +"water_"+ name} -c:v libx264 -preset slow -crf 45 -c:a copy ${userPath +"low_"+ name}`);
    } catch (error) {
        throw Error("Error while converting to Low Video "+ error);
    }
}

async function getThumbnailVideo(userPath, name, oriPath, user){
    try {
        return cmd.exec(`ffmpeg -i ${oriPath} -ss 00:00:10.435 -vframes 1 ${clientPath +user+"/thumbnail_"+ videoTitle+".png"}`);
    } catch (error) {
        throw Error("Error while getting thumbnail " + error);
    }
}