
//alert('222222');





















 function sendRequestAjax(data, responseFile, metod, func)
{
    let xhr = new XMLHttpRequest();
    //данные формы
   
    //  console.log(5555555555);
    //преобразуем их в JSON
    let requestJSON = JSON.stringify(data);
   // console.log(typeof(requestJSON));
    
    
    xhr.open(metod, responseFile, true);
    //устанавливаем заголовок формата данных json
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = updateDocument; //имя функции обработки ответа сервера

     function  updateDocument() {
        if (xhr.readyState === 4) { //проверяем статус завершения запроса - 4
            if (xhr.status === 200) { //проверяем код состояния 200 - OK
                let answerJSON =  xhr.responseText;//ответ в JSON
                //парсим JSON, получаем аналог объекта PHP
                
               // console.log(answerJSON);
                let answer = JSON.parse(answerJSON);
                if (answer) {
                    
                  //  document.querySelector(".сommentsView").innerHTML = answer[0].comment;
                   // console.log(answer);
                     console.log(answer);
                  
               func(answer); 
                    
                }
                
                
                
            }
        }
    }
    xhr.send(requestJSON); //посылаем данные методом POST
} 





