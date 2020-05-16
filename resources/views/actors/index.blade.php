@extends('layouts.main')

@section('content')
     <!-- Popular Movies -->

     <div class="container mx-auto px-4 py-16">
          <div class="popular-actors">
             <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
              <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($popularActors as $actor)
                   <div class="actor mt-8">
                       <a href="{{ route('actors.show', $actor['id']) }}">
                           <img src="{{ $actor['profile_path'] }}"
                            alt="prfile image" class="hover:opacity-75 transition ease-in-out duration-150">
                       </a>
                       <div class="mt-2">
                         <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                         <div class="text-sm truncate text-gray-400">
                           {{ $actor['known_for'] }}
                         </div>
                       </div>
                     </div>

                @endforeach
              </div>
         </div>    <!-- end of popular Actors -->
         <div class="page-load-status my-8">
                <div class="flex justify-center">
                    <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
                </div>
                <p class="infinite-scroll-last">End of content</p>
                <p class="infinite-scroll-error">Error</p>
            </div>
    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script type="text/javascript">
      var elem = document.querySelector('.grid');
      var infScroll = new InfiniteScroll( elem, {
      path: '/actors/page/@{{#}}',
      append: '.actor',
      status: '.page-load-status',
      // history: false,
      });
</script>
@endsection
