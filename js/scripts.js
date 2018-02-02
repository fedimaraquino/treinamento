$(document).ready(function(){
	$('#data_nascimento').mask('00-00-0000')
	$('#tel').mask("(00) 00000-0000");
	$('#cpf').mask("000.000.000-00")
	
	$('#cadastroAluno').click(function(){
		if(!validacpf($('#cpf').val())) {
			alert("CPF Invalido!")
			return false;
		}
	})
})


function validacpf(campo)
{   
	var i; 
	
	s = campo; 	  
	
	s = s. replace (".","");
    s = s. replace (".","");
    s = s. replace ("-","");
    s = s. replace ("/","");
	
	
	var c = s.substr(0,9); 	  
	var dv = s.substr(9,2); 	  
	var d1 = 0; 
	  
	for (i = 0; i < 9; i++) 
	  
	{ 	  
		d1 += c.charAt(i)*(10-i); 	  
	} 
	  
	if (d1 == 0)
	{ 	  
		//alert("CPF Invalido");		  
		return false; 	  
	} 
	  
	d1 = 11 - (d1 % 11); 	  
	if (d1 > 9) d1 = 0; 	  
	
	if (dv.charAt(0) != d1) 	  
	{	  
		//alert("CPF Invalido") 	  
		return false; 	  
	}   
  
	d1 *= 2; 
  
	for (i = 0; i < 9; i++) 		  
	{ 		  
		d1 += c.charAt(i)*(11-i); 		  
	} 
  
	d1 = 11 - (d1 % 11);   
	if (d1 > 9) d1 = 0; 
  
	if (dv.charAt(1) != d1)   
	{ 	  
		//alert("CPF Invalido");		
		return false; 	  
	} 
	  
	return true; 
	  
} 