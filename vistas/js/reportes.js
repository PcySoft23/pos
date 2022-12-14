// VARIABLE LOCALSTORAGE
if(localStorage.getItem("capturarRango2")!=null){
	$("#daterange-btn2 span").html(localStorage.getItem("capturarRango2"));
}else{
	$("#daterange-btn2 span").html('<i class="fa fa-calendar"></i> Rango de Fechas')
}

/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn2').daterangepicker(
      {
        ranges   : {
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Ultimos 7 Dias' : [moment().subtract(6, 'days'), moment()],
          'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
          'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
          'Ultimo Mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment(),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
         var fechaInicial = start.format('YYYY-MM-DD');
         var fechaFinal = end.format('YYYY-MM-DD');
    	 var capturarRango = $("#daterange-btn2 span").html();
   		 localStorage.setItem("capturarRango2", capturarRango);
   		 window.location = "index.php?ruta=reportes&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
      }
)    


/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/
$(".daterangepicker.opensright .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango2");
	localStorage.clear();
	window.location = "reportes";
})

/*=============================================
CAPTURAR HOY
=============================================*/
$(".daterangepicker.opensright .ranges li").on("click", function(){
	var textoHoy = $(this).attr("data-range-key");
	if(textoHoy == "Hoy"){
		var d = new Date();
		var dia = d.getDate();
		var mes = d.getMonth()+1;
		var a??o = d.getFullYear();

		if(mes < 10){
			var fechaInicial = a??o+"-0"+mes+"-"+dia;
			var fechaFinal = a??o+"-0"+mes+"-"+dia;
		}else if(dia < 10){
			var fechaInicial = a??o+"-"+mes+"-0"+dia;
			var fechaFinal = a??o+"-"+mes+"-0"+dia;
		}else if(mes < 10 && dia < 10){
			var fechaInicial = a??o+"-0"+mes+"-0"+dia;
			var fechaFinal = a??o+"-0"+mes+"-0"+dia;
		}else{
			var fechaInicial = a??o+"-"+mes+"-"+dia;
	    	var fechaFinal = a??o+"-"+mes+"-"+dia;
		}	

    	localStorage.setItem("capturarRango2", "Hoy");
    	window.location = "index.php?ruta=reportes&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
	}
})






