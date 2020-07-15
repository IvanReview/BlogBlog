@foreach($categories as $category_list)
    <option value="{{$category_list->id}}"
         @isset($category->id)
            @if($category->parent_id == $category_list->id)
                selected=""
            @endif

                {{--чтобы не выбрать саму себя--}}
            @if($category->id == $category_list->id)
                hidden=""
            @endif
         @endisset
    >
        {!! $delimiter ?? "" !!} {{$category_list->title}}
    </option>

        @if(count($category_list->children) > 0)
            @include('admin.categories.particles.update_categories',['categories'=>$category_list->children,'delimiter'=>'--'.$delimiter])
        @endif
@endforeach
