@extends('layouts.master')
@section('title', 'Categories')

@section ('content')
	<a class="btn btn-primary pull-right" data-toggle="modal" href='#modal-add'>
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
					<th>Title</th>
					<th>Description</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $index=1; ?>
				@foreach($categories as $category)
					<tr>
						<td> {{ $index++ }} </td>
						<td> {{ $category->title }}</td>
						<td> {{ $category->description }} </td>
						<td>
							<a data-toggle="modal" href="#modal-edit" class="btn" title="edit"
								data-title = "{{ $category->title }}"
								data-description = "{{ $category->description }}"
								data-id = "{{ $category->id }}"
							>
								<i class="fa fa-pencil"></i>
							</a>

							<a data-toggle="modal" href="#modal-delete" class="btn" title="delete" 
								data-id = "{{ $category->id }}" 
								data-title = "{{ $category->title }}"
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
	<div class="modal fade" id="modal-add">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">New Category</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form method="post" action="{{route('category.store')}}">
					{{csrf_field()}}

					<div class="modal-body">
						@include('category.form') 
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>	


	<div class="modal fade" id="modal-edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Category</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form method="post" action="">
					{{method_field('patch')}}
					{{csrf_field()}}
					
					<div class="modal-body">
						@include('category.form') 
							
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>	


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
						Bạn có chắc chắn xóa <span id="name-category"></span> ?
							
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
	$('#modal-edit').on('show.bs.modal', function (event) {

		var button = $(event.relatedTarget) // Button that triggered the modal
		var title = button.data('title'); // Extract info from data-* attributes
		var description = button.data('description');
		var id = button.data('id');
		
		
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);
		modal.find('.modal-body input[name="title"]').val(title);
		modal.find('.modal-body textarea[name="description"]').val(description);
		
		modal.find('form').attr('action', '{{ route('category.update','') }}/' + id);
		

	});

	$('#modal-delete').on('show.bs.modal', function (event) {
		
		var button = $(event.relatedTarget) // Button that triggered the modal
		var title = button.data('title'); // Extract info from data-* attributes
		
		var id = button.data('id');
		
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);
		{{-- alert('{{route('category.destroy', '') }}/' + id); --}}
		
		modal.find('.modal-body #name-category').text(title);
		modal.find('form').attr('action', '{{ route('category.destroy', '') }}/' + id);

	});
</script> 
@stop