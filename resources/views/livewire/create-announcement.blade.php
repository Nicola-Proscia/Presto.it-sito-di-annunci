<div>

    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1>{{__('ui.Add Announcement')}}</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid form-container d-flex justify-content-center align-items-center my-5">
        
        <form wire:submit.prevent="store">
            @csrf
            <div class="form-control-cus">
                <input placeholder={{__('ui.title')}} type="text" class="form-control" id="title" name="title" wire:model.live="title" value="{{ old('title') }}">
                <label for="title" class="form-label"></label>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-control-cus">
                <label for="body" class="form-label"></label>
                <textarea placeholder={{__('ui.description')}} type="text" class="bg-transparent form-control" id="body" name="body" wire:model.live="body" value="{{ old('body') }}"></textarea>
                @error('body')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-control-cus">
                <label for="category" class="form-label"></label>
                <select wire:model.live="category" class="bg-transparent form-select" >
                    @foreach ($categories as $category)
                    <option class="text-sec bg-main" value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            
            <div class="form-control-cus">
                <input placeholder={{__('ui.price')}} type="decimal" class="form-control" id="price" name="price" wire:model.live="price" value="{{ old('price') }}">
                <label for="price" class="form-label"></label>
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3  ">
                <input type="file" wire:model="temporary_images" name="images" multiple class="form-control 
                @error('temporary_images.*') is-invalid @enderror" placeholder="Inserisci Image">

                @error('temporary_images.*')
                <p class="text-danger mt-2">{{$message}}</p>
                @enderror

            </div>
            @if(!empty($images))
            <div class="row">
                <p class="text-center text-sec my-1 ">{{__('ui.photoPr')}}</p>
                <div class="col-12 d-flex justify-content-center py-3 my-2">
                    <div class=" rounded">
                        @foreach($images as $key=>$image)
                        <div class=" my-3">
                            <div class="border-sec border-4 rounded imgPreview rounded my-2" style="background-image: url({{$image->temporaryUrl()}});">
                            </div>
                            <button type="button" class=" btn btn-danger text-center" wire:click="removeImage({{$key}})">
                                {{__('ui.delete')}}
                            </button>
                            @endforeach

                        </div>
                        
                    </div>
                </div>
            </div>
            @endif
            
            <div>
                
                <button type="submit" class="btn login-btn mt-3 mb-3 w-100 rounded btn-lg btn-block my-3 text-whiteCus">{{__('ui.Add Announcement')}}</button>
                
            </div>
            
        </form>
    </div>
</div>
