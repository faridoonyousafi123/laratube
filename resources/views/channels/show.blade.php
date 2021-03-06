@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ $channel->name }}

                    <a href="{{route('channel.upload', $channel->id)}}">Uploads Vidoes</a>

                </div>

                <div class="card-body">
                   @if($channel->editable())
                <form id="update-channel-form" action="{{ route('channels.update', $channel->id)}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')
                    @endif
                        <div class="form-group row justify-content-center">
                            <div class="channel-avatar">
                                @if($channel->editable())
                                <div onclick="document.getElementById('image').click()" class="channel-avatar-overlay text-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="justify-content-right" height="50" viewBox="1 -62 511.999 511" width="50">
                                    <path d="m7.5 272.636719c4.140625 0 7.5-3.359375 7.5-7.5v-30.335938c0-4.144531-3.359375-7.5-7.5-7.5s-7.5 3.355469-7.5 7.5v30.335938c0 4.140625 3.359375 7.5 7.5 7.5zm0 0"/>
                                    <path d="m483.132812 49.464844h-31.066406v-3.539063c0-10.023437-8.15625-18.183593-18.183594-18.183593h-3.183593v-9.058594c0-10.027344-8.160157-18.183594-18.183594-18.183594h-35.832031c-10.023438 0-18.183594 8.15625-18.183594 18.183594v9.058594h-3.183594c-10.027344 0-18.183594 8.15625-18.183594 18.183593v3.539063h-106.753906v-7.8125c0-10.023438-8.15625-18.183594-18.183594-18.183594h-14.460937c-10.023437 0-18.183594 8.15625-18.183594 18.183594v7.8125h-17.546875v-18.496094c0-10.023438-8.15625-18.183594-18.183594-18.183594h-78.5625c-10.023437 0-18.183593 8.160156-18.183593 18.183594v18.496094h-18.207031c-15.917969 0-28.867188 12.953125-28.867188 28.867187v123.804688c0 4.144531 3.359375 7.5 7.5 7.5s7.5-3.355469 7.5-7.5v-71.226563h41.046875c3.300781 12.085938 14.375 21 27.492187 21 13.121094 0 24.191407-8.914062 27.492188-21h59.5625c-34.597656 26.007813-57.015625 67.382813-57.015625 113.898438 0 30.539062 9.664063 58.859375 26.089844 82.074218h-124.667969v-29.085937c0-4.144531-3.359375-7.5-7.5-7.5s-7.5 3.355469-7.5 7.5v46.914063c0 15.917968 12.949219 28.867187 28.867188 28.867187h166.320312c18.453125 8.75 39.070312 13.652344 60.8125 13.652344 21.75 0 42.371094-4.90625 60.828125-13.664063.058594.003906.113281.011719.171875.011719h166.132812c15.917969 0 28.867188-12.949219 28.867188-28.867187v-266.378907c0-15.914062-12.949219-28.867187-28.867188-28.867187zm-109.632812-30.78125c0-1.753906 1.429688-3.183594 3.1875-3.183594h35.828125c1.753906 0 3.183594 1.425781 3.183594 3.183594v9.058594h-42.195313v-9.058594zm-21.367188 27.242187c0-1.753906 1.429688-3.183593 3.1875-3.183593h78.5625c1.753907 0 3.183594 1.429687 3.183594 3.183593v3.539063h-84.929687v-3.539063zm-157.582031-4.273437c0-1.753906 1.429688-3.183594 3.183594-3.183594h14.460937c1.757813 0 3.183594 1.429688 3.183594 3.183594v7.8125h-20.828125zm-132.476562-10.683594c0-1.753906 1.429687-3.183594 3.183593-3.183594h78.566407c1.753906 0 3.183593 1.429688 3.183593 3.183594v18.496094h-84.933593zm21.464843 105.941406c-7.441406 0-13.5-6.054687-13.5-13.5 0-7.441406 6.058594-13.5 13.5-13.5 7.445313 0 13.5 6.058594 13.5 13.5 0 7.445313-6.054687 13.5-13.5 13.5zm27.492188-21c-3.300781-12.085937-14.371094-21-27.492188-21-13.121093 0-24.191406 8.914063-27.492187 21h-41.046875v-37.578125c0-7.644531 6.222656-13.867187 13.867188-13.867187h315.757812.007812.011719 138.488281c7.644532 0 13.867188 6.222656 13.867188 13.867187v37.578125h-22.320312v-27.25c0-4.140625-3.359376-7.5-7.5-7.5h-69.800782c-4.140625 0-7.5 3.359375-7.5 7.5v27.25h-73.378906c-18.738281-8.796875-39.367188-13.519531-60.5-13.519531-21.632812 0-42.148438 4.855469-60.527344 13.519531zm293.847656 0v-19.75h54.800782v19.75zm-376.011718 242.667969c-7.644532 0-13.867188-6.222656-13.867188-13.867187v-2.828126h136.890625c5.675781 6.085938 11.875 11.675782 18.527344 16.695313zm99.710937-113.765625c0-70.261719 57.164063-127.421875 127.421875-127.421875 36.441406 0 71.214844 15.664063 95.410156 42.972656 2.746094 3.101563 7.484375 3.390625 10.585938.640625 3.101562-2.746094 3.386718-7.484375.640625-10.585937-6.433594-7.261719-13.542969-13.777344-21.183594-19.507813h155.546875v195.972656h-124.667969c11.453125-16.1875 19.609375-34.859374 23.503907-55.035156h19.621093c11.0625 0 20.066407-9 20.066407-20.066406v-18.683594c0-11.066406-9-20.066406-20.066407-20.066406h-20.644531c-2.726562-11.933594-6.960938-23.507812-12.644531-34.328125-1.925781-3.667969-6.460938-5.082031-10.125-3.152344-3.667969 1.925781-5.082031 6.457031-3.15625 10.125 9.507812 18.109375 14.535156 38.558594 14.535156 59.136719 0 70.261719-57.160156 127.421875-127.421875 127.421875-70.257812 0-127.421875-57.164063-127.421875-127.421875zm268.839844-16.785156h18.039062c2.792969 0 5.066407 2.273437 5.066407 5.066406v18.6875c0 2.792969-2.273438 5.066406-5.066407 5.066406h-17.550781c.335938-3.96875.515625-7.984375.515625-12.039062 0-5.613282-.339844-11.21875-1.003906-16.78125zm85.714843 130.550781h-141.550781c6.652344-5.019531 12.851563-10.609375 18.527344-16.695313h136.890625v2.828126c0 7.644531-6.222656 13.867187-13.867188 13.867187zm0 0"/><path d="m256 143.898438c-55.644531 0-100.910156 45.269531-100.910156 100.914062 0 55.640625 45.265625 100.910156 100.910156 100.910156s100.910156-45.269531 100.910156-100.910156c0-55.644531-45.265625-100.914062-100.910156-100.914062zm0 186.824218c-47.371094 0-85.910156-38.539062-85.910156-85.910156s38.539062-85.914062 85.910156-85.914062 85.910156 38.542968 85.910156 85.914062-38.539062 85.910156-85.910156 85.910156zm0 0"/><path d="m256 174.332031c-38.859375 0-70.476562 31.617188-70.476562 70.480469s31.613281 70.476562 70.476562 70.476562 70.480469-31.613281 70.480469-70.476562-31.617188-70.480469-70.480469-70.480469zm0 125.957031c-30.589844 0-55.476562-24.886718-55.476562-55.476562 0-30.59375 24.886718-55.480469 55.476562-55.480469s55.480469 24.886719 55.480469 55.480469c0 30.589844-24.890625 55.476562-55.480469 55.476562zm0 0"/>
                                </svg>
                                </div>
                                @endif
                                <img src="{{ $channel->image() }}" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <h4 class="text-center">
                                {{ $channel->name }}
                            </h4>

                            <p class="text-center">
                                {{ $channel->description }}
                            </p>
                        </div>

                        <div class="text-center">
                           <subscribe-button :channel="{{$channel}}" :initial-subscriptions="{{$channel->subscriptions}}" inline-template>

                           <button @click="toggleSubscription" class="btn btn-danger"> 
                                @{{ owner ? '' : subscribed ? 'Unsubscribe' : 'Subscribe' }} @{{count }} @{{owner ? 'Subscribers' : ''}}
                            </button>

                           </subscribe-button>
                        </div>

                        @if($channel->editable())

                        <input type="file" onchange="document.getElementById('update-channel-form').submit()" class="d-none" id="image" name="image">

                            <div class="form-group">
                                <label for="name" class="form-control-label">Name</label>
                                <input type="text" id="name" name="name" value="{{$channel->name}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-control-label">Description</label>
                                <textarea type="text" id="description"  name="description" rows="3" value="{{$channel->description}}" class="form-control">{{$channel->description}}</textarea>
                            </div>

                            @if($errors->any())

                                <ul class="list-group mb-5">
                                    @foreach($errors->all() as $error)

                                        <li class="list-group-item text-danger">
                                            {{ $error }}
                                        </li>

                                    @endforeach
                                </ul>

                            @endif


                                <button class="btn btn-info" type="submit">
                                    Update Channel
                                </button>

                        @endif
                       

                       
                       
                    @if($channel->editable())
                   </form>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
