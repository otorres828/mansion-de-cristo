@props(['teaching'])

<section style="background-color:#243652" class="bg-oscuro mb-4">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col">
                <div class="card-img">
                    {{-- {{Storage::url( --}}
                    <img width="100%" src="@if($teaching->image){{asset('storage/'.$teaching->image->url)}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif" alt="" class="rounded">
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-6 text-white">
                <h1 class="h2 mt-3 mt-lg-0">{{$teaching->name}}</h1>
                <p>
                    <i class="fas fa-chart-line"></i>
                    Fecha de Publicacion: {{$teaching->created_at}}
                </p>
                <p>
                    <i class="far fa-calendar-alt"></i>
                    Categoria: <a style="text-decoration:none" href="{{route('blog.category_teaching',$teaching->category->slug)}}">{{$teaching->category->name}}</a>
                </p>
                <p>
                    <i class="fas fa-users"></i>
                    Extracto:  {{$teaching->extract}}
                </p>
                <p>
                    <i class="far fa-star"></i>
                    Autor: <a style="text-decoration:none" href="{{route('blog.user_teaching',$teaching->user_id)}}"> {{$teaching->user->hierarchy->name}}. {{$teaching->user->name}}</a>
                </p>
        
            </div>
        </div>
    </div>
</section>