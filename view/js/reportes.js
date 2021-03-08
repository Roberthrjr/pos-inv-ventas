/*=============================================
VARIABLE LOCAL STORAGE
=============================================*/
if(localStorage.getItem("capturarRango") != null){

	$("#daterange-btn span").html(localStorage.getItem("capturarRango"));


}else{

	$("#daterange-btn span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}

/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Mes Pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn span").html();

    localStorage.setItem("capturarRango", capturarRango);
    
    window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }
);

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/
$(".daterangepicker .drp-buttons .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango");
	localStorage.clear();
	window.location = "ventas";
})

/*=============================================
CAPTURAR HOY
=============================================*/
$(".daterangepicker .ranges li").on("click", function(){

	var textoHoy = $(this).attr("data-range-key");

	if(textoHoy == "Hoy"){

        var d = new Date();
        
        var dia = d.getDate();
        var mes = d.getMonth()+1;
        var año = d.getFullYear();

        if(mes < 10 && dia < 10){

            var fechaInicial = año+"-0"+mes+"-0"+dia;
            var fechaFinal = año+"-0"+mes+"-0"+dia;

        }
        
        if(dia < 10 && mes > 10){

            var fechaInicial = año+"-"+mes+"-0"+dia;
            var fechaFinal = año+"-"+mes+"-0"+dia;

        }else if(mes < 10 && dia > 10){

            var fechaInicial = año+"-0"+mes+"-"+dia;
            var fechaFinal = año+"-0"+mes+"-"+dia;

        } 

        	localStorage.setItem("capturarRango", "Hoy");

        	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}

})
