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
                                @if(Session::get('flash_view') != null)
                                    <div class='flash_message'>
                                        <h5 id="deleted">
                                        @include('messages.'.Session::get('flash_view')[0], Session::get('flash_view')[1])
                                        </h5>
                                    </div>
                                @endif
                                 <form method='POST' action='/search'>
                                    {{ csrf_field() }}
                                    <input type='text' name='search' placeholder="Search for transaction">
                                    <input type='submit' value='Submit'>
                                </form>
                                @if(count($errors) > 0)
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if (!empty($searchResults))
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card-box">
                                            <h4 class="header-title m-t-0">Search Results</h4>
                                                <div class="row text-center m-t-30" id="scroll_table">
                                                    <table class="table" id="searchTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Transaction</th>
                                                            <th>Amount</th>
                                                            <th class="tdAction"></th>
                                                            <th class="tdAction"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($searchResults as $i=>$j)
                                                            <tr>
                                                                <td>{!! $j->date !!}</td>
                                                                <td>{!! $j->item !!}</td>
                                                                <td>{!! $j->amount !!}</td>
                                                                <td class="tdAction"><a href={{ '/edit?expense_id='.$j->id }} >edit</a></td>
                                                                <td class="tdAction"><a href={{ '/delete?expense_id='.$j->id }}>delete</a></td>
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