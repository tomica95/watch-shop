document.getElementById('reg').addEventListener('click',function(e){



    var mail = document.getElementById('input-email');
    
    var regMail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;;
    
    
    var password = document.getElementById('input-password');
    
    var regPassword =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,}$/;
    
    var password2 = document.getElementById('input-confirm');
    
    var greske = [];
    
    //checking mail
    if(!regMail.test(mail.value)){
    
        mail.style.borderColor = "red";
       document.getElementById('mail-mistake').innerHTML="Your email is not in good format";
        greske.push('not good mail');
    }
    
    //checking password 
    if(!regPassword.test(password.value)){
    
        password.style.borderColor = "red";

        password2.style.borderColor="red";
        
        document.getElementById('password-mistake').innerHTML = "Your password is not in good format";

        greske.push('Bad password');
    }
    
    //checking password retype
    if(password.value!=password2.value || password2.value=="")
    {
        password.style.borderColor = "red";
        password2.style.borderColor="red";

        document.getElementById('conf-password-mistake').innerHTML = "You must confirm your password";
        
    
    }
    
    
    
    if(greske.length!=0){
    
        e.preventDefault();
    }
    
    
    
    
    
    
    });