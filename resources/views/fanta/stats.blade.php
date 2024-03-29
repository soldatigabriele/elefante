@extends('layouts.fanta')


@section('header-scripts')

<script type="text/javascript">

google.charts.load("current", {packages:["corechart", "bar", "geochart"], 'mapsApiKey': 'AIzaSyBo0h7ZKNAu_0bEUgHPB2i2iv3yxk_GYfw' });

// Colours

google.charts.setOnLoadCallback(drawColoursChart);

let colours = {
    'Red': '#FF5252',
    'Pink': '#F8BBD0',
    'Purple': '#512DA8',
    'Blue': '#1976D2',
    'Light blue': '#03A9F4',
    'Green': '#388E3C',
    'Orange': '#FF9800',
    'Yellow': '#FFEB3B',
    'White': '#f0f0f0',
    'Black': '#212121',
    'Silver': '#607D8B',
}

function drawColoursChart() {
    var data = google.visualization.arrayToDataTable([
        ['Element', 'Count', { role: 'style' }],
        @foreach ($stats->colours->distinct  as $index => $element)
            ['{{ $element->name }}', {{ $element->count }} , colours['{{ $element->name}}']],
        @endforeach
      ]);
    
    var options = {
        hAxis: {
            title: '',
        },
        vAxis: {
            title: ''
        },
        width: $('#years_div').width()*1.2,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
    };

    var coloursChart = new google.visualization.ColumnChart(
        document.getElementById('colours_div'));
            
        coloursChart.draw(data, options);
}
  
// Countries World
      google.charts.setOnLoadCallback(drawWorldMap);

      function drawWorldMap() {
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Cans'],
            @foreach ($stats->countries->distinct  as $index => $element)
                ['{{ $element->name }}', {{ $element->count }}],
            @endforeach
        ]);

        var options = {
            colorAxis: {colors: ['#fcd276', '#ffaf00']},
            defaultColor: '#f5f5f5',
            magnifyingGlass: {
                enable: true, zoomFactor: 7.5
                }
        };

        var countriesWorldChart = new google.visualization.GeoChart(document.getElementById('world_div'));

        countriesWorldChart.draw(data, options);
      }

// Countries Europe
         
      google.charts.setOnLoadCallback(drawEuropeMap);

      function drawEuropeMap() {
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Cans'],
            @foreach ($stats->countries->distinct  as $index => $element)
                ['{{ $element->name }}', {{ $element->count }}],
            @endforeach
        ]);

        var options = {
            region: '150',
            width: $('#europe_div').width(),
            colorAxis: {colors: ['#fcd276', '#ffaf00']},
            defaultColor: '#f5f5f5',
            magnifyingGlass: {
                enable: true, zoomFactor: 7.5
                }

        };

        var countriesEuropeChart = new google.visualization.GeoChart(document.getElementById('europe_div'));

        countriesEuropeChart.draw(data, options);
      }

// Year
    google.charts.setOnLoadCallback(drawYearChart);

    function drawYearChart() {
        
        var data = google.visualization.arrayToDataTable([
            ['Element', 'Count'],
            @foreach ($stats->years  as $index => $element)
                ['{{ $element->year }}',
                {{ $element->count }},
                ],
            @endforeach
        ]);

        var options = {
            colors: ['#FFD175'],
            hAxis: {
                title: '',
            },
            vAxis: {
                title: ''
            },
            animation:{
                startup: false,
                duration: 400,
            },
            width: $('#years_div').width()*1.2,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };

        var yearChart = new google.visualization.SteppedAreaChart(
            document.getElementById('years_div'));
                
            yearChart.draw(data, options);
    }
    
    // Flavours
    google.charts.setOnLoadCallback(drawFlavoursChart);
    function drawFlavoursChart() {
        var data = google.visualization.arrayToDataTable([
        ['Flavour', 'How many'],
        @foreach ($stats->flavours->distinct  as $index => $element)
            ['{{ $element->name }}', {{ $element->count }}],
        @endforeach
        ]);

        var options = {
            pieHole: 0.4,
            width: $('#years_div').width()*1.2,
            slices: [
                @foreach ($stats->flavours->distinct  as $index => $element)
                    {color: colours['{{ $element->colour }}']},
                    // I want to do something like $element->colour to get the colour
                @endforeach
            ]
        };

        var flavoursChart = new google.visualization.PieChart(document.getElementById('flavours_div'));

        flavoursChart.draw(data, options);
      }

// Capacities 
    google.charts.setOnLoadCallback(drawCapacityChart);

    function drawCapacityChart() {
        
        let colors = [ '#ffd175', '#ffc85b', '#efae2d', '#ffad0f', '#ffa900']

        var data = google.visualization.arrayToDataTable([
            ['Element', 'Count', { role: 'style' }],
            @foreach ($stats->capacities  as $index => $element)
                ['{{ $element->capacity }}ml',
                {{ $element->count }},
                colors[Math.floor(Math.random()*colors.length)] ], 
            @endforeach
        ]);
        
        var options = {
            hAxis: {
                title: '',
            },
            vAxis: {
                title: ''
            },
            animation:{
                startup: false,
                duration: 400,
            },
            width: $('#years_div').width()*1.2,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };

        var capacityChart = new google.visualization.ColumnChart(
            document.getElementById('capacities_div'));
                
            capacityChart.draw(data, options);
    }

    drawWorldMap()
    drawEuropeMap()
$(window).resize(function(){
    drawColoursChart()
    drawYearChart()
    drawFlavoursChart()
    drawCapacityChart()
})

</script>
@endsection


@section('style')
<style>
html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Raleway', sans-serif;
    font-weight: 100;
    height: 100vh;
    margin: 0;
}

.flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
    position:relative;
    top:-10px;
}
.position-ref {
    position: relative;
}

.top-right {
    position: absolute;
    right: 10px;
    top: 18px;
}

.content {
    text-align: center;
}

.title {
    font-size: 84px;
}

.links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}

.m-b-md {
    margin-bottom: 30px;
}
.chart {
  width: 100%; 
  min-height: 450px;
}
.outbox{
    margin:auto;
    position: relative;
    text-align: center;
    max-width: 1000px;
}
#years_div {
    width:inherit;
    height:inherit;
}
.maps{
    margin-top:20px;
    margin-bottom:20px;
    position:relative;
    right:0px;
}
.count{
    font-size:140%;
}
.world{
    font-size:120%;
}
</style>
@endsection      

@section('content')
<div class="container-fluid px-5">
    <div class="content mt-5">
        <div class="title">
        <h1>Here's some stats...</h1>
        </div>
    </div>
        <div class="md-12 text-center mt-4">
        <h3> <span class="count"> {{ $stats->count }} </span> different cans from all over the <span class="world">WORLD!</span></h3>
    </div> 
    <br>
    <div class="row mt-4">
        <div class="col-6">
            <h3>Capacity</h3>
            <div class="chart flex-center" id="capacities_div"></div>
        </div>
        <br>
        <div class="col-6">
            <h3>Year</h3>
            <div class="chart flex-center" id="years_div"></div>
        </div>
        <br>
        <div class="col-6">
            <h3>Colour</h3>
            <div class="chart flex-center" id="colours_div"></div>
        </div>
        <div class="col-6">
            <h3>Flavour</h3>
            <div class="chart flex-center" id="flavours_div"></div>
        </div>
        <br>
        <div class="col-12">
            <h3>Country</h3>
        </div>
        <div class="col-6">
            <div class="chart maps" id="world_div"></div>
        </div>
        <div class="col-6">
            <div class="chart maps flex-center" id="europe_div"></div>
        </div>
        <br>
        
    </div>


</div>

@endsection
        