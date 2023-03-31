<div class="category-wrapper row cols-12 pt-4">
	@foreach($category as $cat)
  	<div class="category category-ellipse ">
    	<figure class="category-media">
      	<a href="{{url('shop/'.$cat['name'])}}"><img src="{{url('category/'.$cat['image'])}}" alt="Categroy" width="190" height="190" /></a>
      </figure>
      <div class="category-content">
      	<h4 class="category-name"><a href="{{url('shop/'.$cat['name'])}}">{{$cat['name']}}</a></h4>
      </div>
    </div>
  @endforeach
 </div>