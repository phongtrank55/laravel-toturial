
		{{csrf_field()}}
		<div class="form-group row">
			<label class ="control-label col-md-2">Tên sản phẩm:</label>
			<div class="col-md-6">
				<input type="text" class="form-control" value="{{isset($product) ? $product->name : ''}}" name="name">
				{{-- <small class="text-danger">
					{{$errors->first('name')}}
				</small> --}}
			</div>

		</div>
		<div class="form-group row">
			<label class ="control-label col-md-2">Mô tả:</label>
			<div class="col-md-6">
				<textarea rows="5" type="text" class="form-control" name="summary">{{isset($product)? $product->summary : ''}}</textarea>
			</div>
		</div>
		
		<div class="form-group row">
			<label class ="control-label col-md-2">Danh mục:</label>
			<div class="col-md-3">
				<select class="form-control" name="category_id">
					@foreach($categories as $key => $value)
						<option value="{{$key}}" {{isset($product) && $product->category_id == $key ? 'selected':''}}>
							{{$value}}
						</option>
					@endforeach
				</select>
				{{-- <small class="text-danger">
					{{$errors->first('category_id')}}
				</small> --}}
			
			</div>
		</div>
		
		<div class="form-group row">
			<label class ="control-label col-md-2">Giá:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" value ="{{isset($product)? $product->price : ''}}" name="price" />
				
			</div>
			
		{{-- 	<small class="text-danger">
					{{$errors->first('price')}}
				</small> --}}
		</div>
		<div class="form-group row">
			<label class ="control-label col-md-2">Ảnh:</label>
			<div class="col-md-3">
				@if(isset($product))
					<img style="width: 100px; height:100px;" src="{{asset("storage/uploads/$product->img")}}" alt="{{  $product->name}}" />
					<br>
				@endif
				<input type="file" name="img" />
			</div>
			
	{{-- 		<small class="text-danger">
					{{$errors->first('img')}}
				</small> --}}
		</div>
				

		<div class="form-group row">
			<div class="col-md-10 offset-md-2">
				<button type="submit" class="btn btn-primary">Lưu</button>
				&nbsp;
				<a href="{{route('product.index')}}" class="btn btn-default">Trở về </a>
			</div>
		</div>
	</div>


