@if(isset($related) && $related->count() > 0)
<div class="col-md-12">
    <div class="business-title-left">
        <h5 style="color: red;">Related media</h5>
        <span class="title-border-left"></span>
    </div>
</div>
<div class="col-md-12">
    @foreach($related as $r)
    <div class="single-bolg hover01" style="height: 140px;margin:auto">
        <figure style="width: 100px;border: solid 1px #f00;">
            <img src="{{asset($r->featured_image)}}" alt="slide 1" class="" style="width: 100%; height:auto">
        </figure>
        <div class="blog-content" style="text-align:center">
            @if($r->isFree == 'yes')
            <a href="{{ route('media.view', $r->slug) }}">{{\Illuminate\Support\Str::limit($r->title , 30), '...'}}</a>
            @else
            <a href="#">{{\Illuminate\Support\Str::limit($r->title , 30), '...'}}</a>
            @endif
        </div>
        @if($r->isFree == 'yes')
        {{-- <a href="{{ route('media.view', $r->slug) }}" class="btn btn-danger" style="font-size:12px; color:white;width: 100%;">View</a> --}}
        @else 
        {{-- <a href="{{ route('media.purchase', $r->slug) }}" class="btn btn-danger" style="font-size:12px; color:white;width: 100%;">Purchase for only &#8358;{{ number_format( $r->price )}}"</a> --}}
        @endif
    </div>
    @endforeach
</div>  
@endif