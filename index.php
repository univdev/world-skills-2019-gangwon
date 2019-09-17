<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #wrap {
            width: 800px;
            height: 400px;
            position: relative;
        }
        #wrap > canvas:not([id]) {
            z-index: 2;
        }
        #wrap > canvas {
            position: absolute;
            left: 0;
            top: 0;
        }
        #draw {
            z-index: 1;
        }
    </style>
</head>
<body>
    <div id="wrap">
        <canvas id="draw" width="800" height="400"></canvas>
        <canvas id="road" width="800" height="400"></canvas>
        <canvas id="background" width="800" height="400"></canvas>
    </div>
    <select id="name">
        <option value="red">A1</option>
        <option value="orange">A2</option>
        <option value="blue">A3</option>
    </select>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
    <script>

        var alreadyBlocks = {
        };

        var road = [
            [1, 27], [2, 27], [3, 27], [4, 27], [5, 27], [6, 27], [7, 27], [8, 27], [9, 27], [10, 27], [11, 27], [12, 27], [13, 27], [14, 27], [15, 27], [16, 27], [17, 27], [18, 27], [19, 27], [20, 27], [21, 27], [22, 27], [23, 27], [24, 27], [25, 27], [26, 27], [27, 27], [28, 27], [29, 27], [30, 27], [31, 27], [32, 27], [33, 27], [34, 27], [35, 27], [36, 27], [37, 27], [38, 27], [39, 27], [40, 27], [41, 27], [42, 27], [43, 27], [44, 27], [45, 27], [46, 27], [47, 27], [48, 27], [49, 27], [50, 27], [51, 27], [52, 27], [53, 27], [54, 27], [55, 27], [56, 27], [57, 27], [58, 27], [59, 27], [60, 27], [61, 27], [62, 27], [63, 27], [64, 27], [65, 27], [66, 27], [67, 27], [68, 27], [69, 27], [70, 27], [71, 27], [72, 27], [73, 27], [74, 27], [75, 27], [76, 27], [77, 27], [78, 27], [79, 27], [80, 27], 
            [1, 28], [2, 28], [3, 28], [4, 28], [5, 28], [6, 28], [7, 28], [8, 28], [9, 28], [10, 28], [11, 28], [12, 28], [13, 28], [14, 28], [15, 28], [16, 28], [17, 28], [18, 28], [19, 28], [20, 28], [21, 28], [22, 28], [23, 28], [24, 28], [25, 28], [26, 28], [27, 28], [28, 28], [29, 28], [30, 28], [31, 28], [32, 28], [33, 28], [34, 28], [35, 28], [36, 28], [37, 28], [38, 28], [39, 28], [40, 28], [41, 28], [42, 28], [43, 28], [44, 28], [45, 28], [46, 28], [47, 28], [48, 28], [49, 28], [50, 28], [51, 28], [52, 28], [53, 28], [54, 28], [55, 28], [56, 28], [57, 28], [58, 28], [59, 28], [60, 28], [61, 28], [62, 28], [63, 28], [64, 28], [65, 28], [66, 28], [67, 28], [68, 28], [69, 28], [70, 28], [71, 28], [72, 28], [73, 28], [74, 28], [75, 28], [76, 28], [77, 28], [78, 28], [79, 28], [80, 28], 
            [1, 29], [2, 29], [3, 29], [4, 29], [5, 29], [6, 29], [7, 29], [8, 29], [9, 29], [10, 29], [11, 29], [12, 29], [13, 29], [14, 29], [15, 29], [16, 29], [17, 29], [18, 29], [19, 29], [20, 29], [21, 29], [22, 29], [23, 29], [24, 29], [25, 29], [26, 29], [27, 29], [28, 29], [29, 29], [30, 29], [31, 29], [32, 29], [33, 29], [34, 29], [35, 29], [36, 29], [37, 29], [38, 29], [39, 29], [40, 29], [41, 29], [42, 29], [43, 29], [44, 29], [45, 29], [46, 29], [47, 29], [48, 29], [49, 29], [50, 29], [51, 29], [52, 29], [53, 29], [54, 29], [55, 29], [56, 29], [57, 29], [58, 29], [59, 29], [60, 29], [61, 29], [62, 29], [63, 29], [64, 29], [65, 29], [66, 29], [67, 29], [68, 29], [69, 29], [70, 29], [71, 29], [72, 29], [73, 29], [74, 29], [75, 29], [76, 29], [77, 29], [78, 29], [79, 29], [80, 29], 
            [1, 30], [2, 30], [3, 30], [4, 30], [5, 30], [6, 30], [7, 30], [8, 30], [9, 30], [10, 30], [11, 30], [12, 30], [13, 30], [14, 30], [15, 30], [16, 30], [17, 30], [18, 30], [19, 30], [20, 30], [21, 30], [22, 30], [23, 30], [24, 30], [25, 30], [26, 30], [27, 30], [28, 30], [29, 30], [30, 30], [31, 30], [32, 30], [33, 30], [34, 30], [35, 30], [36, 30], [37, 30], [38, 30], [39, 30], [40, 30], [41, 30], [42, 30], [43, 30], [44, 30], [45, 30], [46, 30], [47, 30], [48, 30], [49, 30], [50, 30], [51, 30], [52, 30], [53, 30], [54, 30], [55, 30], [56, 30], [57, 30], [58, 30], [59, 30], [60, 30], [61, 30], [62, 30], [63, 30], [64, 30], [65, 30], [66, 30], [67, 30], [68, 30], [69, 30], [70, 30], [71, 30], [72, 30], [73, 30], [74, 30], [75, 30], [76, 30], [77, 30], [78, 30], [79, 30], [80, 30],
            [39, 1], [39, 2], [39, 3], [39, 4], [39, 5], [39, 6], [39, 7], [39, 8], [39, 9], [39, 10], [39, 11], [39, 12], [39, 13], [39, 14], [39, 15], [39, 16], [39, 17], [39, 18], [39, 19], [39, 20], [39, 21], [39, 22], [39, 23], [39, 24], [39, 25], [39, 26], [39, 27], [39, 28], [39, 29], [39, 30], [39, 31], [39, 32], [39, 33], [39, 34], [39, 35], [39, 36], [39, 37], [39, 38], [39, 39], [39, 40],
            [40, 1], [40, 2], [40, 3], [40, 4], [40, 5], [40, 6], [40, 7], [40, 8], [40, 9], [40, 10], [40, 11], [40, 12], [40, 13], [40, 14], [40, 15], [40, 16], [40, 17], [40, 18], [40, 19], [40, 20], [40, 21], [40, 22], [40, 23], [40, 24], [40, 25], [40, 26], [40, 27], [40, 28], [40, 29], [40, 30], [40, 31], [40, 32], [40, 33], [40, 34], [40, 35], [40, 36], [40, 37], [40, 38], [40, 39], [40, 40],
            [41, 1], [41, 2], [41, 3], [41, 4], [41, 5], [41, 6], [41, 7], [41, 8], [41, 9], [41, 10], [41, 11], [41, 12], [41, 13], [41, 14], [41, 15], [41, 16], [41, 17], [41, 18], [41, 19], [41, 20], [41, 21], [41, 22], [41, 23], [41, 24], [41, 25], [41, 26], [41, 27], [41, 28], [41, 29], [41, 30], [41, 31], [41, 32], [41, 33], [41, 34], [41, 35], [41, 36], [41, 37], [41, 38], [41, 39], [41, 40],
            [42, 1], [42, 2], [42, 3], [42, 4], [42, 5], [42, 6], [42, 7], [42, 8], [42, 9], [42, 10], [42, 11], [42, 12], [42, 13], [42, 14], [42, 15], [42, 16], [42, 17], [42, 18], [42, 19], [42, 20], [42, 21], [42, 22], [42, 23], [42, 24], [42, 25], [42, 26], [42, 27], [42, 28], [42, 29], [42, 30], [42, 31], [42, 32], [42, 33], [42, 34], [42, 35], [42, 36], [42, 37], [42, 38], [42, 39], [42, 40],
            [60, 1], [60, 2], [60, 3], [60, 4], [60, 5], [60, 6], [60, 7], [60, 8], [60, 9], [60, 10], [60, 11], [60, 12], [60, 13], [60, 14], [60, 15], [60, 16], [60, 17], [60, 18], [60, 19], [60, 20], [60, 21], [60, 22], [60, 23], [60, 24], [60, 25], [60, 26], [60, 27],
            [61, 1], [61, 2], [61, 3], [61, 4], [61, 5], [61, 6], [61, 7], [61, 8], [61, 9], [61, 10], [61, 11], [61, 12], [61, 13], [61, 14], [61, 15], [61, 16], [61, 17], [61, 18], [61, 19], [61, 20], [61, 21], [61, 22], [61, 23], [61, 24], [61, 25], [61, 26], [61, 27],
            [62, 1], [62, 2], [62, 3], [62, 4], [62, 5], [62, 6], [62, 7], [62, 8], [62, 9], [62, 10], [62, 11], [62, 12], [62, 13], [62, 14], [62, 15], [62, 16], [62, 17], [62, 18], [62, 19], [62, 20], [62, 21], [62, 22], [62, 23], [62, 24], [62, 25], [62, 26], [62, 27],
            [63, 1], [63, 2], [63, 3], [63, 4], [63, 5], [63, 6], [63, 7], [63, 8], [63, 9], [63, 10], [63, 11], [63, 12], [63, 13], [63, 14], [63, 15], [63, 16], [63, 17], [63, 18], [63, 19], [63, 20], [63, 21], [63, 22], [63, 23], [63, 24], [63, 25], [63, 26], [63, 27]
        ];

        var BackgroundCanvasManager = {
            canvas: document.getElementById('background'),
            ctx: document.getElementById('background').getContext('2d'),
            rows: 40,
            cols: 80,
            draw() {
                var canvasWidth = this.canvas.width;
                var canvasHeight = this.canvas.height;
                for (var i = 1; i <= this.cols; i += 1) {
                    this.ctx.beginPath();
                    var x = canvasWidth / this.cols * i;
                    var color = i % 2 ? '#000' : '#AAA';
                    this.ctx.moveTo(x, 0);
                    this.ctx.lineTo(x, canvasHeight);
                    this.ctx.strokeStyle = color;
                    this.ctx.stroke();
                    this.ctx.closePath();
                }
                for (var i = 1; i <= this.rows; i += 1) {
                    this.ctx.beginPath();
                    var y = canvasHeight / this.rows * i;
                    var color = i % 2 ? '#000' : '#AAA';
                    this.ctx.moveTo(0, y);
                    this.ctx.lineTo(canvasWidth, y);
                    this.ctx.strokeStyle = color;
                    this.ctx.stroke();
                    this.ctx.closePath();
                }
            },
        };

        var DrawCanvasManager = {
            canvas: document.getElementById('draw'),
            ctx: document.getElementById('draw').getContext('2d'),
            isFlag: false,
            clear() {
                var canvasWidth = this.canvas.width;
                var canvasHeight = this.canvas.height;
                this.ctx.clearRect(0, 0, canvasWidth, canvasHeight);
            },
            draw(x1, y1, x2, y2) {
                if (!this.isFlag) return;
                var width = x2 - x1;
                var height = y2 - y1;
                this.ctx.beginPath();
                this.ctx.fillStyle = 'rgba(255, 255, 0, .7)';
                this.ctx.fillRect(x1, y1, width, height);
                this.ctx.closePath();
            },
            normalize(coord) {
                return Math.floor(coord / 10) * 10;
            },
            complete(startX, startY, endX, endY) {
                var selectBox = document.getElementById('name');
                var color = selectBox.value;
                var selectIndex = selectBox.selectedIndex;
                var name = selectBox.options[selectIndex].innerHTML;

                var colLength = DrawCanvasManager.canvas.width / BackgroundCanvasManager.cols;
                var rowLength = DrawCanvasManager.canvas.height / BackgroundCanvasManager.rows;
                var width = Math.abs(endX - startX) / colLength;
                var height = Math.abs(endY - startY) / rowLength;
                if (width * height < 4) {
                    alert('부스의 크기를 최소 2x2 이상으로 해주세요.');
                    return;
                }
                if (this.checkClashBlock(name, startX, startY, endX, endY)) {
                    alert('부스는 서로 겹칠 수 없습니다!');
                    return;
                }
                if (RoadCanvasManager.checkClashRoad(startX, startY, endX, endY)) {
                    alert('도로에는 부스를 지을 수 없습니다!');
                    return;
                }
                this.insertCanvasData(name, color, startX, startY, endX, endY);
                this.importAlreadyBlocks(alreadyBlocks);
            },
            createCanvas(startX, startY, endX, endY, color, text) {
                var width = endX - startX;
                var height = endY - startY;

                var wrap = document.getElementById('wrap');
                var canvas = document.createElement('canvas');
                canvas.style.left = `${startX}px`;
                canvas.style.top = `${startY}px`;
                canvas.setAttribute('width', width);
                canvas.setAttribute('height', height);
                wrap.prepend(canvas);

                var virtualCtx = canvas.getContext('2d');
                virtualCtx.fillStyle = color || 'red';
                virtualCtx.fillRect(0, 0, width, height);
                virtualCtx.textAlign = 'center';
                virtualCtx.fillStyle = 'black';
                virtualCtx.font = "20px Malgun Gothic";
                virtualCtx.fillText(text, width / 2, height / 2);

                $(canvas).attr('data-name', text);

                $(canvas).draggable({
                    containment: '#wrap',
                    grid: [10, 10],
                    stop(e) {
                        var startX = $(this).position().left;
                        var startY = $(this).position().top;
                        var endX = startX + $(this).width();
                        var endY = startY + $(this).height();
                        var name = $(this).data('name');
                        var flag = true;

                        if (RoadCanvasManager.checkClashRoad(startX, startY, endX, endY)) {
                            alert('도로 위에 올라갈 수 없습니다!');
                            flag = false;
                        }

                        if (DrawCanvasManager.checkClashBlock(name, startX, startY, endX, endY)) {
                            alert('다른 부스 위에 올라갈 수 없습니다!');
                            flag = false;
                        }

                        if (flag) {
                            alreadyBlocks[name].startX = startX;
                            alreadyBlocks[name].startY = startY;
                            alreadyBlocks[name].endX = endX;
                            alreadyBlocks[name].endY = endY;
                        }

                        DrawCanvasManager.importAlreadyBlocks(alreadyBlocks);
                    },
                })
            },
            clearCanvas() {
                var canvases = document.querySelectorAll('#wrap canvas:not([id])');
                for (var canvas of canvases) {
                    canvas.remove();
                }
            },
            importAlreadyBlocks(blocks) {
                this.clearCanvas();
                var keys = Object.keys(blocks);
                for (var key of keys) {
                    var item = blocks[key];
                    var color = item.color;
                    var startX = item.startX;
                    var startY = item.startY;
                    var endX = item.endX;
                    var endY = item.endY;
                    this.createCanvas(startX, startY, endX, endY, color, key);
                }
            },
            insertCanvasData(name, color, startX, startY, endX, endY) {
                alreadyBlocks[name] = {
                    color,
                    startX,
                    startY,
                    endX,
                    endY
                };
            },
            checkClashBlock(name, startX, startY, endX, endY) {
                var obj = { ...alreadyBlocks };
                delete obj[name];

                for (var key of Object.keys(obj)) {
                    var item = obj[key];
                    var sx = item.startX;
                    var sy = item.startY;
                    var ex = item.endX;
                    var ey = item.endY;

                    if (((sx <= startX && ex > startX) || (sx < endX && ex >= endX) || (sx >= startX && ex <= endX)) &&
                        ((sy <= startY && ey > startY) || (sy < endY && ey >= endY) || (sy >= startY && ey <= endY))) {
                            return true;
                    }
                }
                
                return false;
            },
        };
        BackgroundCanvasManager.draw();
        DrawCanvasManager.importAlreadyBlocks(alreadyBlocks);

        var RoadCanvasManager = {
            canvas: document.getElementById('road'),
            ctx: document.getElementById('road').getContext('2d'),
            draw(road) {
                for (var coords of road) {
                    var width = BackgroundCanvasManager.canvas.width / BackgroundCanvasManager.cols;
                    var height = BackgroundCanvasManager.canvas.height / BackgroundCanvasManager.rows;
                    var startX = (coords[0] - 1) * width;
                    var startY = (coords[1] - 1) * height;
                    this.ctx.fillRect(startX, startY, width, height);
                }
            },
            checkClashRoad(startX, startY, endX, endY) {
                for (var coords of road) {
                    var width = BackgroundCanvasManager.canvas.width / BackgroundCanvasManager.cols;
                    var height = BackgroundCanvasManager.canvas.height / BackgroundCanvasManager.rows;
                    var sx = (coords[0] - 1) * width;
                    var sy = (coords[1] - 1) * height;
                    var ex = sx + width;
                    var ey = sy + height;

                    if (((sx <= startX && ex > startX) || (sx < endX && ex >= endX) || (sx >= startX && ex <= endX)) &&
                        ((sy <= startY && ey > startY) || (sy < endY && ey >= endY) || (sy >= startY && ey <= endY))) {
                            return true;
                    }
                }
            },
        };

        RoadCanvasManager.draw(road);

        var startX = 0;
        var startY = 0;
        var endX = 0;
        var endY = 0;

        DrawCanvasManager.canvas.addEventListener('mousedown', (e) => {
            DrawCanvasManager.isFlag = true;
            startX = DrawCanvasManager.normalize(e.clientX);
            startY = DrawCanvasManager.normalize(e.clientY);
        });
        DrawCanvasManager.canvas.addEventListener('mousemove', (e) => {
            var x = endX = DrawCanvasManager.normalize(e.clientX);
            var y = endY = DrawCanvasManager.normalize(e.clientY);
            DrawCanvasManager.clear();
            DrawCanvasManager.draw(startX, startY, x, y);
        });
        DrawCanvasManager.canvas.addEventListener('mouseup', (e) => {
            DrawCanvasManager.isFlag = false;
            var temp;
            var xArray = [startX, endX].sort((a, b) => a > b ? 1 : -1);
            var yArray = [startY, endY].sort((a, b) => a > b ? 1 : -1);;
            DrawCanvasManager.complete(xArray[0], yArray[0], xArray[1], yArray[1]);
            DrawCanvasManager.clear();
        });
    </script>
</body>
</html>