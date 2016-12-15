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
                                <h4 class="page-title">Edit your expense below:</h4>
                            </div>
                        </div>
                        <form method='POST' action='/edit'>
                            {{ csrf_field() }}
                            date:<input type='date' name='date' value={{ $expense->date }}><br>
                            category:<select name="category">
                                @foreach ($Categories as $i=>$j)
                                    <option value={{ $i }}>{{ $i }} 
                                    @if ($i == $expense->category){selected}
                                    </option>
                                    @endif
                                @endforeach
                            </select><br>
                            transaction:<input type='text' name='item' value={{ $expense->item }}><br>
                            amount:<input type='number' name="amount" value={{ $expense->amount }}><br>
                            <input type="hidden" name = "expense_id" value={{ $expense->id }}>
                            <input type='submit' value='Submit'>
                        </form>
                        @if (!empty($Success))
                        <h4 style="color:red;">Your update was recorded</h4>
                        @endif
                        


                    </div> <!-- container -->

                </div> <!-- content -->
        </div>
@stop


@section('body')
@stop