@extends('layouts.fanta')

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

.chart{
    display: inline-block;
    margin:0px auto;
}
</style>
@endsection

@section('header-scripts')

<script type="text/javascript">

// Colours
google.charts.load("current", {packages:["corechart", "bar", "geochart"], 'mapsApiKey': 'AIzaSyBo0h7ZKNAu_0bEUgHPB2i2iv3yxk_GYfw' });

google.charts.setOnLoadCallback(drawColoursChart);

function drawColoursChart() {
    
    var data = google.visualization.arrayToDataTable([
        ['Element', 'Count', { role: 'style' }],
        @foreach ($stats->colours->distinct  as $index => $element)
            ['{{ $element->name }}', {{ $element->count }} , '{{ $element->name}}'],
        @endforeach
      ]);
    
    var options = {
        title: 'Colours',
        hAxis: {
            title: 'Colour',
        },
        vAxis: {
            title: 'Count'
        },
        width: 1200,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
    };

    var coloursChart = new google.visualization.ColumnChart(
        document.getElementById('colours_div'));
            
        coloursChart.draw(data, options);
}
</script>

<script type="text/javascript">
  
    // World
    
      google.charts.setOnLoadCallback(drawWorldMap);

      function drawWorldMap() {
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Popularity'],
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

        // Countries
         
      google.charts.setOnLoadCallback(drawEuropeMap);

      function drawEuropeMap() {
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Popularity'],
            @foreach ($stats->countries->distinct  as $index => $element)
                ['{{ $element->name }}', {{ $element->count }}],
            @endforeach
        ]);

        var options = {
            region: '150',
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
        
        let body = [
            'Year',
            @foreach ($stats->years  as $index => $element)
                {{ $element->count }},
            @endforeach
            ''
        ];
        let headers = [
            'Year',
            @foreach ($stats->years  as $index => $element)
                '{{ $element->year }}',
            @endforeach
            {role: 'annotation'}
        ];

        var data = google.visualization.arrayToDataTable([
            headers, body
        ]);

        var options = {
            width: 400,
            height: 600,
            legend: { position: 'top', maxLines: 3 },
            bar: { groupWidth: '75%' },
            isStacked: true,
            colors: [ '#ffd175', '#ffc85b', '#efae2d', '#ffad0f', '#ffa900']

        };
        var options_fullStacked = {
          isStacked: 'percent',
          height: 300,
          legend: {position: 'top', maxLines: 3},
          vAxis: {
            minValue: 0,
            ticks: [0, .3, .6, .9, 1]
          }
        };
        var yearsChart = new google.visualization.ColumnChart(
            document.getElementById('years_div'));

        yearsChart.draw(data, options);
    }

    // Flavours
    google.charts.setOnLoadCallback(drawFlavoursChart);
    function drawFlavoursChart() {
        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        @foreach ($stats->flavours->distinct  as $index => $element)
            ['{{ $element->name }}', {{ $element->count }}],
        @endforeach
        ]);

        var options = {
            title: 'Flavours',
            pieHole: 0.4,
            colors: [ '#ffd175', '#ffc85b', '#efae2d', '#ffad0f', '#ffa900']
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
                ['{{ $element->capacity }}', 
                {{ $element->count }} ,
                colors[Math.floor(Math.random()*colors.length)] ], 
            @endforeach
        ]);
        
        var options = {
            title: 'Capacity',
            hAxis: {
                title: 'Capacity',
            },
            vAxis: {
                title: 'Count'
            },
            animation:{
                startup: true,
                duration: 400,
            },
            width: 1200,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };

        var capacityChart = new google.visualization.ColumnChart(
            document.getElementById('capacities_div'));
                
        capacityChart.draw(data, options);
    }
</script>
@endsection
        
@section('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
        Here some stats...
        </div>
        <div class="chart" id="flavours_div" style="width: 900px; height: 500px;"></div>
        <div class="chart" id="capacities_div"></div>
        <div class="chart" id="colours_div"></div>
        <div class="chart" id="world_div" style="width: 900px; height: 500px;"></div>
        <div class="chart" id="europe_div" style="width: 900px; height: 500px;"></div>
        <div class="chart" id="years_div"></div>

    </div>
</div>
@endsection
        