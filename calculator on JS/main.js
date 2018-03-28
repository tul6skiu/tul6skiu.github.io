var numbers = document.querySelectorAll('.numbers'),
 operations = document.querySelectorAll('.operations'),
 input = document.getElementById('entries'),
 ClearBtns = document.querySelectorAll('.clearBtn'),
 MemoriCurrentNumber = 0,
 MemoriNewNumber = false,
 MemoriPendingOperation = '',
 result = document.getElementById('result');
	

for (var i = 0; i < numbers.length; i++) {
	numbers[i].addEventListener('click', function(e){
		
	numberPress(e.target.outerText);
});
}
for (var i = 0; i < operations.length; i++) {
	operations[i].addEventListener('click', function(e){
		
		operation(e.target.outerText);
	});
    
}
for (var i = 0; i < ClearBtns.length; i++) {
    var clearBtn = ClearBtns[i];
    clearBtn.addEventListener('click', function (e) {
        clear(e.srcElement.id);
    });
};
		
	
 
 
/*Работа с номерами*/
function numberPress(number){
	if(MemoriNewNumber){
		input.value = number;
		MemoriNewNumber = false;
	} else{
		if(input.value === '0'){
		input.value = number;
	}else{
		input.value +=number;
	}
  }
}
	
/*Работа с операциями*/
function operation(op){
	var localOperationMemory = input.value;
	if(MemoriNewNumber && MemoriPendingOperation !== '='){
		input.value = MemoriCurrentNumber;
	}
	else
	{
		MemoriNewNumber = true;
		if(MemoriPendingOperation === '+'){
	     MemoriCurrentNumber += parseFloat(localOperationMemory);
		}else if(MemoriPendingOperation === '-'){
			 MemoriCurrentNumber -= parseFloat(localOperationMemory);
		}else if(MemoriPendingOperation === '*'){
			 MemoriCurrentNumber *= parseFloat(localOperationMemory);
		}else if(MemoriPendingOperation === '/'){
			 MemoriCurrentNumber /= parseFloat(localOperationMemory);
		}else{
			MemoriCurrentNumber = parseFloat(localOperationMemory);
		}
		input.value = MemoriCurrentNumber;
		MemoriPendingOperation = op;
	}
	
	console.log('нажатие на кнопку с операцией ' + op + '!');
}



function clear(id) {
  if (id === 'c') {
        input.value = '0';
        MemoryNewNumber = true;
        MemoryCurrentNumber = 0;
        MemoryPendingOperation = '';
    }
	console.log('нажатие на кнопку отчистить ' + id +'!');
}


			
	  
		
	



