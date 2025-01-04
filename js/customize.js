$(window).on('load', function() {
    ShowCanvas();
    var currentURL = window.location.href;
    if (currentURL !== "http://20.205.112.210/customize.php" && currentURL !== "http://localhost/capstone/customize.php") {
        var category = new URLSearchParams(currentURL).get('category');
        if (category === "Logo") {
            $('#logo_seal').click();
        } else if (category === "Necklace") {
            $('#necklace').click();
        } else if (category === "Table") {
            $('#table_nameplate').click();
        }
    } else {
        window.localStorage.removeItem('quantity');
    }
    window.localStorage.removeItem('images');
});

let product, material, shape, category, company, necklace_text, name, necklace_engrave;

$(document).on('click', '#logo_seal', function() {
    product = document.getElementById('logo_seal_material');
    category = 'logo seal';
    document.getElementById('2').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
});
$(document).on('click', '#logo_seal_silver', function() {
    var close = product;
    product = document.getElementById('logo_seal_logo');
    material = 'silver';
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#logo_seal_bronze', function() {
    var close = product;
    product = document.getElementById('logo_seal_logo');
    material = 'bronze';
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('submit', '#logo_seal_company_form', function() {
    $("textarea[name='logo_seal_company']").blur();
    event.preventDefault();
    var close = product;
    document.getElementById('8').scrollIntoView();
    new bootstrap.Collapse($('#final')).show();
    new bootstrap.Collapse($(close)).hide();
    company = $('textarea[name="logo_seal_company"]').val();
});

$(document).on('click', '#necklace', function() {
    product = document.getElementById('necklace_material');
    category = 'necklace';
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
$(document).on('click', '#necklace_shape_cross', function() {
    var close = product;
    product = document.getElementById('necklace_engrave');
    shape = 'cross';
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#necklace_shape_circle', function() {
    var close = product;
    product = document.getElementById('necklace_engrave');
    shape = 'circle';
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#necklace_shape_text', function() {
    var close = product;
    shape = 'text';
    product = document.getElementById('necklace_text_body');
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#necklace_engrave_text', function() {
    var close = product;
    product = document.getElementById('necklace_text');
    document.getElementById('5').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('click', '#necklace_engrave_image', function() {
    var close = product;
    product = document.getElementById('necklace_image');
    document.getElementById('5').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
});
$(document).on('submit', '#necklace_text_body_form', function() {
    $('textarea[name="necklace_text_body"]').blur();
    event.preventDefault();
    var close = product;
    document.getElementById('8').scrollIntoView();
    new bootstrap.Collapse($('#final')).show();
    new bootstrap.Collapse($(close)).hide();
    necklace_text = $('textarea[name="necklace_text_body"]').val();
});

$(document).on('click', '#table_nameplate', function() {
    product = document.getElementById('table_nameplate_logo');
    category = 'table nameplate';
    material = 'wood';
    document.getElementById('2').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
});
$(document).on('submit', '#table_nameplate_company_form', function() {
    $("textarea[name='table_nameplate_company']").blur();
    var close = product;
    product = document.getElementById('table_nameplate_name');
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
    company = $('textarea[name="table_nameplate_company"]').val();
});
$(document).on('submit', '#table_nameplate_name_form', function() {
    $('textarea[name="table_nameplate_name"]').blur();
    var close = product;
    product = document.getElementById('table_nameplate_position');
    document.getElementById('5').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
    name = $('textarea[name="table_nameplate_name"]').val();
});
$(document).on('submit', '#table_nameplate_position_form', function() {
    $('textarea[name="table_nameplate_position"]').blur();
    event.preventDefault();
    var close = product;
    document.getElementById('8').scrollIntoView();
    new bootstrap.Collapse($('#final')).show();
    new bootstrap.Collapse($(close)).hide();
    position = $('textarea[name="table_nameplate_position"]').val();
});

$('.back_product').on('click', function() {
    document.getElementById('1').scrollIntoView();
    new bootstrap.Collapse($(product)).hide();
});
$('.back_logo_seal_logo').on('click', function() {
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
    shape = null;
});
$('.back_necklace_engrave').on('click', function() {
    var close = product;
    product = document.getElementById('necklace_shape');
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
    necklace_text = null;
    $('textarea[name="necklace_note"]').val('');
});
$('.back_necklace_text, .back_necklace_image').on('click', function() {
    var close = product;
    product = document.getElementById('necklace_engrave');
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
    necklace_engrave = null;
    $('#necklace_image_file').val('');
});
$('.back_logo_seal_text').on('click', function() {
    var close = product;
    product = document.getElementById('logo_seal_logo');
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
    company = null;
    $('textarea[name="logo_seal_note"]').val('');
});
$('.back_table_nameplate_company').on('click', function() {
    var close = product;
    product = document.getElementById('table_nameplate_logo');
    document.getElementById('2').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
    company = null;
    $('textarea[name="table_nameplate_note_uno"]').val('');
});
$('.back_table_nameplate_name').on('click', function() {
    var close = product;
    product = document.getElementById('table_nameplate_company');
    document.getElementById('3').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
    name = null;
    $('textarea[name="table_nameplate_note_dos"]').val('');
});
$('.back_table_nameplate_position').on('click', function() {
    var close = product;
    product = document.getElementById('table_nameplate_name');
    document.getElementById('4').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
    new bootstrap.Collapse($(close)).hide();
    position = null;
    $('textarea[name="table_nameplate_note_tres"]').val('');
});
$(document).on('click', '#upload_design', function() {
    product = document.getElementById('own_design');
    category = 'own design';
    document.getElementById('2').scrollIntoView();
    new bootstrap.Collapse($(product)).show();
});
$('.exit_customize').on('click', function() {
    try {
        history.back();
    } catch (error) {
        window.location.href = 'index.php';
    }
});

function ShowCanvas() {
    const canvas = new fabric.Canvas('canvas', {isDrawingMode: false});
    canvas.setHeight(parseFloat($('.canvas-size').css('height')));
    canvas.setWidth(parseFloat($('.canvas-size').css('width')));
    canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));

    $('#logo_seal, #necklace, #pins, .back_necklace_shape, .back_logo_seal_logo, back_table_nameplate_logo, .back_table_nameplate_logo').on('click', function() {
        fabric.Image.fromURL('images/chat_saint.png', function(img) {
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

    $('.back_necklace_engrave').on('click', function() {
        var objects = canvas.getObjects();

        if (objects.length > 0) {
            var lastTwoObjects = objects.slice(-1);
            lastTwoObjects.forEach(function (obj) {
                canvas.remove(obj);
            });
        }
    });

    $('.back_necklace_text').on('click', function() {
        var objects = canvas.getObjects();

        if (objects.length > 1) {
            canvas.clear();
            canvas.setHeight(parseFloat($('.canvas-size').css('height')));
            canvas.setWidth(parseFloat($('.canvas-size').css('width')));
            canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));
            fabric.Image.fromURL('images/customize/necklace_' + material + '.png', function(img) {
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
            fabric.Image.fromURL('images/customize/necklace_' + material + '_' + shape + '.png', function(img) {
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
        }
        $('#necklace_text_form .necklace_convert').prop('disabled', true);
    });

    $('.back_necklace_image').on('click', function() {
        var objects = canvas.getObjects();

        if (objects.length > 0) {
            canvas.clear();
            canvas.setHeight(parseFloat($('.canvas-size').css('height')));
            canvas.setWidth(parseFloat($('.canvas-size').css('width')));
            canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));
            fabric.Image.fromURL('images/customize/necklace_' + material + '.png', function(img) {
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
            fabric.Image.fromURL('images/customize/necklace_' + material + '_' + shape + '.png', function(img) {
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

    $('.back_final').on('click', function() {
        if (product.id === 'table_nameplate_position' || product.id === 'necklace_image' || product.id === 'necklace_text') {
            document.getElementById('5').scrollIntoView();
            if (product.id !== 'table_nameplate_position') {
                canvas.clear();
                canvas.setHeight(parseFloat($('.canvas-size').css('height')));
                canvas.setWidth(parseFloat($('.canvas-size').css('width')));
                canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));
                fabric.Image.fromURL('images/customize/necklace_' + material + '.png', function(img) {
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
                fabric.Image.fromURL('images/customize/necklace_' + material + '_' + shape + '.png', function(img) {
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
                $('#necklace_text_form .necklace_convert').prop('disabled', true);
                $('#necklace_text_form textarea[name="necklace_text"]').val('');
            }
        } else if (product.id === 'necklace_text_body' || product.id === 'logo_seal_text') {
            document.getElementById('4').scrollIntoView();
        } else if (product.id === 'own_design') {
            document.getElementById('2').scrollIntoView();
        }
        new bootstrap.Collapse($(product)).show();
        new bootstrap.Collapse($('#final')).hide();
        if ($('#final_reference').val()) {
            $('#final_reference').val('');
        }
    });

    $(document).on('click', '#logo_seal_silver, #logo_seal_bronze', function() {
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
                        data = data.trim();
                        window.localStorage.setItem('images', data);
                    }
                });
            };
            reader.readAsDataURL(file);
            var close = product;
            product = document.getElementById('logo_seal_text');
            document.getElementById('4').scrollIntoView();
            new bootstrap.Collapse($(product)).show();
            new bootstrap.Collapse($(close)).hide();
            $("textarea[name='logo_seal_company']").val('>            YOUR TEXT WILL APPEAR HERE >');
            logo_seal_change_text();
            $("textarea[name='logo_seal_company']").val('');
            $('#logo_seal_image').val('');
        } else {
            alert('Uploading image is canceled.');
            window.localStorage.removeItem('images');
        }
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

    $("textarea[name='logo_seal_company']").on('input', function() {
        if ($(this).val().length < 65) {
            logo_seal_change_text();
        } else {
            $(this).val($(this).val().substring(0, 64));
        }
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

    $(document).on('click', '#necklace_shape_cross', function() {
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
    })

    $(document).on('click', '#necklace_shape_circle', function() {
        fabric.Image.fromURL('images/customize/necklace_' + material + '_circle.png', function(img) {
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
    })

    $(document).on('click', '#necklace_shape_text', function() {
        $("textarea[name='necklace_text_body']").val('');
    });

    $("textarea[name='necklace_text_body']").on('input', function() {
        necklace_text_body();
    });

    function necklace_text_body() {
        var UserText = $("textarea[name='necklace_text_body']").val();

        const textObjects = canvas.getObjects('text');

        if (textObjects.length > 0) {
            const lastIndex = textObjects.length - 1;
            const lastTextObject = textObjects[lastIndex];
            canvas.remove(lastTextObject);
        }

        const text = new fabric.Text(UserText, {
            left: canvas.width / 2,
            top: canvas.height / 2 - 10,
            fontSize: 75,
            fontFamily: 'Great Vibes',
            fill: material,
            originX: 'center',
            originY: 'center'
        });

        canvas.add(text);
    }

    $(document).on('click', '#necklace_engrave_text', function() {
        $("textarea[name='necklace_text']").val('SAMPLE');
        necklace_text_change_text();
        $("textarea[name='necklace_text']").val('');
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
            fill: 'black',
            originX: 'center',
            originY: 'center'
        });

        canvas.add(text);
    }

    $("textarea[name='necklace_text']").on('input', function() {
        necklace_text_change_text();
    });

    $("#necklace_text_font").on('change', function() {
        necklace_text_change_text();
    });

    $('#necklace_text_form').on('submit', function(e){
        e.preventDefault();
        canvas.setBackgroundImage(null, canvas.renderAll.bind(canvas));
        fabric.Image.fromURL('images/customize/necklace_' + material + '_' + shape + '.png', function(maskImage) {
            maskImage.set({
                scaleX: 0.3,
                scaleY: 0.3,
                left: canvas.width / 2,
                top: canvas.height / 2 + 10,
                originX: 'center',
                originY: 'center',
                evented: false
            });

            const textObjects = canvas.getObjects('text');

            if (textObjects.length > 0) {
                const lastIndex = textObjects.length - 1;

                const lastTextObject = textObjects[lastIndex];

                lastTextObject.globalCompositeOperation = 'source-atop';
                maskImage.globalCompositeOperation = 'destination-in';

                canvas.add(maskImage, lastTextObject);
                canvas.setActiveObject(lastTextObject);
                canvas.renderAll();

                $('.necklace_convert').prop('disabled', false);
            }
        });
    });

    $('#necklace_image_file').on('change', function (e) {
        const textObjects = canvas.getObjects();

        if (textObjects.length > 0) {
            const lastIndex = textObjects.length - 1;

            const lastTextObject = textObjects[lastIndex];

            canvas.remove(lastTextObject);
        }

        const file = e.target.files[0];
        if (file) {
            canvas.setBackgroundImage(null, canvas.renderAll.bind(canvas));
            const reader = new FileReader();
            reader.onload = function (event) {
                const imageUrl = event.target.result;
                fabric.Image.fromURL('images/customize/necklace_' + material + '_' + shape + '.png', function(maskImage) {
                    maskImage.set({
                        scaleX: 0.3,
                        scaleY: 0.3,
                        left: canvas.width / 2,
                        top: canvas.height / 2 + 10,
                        originX: 'center',
                        originY: 'center',
                        evented: false
                    });

                    fabric.Image.fromURL(imageUrl, function(clippedImage) {

                        clippedImage.set({
                            left: canvas.width / 2,
                            top: canvas.height / 2 + 10,
                            originX: 'center',
                            originY: 'center'
                        });

                        if (clippedImage.width > clippedImage.height) {
                            clippedImage.scaleToWidth(maskImage.width * 0.3);
                        } else if (clippedImage.width < clippedImage.height) {
                            clippedImage.scaleToHeight(maskImage.height * 0.3);
                        } else {
                            clippedImage.scaleToHeight(maskImage.height * 0.3);
                            clippedImage.scaleToWidth(maskImage.width * 0.3);
                        }

                        clippedImage.globalCompositeOperation = 'source-atop';
                        maskImage.globalCompositeOperation = 'destination-in';

                        canvas.add(maskImage, clippedImage);
                        canvas.renderAll();
                    });
                });
                const imageDataWithoutPrefix = imageUrl.split(',')[1];
                $.ajax({
                    url: "./php/upload_temp.php",
                    method: "POST",
                    data: {
                        imageFile: imageDataWithoutPrefix
                    },
                    success: function (data) {
                        data = data.trim();
                        const baseUrl = window.location.origin;
                        window.localStorage.setItem('images', data);
                    }
                });
            };
            reader.readAsDataURL(file);
        } else {
            alert('Uploading image is canceled.');
            window.localStorage.removeItem('images');
            canvas.clear();
            canvas.setHeight(parseFloat($('.canvas-size').css('height')));
            canvas.setWidth(parseFloat($('.canvas-size').css('width')));
            canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));
            fabric.Image.fromURL('images/customize/necklace_' + material + '.png', function(img) {
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
            fabric.Image.fromURL('images/customize/necklace_' + material + '_' + shape + '.png', function(img) {
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
        }
    });

    $('.necklace_convert').on('click', function() {
        const textObjects = canvas.getObjects();

        if (textObjects.length > 1) {
            
            var compositionDataURL = canvas.toDataURL({
                format: 'png',
                quality: 1.0
            });

            fabric.Image.fromURL(compositionDataURL, function(savedImage) {
                savedImage.set({
                    left: canvas.width / 2,
                    top: canvas.height / 2,
                    originX: 'center',
                    originY: 'center',
                    evented: false
                });

                canvas.clear();
                canvas.setHeight(parseFloat($('.canvas-size').css('height')));
                canvas.setWidth(parseFloat($('.canvas-size').css('width')));
                canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));
                fabric.Image.fromURL('images/customize/necklace_' + material + '.png', function(img) {
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
                canvas.add(savedImage);
                canvas.renderAll();
            });
            $('textarea[name="necklace_text"]').blur();
            var close = product;
            document.getElementById('8').scrollIntoView();
            new bootstrap.Collapse($('#final')).show();
            new bootstrap.Collapse($(close)).hide();
            $('#necklace_image_file').val('');
        }
        necklace_engrave = $('textarea[name="necklace_text"]').val();
    });

    $(document).on('click', '#table_nameplate', function() {
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
        const file = e.target.files[0];
        if (file) {
            const circle = new fabric.Circle({
                left: ((canvas.width / 2) - 200) + (400 * 0.35),
                top: (canvas.height / 2) - ((canvas.height / 2) * 0.015),
                originX: 'center',
                originY: 'center',
                radius: 14,
                fill: 'yellow',
                selectable: false,
                evented: false
            });
            canvas.add(circle);
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
                        data = data.trim();
                        const baseUrl = window.location.origin;
                        window.localStorage.setItem('images', data);
                    }
                });
            };
            reader.readAsDataURL(file);
            var close = product;
            product = document.getElementById('table_nameplate_company');
            document.getElementById('3').scrollIntoView();
            new bootstrap.Collapse($(product)).show();
            new bootstrap.Collapse($(close)).hide();
            $("textarea[name='table_nameplate_company']").val('>            YOUR TEXT WILL APPEAR HERE >');
            table_nameplate_change_company();
            var zoomFactor = 7.5;
            var newZoom = canvas.getZoom() * zoomFactor;
            var zoomCenter = new fabric.Point(((canvas.width / 2) - 200) + (400 * 0.328), (canvas.height / 2));
            canvas.zoomToPoint(zoomCenter, newZoom);
            canvas.renderAll();
            $("textarea[name='table_nameplate_company']").val('');
            $('#table_nameplate_image').val('');
        } else {
            alert('Uploading image is canceled.');
            window.localStorage.removeItem('images');
        }
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
            radius: 11,
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
            path: new fabric.Path('M 0 -50 A 11 11 0 1 1 0.1 -50', {
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

    $("textarea[name='table_nameplate_company']").on('input', function() {
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
            fontFamily: 'Arial Black',
            fill: 'gold',
            originX: 'center',
            originY: 'center',
            lockMovementX: true,
            lockMovementY: true,
            lockRotation: true
        });

        canvas.add(text);
    }

    $("textarea[name='table_nameplate_name']").on('input', function() {
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
                fontFamily: 'Arial Black',
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
    });

    function table_nameplate_change_position() {
        var name = $("textarea[name='table_nameplate_position']").val();

        const text = new fabric.Text(name, {
            left: table_nameplate_text_left,
            top: (canvas.height / 2) - ((canvas.height / 2) * 0),
            fontSize: table_nameplate_text_size,
            fontFamily: 'Arial Black',
            fill: 'gold',
            originX: 'center',
            originY: 'center',
            lockMovementX: true,
            lockMovementY: true,
            lockRotation: true
        });

        canvas.add(text);
    }

    $("textarea[name='table_nameplate_position']").on('input', function() {
        const textObjects = canvas.getObjects('text');

        if (textObjects.length > 0) {
            const lastIndex = textObjects.length - 1;

            const lastTextObject = textObjects[lastIndex];

            canvas.remove(lastTextObject);
        }

        table_nameplate_change_position();
    });

    $('#try_me_ar').on('click', function() {
        canvas.setBackgroundColor(null, canvas.renderAll.bind(canvas));
        if (category === 'necklace') {
            canvas.setBackgroundImage(null, canvas.renderAll.bind(canvas));
        }
        var zoomFactor = 1;
        var zoomCenter = new fabric.Point(canvas.width / 2, canvas.height / 2);
        canvas.zoomToPoint(zoomCenter, zoomFactor);
        canvas.renderAll();
        localStorage.setItem('Object', canvas.toDataURL({ format: 'png', quality: 1.0 }));
        localStorage.setItem('category', category);
        localStorage.setItem('material', material);
        var popupWindow = window.open('try_me_ar.php', 'Popup', 'width=' + window.screen.width + ', height=' + window.screen.height + ', resizable=yes, scrollbars=no');
        canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));
        if (category === 'necklace') {
            fabric.Image.fromURL('images/customize/necklace_' + material + '.png', function(img) {
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
    });

    $('#final_reference').on('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const imageUrl = event.target.result;
                const imageDataWithoutPrefix = imageUrl.split(',')[1];
                $.ajax({
                    url: "./php/upload_temp.php",
                    method: "POST",
                    data: {
                        imageFile: imageDataWithoutPrefix
                    },
                    success: function (data) {
                        data = data.trim();
                        data = window.localStorage.getItem('images') + ', ' + data;
                        window.localStorage.setItem('images', data);
                    }
                });
            };
            reader.readAsDataURL(file);
        } else {
            alert('Uploading reference image is canceled.');
            let data = window.localStorage.getItem('images');
            console.log(data.split(',')[0]);
            window.localStorage.setItem('images', data.split(',')[0]);
        }
    });

    $('.back_own_design').on('click', function() {
        $('#own_design_image').val('');
        document.getElementById('1').scrollIntoView();
        new bootstrap.Collapse($(product)).hide();
        $('textarea[name="own_design_note"]').val('');
        const textObjects = canvas.getObjects();
        if (textObjects.length > 0) {
            const lastIndex = textObjects.length - 1;
            const lastTextObject = textObjects[lastIndex];
            canvas.remove(lastTextObject);
        }
    })

    $('#own_design_image').on('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const imageUrl = event.target.result;
                fabric.Image.fromURL(imageUrl, function (img) {
                    img.set({
                        left: canvas.width / 2,
                        top: canvas.height / 2,
                        originX: 'center',
                        originY: 'center',
                        evented: false
                    });

                    var scaleX = canvas.width / img.width;
                    var scaleY = canvas.height / img.height;

                    var scaleToFit = Math.min(scaleX, scaleY);

                    img.scaleX = scaleToFit;
                    img.scaleY = scaleToFit;

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
                        data = data.trim();
                        window.localStorage.setItem('images', data);
                    }
                });
            };
            reader.readAsDataURL(file);
        } else {
            alert('Uploading image is canceled.');
            window.localStorage.removeItem('images');
        }
    });

    $('.next_own_design').on('click', function() {
        if ($('#own_design_image').val()) {
            var close = product;
            document.getElementById('8').scrollIntoView();
            new bootstrap.Collapse($('#final')).show();
            new bootstrap.Collapse($(close)).hide();
        }
    })

    $('#order').on('click', function() {
        $(".loader").fadeIn('slow');
        let log;
        if (material === 'silver') {
            material = 'stainless';
        } else if (material === 'bronze') {
            material = 'brass';
        }
        if (category === 'logo seal') {
            log = 'Product: ' + category + ', Material: ' + material + ', Company: ' + company;
            if ($('textarea[name="logo_seal_note"]').val()) {
                log = log + ', Note: ' + $('textarea[name="logo_seal_note"]').val();
                $('textarea[name="logo_seal_note"]').val('');
            }
        } else if (category === 'necklace') {
            if (shape === 'text') {
                log = 'Product: ' + category + ', Material: ' + material + ', Style: ' + shape + ', Text: ' + necklace_text;
            } else {
                if (necklace_engrave) {
                    log = 'Product: ' + category + ', Material: ' + material + ', Style: ' + shape + ', Text: ' + necklace_engrave;
                } else {
                    log = 'Product: ' + category + ', Material: ' + material + ', Style: ' + shape;
                    if ($('textarea[name="necklace_note"]').val()) {
                        log = log + ', Note: ' + $('textarea[name="necklace_note"]').val();
                        $('textarea[name="necklace_note"]').val('');
                    }
                }
            }
        } else if (category === 'table nameplate') {
            log = 'Product: ' + category + ', Material: ' + material + ', Text: ' + company + ', Name: ' + name + ', Position: ' + position;
            if ($('textarea[name="table_nameplate_note_uno"]').val()) {
                log = log + ', Note: ' + $('textarea[name="table_nameplate_note_uno"]').val();
                $('textarea[name="table_nameplate_note_uno"]').val('');
            }
            if ($('textarea[name="table_nameplate_note_dos"]').val()) {
                log = log + ', Note: ' + $('textarea[name="table_nameplate_note_dos"]').val();
                $('textarea[name="table_nameplate_note_dos"]').val('');
            }
            if ($('textarea[name="table_nameplate_note_tres"]').val()) {
                log = log + ', Note: ' + $('textarea[name="table_nameplate_note_tres"]').val();
                $('textarea[name="table_nameplate_note_tres"]').val('');
            }
        } else if (category === 'own design') {
            log = 'Product: ' + category;
            if ($('textarea[name="own_design_note"]').val()) {
                log = log + ', Note: ' + $('textarea[name="own_design_note"]').val();
                $('textarea[name="own_design_note"]').val('');
            }
        }
        if (window.localStorage.getItem('images') !== null) {
            log = log + ', Reference: ' + window.localStorage.getItem('images');
            window.localStorage.setItem('details', log);
        } else {
            window.localStorage.setItem('details', log);
        }
        canvas.setBackgroundColor(null, canvas.renderAll.bind(canvas));
        var zoomFactor = 1;
        var zoomCenter = new fabric.Point(canvas.width / 2, canvas.height / 2);
        canvas.zoomToPoint(zoomCenter, zoomFactor);
        canvas.renderAll();
        const dataURL = canvas.toDataURL('image/png');
        const imageDataWithoutPrefix = dataURL.split(',')[1];
        $.ajax({
            url: "./php/upload_temp.php",
            method: "POST",
            data: {
                imageFile: imageDataWithoutPrefix
            },
            success: function (data) {
                data = data.trim();
                canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));
                window.localStorage.setItem('preview', data);
                window.location.href = 'checkout_customize_summary.php'
                $('#final_reference').val('');
            }
        });
    });
}
function guide(element) {
    var $guide = $('#guide');
    var offset = element.offset();
    var rightPosition = offset.left + element.outerWidth();
    var topPosition = offset.top + element.outerHeight();
    $guide.css({
        top: topPosition + 'px',
        left: rightPosition + 'px'
    });
    $guide.stop(true, true).fadeIn('slow', function() {
        if ((rightPosition + $guide.width()) > $(window).width()) {
            $guide.css({
                width: ($(window).width() * 0.75) + 'px',
                height: 'auto',
            });
            if ((rightPosition + $guide.width()) > $(window).width()) {
                $guide.css({
                    width: ($(window).width() * 0.5) + 'px'
                });
                if ((rightPosition + $guide.width()) > $(window).width()) {
                    $guide.css({
                        width: $(window).width() + 'px',
                        top: topPosition + 'px',
                        left: 0 + 'px'
                    });
                }
            }
        }
    });
}
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/select_product.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#product_guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/directory_select_logo.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#directorymarker_logo-guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/directory_insert_company.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#directorymarker_company-guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/necklace_engrave_text.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#necklace_engrave_text-guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/necklace_engrave_image.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#necklace_engrave_image-guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/table_select_logo.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#tablenameplate_logo-guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/table_insert_text.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#tablenameplate_company-guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/table_insert_name.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#tablenameplate_text-guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/table_insert_position.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#tablenameplate_position-guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/final_design.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#final-guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/necklace_text.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#necklace_text_body-guide');
$(document).on({
    mouseover: function () {
        guide($(this));
        $('#guide').attr('src', 'images/own_design.gif');
    },
    mouseout: function () {
        $('#guide').stop(true, true).delay(250).fadeOut('slow');
    }
}, '#own_design-guide');