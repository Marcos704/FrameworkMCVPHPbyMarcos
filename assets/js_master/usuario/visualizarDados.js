$('#exampleModal').on('show.bs.modal', function (event) {
    var event = $(event.relatedTarget);
    var value = event.data('id')
  $('#btnExcluir').click(function(){
    window.location = URL_BASE+"System/apagarUsuario?data="+value;
  });
});
     