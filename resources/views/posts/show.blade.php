

@extends('layouts.app')

@section('content')
<div class="container">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    @if(session()->get('message'))
    <div class="alert alert-success">
      {{ session()->get('message') }}
    </div>
  @endif
</div>




    <div class="row justify-content-center">
        <div style="
  position: -webkit-sticky;
  position: sticky;
  top:0;
  background-color: rgb(13, 23, 37);
  padding: 10px;
  text-align: justify;
  font-size:18px;
  width:20%;
height:30%;
  border-radius: 4px;


        "><marquee direction = "up" scrollamount=2  onmouseover="this.stop();" onmouseout="this.start();"><p style="color:white; padding:2px;">Thanks for contributing an answer to FypPoint!
            Please be sure to answer the question. Provide details and share your research!
            But avoid: Asking for help, clarification, or responding to other answers.
            Making statements based on opinion; back them up with references or personal experience. "Add More Details" button will help you to include further details to the comments.</p></marquee></div>
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-body">
                    <br/>
                    <h1>{!! $post->title !!}</h1>
                    <p>
                        {!! $post->body !!}
                    </p>

                    Posted by: <strong style="Color:rgb(50, 122, 230)">{{ $post->added_by }}</strong> &nbsp;

                    Posted at:  {{$post->created_at->format('l, d F Y ')}}
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

{{-- for email functionality --}}
@if (  Auth::user()->name  == $post->added_by )
    @else
<a class="btn btn-primary" href="mailto:{{ $post->user_email }}?subject=FypPoint Submitted Question: {{$post->title}}.&body=Hi! I want to share something about the question you posted recently in FypPoint.">Email to {{ $post->added_by }}</a>

@endif
                    <hr />

                    {{-- <h4>Display Comments</h4> --}}

                    @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                    <hr />
                    <h5>Your Answer</h5>
                    <form method="post" action="{{ route('comments.store'   ) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">


                        <textarea id="summernote" name="body" placeholder="Place explanation to your question here"> </textarea>
                                            <script>
                                              $('#summernote').summernote({
                                                placeholder: 'Explain Your Question here',
                                                tabsize: 2,
                                                height: 120,

                                                toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol','paragraph']],
    ['height', ['height']],
    ['fontname', ['fontname']],
    ['view', ['codeview']],
    ['insert', ['link','picture',]],
    ['table', ['table']],


  ]



                                              });
                                            </script>






                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Post Your Answer" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection


