if(document.querySelector(".Registration-btn")){
    
    const RegistrationBtn = document.querySelector(".Registration-btn");
    RegistrationBtn.onclick = () => {
        
        
        
        
        
        
        
         let requestData = {
            name: document.getElementById("name").value,
            login : document.getElementById("login").value,
            password : document.getElementById("password").value
        };
        
        sendAjax('AjaxRegistr','POST', formRegistrationUser);   
        
      // sendAjax(requestData,'AjaxRegistr','POST');  
    };   
    
    
}





function sendAjax( responseFile, metod, form){
    sendRequest( responseFile, metod, form);
};


async function sendRequest( responseFile, metod, form)
{
    let response = await fetch( responseFile, {
        method: metod,
        body: new FormData(form)
    });

    if (response.ok) { // если HTTP-статус в диапазоне 200-299 получаем ответ
        document.getElementById("auth").innerHTML = await response.text(); //заменяем форму на ответ сервера

    }
}



