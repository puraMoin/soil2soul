<!-- ========== title-wrapper start ========== -->
<?php 
	// dd($parameteresNames);
	if($parameteresNames == 'id'){
		$url = (!empty($parameteres)) ? route($action,['id'=>$parameteres]) : route($action);
	}else{
		$url = (!empty($parameteres)) ? route($action,$parameteres) : route($action);
	}

	// dd($url);

	 $moduleUrl = route($PageTitle.'.index');
 ?>
<div class="title-wrapper pt-30">
<div class="row align-items-center">
<div class="col-md-5">
<div class="title mb-10"><h2>{{$pageTitle}}</h2></div>
</div>
<!-- end col -->
<div class="col-md-7 rowmargin10">
<div class="breadcrumb-wrapper">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}"><i class="lni lni-home"></i></a></li>
<li class="breadcrumb-item " aria-current="page"><a href="{{ $moduleUrl }}" class="active">{{ucfirst($PageTitle)}}</a></li>
<?php if($currentPage != 'index'){ ?>
<li class="breadcrumb-item " aria-current="page"><a href="{{ $url }}" class="active">{{$currentPage}}</a></li>	
<?php } ?>
</ol>
</nav>
</div>
</div>
<!-- end col -->
</div>
<!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->