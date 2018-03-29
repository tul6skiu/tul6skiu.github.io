var signs=["1","2","3","+","4","5","6","-","7","8","9","/","0","=",".","c"];
var calc=document.getElementById("calc");
  
//Добавление кнопок к форме калькулятора
for(var i=0;i<signs.length;i++){
    calc.innerHTML += "<div class=btn>"+signs[i]+"</div>";
}
  
//Действие, выполняемое при клике на любую кнопку
$(".btn").click(function() {
    var textArea=$("#inputVal");
 
    if (this.innerHTML !== "=") {
        //Добавление значения кнопки в текстовое поле
        textArea.val(textArea.val()+this.innerHTML);
    } else {
        //Если нажата кнопка "=", то, приведя выражение
        // в текстовом поле к javascript, вычислить значение
        textArea.val(eval(textArea.val()));
    }
    //Если нажата кнопка "с", то стирает все из текстового поля
    if (this.innerHTML === "c") {
        textArea.val("");
    }
});