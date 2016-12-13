@extends('layouts.master')

@section('title')
    Expensy- Homepage
@stop

@section('head')
@stop


@section('content')
    <div class="content-page">
        <canvas id="monthReport" height="300" width="500"></canvas>
        <canvas id="categoryReport" height="300" width="500"></canvas>

    <script src="/js/chart.js"></script>
    <script>
        window.onload = function() {
            //console.log(data);
            var monthLabels= [
                @foreach ($sumByMonth as $i => $j) 
                    {!! "'" . $j->month ."'" ." ," !!}
                @endforeach
                ]
            var monthSeries= [
                @foreach ($sumByMonth as $i => $j) 
                    {!! $j->sum . " ," !!}
                @endforeach
                ]
            
            //create expenses by month bar chart
            var ctx1 = document.getElementById('monthReport').getContext('2d');
            Chart1 = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: monthLabels,
                        datasets: [{
                            label: 'day',
                            data: monthSeries,
                            backgroundColor: '#5e4562',
                            lineTension: 0.2,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        },
                        responsive: false
                    }
                    });
            
            //build label and value arrays for the expenses by category chart
            var categoryLabels= [
                @foreach ($sumByCategory as $i => $j) 
                    {!! "'" . $i ."'" ." ," !!}
                @endforeach
                ]
            var categorySeries = [
                @foreach ($sumByCategory as $i => $j) 
                    {!! $j->sum('amount') . " ," !!}
                @endforeach
                ]
            
            //create expenses by category pie
            var ctx2 = document.getElementById('categoryReport').getContext('2d');
            Chart1 = new Chart(ctx1, {
                    type: 'pie',
                    data: {
                        labels: categoryLabels,
                        datasets: [{
                            label: 'day',
                            data: categorySeries,
                            backgroundColor: '#5e4562',
                            lineTension: 0.2,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        },
                        responsive: false
                    }
                    });

            

            }
    </script>
    </div>
@stop


@section('body')
@stop