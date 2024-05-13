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
  <h2>Product Table</h2>          
  <table class="table">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Title</th>
        <th>Size</th>
        <th>Gender</th>
        <th>Image</th>
        <th>Options</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($product as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->title }}</td>
        <td>{{ $item->size }}</td>
        <td>{{ $item->gender }}</td>
        <td><img class="" style="width:40px; height:40px;"
            src="{{ asset('product-images/'.$item->image) }}"></td>
        <td>@foreach(explode(',', $item->checkbox) as $option) {{ $option }} @endforeach</td>
        <td><a href="{{ route('product_edit',[$item->id]) }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ route('product_delete',[$item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    @endforeach   
    </tbody>
  </table>
</div>

</body>
</html>
