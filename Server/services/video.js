var exec = require('exec');
var Video = require('../models/video');
var fs = require('fs');
const watermarkPath = '/home/lpersahabatan/Documents/FPJARMUL/Server/public/images/water.png'
const videoPath = '/home/lpersahabatan/Documents/FPJARMUL/Server/public/videos/';
var cmd = require('child_process');

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
        throw Error('Error while paginating Videos!');
    }
}

exports.createVideo = async function (video, file){

    var oldPath = file.videoUpload.path;    
    var ext = file.videoUpload.name.split('.')[1];
    console.log(video.user);
    var newName = video.title.split(' ').join('_') + "."+ext;
    var userPath = videoPath + video.user+'/';
    var newPath = userPath+'ori_'+newName;
    console.log(newPath);
    try {
        fs.statSync(videoPath+video.user);
    } catch (error) {
        fs.mkdir(videoPath+video.user);
    }
    console.log(video.tags);
    fs.rename(oldPath, newPath, async function(err) {
        console.log("mashshs");
        console.log(video.user);
        if(err)
            throw Error("Error while renaming"+err);
        try {
            var newVideo = new Video({
                title: video.title,
                description: video.description,
                date: new Date(),
                oriPath: videoPath+newName,
                lowPath: videoPath+'low_'+newName,
                highPath: videoPath+'high_'+newName,
                idUser: video.user,
                tags: video.tags
            });
            console.log(newVideo);
            var savedVideo = newVideo.save();
            prepareVideo(newPath, userPath, newName)
                .then(() => {
                    console.log("masuk");
                    console.log(savedVideo);
                    return savedVideo;
                });
        } catch (error) {
            throw Error("Error while Preparing "+error);
        }
    });
}

exports.getSingleVideo = async function(id){
    try {
        var video = await Video.findById(id);
        
        return video;
    } catch (error) {
        throw Error("Error finding video");
    }
}

async function prepareVideo(path, userPath, name){
    //Watermark the video
    try {
        cmd.execSync(`ffmpeg -y -i ${path} -i ${watermarkPath} -filter_complex "[1]lut=a=val*0.3[a];[0][a]overlay=0:0" -c:v libx264 -an ${userPath +"water_"+ name}`);
        return Promise.all([getHighVideo(userPath, name), getLowVideo(userPath, name)]);
    } catch (error) {
        throw Error("Error while Preparing Video "+error);
    }
    // } , (err) =>{
    //         if(err)
    //             throw err;
    //         console.log("manis dan selalu disiplin");                 
    //         cmd.exec(`ffmpeg -i ${userPath +"water_"+ name} -c:v libx264 -preset slow -crf 45 -c:a copy ${userPath +"low_"+ name}`, (err) => {
    //                 if(err)
    //                     throw err;
    //                 console.log("manis dan selalu disiplin");                                         
    //                 cmd.exec(`ffmpeg -i ${userPath +"water_"+ name} -c:v libx264 -preset slow -crf 19 -c:a copy ${userPath +"high_"+ name}`, (err) => {
    //                     if(err)
    //                         throw err;
    //                     console.log("manis dan selalu disiplin");
    //                     console.log("Done converting");
                                             
    //                 });
    //         });
    // })
}

async function getHighVideo(userPath, name){
    try {
        return cmd.exec(`ffmpeg -i ${userPath +"water_"+ name} -c:v libx264 -preset slow -crf 19 -c:a copy ${userPath +"high_"+ name}`);
        console.log("manis dan selalu disiplin");                
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