@props(['anuncio'])
<div class="col-12 col-md-6 mb-4" >     
    <div class="card shadow h-100">
        <div class="card-img" >
            <img class="img-fluid" width="100%" height="70%" src="{{Storage::url($anuncio->image->url)}}"  alt="Card image cap">
            <div class="text-black d-flex justify-content-between px-3 py-1 bg-vistas">
            <p class="mb-0">hola como estas</p>
        </div>
        </div>  
        <div class="card-body ">
            <a style="text-decoration: none" href="{{route('blog.show_announces',$anuncio->slug)}}" class="h4">{{$anuncio->name}}</a>
            <p class="text-secondary">{{$anuncio->extract}}</p>
        </div>  
    </div>
</div>


