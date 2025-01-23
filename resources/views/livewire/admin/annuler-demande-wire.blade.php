<div class="col-12 alert alert-default border d-flex justify-content-between">
    <p>Annuler la demande</p>
    <button type="button" id="annuler" class="btn btn-primary  text-light">
        <i class="os-icon os-icon-grid-10"></i> Annuler
    </button>
    <script>
        document.addEventListener('livewire:load', function () {
            const annuler = document.getElementById('annuler');
            annuler.addEventListener('click', function(){
                const result = confirm('Voulez-vous vraiment annuler cette demande ?');
                if(result){
                    // emit event to  the parent component
                    Livewire.emit('closeD');
                    window.addEventListener('demande-annuler', event => {
                        location.reload();
                    })
                    
                }
            })
        })
        
    </script>
</div>