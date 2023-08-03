const canvas = new fabric.Canvas('canvas', {isDrawingMode: false}),
back = document.querySelector(".back"),
toolBtns = document.querySelectorAll(".tool");

back.addEventListener("click", () => {
  window.location.href = "customize.php";
});

toolBtns.forEach(btn => {
  btn.addEventListener("click", () => { // adding click event to all tool option
    // removing active class from the previous option and adding on current clicked option
    document.querySelector(".options .active").classList.remove("active");
    btn.classList.add("active");
    selectedTool = btn.id;
  });
});

canvas.setHeight(800);
canvas.setWidth(800);
canvas.setBackgroundImage('images/heart.png', canvas.renderAll.bind(canvas));
canvas.freeDrawingBrush.color = 'black';
canvas.freeDrawingBrush.width = 7;

$('#draw').on('click', function () {
    canvas.isDrawingMode = !canvas.isDrawingMode;
});

$('#rectangle').on('click', function () {
    canvas.isDrawingMode = false;
    const rectangle = new fabric.Rect({
        left: 40,
        top: 40,
        width: 60,
        height: 60,
        fill: 'transparent',
        stroke: 'black',
        strokeWidth: 7,
    });
    canvas.add(rectangle);
});

$('#circle').on('click', function () {
    canvas.isDrawingMode = false;
    const circle = new fabric.Circle({
        left: 40,
        top: 40,
        radius: 60,
        fill: 'transparent',
        stroke: 'black',
        strokeWidth: 7,
    });
    canvas.add(circle);
});

$('#text').on('click', function () {
    canvas.isDrawingMode = false;
    const text = new fabric.IText('Text', {
        left: 40,
        top: 40,
        objecttype: 'text',
        fontFamily: 'arial black',
        fill: 'black',
    });
    canvas.add(text);
});

$('#remove').on('click', function () {
    canvas.isDrawingMode = false;
    canvas.remove(canvas.getActiveObject());
});

canvas.on('selection:created', function () {
    $('#remove').prop('disabled', '');
});
canvas.on('selection:cleared', function () {
    $('#remove').prop('disabled', 'disabled');
});

$('#tosvg').on('click', function () {
    $('#svg').html('<h1>SVG:</h1><br>' + canvas.toSVG());
});