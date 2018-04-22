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

.full-height {
    height: 100vh;
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
</style>
@endsection

@section('header-scripts')
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {
    
    var data = google.visualization.arrayToDataTable([
        ['Element', 'Count', { role: 'style' }],
        @foreach ($stats->colours->distinct  as $index => $element)
            ['{{$element->name}}', {{ $element->count }} , '{{ $element->name}}'],
        @endforeach
      ]);
    
    var options = {
        title: 'Colours',
        hAxis: {
            title: 'Colour',
        },
        vAxis: {
            title: 'Count'
        }
    };
        
    var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));
            
    chart.draw(data, options);
}
</script>
@endsection
        
@section('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
        Here some stats...
        </div>
        <div> 
            Number of colours: {{$stats->colours->count }}
        </div>
        <div> 
        <hr>
        @foreach ($stats->colours->distinct  as $index => $element)
            {{$element->name}} {{ $element->count }}
        @endforeach
        <hr>
        </div>

            <div id="chart_div"/></div>


        <div> 
            Number of flavours: {{$stats->flavours->count }}
        </div>
        <div> 
            Number of tags: {{$stats->tags->count }}
        </div>
        <div> 
            Number of countries: {{$stats->countries->count }}
        </div>
        <div> 
            Number of logos: {{$stats->logos->count }}
        </div>
    </div>
</div>
@endsection
        