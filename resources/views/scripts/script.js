function mostrarMenu(){
    document.getElementById("div1").style.color ="red";
}

//alta corredor
  function show(){
    document.getElementById('divOp').style.display="block";
    document.getElementById('fed').required=true;

    document.getElementById('divHd').style.display="none";
    document.getElementById('divH').style.display="block";
    document.getElementById('aseguradora').required=false;
  }

  function hide(){
    document.getElementById('divOp').style.display="none";
    document.getElementById('fed').required=false;

    document.getElementById('divHd').style.display="block";
    document.getElementById('divH').style.display="none";
    document.getElementById('aseguradora').required=true;

  }

//   document.getElementById('pro').addEventListener("click", show);
//   document.getElementById('open').addEventListener("click", hide);

