
//alert(1);



class WindModal{
    static render(parent, content){
        if(document.querySelector('.windModal')){
            document.querySelector('.windModal').remove();  
            let windWrep = document.createElement('div');
            windWrep.classList.add('windModal');
            windWrep.innerHTML = content;
            document.querySelector(parent).appendChild(windWrep);
           
        }
        else{
            let windWrep = document.createElement('div');
            windWrep.classList.add('windModal');
            windWrep.innerHTML = content; 
            document.querySelector(parent).appendChild(windWrep);
        }
    }

    static closeWind(){
        if(document.querySelector('.windModal')){
 //document.querySelector('.ajaxsJS').remove();
            document.querySelector('.windModal').remove();
           
        }

    }

}



let dom_PhotoWind = {
    arr_photo: document.querySelectorAll('.photoList__item'),
    
}












class windPhoto /*extends WindModal*/{
    constructor(){
      
       // this.arrphoto = document.querySelector('.block__titleWrepper'),
        this.arrphoto = document.querySelectorAll('.photoList__item'),
        this.collAjax = this.collAjax.bind(this),
       // this.render = this.render.bind(this),
     // this.unfoldFText = this.unfoldFText.bind(this),
        this.go();
    }

    
    
    
    collAjax(e){
      //  console.log(e.getAttribute('data-number'));

        let nuberMat = e.getAttribute('data-number');
        
        
        
        
        
       // let elem = document.querySelector('.сommentsView');

        let data = {
          //  target: 'readComments',
            target: 'openPhotoPage',
            id: nuberMat, 
            
        } 
        sendRequestAjax(data, "CommentsView", "POST", this.render );
        
        
        
        let data2 = {
            target: 'readComments',
            id: nuberMat, 
            
        } 
        sendRequestAjax(data2, "CommentsView", "POST",  windPhoto.readComments );
        
 
        
        
    }
    
    
    
    
    render(data){
      // console.log(data);
       
        let out = `<div class='blockPhoto'>
            
            
            <div class='PhotoW__wrepper'>
                <img class='PhotoW__img' src="${data[0].linck_photo}">
            </div>
            <div class='PhotoW__infoWrepper'>
                <p class='PhotoW_Block PhotoW__title>${data[0].title_photo}</p> 
                <p class='PhotoW_Block PhotoW__countViewing>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <span class='countActiv countViwes'>${data[0].viwe}<span>
                </p>
                <p class='PhotoW_Block PhotoW__countComments'>
                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                    <span class='countActiv countComments'>${data[0].comments}<span>
                </p>
                <div class='PhotoW_Block PhotoW__mood PhotoW__mood-BTN'>
                    <div class='likeWrep'>
                        <button class='PhotoW__like' title='Нравится' data-id='${data[0].id_photo}' onclick='Sympathy.likes(this)'><i class='fa fa-thumbs-up' aria-hidden='true'></i></button>
                        <span class='countActiv countActiv-like'>${data[0].likes}<span>
                    </div>
                    <div class='likeWrep'>
                        <button class='PhotoW__disLike' title='Не нравится' data-id='${data[0].id_photo}'onclick='Sympathy.disLikes(this)'><i class='fa fa-thumbs-down' aria-hidden='true'></i></button>
                        <span class='countActiv countActiv-disLike'>${data[0].dislike}<span>
                    </div>
                </div>
                
            </div>
        
        
        
            <div class='wrepComment'>
                <div class='сommentsView' data-id='${data[0].id_photo}'></div>
                
        
        
                <div class='CommentField-wrepper'> 
                    <p>Введите Ваш комментарий.</p>
                    <textarea class='CommentField field' name='CommentField'> </textarea>
                    <button class='btn CommentFieldSend__btn'>Отправить</button>
                </div>
        
                <div class='wrepperBTN'> 
                    <button class='btn CommentField__btn' title='Комментировать'><i class="fa fa-comment-o" aria-hidden="true"></i></button>   
                    <button class='btn PhotoW__close'>Закрыть</button>
                </div>
            </div>
        
        
           

        </div>`;
        
        
        //console.log(e.getAttribute('data-number'));
        //console.log(this.getAttribute('data-number'));
        //document.querySelector('main').innerHTML = out;
        WindModal.render('main', out); 
        
        
       
        
 
        
        
        
        
        
        document.querySelector('.CommentFieldSend__btn').onclick = windPhoto.addComments;
        document.querySelector('.CommentField__btn').onclick = windPhoto.unfoldFText;
        document.querySelector('.PhotoW__close').onclick = WindModal.closeWind;  
    }
    
    
    go(){ 
       // const f = this.render;
        const f = this.collAjax;
       
        this.arrphoto.forEach(function(item){
          // item.addEventListener("click", ()=>f(item));
            item.addEventListener("click", ()=>f(item));
        })
    }
    
    
    
   
    
    
    
    
    
    static unfoldFText(){
       // console.log(2);
       
       
       
        let textField = document.querySelector('.CommentField-wrepper');
        textField.classList.toggle('_active');
        
        
        let data = {
            target:'getOldComment', 
            id:document.querySelector('.сommentsView').getAttribute('data-id'),
               
        } 
        
        sendRequestAjax(data, "CommentsView", "POST", windPhoto.getOldComment);
        
    }

    
    
    
    
    
    
    
    static getOldComment(dataOldComment){
        document.querySelector('.CommentField').value = dataOldComment[0].comment;
    }
    
    
    
    static addComments(){
        let data = {
            target: 'addComment',
            id:document.querySelector('.сommentsView').getAttribute('data-id'),
            comment: document.querySelector('.CommentField').value, 
        } 

        sendRequestAjax(data, "CommentsView", "POST", windPhoto.readComments);
        
        
        let textField = document.querySelector('.CommentField-wrepper');
        textField.classList.remove('_active');
        
        
        
        
        
        
        let data2 = {
            target: 'InfoCommentAdd',
            id:document.querySelector('.сommentsView').getAttribute('data-id'),
                
        } 
        
        
        
        sendRequestAjax(data2, "CommentsView", "POST", windPhoto.AddInfoComment);
        

    }
    
    
    
    
    
    
    
    
    
    
    static  readComments(dataComment){
     
      // console.log(dataComment);
      
      
      
   
       let out = `<ul class='listComents'>`;    
       dataComment.forEach((item)=>{
           //console.log(item);
           out +=`<li class='listComents__item' data-idComment='${item.id_comments}' >
                    <span class='listComents__content'>${item.comment}</span>
                    <span class='listComents__content-user'>${item.user}</span> 
                </li>`;  
       });
       out += `</ul>`;
      
        setTimeout(()=>{
            let teg =  document.querySelector('.сommentsView');
            teg.innerHTML =  out;   
        }, 1500)
        
            
        
        
        
    } 
    
    
    
    
    static AddInfoComment(countComent){
        let id = countComent[0].idPhoto;
        console.log(countComent[0]);
        document.querySelector('.countComments').innerText = countComent[0].allComments;
        document.querySelector('.countComments-'+id).innerText = countComent[0].allComments;
        
        
        
      
        
        
    }
    
    
    
    
    
    
    
    
     
}
new windPhoto();


class Sympathy{
    
    
    static likes(e){
        console.log(e.getAttribute('data-id'));
        
        let data = {
            target: 'like',
            id:e.getAttribute('data-id')

        }
        
        sendRequestAjax(data, "CommentsView", "POST",  Sympathy.likesViwe );
        
        
    }
    
     static disLikes(e){
        console.log(e.getAttribute('data-id'));
        
        let data = {
            target: 'disLike',
            id:e.getAttribute('data-id')

        }
        sendRequestAjax(data, "CommentsView", "POST",   Sympathy.likesViwe );
    }
    
  
    static likesViwe(data){
        
        console.log(data);
        let id = data[0].id_photo;
        
        if(document.querySelector('.countActiv-like') /*&& document.querySelector('.countActiv-disLike')*/){
           document.querySelector('.countActiv-like').innerText = data[0].likes; 
           document.querySelector('.countActiv-disLike').innerText = data[0].dislike; 
            
           document.querySelector('.countActiv-like-prev-'+id).innerText = data[0].likes; 
           document.querySelector('.countActiv-disLike-prev-'+id).innerText = data[0].dislike;    
        }
    }
 
}



class masseg{
    static closeAccess(){
        let out = `<div class='closeAccessWrepper'><p class='closeAccess'>Авторизируйтесь.</p> <button class='btn closeAccess-close' onclick='WindModal.closeWind()'>Закрыть</button></div>`;
        WindModal.render('main', out); 
    }

    static go(){


        if(document.querySelectorAll('.photoList__item-close').length !=0){
            document.querySelectorAll('.photoList__item-close').forEach(function(item){
            item.addEventListener("click",  masseg.closeAccess);
        })

        }
    }   
}   
    
    
    
    
    
    
    
    

masseg.go();