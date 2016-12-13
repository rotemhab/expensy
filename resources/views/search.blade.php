@extends('layouts.master')

@section('title')
    Expensy- Search
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
                                <h4 class="page-title">Search</h4>
                                 <form method='POST' action='/search'>
                                    {{ csrf_field() }}
                                    <input type='text' name='search' placeholder="Search for transaction">
                                    <input type='submit' value='Submit'>
                                </form>
                                @if (!empty($searchResults))
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card-box">
                                            <h4 class="header-title m-t-0">Search Results</h4>
                                                <div class="row text-center m-t-30" id="scroll_table">
                                                    <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Transaction</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($searchResults as $i=>$j)
                                                            <tr>
                                                                <td>{!! $j->date !!}</td>
                                                                <td>{!! $j->item !!}</td>
                                                                <td>{!! $j->amount !!}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                            </table>
                                                </div>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                @endif
                            </div>
                        </div>


                    </div> <!-- container -->

                </div> <!-- content -->
        </div>
@stop


@section('body')
@stop