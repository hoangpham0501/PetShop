@extends('master')

@section('title', 'View Animal')


@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/css/view6.css">


<div class="container"> 
<div class="main">
<div class="tb-content">
	<div class="single">
			<div class="left_content">
			<div class="span1_of_1">
				<div class="product-view">
				    <div class="product-essential">
				        <div class="product-img-box">
				    <div class="more-views" style="float:left;">
				        <div class="more-views-container">
				        
				        </div>
				    </div>
				    <div class="product-image"> 
				           <img class="product_image" src="/image/<?php echo $animals->image; ?>" />
				   </div>
					
				</div>
				</div>
				</div>
			</div>
			<div class="span1_of_1_des">
				  <div class="desc1">
					<h3><?php echo $animals->name ?></h3>
					<!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p> -->
					<h5>Giá: <?php echo $animals->cost ?></h5>
					<div class="available">
							<h4>Màu lông: <?php echo $animals->color ?></h4>
							@if (Auth::check() and (Auth::user()->id== $animals->id_user))
								<h6><a href="http://project.dev/edit/{{ $animals->id }}"><input type="button" class="btn-success" value="Sửa"></a>
									<a href="/view/{{ $animals->id }}"><input type="button" class="btn-danger" value="Xoá"></a></h6>
							@endif
							
					</div>
			   	 </div>
			   	</div>
			   	<div class="clear"></div>
			   	<!-- start tabs -->
				   	<section class="tabs">
		            <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked">
			        <label for="tab-1" class="tab-label-1">Mô tả</label>
			
		            <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2">
			        <label for="tab-2" class="tab-label-2">Liên hệ</label>
			
		            <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3">
			        <label for="tab-3" class="tab-label-3">Bình luận</label>
	          
				    <div class="clear-shadow"></div>
					
			        <div class="content">
				        <div class="content-1">
				        	<p class="para top">
				        		<?php echo $animals->description ?>
				        	</p>
							<div class="clear"></div>
						</div>
				        <div class="content-2">
							<!-- <ul class="qua_nav"> -->
								<table>
								<li><tr><td>Họ tên: </td><td><?php echo $users->name ?></td></tr></li>
								<li><tr><td>Địa chỉ: </td><td><?php echo $users->address ?></td></tr></li>
								<li><tr><td>SĐT: </td><td><?php echo $users->phone ?></td></tr></li>
								</table>
							<!-- </ul> -->
						</div>
				        <div class="content-3">
				        <!-- <p class="para top"> -->

				        <?php foreach ($comment as $comments) {
				        	?>
				        	<label id="lb2"><?php foreach ($user as $user_comment) {
				        		if($user_comment->id == $comments->id_u)
				        			echo $user_comment->name;
				        	}
				        		
				        	?></label>

				        	<textarea id="userCmnt" readonly><?php echo $comments->content; ?></textarea>

				        	<?php } ?>
				        	<form action="/comment/{{ $animals->id }}" method="POST">
				        		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							        <label id="lb1">Comment</label>
							        <textarea id="userCmnt" name="content" placeholder="Write your comment here" required></textarea>        							  
							      <button type="submit">Submit</button>					    
							</form>
							<!-- </p> -->
							<!-- <div class="clear"></div> -->

			        </div>
			        </section>
			   	</div>
          	    <div class="clear"></div>
	       </div>	
	</div>
</div>
</div>

@endsection