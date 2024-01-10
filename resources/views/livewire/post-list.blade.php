    <div class=" px-3 lg:px-7 py-6">
        <div class="flex justify-between items-center border-b border-gray-100">
            <div class="flex items-center space-x-4 font-light ">
                <x-checkbox wire:model.live="popular" />
                <x-label>{{ __('blog.popular') }}</x-label>
                <button class=" {{ ($sort === 'desc') ? 'text-gray-900 py-4 border-b border-gray-700' : 'text-gray-500'  }} text-gray-500 py-4" wire:click="setSort('desc')">{{ __('blog.latest') }}</button>
                <button class="{{ ($sort === 'asc') ? 'text-gray-900 py-4 border-b border-gray-700' : 'text-gray-500'  }}" wire:click="setSort('asc')">{{ __('blog.oldest') }}</button>
            </div>

            <div class="text-gray-600">
                @if ($this->activeCategory || $search)
                    <button class="gray-500 text-xs mr-3" wire:click='clearFilters'>x</button>
                @endif

                @if ($this->activeCategory)
                    <x-badge wire:navigate href="{{route('posts.index', ['category' => $this->activeCategory->title])}}" :textColor="$this->activeCategory->text_color" :bgColor="$this->activeCategory->bg_color">
                        {{ $this->activeCategory->title }}
                    </x-badge>
                @endif

                <span class="ml-2">
                    @if ($search)
                        {{ __('blog.searching') }} : <strong>{{ $search }}</strong>
                    @endif
                </span>



            </div>
        </div>
        <div class="py-4">
            @foreach ($this->posts as $post)
             <x-posts.post-item wire:key="{{$post->id}}" :post="$post"/>
            @endforeach

            {{-- @include('components.posts.post-item') --}}
        </div>

        <div class="my-3">
            {{ $this->posts->onEachSide(1)->links() }}
        </div>
    </div>
