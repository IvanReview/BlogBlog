@foreach($categories as $category_list)
    <option value="{{$category_list->id}} ">
        {!! $delimiter !!} {{$category_list->title}}
    </option>

    @if(count($category_list->children) > 0)
        @include('admin.categories.particles.create_categories',['categories'=>$category_list->children,'delimiter'=>'--'.$delimiter])
    @endif
@endforeach

