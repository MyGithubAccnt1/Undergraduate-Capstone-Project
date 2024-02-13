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
        $(".loader").fadeOut('slow')
        ShowDirection();
        var category = localStorage.getItem('category');
        if (category === 'necklace') {
            setInterval(async () => {
                const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
                detections.forEach((detection, index) => {
                    console.log(`Face ${index + 1} - Box: ${JSON.stringify(detection.box)}, Score: ${detection.score}`);
                });
                console.log(detections)
            }, 100)
        }
    })
    $(window).on('resize', function() {
        ShowProduct();
        ShowDirection();
    });
});
function ShowDirection() {
    var category = localStorage.getItem('category');
    if (category === 'necklace') {
        const canvas = new fabric.Canvas('direction', { isDrawingMode: false });
        canvas.setHeight(parseFloat($('#video').css('height')) * 0.5);
        canvas.setWidth(parseFloat($('#video').css('width')));
        fabric.Image.fromURL('images/customize/direction.png', function (img) {
            img.set({
                originX: 'center',
                originY: 'center',
                left: canvas.width / 2,
                top: canvas.height / 2,
                evented: false
            });
            let scale = 1;
            const scaleInterval = setInterval(function () {
                scale += 0.1;
                if ((img.height * img.scaleY) <= canvas.height) {
                    img.scale(scale);
                    canvas.add(img);
                    canvas.renderAll();
                } else {
                    clearInterval(scaleInterval);
                    ShowProduct();
                }
            }, 1000);
        });
    } else {
        ShowProduct();
    }
}
function ShowProduct() {
    var dataURL = localStorage.getItem('Object');
    var category = localStorage.getItem('category');
    var material = localStorage.getItem('material');
    if (dataURL) {
        if (category === 'necklace') {
            const canvas = new fabric.Canvas('product', { isDrawingMode: false });
            canvas.setHeight(parseFloat($('#video').css('height')) * 0.5);
            canvas.setWidth(parseFloat($('#video').css('width')));
            fabric.Image.fromURL('images/customize/necklace_' + material + '.png', function (chain) {
                chain.set({
                    originX: 'center',
                    originY: 'top',
                    left: canvas.width / 2,
                    top: 0,
                    scaleX: 0.65,
                    scaleY: 0.5,
                    evented: false
                });
                fabric.Image.fromURL(dataURL, function (product) {
                    product.set({
                        originX: 'center',
                        originY: 'top',
                        left: canvas.width / 2,
                        top: 60,
                        scaleX: 0.5,
                        scaleY: 0.5,
                        evented: false
                    });
                    canvas.add(chain, product);
                    canvas.renderAll();
                });
            });
        } else {
            const canvas = new fabric.Canvas('product', { isDrawingMode: false });
            canvas.setHeight(parseFloat($('#video').css('height')));
            canvas.setWidth(parseFloat($('#video').css('width')));
            fabric.Image.fromURL(dataURL, function (img) {
                img.set({
                    originX: 'center',
                    originY: 'center',
                    left: canvas.width / 2,
                    top: canvas.height / 2,
                    evented: false
                });
                canvas.add(img);
                canvas.renderAll();
            });
        }
    }
}