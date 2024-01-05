$(window).on('load', function() {
    ShowCanvas();
});

$(document).on('load', function() {
    new bootstrap.Collapse(document.getElementById('logo_seal'));
    new bootstrap.Collapse(document.getElementById('necklace'));
    new bootstrap.Collapse(document.getElementById('pins'));
    new bootstrap.Collapse(document.getElementById('table_nameplate'));
});

let product, material;

$(document).on('click', '#logo_seal', function() {
    product = document.getElementById('logo_seal_material');
    ShowCanvas('product');
    document.getElementById('2').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
});
$(document).on('click', '#logo_seal_gold', function() {
    var close = product;
    product = document.getElementById('logo_seal_shape');
    material = 'gold';
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#logo_seal_silver', function() {
    var close = product;
    product = document.getElementById('logo_seal_shape');
    material = 'silver';
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#logo_seal_bronze', function() {
    var close = product;
    product = document.getElementById('logo_seal_shape');
    material = 'bronze';
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#logo_seal_circle', function() {
    var close = product;
    product = document.getElementById('logo_seal_logo');
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#logo_seal_image', function() {
    var close = product;
    product = document.getElementById('logo_seal_company');
    document.getElementById('5').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});

$(document).on('click', '#necklace', function() {
    product = document.getElementById('necklace_material');
    ShowCanvas('product');
    document.getElementById('2').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
});
$(document).on('click', '#necklace_gold', function() {
    var close = product;
    product = document.getElementById('necklace_shape');
    material = 'gold';
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#necklace_silver', function() {
    var close = product;
    product = document.getElementById('necklace_shape');
    material = 'silver';
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#necklace_bronze', function() {
    var close = product;
    product = document.getElementById('necklace_shape');
    material = 'bronze';
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#necklace_cross', function() {
    // var close = product;
    // product = document.getElementById('necklace_next');
    // document.getElementById('4').scrollIntoView();
    // new bootstrap.Collapse($(product)).show();
    // new bootstrap.Collapse($(close)).hide();
});

$('.reset').on('click', function() {
    window.location.href = 'create_customize.php'
});

function ShowCanvas(variable) {
    const canvas = new fabric.Canvas('canvas', {isDrawingMode: false});
    canvas.setHeight(window.innerHeight);
    canvas.setWidth(window.innerWidth);
    canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));

    if (variable === 'product') {
        fabric.Image.fromURL('images/saint.png', function(img) {
            img.set({
                left: canvas.width / 2,
                top: canvas.height / 2,
                originX: 'center',
                originY: 'center',
                scaleX: 0.5,
                scaleY: 0.5,
            });
            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
        });
    }

    $(document).on('click', '#logo_seal_circle', function() {
        fabric.Image.fromURL('images/customize/logo_seal_' + material + '_circle.png', function(img) {
            img.set({
                left: canvas.width / 2,
                top: canvas.height / 2,
                originX: 'center',
                originY: 'center',
                scaleX: 0.5,
                scaleY: 0.5,
            });
            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
        });
    })

    $(document).on('click', '#necklace_gold', function() {
        fabric.Image.fromURL('images/customize/necklace_gold.png', function(img) {
            img.set({
                left: canvas.width / 2,
                top: canvas.height / 2,
                originX: 'center',
                originY: 'center',
                scaleX: 0.5,
                scaleY: 0.5,
            });
            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
        });
    })

    $('#logo_seal_image').on('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const imageUrl = event.target.result;
                const Circle_Shape = new fabric.Circle({
                    left: canvas.width / 2,
                    top: canvas.height / 2 - 7,
                    originX: 'center',
                    originY: 'center',
                    radius: 85,
                    fill: 'transparent',
                    stroke: material,
                    strokeWidth: 2,
                });
                fabric.Image.fromURL(imageUrl, function (img) {
                    var targetRadius = 85;

                    img.set({
                        left: canvas.width / 2,
                        top: canvas.height / 2 - 7,
                        originX: 'center',
                        originY: 'center',
                    });
                    let newrad = "";
                    if (img.width > img.height) {
                        img.scaleToWidth(targetRadius * 2);
                        newrad = (img.width / 2);
                    } else if (img.width < img.height) {
                        img.scaleToHeight(targetRadius * 2);
                        newrad = (img.height / 2);
                    } else {
                        img.scaleToHeight(targetRadius * 2);
                        img.scaleToWidth(targetRadius * 2);
                        newrad = (Math.min(img.width, img.height) / 2);
                    }
                    img.clipPath = new fabric.Circle({
                        radius: newrad,
                        originX: 'center',
                        originY: 'center',
                    });

                    canvas.add(img, Circle_Shape);
                    canvas.renderAll();
                });
                const imageDataWithoutPrefix = imageUrl.split(',')[1];
                $.ajax({
                    url: "./php/upload_temp.php",
                    method: "POST",
                    data: {
                        imageFile: imageDataWithoutPrefix
                    },
                    success: function (data) {
                        const baseUrl = window.location.origin;
                        if (baseUrl === "http://localhost") {
                            data = 'capstone/' + data;
                        }
                        const images = window.localStorage.getItem('images');
                        if (images) {
                            window.localStorage.setItem('images', images + ',' + data);
                        } else {
                            window.localStorage.setItem('images', data);
                        }
                    }
                });
            };
        reader.readAsDataURL(file);
        }
    });

    $('#logo_seal_company_form').on('submit', function(event) {
        event.preventDefault();
        var company = $(this).find("input[name='company']").val();
        const Circle_Shape = new fabric.Circle({
            left: canvas.width / 2,
            top: canvas.height / 2 - 7,
            originX: 'center',
            originY: 'center',
            radius: 100,
            fill: 'transparent',
            stroke: material,
            strokeWidth: 1,
        });
        canvas.add(Circle_Shape);
        canvas.renderAll();
    });

    $(document).on('click', '#necklace_silver', function() {
        fabric.Image.fromURL('images/customize/necklace_silver.png', function(img) {
            img.set({
                left: canvas.width / 2,
                top: canvas.height / 2,
                originX: 'center',
                originY: 'center',
                scaleX: 0.5,
                scaleY: 0.5,
            });
            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
        });
    })

    $(document).on('click', '#necklace_bronze', function() {
        fabric.Image.fromURL('images/customize/necklace_bronze.png', function(img) {
            img.set({
                left: canvas.width / 2,
                top: canvas.height / 2,
                originX: 'center',
                originY: 'center',
                scaleX: 0.5,
                scaleY: 0.5,
            });
            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
        });
    })

    $(document).on('click', '#necklace_cross', function() {
        fabric.Image.fromURL('images/customize/necklace_' + material + '_cross.png', function(img) {
            img.set({
                left: canvas.width / 2,
                top: canvas.height / 2 + 10,
                originX: 'center',
                originY: 'center',
                scaleX: 0.3,
                scaleY: 0.3,
            });
            canvas.add(img);
        });
        canvas.renderAll(canvas);
    })
}