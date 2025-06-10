<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->title?? 'CCustomize Product' }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
    <style>
        .galleries {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: center;
            gap: 30px;
        }

        #fabricCanvas {
            border: 1px solid #ccc;
            width: 350px;
            height: 500px;
            display: block;
        }

        .toolbar {
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: stretch;
            background: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            padding: 20px 18px;
            margin: 0;
            min-width: 200px;
            max-width: 220px;
        }
        .toolbar button, .toolbar label, .toolbar select {
            background: #E2B808;
            color: #222;
            border: none;
            border-radius: 4px;
            padding: 10px 14px;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
            margin: 0 0 4px 0;
            width: 100%;
            text-align: left;
        }
        .toolbar button:hover, .toolbar label:hover, .toolbar select:hover {
            background: #cfa507;
            color: #fff;
        }
        .toolbar input[type="file"] {
            display: none;
        }
        .toolbar select {
            min-width: 140px;
            width: 100%;
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
    </style>
</head>
<body>

<div class="galleries">
    <div>
        <canvas id="fabricCanvas" width="350" height="500"></canvas>
        <div class="slider-nav-thumbnails">
            @foreach ($images as $img)
                <div class="item-thumb">
                    <img src="{{ $img->image_url }}" alt="Product Image" data-url="{{ $img->image_url }}">
                </div>
            @endforeach
        </div>
    </div>
    <div class="toolbar">
        <button id="addTextBtn">Add Text</button>
        <label for="uploadImageInput">Upload Image</label>
        <input type="file" id="uploadImageInput" accept="image/*" style="display:none;">
        <button id="addRectangleBtn">Add Rectangle</button>
        <button id="addCircleBtn">Add Circle</button>
        <button id="addLineBtn">Add Line</button>
        <button id="addTriangleBtn">Add Triangle</button>
        <button id="addPolygonBtn">Add Polygon</button>
        <select id="textStyleSelect">
            <option value="">Select Text Style</option>
            <option value="bold">Bold</option>
            <option value="italic">Italic</option>
            <option value="underline">Underline</option>
            <option value="red-text">Red Text</option>
            <option value="large-text">Large Text</option>
            <option value="medium-text">Medium Text</option>
            <option value="small-text">Small Text</option>
        </select>
        <button id="addTextStyleBtn">Add Text Style</button>
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
</script>

</body>
</html>
