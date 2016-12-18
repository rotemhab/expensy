@extends('layouts.master')

@section('title')
    Expensy- Upload
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
                                <h4 class="page-title">Upload</h4>
                            </div>
                        </div>
                        @if (empty($Success))
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Search Results</h4>
                                    <div class="row text-center m-t-30" id="scroll_table">
                                        <form>
                                            <table class="table" id="searchTable">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Category</th>
                                                        <th>Transaction</th>
                                                        <th>Amount</th>
                                                        <th class="tdAction"></th>
                                                        <th class="tdAction"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Upload as $i=>$j)
                                                        <tr>
                                                            <td><input type="date" name="date" value="2016/01/01"></td>
                                                            <td>
                                                                <select name="category">
                                                                 @foreach ($Categories as $i=>$j)
                                                                    <option value={{ $i }}>{{ $i }}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                            <td><input type="text" name="item" value={!! $j->item !!}></td>
                                                            <td><input type="number" name="amount" value={!! $j->amount !!}></td>
                                                            <td class="tdAction"><a href={{ '/edit?expense_id='.$j->id }} >edit</a></td>
                                                            <td class="tdAction"><a href={{ '/delete?expense_id='.$j->id }}>delete</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <h3>Transaction uploaded successfully</h3>
                        <form action="/upload">
                            <input type="submit" value="Upload another transaction" />
                        </form>
                        @endif
                        
                        @if(count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        


                    </div> <!-- container -->

                </div> <!-- content -->
        </div>
@stop


@section('body')
@stop