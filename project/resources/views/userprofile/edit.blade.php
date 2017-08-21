@extends('master')
@section('title','Edit')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/css/uploadstyle1.css">

<script src="/js/upload-image2.js"></script>

<form id="upload-image-form" action="/edit/{{ $animals->id }}/update" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <div class="row">
          <div class="col-sm-6">
            <div class="form-group text">
              <label class="control-label">Tên</label>
              <input type="text" name="name" class="form-control" value="<?php echo $animals->name ?>">
            </div>
             <div class="form-group text">
              <label class="control-label">Màu lông</label>
              <input type="text" name="color" class="form-control" value="<?php echo $animals->color ?>">
            </div>
           <!--   <div class="form-group text">
              <label class="control-label"></label>
              <input type="text" data-dz-file-title name="" class="form-control">
            </div> -->
            <div class="row">
              <div>
                    
            <img id="preview-img" src="/image/<?php echo $animals->image; ?>">
          <div id="image-preview-div" style="display: none">
            <label for="exampleInputFile">Selected image:</label>
            <br>
            <!-- <img id="preview-img" src="noimage"> -->
          </div>
          <div class="form-group">
            <input type="file" name="file" id="file" required>
          </div>
        <br>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group text">
              <label class="control-label">Giống</label>
              <!-- <input type="text" name="breed" class="form-control"> -->
              	<select name="breed" class="form-control" value="<?php echo $animals->breed ?>">
              		<!-- <option></option> -->
  					<option value="Thuần chủng">Thuần chủng</option>
  					<option value="Lai">Lai</option>
  				</select>
            </div>

            <div class="form-group text">
              <label class="control-label">Giá</label>
              <input type="text" name="cost" class="form-control" value="<?php echo $animals->cost ?>">
            </div>
           
            <div class="form-group textarea">
              <label class="control-label" for="description">Mô tả</label>
              <textarea name="description" id="description" class="form-control" rows="5"><?php echo $animals->description ?></textarea>
            </div>
          </div>
        </div>

      <center>
            <a type="button" class="btn btn-danger" href="/">
            <i class="fa-times fa"></i>&nbsp;Huỷ</a>
            <button type="submit" class="btn btn-success">
            <i class="fa-check fa"></i>&nbsp;Đăng</button>
      </center>
        <!-- </div> -->
 </form>
@endsection