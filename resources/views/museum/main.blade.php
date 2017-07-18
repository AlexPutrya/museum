@extends('layouts.museum')

@section('main')
    @parent
    <script type="text/javascript">
    function initMap() {
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 49.6180822, lng: 34.5019069},
          zoom: 15,
          styles: [ { "elementType": "geometry", "stylers": [ { "color": "#1d2c4d" } ] }, { "elementType": "labels.text.fill", "stylers": [ { "color": "#8ec3b9" } ] }, { "elementType": "labels.text.stroke", "stylers": [ { "color": "#1a3646" } ] }, { "featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [ { "color": "#4b6878" } ] }, { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [ { "color": "#64779e" } ] }, { "featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [ { "color": "#4b6878" } ] }, { "featureType": "landscape.man_made", "elementType": "geometry.stroke", "stylers": [ { "color": "#334e87" } ] }, { "featureType": "landscape.natural", "elementType": "geometry", "stylers": [ { "color": "#023e58" } ] }, { "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#283d6a" } ] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "color": "#6f9ba5" } ] }, { "featureType": "poi", "elementType": "labels.text.stroke", "stylers": [ { "color": "#1d2c4d" } ] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "color": "#023e58" } ] }, { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [ { "color": "#3C7680" } ] }, { "featureType": "road", "elementType": "geometry", "stylers": [ { "color": "#304a7d" } ] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [ { "color": "#98a5be" } ] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [ { "color": "#1d2c4d" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#2c6675" } ] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "color": "#255763" } ] }, { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [ { "color": "#b0d5ce" } ] }, { "featureType": "road.highway", "elementType": "labels.text.stroke", "stylers": [ { "color": "#023e58" } ] }, { "featureType": "transit", "elementType": "labels.text.fill", "stylers": [ { "color": "#98a5be" } ] }, { "featureType": "transit", "elementType": "labels.text.stroke", "stylers": [ { "color": "#1d2c4d" } ] }, { "featureType": "transit.line", "elementType": "geometry.fill", "stylers": [ { "color": "#283d6a" } ] }, { "featureType": "transit.station", "elementType": "geometry", "stylers": [ { "color": "#3a4762" } ] }, { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#0e1626" } ] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "color": "#4e6d70" } ] } ]
        });

        var marker = new google.maps.Marker({
            position: {lat: 49.6180822, lng: 34.5019069},
            map: map,
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjzMnNXLIR6GSjpLCaCN2825iF9uFUX6g&callback=initMap"
    async defer></script>
    <div  id="info" class="row">
        <div class="col-md-12">
            <h2>О музее</h2>
            <p>
                Полтавский музей дальней авиации открыт 20.06.2007 года.
                В музейную экспозицию вошли 9 самолетов различного назначения
                и авиационные средства поражения - авиационные бомбы весом от 100 до 9000 кг,
                авиационные крылатые ракеты КСР- 2, КСР- 5, Х -22, а также экспонаты аварийно-спасательного
                снаряжения.
            </p>
        </div>
    </div>
    <div class="row exhibits">
        <h2>Экспонаты</h2>
        @foreach ($exhibits as $exhibit)
            <div class="col-md-4">
                <article class="exhibit">
                    <h4>{{$exhibit['title']}}</h4>
                    <img src="{{asset($exhibit['img_path'])}}" class="img-responsive img-thumbnail" alt="">
                    <div class="text">
                        {{$exhibit['text']}}
                    </div>
                </article>
            </div>
        @endforeach
    <div id="map">
        {{--тут будет карта  --}}
    </div>
@endsection
