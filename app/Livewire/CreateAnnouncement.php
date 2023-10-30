<?php

namespace App\Livewire;



use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\GoogleVisualLabelImage;
use App\Jobs\InsertWatermark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateAnnouncement extends Component
{
    use WithFileUploads;
    
    public $title;
    public $body;
    public $category;
    public $price; 
    public $validated;
    public $temporary_images;
    public $images = [];
    public $image;
    public $form_id;
    public $announcement;
    public $user_id;
    
    
    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:10',
        'category' => 'required',
        'price' => 'required|numeric',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
        
        
    ];
    
    // protected $messages= [
        //             'required' => 'Il campo :attribute è obbligatorio',
        //             'min' => 'Il campo :attribute deve contenere almeno :min caratteri',
        //             'temporary_images.required' => "l'immagine è richiesta",
        //             'temporary_images.*.image' => "i file devono essere immagini",
        //             'temporary_images.*.max' => "i file devono essere meno di  :max 2MB",
        //             'images.image' => "i file devono essere immagini",
        //             'images.max' => "i file devono essere meno di  :max 2MB"
        
        // ];
        
        public function updatedTemporaryImages(){
            if($this->validate([
                'temporary_images.*'=> 'image|max:1024'
                ])) {
                    foreach($this->temporary_images as $image){
                        $this->images[] = $image;
                    }
                }; 
            }
            
            public function removeImage($key){
                if (in_array($key, array_keys($this->images)))
                {
                    unset($this->images[$key]);
                }
                
            }
            
            public function store(){
                
                
                $this->validate();
                
                $this->announcement = Category::find($this->category)->announcements()->create(
                    ['title' => $this->title,
                    'body' => $this->body,
                    'user_id' => auth()->user()->id,
                    'price' => $this->price,
                    ]);
                    if(count($this->images)) {
                        foreach($this->images as $image) {
                            // $this->announcement->images()->create([
                            //     'path' => $image->store('images', 'public'),
                            // ]);
                            
                            $newFileName = "announcements/{$this->announcement->id}";
                            $newImage = $this->announcement->images()->create([
                                'path' => $image->store($newFileName, 'public'),
                            ]);

                            RemoveFaces::withChain([
                                new ResizeImage($newImage->path , 800 , 600),
                                // new InsertWatermark($newImage->id),
                                new GoogleVisionSafeSearch($newImage->id),
                                new GoogleVisualLabelImage($newImage->id),
                            ])->dispatch($newImage->id);
                        }
                        
                        File::deleteDirectory(storage_path('/app/livewire-tmp'));
                    }
                        
                        
                        session()->flash('message', __('ui.announcementCreated'));
                        $this->clearForm();
                        return to_route('home')->with('message', __('ui.announcementCreated'));
                    }
                    
                    public function updated($propertyName){
                        $this->validateOnly($propertyName);
                    }
                    
                    public function clearForm(){
                        $this->title = '';
                        $this->body = '';
                        $this->category = '';
                        $this->price = '';
                        $this->image = '';
                        $this->images = [];
                        $this->temporary_images = [];
                        $this->form_id = rand();
                    }
                    
                    // public function store(){
                        // $this->validate();
                        
                        // $category = Category::find($this->category);
                        // $category->announcements()->create([
                            //     'title' => $this->title,
                            //     'body' => $this->body,
                            //     'user_id' => auth()->user()->id,
                            //     'price' => $this->price,
                            //     'category_id' => $category->id
                            // ]);
                            
                            //     $this->reset();
                            //     return to_route('home')->with('message', __('ui.announcementCreated'));
                            // }
                            
                            public function render()
                            {
                                return view('livewire.create-announcement');
                            }
                            
                            
                        }
                        