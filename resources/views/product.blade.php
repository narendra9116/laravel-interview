<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Product form</h2>
  <form action="{{ route('product_insert') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
    </div>
    <div class="mb-3 mt-3">
        <label for="image">Image:</label>
        <input type="file" class="form-control" id="image"  name="image">
      </div>
    <div class="mb-3">
        <label for="size">Size:</label>
        <select class="form-select" name="size">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
    </div>
    <div class="mb-3 mt-3">
        <label for="mobile">Gender:</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" checked>
            <label class="form-check-label" for="radio1">Male</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="radio2" name="gender" value="female">
            <label class="form-check-label" for="radio2">Female</label>
          </div>
      </div>
      <div class="mb-3 mt-3">
        <label for="checkbox">checkbox:</label>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check1" name="checkbox[]" value="option1" checked>
            <label class="form-check-label" for="check1">Option 1</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check2" name="checkbox[]" value="option2">
            <label class="form-check-label" for="check2">Option 2</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="checkbox[]" value="option3">
            <label class="form-check-label">Option 3</label>
          </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
