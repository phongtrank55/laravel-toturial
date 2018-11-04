@extends('layouts.master')
@section('title', 'Edit Product')

@section ('content')
	@if(empty($categories))
		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Rất tiếc!</strong> Hiện tại chưa có danh mục nào!
		</div>
	@else
		<form id="product" method="post" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
			{{method_field('patch')}}
			@include("product.form")
			
		</form>
	@endif
@stop


@section('scripts')

	<script type="text/javascript">
		$(document).ready(function () {

		    $('form#product').validate({ // initialize the plugin

		        rules: {
		            name: {
		                required: true
		            },

		            price: {
		                required: true,
		                digits: true
		            },

		            img: {
		                extension: "jpeg|png|jpg"
		            },
		            category_id: {
		            	required: true
		            }

		        },
		        messages: {
				    name: "Tên không thể để trống!",
				    price: {
				    	required: "Gía không được để trống!",
				     	digits: "Chỉ được nhập số!"
				    },
				    img: "Chỉ cho phép định dạng JPG/PNG !",
				    category_id: "Phải chọn một danh mục !"
				}

		    });

		});

	</script>
	

@stop