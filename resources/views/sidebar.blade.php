<div class="list-group mb-3">
    <a href="{{ route('changelog.index') }}"
       class="list-group-item d-flex justify-content-between align-items-center @if($category === null) active @endif">
        {{ trans('changelog::messages.home')}}
        <span class="badge bg-primary">
            {{ $totalUpdates }}
        </span>
    </a>
    @foreach($categories as $categoryList)
        <a href="{{ route('changelog.categories.show', $categoryList) }}"
           class="list-group-item d-flex justify-content-between align-items-center @if($categoryList->is($category)) active @endif">
            {{ $categoryList->name }}
            <span class="badge bg-primary">
                {{ $categoryList->updates->count() }}
            </span>
        </a>
    @endforeach
</div>
