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
<script>
    let actualizar = document.querySelector('.actualizar');
    actualizar.addEventListener('click',  (e)=> {
        e.preventDefault();
        actualizar.disabled = true;
        actualizar.innerHTML = 'Actualizando...';
        actualizar.form.submit();
    });
</script>
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

        class MyUploadAdapter {
            constructor( loader ) {
                this.loader = loader;
            }
            upload() {
                return this.loader.file
                    .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
            }
            abort() {
                if ( this.xhr ) {
                    this.xhr.abort();
                }
            }
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();
                xhr.open( 'POST', "{{ route('images.upload') }}", true );
                xhr.setRequestHeader('X-CSRF-TOKEN',"{{ csrf_token() }}")
                xhr.responseType = 'json';
            }

            _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;      
                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : genericErrorText );
                    }

                    resolve( {
                        default: response.url
                    } );
                } );

                if ( xhr.upload ) {
                    xhr.upload.addEventListener( 'progress', evt => {
                        if ( evt.lengthComputable ) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    } );
                }
            }
            _sendRequest( file ) {
                const data = new FormData();
                data.append( 'upload', file );
                this.xhr.send( data );
            }
        }

        function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
        }

        ClassicEditor
            .create( document.querySelector( '#body' ),{
                extraPlugins: [ MyCustomUploadAdapterPlugin ],
                mediaEmbed: {
                                previewsInData:true
                            },
            },)
            .catch( error => {
                console.error( error );
            } 
        );

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

