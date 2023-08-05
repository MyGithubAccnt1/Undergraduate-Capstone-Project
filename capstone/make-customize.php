<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saint Benedict Medallion</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="customize.css">
    <style>
      body {
        background-image: url('images/bg.gif');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        height: 100vh;
      }
    </style>
  </head>
  <body>
    <div class="outer" id="outer">
      <div class="container">
        <section class="tools-board">
            <div class="row buttons">
               <button class="back">Back</button>
            </div>
            <div class="row">
              <label class="title">Shapes</label>
              <ul class="options">
                <li class="option tool" id="rectangle">
                  <img src="icons/rectangle.svg" alt="">
                  <span>Rectangle</span>
                </li>
                <li class="option tool" id="circle">
                  <img src="icons/circle.svg" alt="">
                  <span>Circle</span>
                </li>
              </ul>
            </div>
            <div class="row">
              <label class="title">Options</label>
              <ul class="options">
                <li class="option active tool" id="draw">
                  <img src="icons/brush.svg" alt="">
                  <span>Free Draw</span>
                </li>
                <li class="option tool" id="text">
                  <img src="icons/text.png" width="21px" class="m-0 p-0" alt="">
                  <span>Text</span>
                </li>
                <li class="option tool" id="remove" disabled="disabled">
                  <img src="icons/eraser.svg" alt="">
                  <span>Erase</span>
                </li>
              </ul>
            </div>
            <div class="row buttons">
            	<button class="done-img">Done</button>
              <button class="upload-img">Upload Image</button>
            </div>
        </section>
        <section class="drawing-board">
            <canvas id="canvas"></canvas>
        </section>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fabric@5.2.4/dist/fabric.min.js"></script>
    <script>
      $(document).ready(function () {
        show();
      });

      function show() {
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

        var customize = '<?php echo $_SESSION["title"]; ?>';

        if (customize === "CIRCLE") {
          canvas.setBackgroundImage('images/circle.png', canvas.renderAll.bind(canvas));
        } else if (customize === "CROSS") {
          canvas.setBackgroundImage('images/cross.png', canvas.renderAll.bind(canvas));
        } else if (customize === "UNIQUE") {
          canvas.setBackgroundImage('images/unique.png', canvas.renderAll.bind(canvas));
        } else if (customize === "HEART") {
          canvas.setBackgroundImage('images/heart.png', canvas.renderAll.bind(canvas));
        }
        

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
                strokeWidth: 6,
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
                strokeWidth: 6,
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
      }
    </script>
    <script>
      // Set focus to top-left corner when page loads
      document.addEventListener('DOMContentLoaded', function() {
        var container = document.getElementById('outer');
        var width = container.clientWidth;
        var height = container.clientHeight;

        if (width > window.innerWidth || height > window.innerHeight) {
          window.scrollTo(0, 0);
        }
      });
    </script>
  </body>
</html>
<?php 
}else{
  echo"<script>alert('Notice: Please login to proceed.')</script>";
  $script = "<script>window.location = 'signin.php';</script>";
  echo $script;
}
?>