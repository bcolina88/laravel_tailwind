<?php

namespace App\Http\Livewire;

use Livewire\Component;


use App\Models\User;
use Livewire\WithPagination;
use Session;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use WireUi\Traits\Actions;

class UserList extends Component
{
    use WithPagination;
    use WithFileUploads;
    use Actions;
    
    protected $queryString = ['search' => ['except' => '']];
    protected $listeners = ['refreshNotes' => '$refresh','nameChanged' => 'nameChanged','sidebarChanged' => 'sidebarChanged'];


    public $search;
    public $perPage=10;
    public $confirmItem=false;
    public $deleteMode=false;
    public $show=false;
    public $addMode=false;
    public $editMode=false;
    public $user;
    public $roles;
    public $model;
    public $field= 'status';
    public $hasStock;


    public $photo;
    public $state = [];


    protected $rules = [
        'user.name' => 'required|string|min:4',
        'user.email' => 'min:4|max:255|required|email|unique:users,email,',
        'user.password' => 'min:6|max:255|required',
        
    ];
    
    public function render()
    {

        $users = User::orWhere('users.name','LIKE','%'.$this->search.'%')
                      ->orWhere('users.email','LIKE','%'.$this->search.'%')
                      ->orderBy('users.id','DESC')
                      ->select('users.*')
                      ->paginate($this->perPage);

        return view('livewire.user-list', compact('users'))->layout('usuarios.listado');

    }

    public function confirmItemDeletion($id)
    {

        $this->confirmItem = $id;
        $this->deleteMode = true;

    }


    public function confirmItemAdd()
    {
       
        $this->reset(['user']);
        $this->addMode = true;

    }

    public function confirmItemEdit(User $user)
    {

        $this->user = $user;
        $this->addMode = true;
        $this->editMode= true;
        $this->state = $user->toArray();

    }


    public function deleteUser(User $user)
    {
    

        $user->delete();

        $this->confirmItem = false;
        $this->deleteMode = false;


        $this->notification()->success(
                $title = 'Usuario eliminado',
                $description = 'El usuario fue eliminado exitosamente'
        );


    }


    public function saveUser() 
    {
       
        $flowers = [];
 
        if( isset( $this->user->id)) {

            $this->validate([
                'user.name' => 'min:4|max:255|required',
                'user.email' => 'min:4|max:255|required|email|unique:users,email,'.$this->user->id,
                'user.password' => ''
            ]);


            $usr = User::find( $this->user->id);
            array_push($flowers, 'name', 'email');


           


            if(!empty($this->user['password'])) {
                $this->user['password'] = bcrypt($this->user['password']);
                array_push($flowers, 'password');

            }

            if ($this->photo) {

                if ($this->user->avatar) {
                        Storage::disk('storage')->delete($this->user->avatar);
                }

                $this->user['avatar'] = $this->photo->store('/','storage');
                array_push($flowers, 'avatar');
            

            }

            $toUpdate = $this->user->only($flowers);
            $usr->fill($toUpdate);
            $usr->save();


            $this->emit('nameChanged',$usr->only('name', 'avatar_url','id'));

            $this->notification()->success(
                $title = 'Usuario actualizado',
                $description = 'El usuario fue actualizado exitosamente'
            );



        } else {

            $this->validate();


            if ($this->photo) {
                $avatar_url = $this->photo->store('public');
                $avatar1 = explode("/", $avatar_url);
                $avatar= $avatar1[1];
            }else{
                $avatar= null;
            }
            




            $user = User::firstOrCreate([

             'name'            => $this->user['name'],
             'email'           => $this->user['email'],
             'avatar'          => $avatar ,
             'password'        => bcrypt($this->user['password']),

            ]);

            $user->save();


            $this->notification()->success(
                $title = 'Usuario creado',
                $description = 'El usuario fue creado exitosamente'
            );


        }
 
        $this->addMode = false;
        $this->photo = false;
        $this->reset(['user']);
 
    }

    public function clear() 
    {
           $this->search='';
           $this->perPage=10;
           $this->resetPage();
    }

    public function cancel() 
    {
           $this->addMode = false;


    }

    public function nameChanged($data)
    {
        $this->dispatchBrowserEvent('nameChanged',$data);
    }

      public function sidebarChanged($data)
    {
        $this->dispatchBrowserEvent('sidebarChanged',$data);
    }


}

