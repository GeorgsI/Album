const dom = {
    toggleIn: document.querySelector('.field_showBtn'),
    passwordIn: document.getElementById('password'),
}


class FormIn{
    constructor(input, icon){
        this.input = input,
        this.icon = icon
        this.showPass =  this.showPass.bind(this),
        this.addEvent()
    }
    showPass(){
        if(this.input.type == 'password'){
            this.input.type = 'text';
            this.icon.classList.add('active');
        }
        else{
            this.input.type = 'password';
            this.icon.classList.remove('active');  
        }
      }
    addEvent(){
        this.icon.addEventListener('click', this.showPass)
    }
}
  
let tog = new FormIn(dom.passwordIn, dom.toggleIn);
