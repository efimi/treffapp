<div id="map"  class="animate-bottom embed-responsive embed-responsive-16by9 col-xs-12 text-center">
    <div id="loader"></div>
    <iframe
            class="hidden"
            id="framemap"
            width="600"
            height="450"
            frameborder="0" style="border:0"
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDpSUaKc9vuFsHzWM60PxQu2jzfmvLL6wE
                    &q={{!! $location->address !!}},Paderborn" allowfullscreen>
    </iframe>
    <script src="/js/map.js"></script>
</div>
