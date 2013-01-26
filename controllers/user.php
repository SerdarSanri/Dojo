<?php
use Dojo\Models\User;
class Dojo_User_Controller extends Dojo_Base_Controller{


    //get user list
    public function get_index(){
        $users = User::all();
        $this->layout->nest('content','dojo::users.index',array(
            'users'=>$users,
        ));

    
    } 

    //get user info for edition
    public function get_edit($id){
    	$user = User::find($id);
    	$this->layout->nest('content','dojo::users.edit',array(
    		'user'=>$user,
    	));
    }

    //edit user info
    public function put_update(){

         //Guarda os valores do form e faz a pesquisa pelos dados antigos
        $id = Input::get('id');
        $olddata=User::find($id);
        $name = Input::get('name');
        $username = Input::get('username');
        $password = Input::get('password');
        $email = Input::get('email');
        $role = Input::get('role');
        $edit_info = array('enable' => Input::get('activo'));

        // comparação dos dados antigos com os novos
        if(strcmp($olddata->name, $name) != 0){
            $edit_info["name"] = $name;
        }
        if(strcmp($olddata->username, $username) != 0){
            $edit_info["username"] = $username;
        }
        if(strcmp($olddata->email, $email) != 0){
            $edit_info["email"] = $email;
        }
        if(!$password){
            $edit_info["password"] = Hash::make($password);
        }
        if($role != $olddata->role){
            $edit_info['role'] = $role;
        }

        //regras de validação
        $rules = array(
            'name' => 'min:3|max:15|unique:users|alpha_dash',
            'username' => 'min:3|max:15|unique:users|alpha_dash',
            'password' => 'min:3',
            'email' => 'min:12|max:35|email|unique:users',
        );

        // validação dos dados passados
        $validation = Validator::make($edit_info, $rules);
        //die("teste");

        if ($validation->fails()){
            return Redirect::to_route('dojo::edit_user', $id)->with_errors($validation);
        }else{
            User::update($id, $edit_info);
            return Redirect::to_route('dojo::index_user');
        }
    }

    //view user profile
    public function get_view($id){
        $user = User::where('id','=', $id)->get();
        $this->layout->nest('content','dojo::users.view',array(
            'user'=>$user,
        ));
    }

    //delete user account
    public function get_erase($id){
        $success="User deleted with success!";
        $user = User::find($id);
        $user->delete();
        return Redirect::to_route('dojo::index_user')
            ->with('success',$success);
        
    }



}
