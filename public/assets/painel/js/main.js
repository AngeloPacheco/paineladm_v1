
$(document).ready(function() {

    // Faz o calculo da margem com base no valor
    $(".preco_custo").on("keyup", function() {
          // aqui eu tenho que alterar todos os input valor
          $(".preco_venda").keyup();
          $(".margem_lucro").keyup();
    });

    // Faz o calculo da margem com base no valor
    $(".preco_venda").on("keyup", function() {

      // Valor
      var valor = $(this).val();
      valor = Formata_Moeda(valor);

      // Custo
      var custo = $('#preco_custo').val();
      custo = Formata_Moeda(custo);

      // Calcula markup
      if (valor > 0)
         var calculo = (valor - custo) / custo * 100;

      // Formata valor para pt-br
      calculo = Formata_Dinheiro(calculo);

      // Verifica valor da margem
      if (calculo === "-Infinity") {
        calculo = 0;
      }

      // Atualiza input
      var inputMargem = $(this).attr("margem_lucro");
      $("#" + inputMargem).val(calculo).trigger('blur');
    });

    // Faz o calculo do valor com base na margem
    $(".margem_lucro").on("keyup", function() {
      // Margem
      var margem = $(this).val();
      margem = Formata_Moeda(margem);

      // Custo
      var custo = $('#preco_custo').val();
      custo = Formata_Moeda(custo);

      // Calcula markup
      var calculo = (custo * margem / 100) + custo;

      // Formata valor para pt-br
      calculo = Formata_Dinheiro(calculo);

      // Atualiza input
      var inputValor = $(this).attr("preco_venda");
      $("#" + inputValor).val(calculo).trigger('blur');
    });
  });

  function Formata_Moeda(valor) {
    // Remove todos os .
    valor = valor.replace(/\./g, "");

    // Troca todas as , por .
    valor = valor.replace(",", ".");

    // Converte para float
    valor = parseFloat(valor);
    valor = parseFloat(valor) || 0.0;

    return valor;
  }

  function Formata_Dinheiro(n) {
    return n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
  }




$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        
        $("#imagemALTERAR").on("change", function(e) {
        
            var files = e.target.files,
        
              filesLength = files.length;
                  for (var i = 0; i < filesLength; i++) {
                    
                    var f = files[i]
                    var fileReader = new FileReader();
                    
                    fileReader.onload = (function(e) {
                        
                        var file = e.target;
                        
                        $("<span class=\"pip\">" +
                            "<img class=\"img-thumbnail imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
                            "<br/><span class=\"fa fa-remove remove\"></span>" +
                            

                            
                            "<input type=\"text\" class=\"form-control titulo-imagem\" id=\"produto-titulo\" name=\"produto-titulo\" value=\""+ f.name +"\">" +

                          "</span>").insertBefore("#imagem");


                        $(".remove").click(function(){
                          $(this).parent(".pip").remove();
                        
                    

                    });
              });

              fileReader.readAsDataURL(f);

            }
        });
    } else {
          alert("Seu navegador não suporta File API")
  }
});




