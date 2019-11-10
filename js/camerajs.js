(function() {
    var video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    context = canvas.getContext('2d');
    photo = document.getElementById('photo');
    var vendorUrl = window.URL || window.webkitURL;

    navigator.getMedia =  navigator.getUserMedia ||
                          navigator.webkitGetUserMedia ||
                          navigator.mozGetUserMedia ||
                          navigator.msGetUserMedia;

    navigator.getMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.srcObject = stream;
        video.play();
    }, function(error) {
        error.code;
    });


    document.getElementById('capture').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 400, 300);
        photo.setAttribute('src', canvas.toDataURL('image/png'));
    });
    document.getElementById('smoke').addEventListener('click', function() {
        sticker = new Image();
        sticker.src = 'database/stickers/smoke.png';
        context.drawImage(sticker, 0, 0, 400, 300);
        photo.setAttribute('src', canvas.toDataURL('image/png'));
    });
})();