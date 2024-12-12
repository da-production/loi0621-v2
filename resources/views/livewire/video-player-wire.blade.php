<div class="row">
    <style>
        .activated-item{
            -webkit-box-shadow: 0px 5px 12px rgb(126 142 177 / 20%), 0px 0px 0px 2px #047bf8 !important;
            box-shadow: 0px 5px 12px rgb(126 142 177 / 20%), 0px 0px 0px 2px #047bf8 !important;
            -webkit-transform: translateY(-3px) !important;
            cursor: pointer;
        }
    </style>
    <div class="col-md-4 support-index">
        <div class="support-tickets">
            <div class="support-tickets-header">
                <div class="tickets-control">
                    <h5>
                        Playliste
                    </h5>
                </div>
            </div>
            @foreach ($playlist as $item)
            <div class="support-ticket {{ $item['url'] == $url ? 'activated-item' : '' }}" wire:click="changed('{{ $item['url'] }}')" >
                <div class="st-meta">
                    <div class="badge badge-success-inverted">
                        {{ $item['only'] }}
                    </div>
                    <i class="os-icon os-icon-play"></i>
                    {{-- <div class="status-pill green"></div> --}}
                </div>
                <div class="st-body">
                    <div class="avatar">
                        <img alt="" src="img/avatar1.jpg">
                    </div>
                    <div class="ticket-content">
                        <h6 class="ticket-title">
                            {{ $item['title'] }}
                        </h6>
                        <div class="ticket-description">
                            {{ $item['description'] }}
                        </div>
                    </div>
                </div>
                <div class="st-foot">
                    <span class="label">Date:</span>
                    <span class="value">{{ $item['updated_at'] }}</span>
                    <span class="label">Duree:</span>
                    <span class="value"><i class="os-icon os-icon-clock"></i> 03:00 min</span>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
    <div class="col-md-8">
        <video-js id="{{$randomID}}" class="vjs-default-skin vjs-big-play-centered" controls="" preload="auto"
            data-setup="{&quot;fluid&quot;: true}">
            <source src="{{ asset('videos/'. $url) }}" type="application/x-mpegURL">
        </video-js>
    </div>

    <script src="https://unpkg.com/video.js@7.21.4/dist/video.js" id="src-{{$randomID}}"></script>
    <script src="https://unpkg.com/@videojs/http-streaming/dist/videojs-http-streaming.js" id="srcs-{{$randomID}}"></script>
    <script>
        var player = videojs('{{$randomID}}');
    </script>
</div>