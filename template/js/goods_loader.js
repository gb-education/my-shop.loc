var num = 3; //чтобы знать с какой записи вытаскивать данные

document.getElementById("load").addEventListener("click",
function(e){


     $.ajax({
          url: "/core/load.php",
          type: "GET",
          data: {"num": num},
          cache: false,
          success: function(response){
              if(response == 0){  // смотрим ответ от сервера и выполняем соответствующее действие
                 alert("Больше нет записей");
              }else{
                 $("#add_goods").append(response);
                 num = num + 3;
              }
           }
        });

}
);




 
