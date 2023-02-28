<script>
    let actualizar = document.querySelector('.actualizar');
    actualizar.addEventListener('click',  (e)=> {
        e.preventDefault();
        actualizar.disabled = true;
        actualizar.innerHTML = 'Actualizando...';
        actualizar.form.submit();

    });
</script>