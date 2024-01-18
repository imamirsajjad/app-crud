<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<style>
	table, th, td {
  					border: 1px solid black;
				  }
</style>
</head>
<body>
	<h1>Product</h1>

	<div>
		@if(session()->has('success'))

		<div>
			{{session('success')}}
		</div>

		@endif
	</div>

	<div>
		<a href="{{route('product.create')}}">Create new product</a>
	</div>

	<div>
		<table style="width:50%">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Qty</th>
			<th>Price</th>
			<th>Description</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>	
		@foreach($products as $product)

		<tr>
			<td>{{$product->id}}</td>
			<td>{{$product->name}}</td>
			<td>{{$product->qty}}</td>
			<td>{{$product->price}}</td>
			<td>{{$product->description}}</td>
			<td>
				<a href="{{route('product.edit', ['product' => $product])}}">Edit</a>
			</td>
			<td>
				<form method="post" action="{{route('product.destroy', ['product'=>$product])}}">
					@csrf 
					@method('delete')
					<input type="submit" value="Delete">
				</form>
			</td>
		</tr>

		@endforeach	
		</table>
	</div>
</body>
</html>