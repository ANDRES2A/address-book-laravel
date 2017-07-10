
<div class="col-md-1"></div>
<div class="col-md-8">
<h1>Welcome to my post manager</h1>
<p><a href="{{ url('/posts/create') }}">Create new</a></p>
@section('content')
    @if ($postsList->count())
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Autor</th>
                    <th>Contenido</th>
                    <th>Likes</th>
                    <th>Comentario</th>
                    <th colspan="3" align="center">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $i=0; ?>
                @foreach ($postsList as $post)
                    <?php $i++; ?>
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->contenido }}</td>
                    <td>{{ $post->likes }}</td>
                    <td>{{ $post->comentario }}</td>
                    <td><a class="btn btn-primary" href="{{ url('/posts', $post->author)}}">Read</a></td>
                    <td><a class="btn btn-warning" href="{{ url('/posts/'.$post->author.'/edit')}}">Update</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <center>
        {!!$postsList->render()!!}
     </center>
    @else
        There are no posts in the post list
    @endif
</div>
<div class="col-md-2"></div>
@stop
