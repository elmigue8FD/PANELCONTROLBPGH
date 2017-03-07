function funcion_tipoServicio(servicio)
    {
        if(servicio==1)
          return "tienda";
        else if(servicio==2)
          return "domiclio";
        else
          return false;
    }
    function funcion_campoVacio(campo)
    {
      if(campo==""||campo==null)
        return true;
      else
        return false;
    }
    function funcion_arregloElementosVacios(arreglo)
    {
      for(campo in arreglo)
      {
        console.log('campo::'+arreglo[campo]);
        if(funcion_campoVacio(arreglo[campo]))
          return true;
      }
      return false;
    }
    function funcion_ocultarCampo(campo){
      $(campo).hide();
    }