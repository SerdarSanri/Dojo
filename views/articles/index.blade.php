<div class="page-header">
    <div class="right">
        
         <h1>List of articles</h1>
         <a class="btn" href="{{URL::to_route('dojo::new_article')}}">New article</a>
        <a class="btn" href="{{URL::to('admin/articles/export')}}">Export</a>    
    </div>

    
    </div>
        <table class="table table-striped table-bordered">
                <thead>
                        <tr>
                                <th>Title</th>
                                <th>Writer</th>
                                <th>Published at</th>
                                <th>Actions</th>
                        </tr>

                </thead>
                <tbody>
                @foreach($articles as $post)

                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->author->username}}</td>
                    <td>{{$post->created_at}}</td>
                <td> <a rel="tooltip" title="Delete" id="dialog-confirm" href="{{URL::to_route('dojo::delete_article',array($user->id))}}"  role="button" data-toggle="modal" data-id="{{$user->id}}"><i class="icon-minus-sign"></i></a>   <a rel="tooltip" title="Edit" href="{{URL::to_route('dojo::edit_article',array($user->id))}}"><i class="icon-wrench"></i></a>  <a rel="tooltip" title="Show Profile" href="{{URL::to_route('dojo::view_article',array($user->id))}}"><i class="icon-search"></i></a></td></tr>
                
          @endforeach
                </tbody>
        </table>