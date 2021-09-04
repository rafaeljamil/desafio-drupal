$(document).ready(function(){
    //Bloqueia inputs do teclado
    document.onkeydown = function(e){
        return false;
    }
    //Declaração de variável de controle
    var val = '0'

    //Lógica que coloca os números do teclado no campo input
    $('.t').click(function(){
        if(val == 0){
            val = $(this).html()
        }else{
            val += $(this).html()
        }
        $("#valor").val(val)
        console.log(val)
    })

    //O botão corrigir também retorna a variável de controle ao padrão
    $("#reset").click(function(){
        val = '0'
    })

    /*
    * Ao enviar o form, o Ajax envia o valor ao app.php e recebe de volta
    * o resultado em echo, que é colocado dentro da div resultado
    * junto com um botão para voltar à tela anterior mais facilmente
    */
    $("#form").submit(function(e){
        e.preventDefault()
        form = $(this).serialize()
        $.ajax({
            type: "post",
            url: "app.php?a=ok",
            data: form,
            dataType: 'text',
            success: function(res){
                $("#form").slideUp(300)
                $("#resultado").html(res)
                $("#resultado").append('<a class="btn btn-secondary" href="index.php">Voltar</a>')
            }
        })
    })
})