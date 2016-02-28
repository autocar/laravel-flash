@if (Session::has('flash_notification.messages'))
    @foreach (Session::pull('flash_notification.messages') as $message)
        @if ($message['overlay'])
            @include('flash::templates.bootstrap.modal', [
                'modalClass' => 'flash-modal',
                'title'      => $message['title'],
                'body'       => $message['message']
            ])
        @else
            <div class="alert alert-{!! $message['level'] !!} alert-styled-left">
                @if (is_a($message['message'], 'Illuminate\Support\MessageBag'))
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($message['message']->all('<li>:message</li>') as $error)
                            {!! $error !!}
                        @endforeach
                    </ul>
                @else
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    @if ( isset($message['title']) )
                        <span class="text-semibold">{!! $message['title'] !!}</span>
                    @endif
                    {!! $message['message'] !!}
                @endif
            </div>


        @endif
    @endforeach
@endif
