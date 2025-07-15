<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Salem Apparel">
    <meta name="keywords" content="Home, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ ('userasset/imgs/template/logo.png') }}">
    <link href="{{ asset('userasset/css/style.css?v=3.0.0') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Fabric.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
   <script src="https://js.stripe.com/v3/"></script>
   <style>
        .search-results-dropdown a:hover {
    background: #f8f9fa;
}
    </style>
     <style>


    .toolbar {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin: 15px 0;
    }

    .toolbar input, .toolbar select, .toolbar button {
      padding: 6px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .toolbar label {
      background: #007bff;
      color: white;
      padding: 6px 12px;
      border-radius: 5px;
      cursor: pointer;
    }

    .toolbar button {
      background: #28a745;
      color: white;
      border: none;
    }

    .toolbar button:hover {
      background: #218838;
    }

    canvas {
      border: 1px solid #ccc;
      margin: 10px auto;
      display: block;
    }

    .slider-nav-thumbnails {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .slider-nav-thumbnails img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      cursor: pointer;
      border: 2px solid transparent;
    }

    .slider-nav-thumbnails img:hover {
      border-color: #333;
    }
  </style>
  <script>
    // 1. Add the modal HTML to your page (once, outside any loop)
    $('body').append(`

    `);

    // 2. Add a button to open the modal in your customizer toolbar (add this to your toolbar HTML)
    $('#customCanvasToolbar').append(`
      <button type="button" id="openServerImageModals" class="btn btn-outline-secondary btn-sm mb-1">Add from Gallery</button>
    `);

    // 3. Show the modal when the button is clicked
    $(document).on('click', '#openServerImageModal', function() {
        $('#serverImageModal').modal('show');
    });


</script>


  </head>
<body>
