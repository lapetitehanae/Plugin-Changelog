<div class="list-group mb-3">
    <a href="{{ route('changelog.index') }}"
       class="list-group-item d-flex justify-content-between align-items-center @if($displayAll) active @endif">
        {{ trans('changelog::messages.home')}}<span
                class="badge ml-1 @if($displayAll) badge-secondary @else badge-primary @endif">
      {{ $updates->count() }}
     </span>
    </a>
    @foreach($categories as $categoryList)
        <a href="{{ route('changelog.categories.show', $categoryList) }}"
           class="list-group-item d-flex justify-content-between align-items-center @if($category->is($categoryList) && !$displayAll) active @endif">
            {{ $categoryList->name }}<span
                    class="badge ml-1 @if($category->is($categoryList) && !$displayAll) badge-secondary @else badge-primary @endif">
          {{ $categoryList->updates->count() }}
         </span>
        </a>
    @endforeach
</div>
