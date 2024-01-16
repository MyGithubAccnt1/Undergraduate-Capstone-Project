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
    product = document.getElementById('logo_seal_text');
    document.getElementById('5').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('submit', '#logo_seal_company_form', function() {
    event.preventDefault();
    var close = product;
    product = document.getElementById('final');
    document.getElementById('8').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});

$(document).on('click', '#necklace', function() {
    product = document.getElementById('necklace_material');
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
    var close = product;
    product = document.getElementById('necklace_text');
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('submit', '#necklace_text_form', function() {
    event.preventDefault();
    var close = product;
    product = document.getElementById('final');
    document.getElementById('8').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});

$(document).on('click', '#table_nameplate', function() {
    product = document.getElementById('table_nameplate_material');
    document.getElementById('2').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
});
$(document).on('click', '#table_nameplate_wood', function() {
    var close = product;
    product = document.getElementById('table_nameplate_shape');
    material = 'wood';
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#table_nameplate_rectangle', function() {
    var close = product;
    product = document.getElementById('table_nameplate_logo');
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#table_nameplate_image', function() {
    var close = product;
    product = document.getElementById('table_nameplate_company');
    document.getElementById('5').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('submit', '#table_nameplate_company_form', function() {
    var close = product;
    product = document.getElementById('table_nameplate_name');
    document.getElementById('6').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('submit', '#table_nameplate_name_form', function() {
    var close = product;
    product = document.getElementById('table_nameplate_position');
    document.getElementById('7').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('submit', '#table_nameplate_position_form', function() {
    event.preventDefault();
    var close = product;
    product = document.getElementById('final');
    document.getElementById('8').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});

$('.back_product').on('click', function() {
    document.getElementById('1').scrollIntoView();
    new bootstrap.Collapse($(product)).hide();
});
$('.back_logo_seal_shape').on('click', function() {
    var close = product;
    product = document.getElementById('logo_seal_material');
    document.getElementById('2').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$('.back_necklace_shape').on('click', function() {
    var close = product;
    product = document.getElementById('necklace_material');
    document.getElementById('2').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$('.back_necklace_text').on('click', function() {
    var close = product;
    product = document.getElementById('necklace_shape');
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$('.back_table_nameplate_shape').on('click', function() {
    var close = product;
    product = document.getElementById('table_nameplate_material');
    document.getElementById('2').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$('.back_logo_seal_logo').on('click', function() {
    var close = product;
    product = document.getElementById('logo_seal_shape');
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$('.back_table_nameplate_logo').on('click', function() {
    var close = product;
    product = document.getElementById('table_nameplate_shape');
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$('.back_logo_seal_text').on('click', function() {
    var close = product;
    product = document.getElementById('logo_seal_logo');
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$('.back_table_nameplate_company').on('click', function() {
    var close = product;
    product = document.getElementById('table_nameplate_logo');
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$('.back_table_nameplate_name').on('click', function() {
    var close = product;
    product = document.getElementById('table_nameplate_company');
    document.getElementById('5').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$('.back_table_nameplate_position').on('click', function() {
    var close = product;
    product = document.getElementById('table_nameplate_name');
    document.getElementById('6').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$('.reset').on('click', function() {
    window.location.href = 'create_customize.php'
});

function ShowCanvas() {
    const canvas = new fabric.Canvas('canvas', {isDrawingMode: false});
    canvas.setHeight(parseFloat($('.canvas-size').css('height')));
    canvas.setWidth(parseFloat($('.canvas-size').css('width')));
    canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));

    $('#logo_seal, #necklace, #pins, #table_nameplate, .back_necklace_shape, .back_logo_seal_logo, back_table_nameplate_logo, .back_table_nameplate_logo').on('click', function() {
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
    });

    $('.back_product').on('click', function() {
        canvas.setBackgroundImage(null, canvas.renderAll.bind(canvas));
    });

    $('.back_logo_seal_text').on('click', function() {
        var objects = canvas.getObjects();

        if (objects.length >= 2) {
            var lastTwoObjects = objects.slice(-2);
            lastTwoObjects.forEach(function (obj) {
                canvas.remove(obj);
            });
            canvas.renderAll();
        }

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
    });

    $('.back_necklace_text').on('click', function() {
        var objects = canvas.getObjects();

        if (objects.length > 0) {

            if (objects.length > 1) {
                var lastTwoObjects = objects.slice(-2);
                lastTwoObjects.forEach(function (obj) {
                    canvas.remove(obj);
                });
                canvas.renderAll();
            } else {
                var lastTwoObjects = objects.slice(-1);
                lastTwoObjects.forEach(function (obj) {
                    canvas.remove(obj);
                });
                canvas.renderAll();
            }
            
        }
    });

    $('.back_table_nameplate_company').on('click', function() {
        var objects = canvas.getObjects();

        if (objects.length >= 3) {
            var lastTwoObjects = objects.slice(-3);
            lastTwoObjects.forEach(function (obj) {
                canvas.remove(obj);
            });
            canvas.renderAll();
        }

        fabric.Image.fromURL('images/customize/table_nameplate_' + material + '_rectangle.png', function(img) {
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

        var originalZoom = 1;
        var resetZoomCenter = new fabric.Point(((canvas.width / 2) - 200) + (400 * 0.328), (canvas.height / 2));
        canvas.zoomToPoint(resetZoomCenter, originalZoom);
        canvas.renderAll();
    });

    $('.back_table_nameplate_name').on('click', function() {
        var objects = canvas.getObjects();

        if (objects.length >= 1) {
            var lastTwoObjects = objects.slice(-1);
            lastTwoObjects.forEach(function (obj) {
                canvas.remove(obj);
            });
            canvas.renderAll();
        }

        var originalZoom = 1;
        var resetZoomCenter = new fabric.Point((canvas.width / 2), (canvas.height / 2));
        canvas.zoomToPoint(resetZoomCenter, originalZoom);
        canvas.renderAll();

        $("textarea[name='table_nameplate_company']").val('- TYPE YOUR COMPANY HERE -');
        table_nameplate_change_company();
        var zoomFactor = 7.5;
        var newZoom = canvas.getZoom() * zoomFactor;
        var zoomCenter = new fabric.Point(((canvas.width / 2) - 200) + (400 * 0.328), (canvas.height / 2));
        canvas.zoomToPoint(zoomCenter, newZoom);
        canvas.renderAll();
        $("textarea[name='table_nameplate_company']").val('');
        $("textarea[name='table_nameplate_company']").focus();
    });

    $('.back_table_nameplate_position').on('click', function() {
        var objects = canvas.getObjects();

        if (objects.length >= 2) {
            var lastTwoObjects = objects.slice(-2);
            lastTwoObjects.forEach(function (obj) {
                canvas.remove(obj);
            });
            canvas.renderAll();
        }

        $("textarea[name='table_nameplate_name']").val('YOUR NAME');
        table_nameplate_change_name();
        $("textarea[name='table_nameplate_name']").val('');
        $("textarea[name='table_nameplate_name']").focus();
    });

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

    $('#logo_seal_image').on('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const imageUrl = event.target.result;
                fabric.Image.fromURL(imageUrl, function (img) {
                    var targetRadius = 85;
                    img.set({
                        left: canvas.width / 2,
                        top: canvas.height / 2,
                        originX: 'center',
                        originY: 'center',
                        lockMovementX: true,
                        lockMovementY: true,
                        lockScalingX: true,
                        lockScalingY: true
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

                    canvas.add(img);
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
                        window.localStorage.setItem('images', data);
                    }
                });
            };
        reader.readAsDataURL(file);
        }
        $("textarea[name='logo_seal_company']").val('- TYPE YOUR COMPANY NAME HERE -');
        logo_seal_change_text();
        $("textarea[name='logo_seal_company']").val('');
        $("textarea[name='logo_seal_company']").focus();
    });

    function logo_seal_change_text() {
        var company = $("textarea[name='logo_seal_company']").val();

        const textObjects = canvas.getObjects('text');

        if (textObjects.length > 0) {
            const lastIndex = textObjects.length - 1;

            const lastTextObject = textObjects[lastIndex];

            canvas.remove(lastTextObject);
        }

        const circle = new fabric.Circle({
            left: canvas.width / 2,
            top: canvas.height / 2,
            originX: 'center',
            originY: 'center',
            radius: 100,
            fill: 'transparent',
            stroke: 'black',
            strokeWidth: 1
        });

        const text = new fabric.Text(company, {
            left: circle.left,
            top: circle.top,
            fontSize: 16,
            fontFamily: $("#logo_seal_font").val(),
            fill: 'black',
            path: new fabric.Path('M 0 -50 A 98 98 0 1 1 0.1 -50', {
                fill: null,
                stroke: null,
                strokeWidth: 0
            }),
            originX: 'center',
            originY: 'center',
            lockMovementX: true,
            lockMovementY: true,
            lockScalingX: true,
            lockScalingY: true
        });

        canvas.add(text);
    }

    $("textarea[name='logo_seal_company']").on('input change', function() {
        logo_seal_change_text();
    });

    $("#logo_seal_font").on('change', function() {
        logo_seal_change_text();
    });

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
                evented: false
            });
            canvas.add(img);
        });
        canvas.renderAll();
        $("textarea[name='necklace_text']").focus();
    })

    function necklace_text_change_text() {
        var company = $("textarea[name='necklace_text']").val();

        const textObjects = canvas.getObjects('text');

        if (textObjects.length > 0) {
            const lastIndex = textObjects.length - 1;

            const lastTextObject = textObjects[lastIndex];

            canvas.remove(lastTextObject);
        }

        const text = new fabric.Text(company, {
            left: canvas.width / 2,
            top: canvas.height / 2 - 21,
            fontSize: 15,
            fontFamily: $("#necklace_text_font").val(),
            fill: material,
            originX: 'center',
            originY: 'center'
        });

        canvas.add(text);
    }

    $("textarea[name='necklace_text']").on('input change', function() {
        necklace_text_change_text();
    });

    $(document).on('click', '#table_nameplate_rectangle', function() {
        fabric.Image.fromURL('images/customize/table_nameplate_' + material + '_rectangle.png', function(img) {
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

    $('#table_nameplate_image').on('change', function (e) {
        const circle = new fabric.Circle({
            left: ((canvas.width / 2) - 200) + (400 * 0.35),
            top: (canvas.height / 2) - ((canvas.height / 2) * 0.015),
            originX: 'center',
            originY: 'center',
            radius: 15,
            fill: 'yellow',
            selectable: false,
            evented: false
        });
        canvas.add(circle);
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const imageUrl = event.target.result;
                fabric.Image.fromURL(imageUrl, function (img) {
                    var targetRadius = 10;
                    img.set({
                        left: ((canvas.width / 2) - 200) + (400 * 0.35),
                        top: (canvas.height / 2) - ((canvas.height / 2) * 0.015),
                        originX: 'center',
                        originY: 'center',
                        lockMovementX: true,
                        lockMovementY: true,
                        lockScalingX: true,
                        lockScalingY: true
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

                    canvas.add(img);
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
                        window.localStorage.setItem('images', data);
                    }
                });
            };
        reader.readAsDataURL(file);
        }
        $("textarea[name='table_nameplate_company']").val('- TYPE YOUR COMPANY HERE -');
        table_nameplate_change_company();
        var zoomFactor = 7.5;
        var newZoom = canvas.getZoom() * zoomFactor;
        var zoomCenter = new fabric.Point(((canvas.width / 2) - 200) + (400 * 0.328), (canvas.height / 2));
        canvas.zoomToPoint(zoomCenter, newZoom);
        canvas.renderAll();
        $("textarea[name='table_nameplate_company']").val('');
        $("textarea[name='table_nameplate_company']").focus();
    });

    var text_angle = 0;

    function table_nameplate_change_company() {
        var company = $("textarea[name='table_nameplate_company']").val();

        const textObjects = canvas.getObjects('text');

        if (textObjects.length > 0) {
            const lastIndex = textObjects.length - 1;

            const lastTextObject = textObjects[lastIndex];

            canvas.remove(lastTextObject);
        }

        const circle = new fabric.Circle({
            left: ((canvas.width / 2) - 200) + (400 * 0.35),
            top: (canvas.height / 2) - ((canvas.height / 2) * 0.015),
            originX: 'center',
            originY: 'center',
            radius: 12,
            fill: 'transparent',
            stroke: 'white',
            strokeWidth: 1
        });

        const text = new fabric.Text(company, {
            left: circle.left,
            top: circle.top,
            fontSize: 3,
            fontFamily: 'Courier',
            fill: 'black',
            path: new fabric.Path('M 0 -50 A 11.5 11.5 0 1 1 0.1 -50', {
                fill: null,
                stroke: null,
                strokeWidth: 0
            }),
            originX: 'center',
            originY: 'center',
            lockMovementX: true,
            lockMovementY: true,
            lockScalingX: true,
            lockScalingY: true
        });

        text.angle = text_angle;
        canvas.add(text);

        text.on('rotating', function(options) {
            text_angle = text.angle;
        });
    }

    $("textarea[name='table_nameplate_company']").on('input change', function() {
        table_nameplate_change_company();
    });

    $('#table_nameplate_company_form').on('submit', function(event) {
        event.preventDefault();

        $("textarea[name='table_nameplate_name']").val('YOUR NAME');
        table_nameplate_change_name();
        $("textarea[name='table_nameplate_name']").val('');
        $("textarea[name='table_nameplate_name']").focus();

        var originalZoom = 1;
        var resetZoomCenter = new fabric.Point(((canvas.width / 2) - 200) + (400 * 0.328), (canvas.height / 2));
        canvas.zoomToPoint(resetZoomCenter, originalZoom);
        canvas.renderAll();

        if (window.innerWidth > 1023) {
            var zoomFactor = 2.5;
            var newZoom = canvas.getZoom() * zoomFactor;
            var zoomCenter = new fabric.Point(canvas.width / 2, canvas.height / 2);
            canvas.zoomToPoint(zoomCenter, newZoom);
            canvas.renderAll();
        } else {
            var zoomFactor = 1.5;
            var newZoom = canvas.getZoom() * zoomFactor;
            var zoomCenter = new fabric.Point(canvas.width / 2, canvas.height / 2);
            canvas.zoomToPoint(zoomCenter, newZoom);
            canvas.renderAll();
        }
    });

    function table_nameplate_change_name() {
        var name = $("textarea[name='table_nameplate_name']").val();

        const text = new fabric.Text(name, {
            left: ((canvas.width / 2) - 200) + (400 * 0.565),
            top: (canvas.height / 2) - ((canvas.height / 2) * 0.035),
            fontSize: 9,
            fontFamily: 'Courier',
            fill: 'gold',
            originX: 'center',
            originY: 'center',
            lockMovementX: true,
            lockMovementY: true,
            lockRotation: true
        });

        canvas.add(text);
    }

    $("textarea[name='table_nameplate_name']").on('input change', function() {
        const textObjects = canvas.getObjects('text');

        if (textObjects.length > 0) {
            const lastIndex = textObjects.length - 1;

            const lastTextObject = textObjects[lastIndex];

            canvas.remove(lastTextObject);
        }

        if ($("textarea[name='table_nameplate_name']").val().length > 26) {
            var name = $("textarea[name='table_nameplate_name']").val();

            const text = new fabric.Text(name, {
                left: ((canvas.width / 2) - 200) + (400 * 0.55),
                top: (canvas.height / 2) - ((canvas.height / 2) * 0.035),
                fontSize: 8,
                fontFamily: 'Courier',
                fill: 'gold',
                originX: 'center',
                originY: 'center',
                lockMovementX: true,
                lockMovementY: true,
                lockRotation: true
            });

            canvas.add(text);
        } else {
            table_nameplate_change_name();
        }
    });

    let table_nameplate_text_left, table_nameplate_text_size;

    $('#table_nameplate_name_form').on('submit', function(event) {
        event.preventDefault();

        if ($("textarea[name='table_nameplate_name']").val().length > 26) {
            table_nameplate_text_left = ((canvas.width / 2) - 200) + (400 * 0.55);
            table_nameplate_text_size = 8;
        } else {
            table_nameplate_text_left = ((canvas.width / 2) - 200) + (400 * 0.565);
            table_nameplate_text_size = 9;
        }

        $("textarea[name='table_nameplate_position']").val('YOUR POSITION');
        table_nameplate_change_position();
        $("textarea[name='table_nameplate_position']").val('');
        $("textarea[name='table_nameplate_position']").focus();
    });

    function table_nameplate_change_position() {
        var name = $("textarea[name='table_nameplate_position']").val();

        const text = new fabric.Text(name, {
            left: table_nameplate_text_left,
            top: (canvas.height / 2) - ((canvas.height / 2) * 0),
            fontSize: table_nameplate_text_size,
            fontFamily: 'Courier',
            fill: 'gold',
            originX: 'center',
            originY: 'center',
            lockMovementX: true,
            lockMovementY: true,
            lockRotation: true
        });

        canvas.add(text);
    }

    $("textarea[name='table_nameplate_position']").on('input change', function() {
        const textObjects = canvas.getObjects('text');

        if (textObjects.length > 0) {
            const lastIndex = textObjects.length - 1;

            const lastTextObject = textObjects[lastIndex];

            canvas.remove(lastTextObject);
        }

        table_nameplate_change_position();
    });
}