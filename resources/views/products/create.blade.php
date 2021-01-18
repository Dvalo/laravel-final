<!DOCTYPE html>
<html>
<head>
	<title>Create Product</title>
	<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
</head>
<body>
	<div class="container">
		<form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="text" class="form-control" name="title" placeholder="Title For Product">
			<input type="number" class="form-control" name="price" placeholder="Price for product">
			<input type="file" name="image" class="form-control">
			<input type="text" class="form-control" name="description" placeholder="Description">
			<br><label><strong>Select Category (Shift/CTRL + click to select multiple):</strong></label><br><br>
            <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select form-control" name="categories[]">
              	@foreach ($categories as $category)
		    		<option value="{{ $category->id }}">{{ $category->name }}</option>
        		@endforeach
            </select><br><br>
			<br>
			<button type="submit">Create Product</button>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
</body>
</html>