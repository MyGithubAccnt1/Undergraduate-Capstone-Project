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
            $('#options').hide();
            ShowDirection();
        } else if (category === 'logo seal') {
            ShowProduct();
            $('#options1').fadeIn('slow');
            $('#background1').attr('src', 'images/customize/logo_seal_bg.jpg');
            $('#background1').fadeIn('slow');
        } else if (category === 'table nameplate') {
            ShowProduct();
            $('#options1').fadeIn('slow');
            $('#background1').attr('src', 'images/customize/table_nameplate_bg.jpg');
            $('#background1').fadeIn('slow');
        }
    })
    
    $(window).on('resize', function() {
        window.location.href = 'try_me_ar.php';
    });
});
let width_record, height_record;
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
                width_record = img.width * scale;
                height_record = img.height * scale;
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
        let new_top;
        if (category === 'necklace') {
            const canvas = new fabric.Canvas('product', { isDrawingMode: false });
            canvas.setHeight(parseFloat($('#video').css('height')) * 0.5);
            canvas.setWidth(parseFloat($('#video').css('width')));
            fabric.Image.fromURL('images/customize/necklace_' + material + '.png', function (chain) {
                chain.set({
                    originX: 'center',
                    originY: 'top',
                    left: canvas.width / 2,
                    scaleY: width_record / chain.width,
                    scaleX: ((width_record / chain.width) + 0.2),
                    top: 0,
                    evented: false
                });
                new_top = parseFloat((chain.height * chain.scaleY) * 0.32);
                canvas.add(chain);
                canvas.renderAll();
            });
            fabric.Image.fromURL(dataURL, function (product) {
                if (((product.height / 2) * 0.33) > new_top) {
                    new_top = parseFloat(Math.abs(((product.height / 2) * 0.33) - new_top));
                } else {
                    new_top = parseFloat(Math.abs(new_top - ((product.height / 2) * 0.33)));
                }
                product.set({
                    originX: 'center',
                    originY: 'top',
                    left: canvas.width / 2,
                    top: new_top,
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
            $('#option1').on('click', function() {
                var background = $('#background');

                if (background.is(':visible')) {
                    const textObjects = canvas.getObjects();

                    if (textObjects.length > 0) {
                        const lastIndex = textObjects.length - 1;

                        const lastTextObject = textObjects[lastIndex];

                        canvas.remove(lastTextObject);
                    }

                    background.fadeOut('slow');

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
                } else {
                    const textObjects = canvas.getObjects();

                    if (textObjects.length > 0) {
                        const lastIndex = textObjects.length - 1;

                        const lastTextObject = textObjects[lastIndex];

                        canvas.remove(lastTextObject);
                    }

                    background.css({
                        'background-image': 'url(' + $('#background1').attr('src') + ')'
                    }).fadeIn('slow');

                    fabric.Image.fromURL(dataURL, function (img) {
                        if (category === 'logo seal') {
                            img.set({
                                originX: 'center',
                                originY: 'center',
                                left: canvas.width * 0.2,
                                top: canvas.height * 0.3,
                                scaleY: 0.5,
                                scaleX: 0.5
                            });
                        } else {
                            img.set({
                                originX: 'center',
                                originY: 'center',
                                left: canvas.width * 0.2,
                                top: canvas.height * 0.74,
                                scaleY: 1.5,
                                scaleX: 1.5
                            });
                        }
                        
                        canvas.add(img);
                        canvas.renderAll();
                    });
                }
            });
        }
    }
}