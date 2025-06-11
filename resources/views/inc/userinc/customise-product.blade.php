<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->title?? 'CCustomize Product' }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .toolbar {
            display: flex;
            flex-direction: row;
            align-items: center;
            background: #f8f8f8;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            padding: 4px 8px;
            margin: 0 0 16px 0;
            min-width: 0;
            max-width: none;
            font-size: 13px;
            gap: 8px;
            flex-wrap: wrap;
        }
        .toolbar-group {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 4px;
            margin: 0;
            flex-wrap: wrap;
        }
        .toolbar button, .toolbar label, .toolbar select, .toolbar input[type="color"] {
            background: #fff;
            color: #222;
            border: 1px solid #ccc;
            border-radius: 3px;
            padding: 3px 6px;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s, color 0.2s, border 0.2s;
            width: auto;
            min-width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .toolbar button:hover, .toolbar label:hover, .toolbar select:hover {
            background: #E2B808;
            color: #222;
            border: 1.5px solid #cfa507;
        }
        .toolbar input[type="color"] {
            padding: 0;
            width: 28px;
            height: 28px;
            border-radius: 3px;
            border: 1px solid #ccc;
            background: #fff;
        }
        .toolbar select {
            min-width: 70px;
            max-width: 120px;
            height: 28px;
        }
        .toolbar label {
            margin-bottom: 0;
            padding: 0 6px;
            background: none;
            border: none;
            cursor: pointer;
        }
        .toolbar input[type="file"] {
            display: none;
        }
        .slider-nav-thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .item-thumb img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
        }
        .item-thumb img:hover {
            border-color: #333;
        }
        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .galleries {
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 16px !important;
            }
            .toolbar {
                justify-content: flex-start;
            }
            .slider-nav-thumbnails {
                justify-content: flex-start;
            }
        }
        @media (max-width: 575.98px) {
            #fabricCanvas {
                width: 100% !important;
                height: auto !important;
                max-width: 100vw;
                min-width: 0;
            }
            .item-thumb img {
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid py-3">
    <div class="row galleries d-flex flex-row align-items-start justify-content-center gap-4">
        <div class="col-lg-6 col-md-12 mb-3 d-flex flex-column align-items-center">
            <canvas id="fabricCanvas" width="350" height="500" style="max-width:100%;height:auto;"></canvas>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="toolbar mb-2">
                <div class="toolbar-group">
                    <button id="addTextBtn" title="Add Text">T+</button>
                    <label for="uploadImageInput" title="Upload Image">🖼️</label>
                    <input type="file" id="uploadImageInput" accept="image/*">
                    <button id="addRectangleBtn" title="Rectangle">▭</button>
                    <button id="addCircleBtn" title="Circle">◯</button>
                    <button id="addLineBtn" title="Line">／</button>
                    <button id="addTriangleBtn" title="Triangle">△</button>
                    <button id="addPolygonBtn" title="Polygon">⬟</button>
                    <button id="deleteObjectBtn" title="Delete">🗑️</button>
                    <button id="bringForwardBtn" title="Bring Forward">⬆️</button>
                    <button id="sendBackwardBtn" title="Send Backward">⬇️</button>
                    <button id="bringToFrontBtn" title="Bring to Front">⏫</button>
                    <button id="sendToBackBtn" title="Send to Back">⏬</button>
                </div>
                <div class="toolbar-group">
                    <select id="fontFaceSelect" title="Font">
                        <option value="Arial">Arial</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Courier New">Courier New</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Verdana">Verdana</option>
                        <option value="Tahoma">Tahoma</option>
                        <option value="Impact">Impact</option>
                    </select>
                    <input type="color" id="fontColorInput" value="#222222" title="Font Color">
                    <input type="color" id="shapeColorInput" value="#ff0000" title="Shape Color">
                    <select id="textStyleSelect" title="Style">
                        <option value="">Normal</option>
                        <option value="bold">Bold</option>
                        <option value="italic">Italic</option>
                        <option value="underline">Underline</option>
                        <option value="red-text">Red</option>
                        <option value="large-text">Large</option>
                        <option value="medium-text">Medium</option>
                        <option value="small-text">Small</option>
                    </select>
                </div>
            </div>
            <div class="slider-nav-thumbnails">
                @foreach ($images as $img)
                    <div class="item-thumb">
                        <img src="{{ $img->image_url }}" alt="Product Image" data-url="{{ $img->image_url }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<script>
    const canvas = new fabric.Canvas('fabricCanvas');

    function setCanvasBackground(imageURL) {
        fabric.Image.fromURL(imageURL, function(img) {
            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
                scaleX: canvas.width / img.width,
                scaleY: canvas.height / img.height
            });
        });
    }

    // Set default background on load
    const defaultImage = document.querySelector('.item-thumb img')?.getAttribute('data-url');
    if (defaultImage) {
        setCanvasBackground(defaultImage);
    }

    // Attach click events to thumbnails
    document.querySelectorAll('.item-thumb img').forEach(img => {
        img.addEventListener('click', function () {
            const imageURL = this.getAttribute('data-url');
            setCanvasBackground(imageURL);
        });
    });
     // Add Text Button
    document.getElementById('addTextBtn').addEventListener('click', function() {
        const text = new fabric.IText('Edit me', {
            left: 50,
            top: 50,
            fill: '#222',
            fontSize: 24
        });
        canvas.add(text).setActiveObject(text);
    });

    // Upload Image Input
    document.getElementById('uploadImageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(f) {
            fabric.Image.fromURL(f.target.result, function(img) {
                img.set({
                    left: 100,
                    top: 100,
                    scaleX: 0.5,
                    scaleY: 0.5
                });
                canvas.add(img).setActiveObject(img);
            });
        };
        reader.readAsDataURL(file);
    });
    // Add rectangle Button
    document.getElementById('addRectangleBtn').addEventListener('click', function() {
        const rect = new fabric.Rect({
            left: 100,
            top: 100,
            fill: 'rgba(255, 0, 0, 0.5)',
            width: 100,
            height: 100
        });
        canvas.add(rect).setActiveObject(rect);
    });
    // Add circle Button
    document.getElementById('addCircleBtn').addEventListener('click', function() {
        const circle = new fabric.Circle({
            left: 150,
            top: 150,
            fill: 'rgba(0, 0, 255, 0.5)',
            radius: 50
        });
        canvas.add(circle).setActiveObject(circle);
    });
    // Add line Button
    document.getElementById('addLineBtn').addEventListener('click', function() {
        const line = new fabric.Line([50, 100, 200, 200], {
            stroke: 'green',
            strokeWidth: 5
        });
        canvas.add(line).setActiveObject(line);
    });
    // Add triangle Button
    document.getElementById('addTriangleBtn').addEventListener('click', function() {
        const triangle = new fabric.Triangle({
            left: 200,
            top: 200,
            fill: 'rgba(255, 255, 0, 0.5)',
            width: 100,
            height: 100
        });
        canvas.add(triangle).setActiveObject(triangle);
    });
    // Add polygon Button
    document.getElementById('addPolygonBtn').addEventListener('click', function() {
        const polygon = new fabric.Polygon([
            { x: 100, y: 0 },
            { x: 200, y: 100 },
            { x: 150, y: 200 },
            { x: 50, y: 200 },
            { x: 0, y: 100 }
        ], {
            left: 100,
            top: 100,
            fill: 'rgba(128, 0, 128, 0.5)'
        });
        canvas.add(polygon).setActiveObject(polygon);
    });
    // Font color change for selected text
    document.getElementById('fontColorInput').addEventListener('input', function() {
        const activeObject = canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.set('fill', this.value);
            canvas.requestRenderAll();
        }
    });

    // Shape color change for selected shapes
    document.getElementById('shapeColorInput').addEventListener('input', function() {
        const activeObject = canvas.getActiveObject();
        if (
            activeObject &&
            ['rect', 'circle', 'triangle', 'polygon', 'line'].includes(activeObject.type)
        ) {
            // For lines, change stroke; for others, change fill
            if (activeObject.type === 'line') {
                activeObject.set('stroke', this.value);
            } else {
                activeObject.set('fill', this.value);
            }
            canvas.requestRenderAll();
        }
    });

    // Font face change for selected text
    document.getElementById('fontFaceSelect').addEventListener('change', function() {
        const activeObject = canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.set('fontFamily', this.value);
            canvas.requestRenderAll();
        }
    });

    // Text style change for selected text
    document.getElementById('textStyleSelect').addEventListener('change', function() {
        const activeObject = canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            switch (this.value) {
                case 'bold':
                    activeObject.set('fontWeight', 'bold');
                    break;
                case 'italic':
                    activeObject.set('fontStyle', 'italic');
                    break;
                case 'underline':
                    activeObject.set('underline', true);
                    break;
                case 'red-text':
                    activeObject.set('fill', '#ff0000');
                    break;
                case 'large-text':
                    activeObject.set('fontSize', 36);
                    break;
                case 'medium-text':
                    activeObject.set('fontSize', 24);
                    break;
                case 'small-text':
                    activeObject.set('fontSize', 12);
                    break;
                default:
                    activeObject.set({
                        fontWeight: 'normal',
                        fontStyle: 'normal',
                        underline: false,
                        fill: '#222',
                        fontSize: 24
                    });
            }
            canvas.requestRenderAll();
        }
    });

    // style font size
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('fontSize', 24);
        }
    });
    //style font color
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('fill', '#222');
        }
    });
    // style font family
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('fontFamily', 'Arial');
        }
    });
    // style font weight
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('fontWeight', 'bold');
        }
    });
    // style font style
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('fontStyle', 'italic');
        }
    });
    // style text alignment
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('textAlign', 'center');
        }
    });
    // style text decoration
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('textDecoration', 'underline');
        }
    });
    // style text shadow
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('shadow', new fabric.Shadow({
                color: 'rgba(0, 0, 0, 0.5)',
                blur: 10,
                offsetX: 5,
                offsetY: 5
            }));
        }
    });
    // style text background color
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('backgroundColor', 'rgba(255, 255, 0, 0.5)');
        }
    });
    // style text line height
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('lineHeight', 1.5);
        }
    });
    // style text char spacing
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('charSpacing', 10);
        }
    });
    // style text opacity
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('opacity', 0.8);
        }
    });
    // style text stroke
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('stroke', '#ff0000');
            activeObject.set('strokeWidth', 2);
        }
    });
    // style text stroke dash
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('strokeDashArray', [5, 5]);
        }
    });
    // style text stroke line cap
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('strokeLineCap', 'round');
        }
    });
    // style text stroke line join
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('strokeLineJoin', 'round');
        }
    });
    // style text stroke miter limit
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('strokeMiterLimit', 10);
        }
    });
    // style text stroke uniform
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('strokeUniform', true);
        }
    });
    // style text stroke dash offset
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('strokeDashOffset', 5);
        }
    });
    // style text stroke line width
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('strokeLineWidth', 2);
        }
    });
    // style text stroke line join
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('strokeLineJoin', 'round');
        }
    });
    // style text stroke line cap
    canvas.on('object:selected', function(e) {
        const activeObject = e.target;
        if (activeObject.type === 'i-text') {
            activeObject.set('strokeLineCap', 'round');
        }
    });
    // predefine text styles
    const predefinedStyles = {
        'Bold': { fontWeight: 'bold' },
        'Italic': { fontStyle: 'italic' },
        'Underline': { textDecoration: 'underline' },
        'Red Text': { fill: '#ff0000' },
        'Large Text': { fontSize: 36 },
        'Medium Text': { fontSize: 24 },
        'Small Text': { fontSize: 12 }
    };

    // Delete selected object with toolbar button
    document.getElementById('deleteObjectBtn').addEventListener('click', function() {
        const activeObject = canvas.getActiveObject();
        if (activeObject) {
            canvas.remove(activeObject);
        }
    });
    // Bring Forward Button
    document.getElementById('bringForwardBtn').addEventListener('click', function() {
        const activeObject = canvas.getActiveObject();
        if (activeObject) {
            canvas.bringForward(activeObject);
            canvas.requestRenderAll();
        }
    });
    // Send Backward Button
    document.getElementById('sendBackwardBtn').addEventListener('click', function() {
        const activeObject = canvas.getActiveObject();
        if (activeObject) {
            canvas.sendBackwards(activeObject);
            canvas.requestRenderAll();
        }
    });
    // Bring to Front Button
    document.getElementById('bringToFrontBtn').addEventListener('click', function() {
        const activeObject = canvas.getActiveObject();
        if (activeObject) {
            canvas.bringToFront(activeObject);
            canvas.requestRenderAll();
        }
    });
    // Send to Back Button
    document.getElementById('sendToBackBtn').addEventListener('click', function() {
        const activeObject = canvas.getActiveObject();
        if (activeObject) {
            canvas.sendToBack(activeObject);
            canvas.requestRenderAll();
        }
    });

    // Optional: Allow delete with keyboard 'Delete' or 'Backspace'
    document.addEventListener('keydown', function(e) {
        if ((e.key === "Delete" || e.key === "Backspace") && document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
            const activeObject = canvas.getActiveObject();
            if (activeObject) {
                canvas.remove(activeObject);
            }
        }
    });
</script>

</body>
</html>
