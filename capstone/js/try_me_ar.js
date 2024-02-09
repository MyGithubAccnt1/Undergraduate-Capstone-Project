$(window).on('load', function() {
    const video = document.getElementById('video')
    Promise.all([
        faceapi.nets.tinyFaceDetector.loadFromUri('include/models')
    ]).then(startVideo)
    function startVideo() {
      navigator.getUserMedia(
        { video: {} },
        stream => video.srcObject = stream,
        err => console.error(err)
      )
    }
    video.addEventListener('play', () => {
        const canvas = faceapi.createCanvasFromMedia(video)
        document.body.append(canvas)
        const displaySize = { width: video.width, height: video.height }
        faceapi.matchDimensions(canvas, displaySize)
        $(".loader").fadeOut('slow')
        setInterval(async () => {
            const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
            const resizedDetections = faceapi.resizeResults(detections, displaySize)
            canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
            faceapi.draw.drawDetections(canvas, resizedDetections)
            console.log(detections)
        }, 100)
    })
    // ShowCanvas();
    // $(window).on('resize', function() {
    //     ShowCanvas();
    // });
});

function ShowCanvas() {
    const canvas = new fabric.Canvas('canvas', { isDrawingMode: false });
    canvas.setHeight(parseFloat($('#video').css('height')));
    canvas.setWidth(parseFloat($('#video').css('width')));

    var dataURL = localStorage.getItem('Object');

    if (dataURL) {
        fabric.Image.fromURL(dataURL, function (img) {
            img.set({
                originX: 'center',
                originY: 'center',
                left: canvas.width / 2,
                top: canvas.height / 2 + 50,
                evented: false
            });
            canvas.add(img);
            canvas.renderAll();
        });
    }
}