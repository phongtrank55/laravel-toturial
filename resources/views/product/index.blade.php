@extends('layouts.master')
@section('title', 'Products')

@section ('content')
	<a class="btn btn-primary pull-right" href="{{route('product.create')}}">
		<i class="fa fa-plus"></i>	Add new
	</a>

	<div class="clearfix">
	
	</div>
	<br>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Image</th>
					<th>Name</th>
					<th>Summary</th>
					<th>Price</th>
					<th>Category</th>

					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $index=1; ?>
				@foreach($products as $product)
					<tr>
						<td> {{ $index++ }} </td>
						<td> 
							<img style="width: 100px; height:100px;" src="{{asset("storage/uploads/$product->img")}}" alt="{{  $product->name}}" />
						</td>
						<td> {{ $product->name }}</td>
						<td> {{ $product->summary }} </td>
						<td> {{ $product->price }} </td>
						<td> {{ $product->category->title }} </td>
						<td>
							<a href="{{route('product.edit',$product->id)}}" class="btn">
								<i class="fa fa-pencil"></i>
							</a>

							<a data-toggle="modal" href="#modal-delete" class="btn" title="delete" 
								data-id = "{{ $product->id }}" 
								data-title = "{{ $product->name }}"
							>
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>





{{-- Modal --}}

	<div class="modal fade" id="modal-delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete Category</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form method="post">
					{{method_field('delete')}}
					{{csrf_field()}}
					
					<div class="modal-body">
						Bạn có chắc chắn xóa sản phẩm <span id="name-category"></span> ?
							
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
						<button type="submit" class="btn btn-primary">Có</button>
					</div>
				</form>
			</div>
		</div>
	</div>	

{{-- end modal --}}

@stop

@section('scripts')
 <script type="text/javascript">
	
	$('#modal-delete').on('show.bs.modal', function (event) {
		
		var button = $(event.relatedTarget) // Button that triggered the modal
		var title = button.data('title'); // Extract info from data-* attributes
		
		var id = button.data('id');
		
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);
		{{-- alert('{{route('category.destroy', '') }}/' + id); --}}
		
		modal.find('.modal-body #name-category').text(title);
		modal.find('form').attr('action', '{{ route('product.destroy', '') }}/' + id);

	});
</script> 
@stop