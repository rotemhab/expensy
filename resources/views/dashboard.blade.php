@extends('layouts.master')

@section('title')
    Expensy- Homepage
@stop

@section('head')
@stop


@section('content')
    <div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                        <form method='POST' action='/'>
                            {{ csrf_field() }}
                            From:<input type='date' name='from' value="2016-01-01">
                            To:<input type='date' name='to' value="2016-12-31">
                            <input type='submit' value='Submit'>
                        </form>
                        
                        @if(count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Expenses Over Time</h4>
                                    <div class="row text-center m-t-30">
                                        <canvas id="monthReport"></canvas>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Expenses by Category</h4>
                                    <div class="row text-center m-t-30">
                                        <canvas id="categoryReport"></canvas>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Top Expenses</h4>
                                    <div class="row text-center m-t-30">
                                        @if (!empty($sumByMonth))
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Transaction</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($topExpenses as $i=>$j)
                                                        <tr>
                                                            <td>{!! $j->date !!}</td>
                                                            <td>{!! $j->item !!}</td>
                                                            <td>{!! $j->amount !!}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->
        </div>
@stop


@section('body')
@if (!empty($sumByMonth))
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
            ctx1.canvas.height = 250;
            Chart1 = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: monthLabels,
                        datasets: [{
                            label: 'expenses over time',
                            data: monthSeries,
                            backgroundColor: '#2196f3',
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
            ctx2.canvas.height = 200;
            Chart2 = new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        labels: categoryLabels,
                        datasets: [{
                            label: 'Total expenses by Category',
                            data: categorySeries,
                            backgroundColor: [
                                '#186FB3',
                                '#104773',
                                '#2196F3',
                                '#072034',
                                '#1E86D9',
                                '#0D4AB3',
                                '#082F73'
                            ],
                            
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
                        responsive: true
                    }
                    });
            
            }
    </script>
@endif
@stop