

@foreach($comments as $comment)



    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:20px;" @endif>
        <strong style="Color:rgb(245, 120, 3)">{{ $comment->user->name }} </strong> <span style="font-size: 10px"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Last updated: {{$comment->updated_at->format('l, d F Y -  H ').'Hours'}}</span>
        <p>{!! $comment->body !!}</p>
        <a href="" id="reply"></a>



        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" placeholder="Reply here.." />
                {{-- <textarea id="summernote"  class ="form-control" name="body" placeholder="Place explanation to your question here"> </textarea> --}}





                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>

            <div class="form-group">
                {{-- <input type="submit" class="btn btn-primary btn-sm" value="Reply" /> --}}
                 <a href="" style="font-size:12px" onclick="this.closest('form').submit();return false;">Reply</a>

            </div>
        </form>



        @if(Auth::user()->name  == $comment->user->name)
        {{-- <input type="submit" class="btn btn-primary btn-sm" value="Delete" /> --}}



<div class="row p-1" style="position: relative; bottom:47px; left:50px;">


  <form action="{{ route('comment.delete', $comment->id) }}" method="post">
            @csrf
            @method('DELETE')

         <a href="" style="font-size:12px; position: absolute; top:8px;" onclick="this.closest('form').submit();return false;">Delete</a>

          </form>


          <a href="{{ route('comment.edit', $comment->id) }}" style="font-size:12px; margin-top: 4px; position: relative; left:44px;">Add More Details</a>



</div>
        @else
        @endif



        @include('posts.commentsDisplay', ['comments' => $comment->replies])
    </span>
@endforeach
