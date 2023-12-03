<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proyect;
use Livewire\WithPagination;
use Session;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use WireUi\Traits\Actions;

class ProyectList extends Component
{
    use WithPagination;
    use WithFileUploads;
    use Actions;
    
    protected $queryString = ['search' => ['except' => '']];
    protected $listeners = ['refreshNotes' => '$refresh','nameChanged' => 'nameChanged','sidebarChanged' => 'sidebarChanged'];


    public $search='';
    public $perPage=10;
    public $confirmItem=false;
    public $deleteMode=false;
    public $show=false;
    public $addMode=false;
    public $editMode=false;
    public $proyect;
    public $model;
    public $field= 'status';
    public $hasStock;


    public $photo;
    public $state = [];


    protected $rules = [
        'proyect.title' => 'min:4|max:255|required',
        'proyect.description' => 'min:4|max:255|required',
        'proyect.type_proyect' => '',
        
    ];
    
    public function render()
    {
     
        $proyects = Proyect::orWhere('proyects.title','LIKE','%'.$this->search.'%')
                      ->orderBy('proyects.id','DESC')
                      ->select('proyects.*')
                      ->paginate($this->perPage);
        
        return view('livewire.proyect-list',compact('proyects'))->layout('proyectos.listado');
    }

        public function confirmItemDeletion($id)
    {

        $this->confirmItem = $id;
        $this->deleteMode = true;

    }


    public function confirmItemAdd()
    {
       
        $this->reset(['proyect']);
        $this->addMode = true;
        $this->editMode = false;
        $this->state = [];

    }

    public function confirmItemEdit(Proyect $proyect)
    {

        $this->proyect = $proyect;
        $this->addMode = true;
        $this->editMode= true;
        $this->state = $proyect->toArray();

    }



    public function deleteProyect(Proyect $proyect)
    {
    

        $proyect->delete();

        $this->confirmItem = false;
        $this->deleteMode = false;


        $this->notification()->success(
                $title = 'Proyecto eliminado',
                $description = 'El proyecto fue eliminado exitosamente'
        );


    }


    public function saveProyect() 
    {
       
        $flowers = [];
 
        if( isset( $this->proyect->id)) {

            $this->validate([
                'proyect.title' => 'min:4|max:255|required',
                'proyect.description' => 'min:4|max:255|required',
                'proyect.type_proyect' => '',
            ]);


            $usr = Proyect::find( $this->proyect->id);
            array_push($flowers, 'title', 'description','type_proyect');



            if ($this->photo) {

                if ($this->proyect->image) {
                        Storage::disk('storage')->delete($this->proyect->image);
                }

                $this->proyect['image'] = $this->photo->store('/','storage');
                array_push($flowers, 'image');
            

            }

            $toUpdate = $this->proyect->only($flowers);
            $usr->fill($toUpdate);
            $usr->save();

            $this->notification()->success(
                $title = 'Proyecto actualizado',
                $description = 'El proyecto fue actualizado exitosamente'
            );



        } else {

            $this->validate();


            if ($this->photo) {
                $image_url = $this->photo->store('public');
                $image1 = explode("/", $image_url);
                $image= $image1[1];
            }else{
                $image= null;
            }




            $proyect = Proyect::firstOrCreate([

             'title'            => $this->proyect['title'],
             'description'      => $this->proyect['description'],
             'image'            => $image ,
             'type_proyect'     => 'draft',

            ]);

            $proyect->save();


            $this->notification()->success(
                $title = 'Proyecto creado',
                $description = 'El proyecto fue creado exitosamente'
            );


        }
 
        $this->addMode = false;
        $this->photo = false;
        $this->reset(['proyect']);
 
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

}
