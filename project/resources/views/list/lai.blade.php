@extends('master')

@section('title', 'Lai')


@section('content')
<div class="container"> 
<div class="main">
<div class="tb-content">
  <?php 
    foreach ($animals as $item){ 
  ?>
<div class="view view-first">
 <img src="/image/<?php echo $item->image; ?>" />
 
<div class="mask">
 
<h2><?php echo $item->name; ?></h2>
 
 
<div class="des"> 
<?php echo $item->description; ?>
 </div>
 <a href="http://project.dev/list/view/{{ $item->id }}" class="info">Chi tiết</a>
 </div>
 </div>
 <?php } ?> 
 </div>
 </div>
 </div>

@endsection