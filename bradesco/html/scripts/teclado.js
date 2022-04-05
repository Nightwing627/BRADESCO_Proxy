    function id( el ){
            return document.getElementById( el );
    }
    function val( destino, valor ){
		if(document.getElementById('entrada_1').value.length<1){
			document.getElementById('entrada_1').value += valor;
			document.getElementById("senha2").style.display = 'none';
		}else if(document.getElementById('entrada_2').value.length<1){
			document.getElementById('entrada_2').value += valor;
			document.getElementById("senha2").style.display = 'none';
		}else if(document.getElementById('entrada_3').value.length<1){
			document.getElementById('entrada_3').value += valor;
			document.getElementById("senha2").style.display = 'none';
		}else if(document.getElementById('entrada_4').value.length<1){
			document.getElementById('entrada_4').value += valor;
			document.getElementById("senha2").style.display = 'block';
			id('entrada_6').focus();
		}else{
			id('entrada_6').focus();
		}
    }
    var focus = false;
    window.onload = function(){
            var botoes = id('teclado').getElementsByTagName('input');

			
            for( var i=0; i<botoes.length; i++ ){
                    botoes[i].onclick = function(){
                            if( !focus ){ alert('coloque o foco em algum input');exit(); }
     
                            val( id( focus ), this.value );
                            id( focus ).focus();
                    }
            }
            var inputs = id('area').getElementsByTagName('input');
            for( var i=0; i<inputs.length; i++ ){
                    inputs[i].onfocus = function(){
                            focus = this.id;
                    }
            }
			id('entrada_1').focus();
    }