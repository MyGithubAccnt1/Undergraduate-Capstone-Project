$(window).on('load', function() {
    const video = document.getElementById('video');

    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(error => {
            console.error('Error accessing camera:', error);
        });

    video.addEventListener('play', () => {
        $(".loader").fadeOut('slow')
        var category = localStorage.getItem('category');
        if (category === 'necklace') {
            ShowDirection();
        }
    })
    
    $(window).on('resize', function() {
        window.location.href = 'try_me_ar.php';
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
            let scale = 0;
            const scaleInterval = setInterval(function () {
                scale += 0.1;
                img.scale(scale);
                canvas.add(img);
                canvas.renderAll();
                if ((img.height * img.scaleY) <= canvas.height) {
                    
                } else {
                    clearInterval(scaleInterval);
                    canvas.clear();
                    ShowProduct();
                }
            }, 750);
        });
    } else {
        ShowProduct();
    }
}
function ShowProduct(options) {
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
                    scaleX: 0.6,
                    scaleY: 0.5,
                    evented: false
                });
                canvas.add(chain);
                canvas.renderAll();
            });
            let top;
            if (canvas.height === 329) {
                top = 60;
            } else if (canvas.height < 329) {
                top = 33;
            }
            // height 329
            // height 317.6365
            // difference 11.3635
            // top 60
            // top 33
            // difference 27
            fabric.Image.fromURL(dataURL, function (product) {
                product.set({
                    originX: 'center',
                    originY: 'top',
                    left: canvas.width / 2,
                    top: top,
                    scaleX: 0.5,
                    scaleY: 0.5,
                    evented: false
                });
                canvas.add(product);
                canvas.renderAll();
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