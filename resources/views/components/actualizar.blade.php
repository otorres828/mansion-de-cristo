<script>
    let actualizar = document.querySelector('.actualizar');
    actualizar.addEventListener('click',  (e)=> {
        e.preventDefault();
        actualizar.disabled = true;
        actualizar.innerHTML = 'Actualizando...';
        actualizar.form.submit();

    });
    let finalizar = document.querySelector('.finalizar');
    finalizar.addEventListener('click',  (e)=> {
        e.preventDefault();
        finalizar.disabled = true;
        finalizar.innerHTML = 'Finalizando...';
        finalizar.form.submit();

    });
</script>