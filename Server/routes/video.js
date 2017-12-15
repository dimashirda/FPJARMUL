var express = require('express');
var router = express.Router();

var VideoController = require('../controllers/video');

/* GET video listing. */
router.get('/', VideoController.getVideos);
router.get('/trending', VideoController.getTrendingVideos);
router.get('/view/:category', VideoController.getVideosByCategory);
router.get('/search',VideoController.searchVideo);
router.get('/user/:id', VideoController.getVideoByUser);
router.get('/:id', VideoController.getSingleVideo);
router.get('/:quality/:id', VideoController.streamVideo);

router.post('/sort', VideoController.getVideoSortByDate);
router.post('/', VideoController.createVideo);
module.exports = router;