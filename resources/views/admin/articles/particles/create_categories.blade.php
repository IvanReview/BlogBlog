@foreach($categories as $category)
    <option value="{{$category->id}}">
        {!! $delimiter ?? "" !!} {{$category->title ?? ""}}
    </option>

    @if(count($category->children) > 0)
        @include('admin.categories.particles.create_categories',['categories'=>$category->children,'delimiter'=>'--'.$delimiter])
    @endif
@endforeach

