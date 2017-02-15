/* $.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   } 
}); */

$.validator.setDefaults({
    onfocusout: function(e){
        this.element(e);
    },
    highlight: function (element){
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function (element){
        $(element).closest('.form-group').removeClass('has-error');
    }
});

function serialize(form){
    form = $(form).serializeArray();
    var data = {};
    $(form).each(function(index, obj){
       data[obj.name] = obj.value; 
    });
    return JSON.stringify(data);
}

function mensagem_alert(message, tipo){
    var alert = "";
    alert += '<div class="alert alert-'+tipo+' alert-dismissible" role="alert">;';
    alert += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    alert += '<span aria-hidden="true">&times;</span></button>';
    alert += '<strong>';
    alert += message;
    alert += '</strong></div>';
    return alert;
}