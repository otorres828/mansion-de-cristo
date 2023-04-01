@section('css')
   <style>
       .image-wraper{
           position: relative;
           padding-bottom: 70%;
       }

       .image-wraper img{
           position: absolute;
           object-fit: cover;
           width: 100%;
           height: 100%;
       }
   </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@stop

@section('js')
   <x-actualizar />
    <script >
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
  
    <script src="{{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
    {{-- CKEDITOR. 5 --}}
    <script src="{{ asset('vendor\ckeditor5-build-classic\build/ckeditor.js') }}"></script>
    <script>

        const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

        ClassicEditor
            .create(document.querySelector('#body'), {
                simpleUpload: {
                    uploadUrl: "{{route('images.upload')}}",
                }
            })
            .then(ed => {   
            });


    </script>
    
    <script>
        //cambiar imagen
        document.getElementById('file').addEventListener('change',cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event)=>{
                document.getElementById('picture').setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@stop

