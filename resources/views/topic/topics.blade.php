@extends('layout.master')
@section('content')
    @include('topic.search')
    @if(isset($topics))
        @foreach($topics as $topic)
            <div class="panel panel-dark-blue">
                <div class="panel-heading">
                    <a data-target="#collapse-{!!$topic['id']!!}" data-toggle="collapse" expanded="false" href="#" style="text-decoration: none">
                        <h2 class="heading color-light">{!!$topic['title']!!}</h2>
                    </a>
                </div>
                <div id="collapse-{!!$topic['id']!!}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="heading"><h2>Grade {!!$topic->grade['string']!!} - {!!$topic->subject['name']!!}</h2></div>
                                <div class="heading"><h2>Summary</h2></div>
                                <p>{!!$topic['summary']!!}</p>
                                <div class="heading"><h2>Commentary</h2></div>
                                <p>{!!$topic['commentary']!!}</p>
                            </div>
                            <div class="row">
                                <div class="heading"><h2>Questions</h2></div>
                                <?php $questions = $topic->questions;?>
                                @foreach($questions as $question)
                                    <div class="panel panel-grey">
                                        <div class="panel-heading">
                                            <h4 class="color-light">{!!$question['title']!!}</h4>
                                        </div>
                                        <div class="panel-body">
                                            {!!$question['evidence']!!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@stop
