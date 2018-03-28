
var sedan = document.getElementById('sedan');

var getCar = document.getElementById('getCar');



var position = 0;

var id;



function soundClick() {
  var audio = new Audio(); // Создаём новый элемент Audio
  audio.src='Thousand Foot Krutch - War Of Change.mp3'; // Указываем путь к звуку "клика"
  audio.autoplay = true; // Автоматически запускаем
}

// при наведении на элемент


getCar.onmouseover = function(){

	sedan.style.transform = 'scale(1, 1)';
	
	
	if (id) clearInterval(id);

	id = setInterval(toDriveRight, 2);
	

}

// при снятии наведенияs

getCar.onmouseout = function(){

//	console.log('out');

	sedan.style.transform = 'scale(-1, 1)';

	clearInterval(id);

	id = setInterval(toDriveLeft, 2);

}



function toDriveRight() {

	
	if (position == 500) {
        
   
		clearInterval(id);
      
	} else {

		position ++;

		sedan.style.left = position + 'px';
		

	}
	 if(position == 200){
		
		
      sedan.style.transform = 'rotate(-12deg)';
	 }
     if(position ==300){
		sedan.style.transform = 'rotate(90deg)';
		  
	 }
	 if(position ==350){
		sedan.style.transform = 'rotate(180deg)';
		  
	 }
}




function toDriveLeft() {

	if (position == 0) {

		clearInterval(id);
  
		sedan.style.transform = 'scale(1, 1)';

	} else {

		position --;

		sedan.style.left = position + 'px';

	}

}
