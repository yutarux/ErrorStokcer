@extends('layouts.app')

@section('content')
<div class="card-header">comment</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('comments.store') }}" method="POST">
          {{ csrf_field() }}
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
        </div>

        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="tweet_id" value="{{ $tweet_id }}">

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" name="action" value="back" class="btn btn-primary">Back</button>
    </form>
</div>
@endsection
