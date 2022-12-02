document.addEventListener('DOMContentLoaded', function() {
    const cores = document.getElementById('modalCores');
    var instancesCores = M.Modal.init(cores,
        {onOpenStart: function(){ //Traz informações para a tela
                var idUser = document.getElementById('btn-cores');
                console.log(idUser.dataset.user);
            }
        });
      
})
