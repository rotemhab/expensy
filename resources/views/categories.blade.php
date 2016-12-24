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
                                <h4 class="page-title">Categories</h4>
                            </div>
                        </div>
                        <form method='POST' action='/categories'>
                            {{ csrf_field() }}
                            Select a category:
                            <select name="category">
                                @foreach ($Categories as $i=>$j)
                                    <option value={!!'"' .  $i . '"'!!}
                                    @if(!empty($category))
                                        @if($i==$category)
                                            selected
                                        @endif
                                    @endif
                                    >{{ $i }}</option>
                                @endforeach
                            </select>
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
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Category Expenses Over Time</h4>
                                    <div class="row text-center m-t-30">
                                        <canvas id="monthReport"></canvas>
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
@if (!empty($categoryExpensesByMonth))
<script src="/js/chart.js"></script>
    <script>
        window.onload = function() {
            //console.log(data);
            var monthLabels= [
                @foreach ($categoryExpensesByMonth as $i => $j) 
                    {!! "'" . $i ."'" ." ," !!}
                @endforeach
                ]
            var monthSeries= [
                @foreach ($categoryExpensesByMonth as $i => $j) 
                    {!! $j->sum('amount') . " ," !!}
                @endforeach
                ]
            
            //create expenses by month bar chart
            var ctx1 = document.getElementById('monthReport').getContext('2d');
            Chart1 = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: monthLabels,
                        datasets: [{
                            label: {!! "'" . $category ." by month" ."'" !!},
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
                        responsive: true
                    }
                    });
            }
    </script>
@endif
@stop