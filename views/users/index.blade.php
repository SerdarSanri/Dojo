<div class="page-header">
    <div class="right">
        <h1>Lista de Utilizadores</h1>
    </div>
</div>

        @if(Session::has('success'))
            <center>    
                 <p><span class="alert alert-success">{{Session::get('success')}}</span></p>
            </center>
        @endif
    



        <table class="table table-striped table-bordered tablesorter" id="tabledata">
                <thead>
                        <tr>    <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Registed at</th>
                                <th>Actions</th>
                        </tr>

                </thead>
                <tbody>
                @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td><td>{{$user->name}}</td>
                    <td>{{$user->username}}</td><td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->created_at}}</td>

                    <td>

                        <a rel="tooltip" title="Delete" id="dialog-confirm" href="{{URL::to_route('dojo::delete_user',array($user->id))}}"  role="button" data-toggle="modal" data-id="{{$user->id}}"><i class="icon-minus-sign"></i></a>   <a rel="tooltip" title="Edit" href="{{URL::to_route('dojo::edit_user',array($user->id))}}"><i class="icon-wrench"></i></a>  <a rel="tooltip" title="Show Profile" href="{{URL::to_route('dojo::view_user',array($user->id))}}"><i class="icon-search"></i></a></td></tr>
            

          @endforeach
                </tbody>
        </table>
