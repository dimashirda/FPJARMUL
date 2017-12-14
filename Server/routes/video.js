var express = require('express');
var router = express.Router();

var VideoController = require('../controllers/video');

/* GET video listing. */
router.get('/', VideoController.getVideos);
router.get('/trending', VideoController.getTrendingVideos);
router.post('/sort', VideoController.getVideoSortByDate);
router.get('/view/:category', VideoController.getVideosByCategory);

router.post('/', VideoController.createVideo);
router.get('/:id', VideoController.getSingleVideo);
router.get('/:quality/:id', VideoController.streamVideo);
module.exports = router;