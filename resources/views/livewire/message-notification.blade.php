
    <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-bell "></i>
                <span class="badge bg-danger rounded-pill">{{ $notificationCount }}</span>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                 aria-labelledby="page-header-notifications-dropdown">
                <div class="p-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="m-0" key="t-notifications"> {{__('message.messages')}} </h4>
                        </div>
                    </div>
                </div>
                <hr>
                <div data-simplebar class="p-3">
                    <a href="" class="text-reset notification-item" style="text-decoration: none;">
                        <div class="simplebar-wrapper p-3" >
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask p-3">
                                <div class="simplebar-offset p-3">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                                         style="height: auto; overflow: hidden scroll;">
                                        <div class="simplebar-content p-3">
                                            @foreach ($notifications as $notification)
                                @if ($notification->type == App\Notifications\MessageAddedAdmin::class ||
                                    $notification->type == App\Notifications\MessageAddedUser::class)
                                    <a href="{{ $notification->data['url'] }}" style="text-decoration: none;"
                                       class="notification-list notification-list--unread text-dark">
                                        <div class="flex-grow-1">
                                            <div class="font-size-12 text-muted">
                                                    <p><b>{{ $notification->data['username'] }}</b> <span class="text-muted">{{__('message.commented')}}
                                                            {{ $notification->data['appl_name'] }}</span>
                                                    <p class="nt-link text-truncate">{{ $notification->data['message_body'] }}</p>
                                                    <p><small>{{ $notification->created_at->diffForHumans() }}</small></p>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($notification->type == App\Notifications\NewApplication::class)
                                    <a href="{{ $notification->data['url'] }}" style="text-decoration: none;"
                                       class="notification-list notification-list--unread text-dark">
                                        <div class="flex-grow-1">
                                            <p>{{__('message.newAppl')}}  <b>{{ $notification->data['appl_name'] }}</b>
                                                <span class="text-muted">{{__('message.submitted')}}.</span>
                                        </div>
                                        <p><small>{{ $notification->created_at->diffForHumans() }}</small></p>
                                    </a>
                                @else
                                    <a href="{{ $notification->data['url'] }}" style="text-decoration: none;"
                                       class="notification-list notification-list--unread text-dark">
                                        <div class="flex-grow-1">
                                            <p>{{__('message.status')}} <b>{{ $notification->data['appl_name'] }}</b>
                                                <span class="text-muted">{{__('message.changed')}}</span>
                                                <b>{{ __('application.status_name.' . strtoupper($notification->data['appl_status'])) }}</b></p>
                                        </div>
                                        <p><small>{{ $notification->created_at->diffForHumans() }}</small></p>
                                    </a>
                                @endif
                                <hr>
                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 320px; height: 388px;"></div>
                        </div>
                    </a>



                </div>
                <div class="p-2 border-top d-grid">
                    <a wire:click.prevent="markAllAsRead" class="btn btn-success btn-block">{{__('message.markAllRead')}}</a>
                </div>
            </div>
        </div>
