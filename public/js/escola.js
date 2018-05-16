$(document).ready(function () {
    var idAluno;
    $(".aluno_modal").on("click", "a", function () {
        idAluno = $(this).attr('id');
        $("#modalAluno").modal('show');
    });

    $('#modalAluno').on('show.bs.modal', function (e) {
        $.ajax({
            url:"/infoAluno",
            dataType: "json",
            method: 'post',
            data: {id_aluno: idAluno},
            success: function(resposta){
                resposta = jQuery.parseJSON(resposta);
                var areaCursos = $("#cursos");
                areaCursos.html("");
                console.log(resposta);
                for(var i = 0; i < resposta.length; i++){
                    areaCursos.append("<li>"
                        +"<b>Nome:</b> " + resposta[i].nome
                        +" <b>Matrícula</b> :" + resposta[i].dataInicio   
                        +" <b>Conclusão</b> :" + resposta[i].dataFinal   
                        +" <b>Nota:</b> " + resposta[i].nota
                        +"</li>");
                }
            }
        })
    })
});