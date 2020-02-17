
    
    function provera(){
        
            var ime = document.getElementById("ime").value;
            var prezime = document.getElementById("prezime").value;
            var email = document.getElementById("email").value;
            var korisnicko = document.getElementById("username").value;
            var sifra = document.getElementById("password").value;
            var radioB = document.getElementsByName("pol");
            var vrednost = "";
            for(var i = 0; i<radioB.length; i++){
                if(radioB[i].checked){
                    vrednost = radioB[i].value;
                    break;
                }
            }
            var reIme = /^[A-Z][a-z]{2,11}$/;
            var rePrezime = /^([A-Z][a-z]{2,15})+$/;
            var reEmail = /^\b[\w.-]+@[\w.-]+(\.[\w.-]+)*\.[A-Za-z]{2,4}\b$/;
            var reKorisnicko = /^[A-z]{4,16}[\d]+$/;
            var reSifra = /^[a-z]{4,16}[\d]+$/;
    
            var nizGreske = [];
            if(!reIme.test(ime)){
                var errIme = document.getElementById("errIme");
                errIme.innerHTML = "Please enter the correct name!";
                errIme.style.color = "#ff0000";
                errIme.style.fontSize = "15px";
                nizGreske.push(ime);
            }
            else{
                var errIme = document.getElementById("errIme");
                errIme.innerHTML = "";

                document.getElementById("ime").style.border = "1px solid green";
            }
            if(!rePrezime.test(prezime)){
                var errPrezime = document.getElementById("errPrezime");
                errPrezime.innerHTML = "Please enter the correct last name!";
                errPrezime.style.color = "#ff0000";
                errPrezime.style.fontSize = "15px";
                nizGreske.push(prezime);
            }
            else{
                var errPrezime = document.getElementById("errPrezime");
                errPrezime.innerHTML = "";
                document.getElementById("prezime").style.border = "1px solid green";
            }
            if(!reEmail.test(email)){
                var errEmail = document.getElementById("errEmail");
                errEmail.innerHTML = "Please enter the correct email!";
                errEmail.style.color = "#ff0000";
                errEmail.style.fontSize = "15px";
                nizGreske.push(email);
            }
            else{
                var errEmail = document.getElementById("errEmail");
                errEmail.innerHTML = "";
                document.getElementById("email").style.border = "1px solid green";
            }
            if(!reKorisnicko.test(korisnicko)){
                var errUser = document.getElementById("errUser");
                errUser.innerHTML = "Please enter the correct username!!";
                errUser.style.color = "#ff0000";
                errUser.style.fontSize = "15px";
                nizGreske.push(korisnicko);
            }
            else{
                var errUser = document.getElementById("errUser");
                errUser.innerHTML = "";
                document.getElementById("username").style.border = "1px solid green";
            }
            if(!reSifra.test(sifra)){
                var errPass = document.getElementById("errPass");
                errPass.innerHTML = "Please enter the correct password!";
                errPass.style.color = "#ff0000";
                errPass.style.fontSize = "15px";
                nizGreske.push(sifra);
            }
            else{
                var errPass = document.getElementById("errPass");
                errPass.innerHTML = "";
                document.getElementById("password").style.border = "1px solid green";
            }
          
            if(nizGreske.length == 0){
                return true;
            }
            else{
                return false;
            }
    }
    function proveraLogin(){
        var email = document.getElementById("email").value;
        var pass = document.getElementById("password").value;
        var reEmail = /^\b[\w.-]+@[\w.-]+(\.[\w.-]+)*\.[A-Za-z]{2,4}\b$/;
        var reSifra = /^[a-z]{4,16}[\d]+$/;
        var nizGreske = [];
        if(!reEmail.test(email)){
            var errEmail = document.getElementById("errEmail");
            errEmail.innerHTML = "Please enter the correct email!";
            errEmail.style.color = "#ff0000";
            errEmail.style.fontSize = "15px";
            nizGreske.push(email);
        }
        else{
            var errEmail = document.getElementById("errEmail");
            errEmail.innerHTML = "";
            document.getElementById("email").style.border = "1px solid green";
        }
        if(!reSifra.test(pass)){
            var errPass = document.getElementById("errPass");
            errPass.innerHTML = "Please enter the correct password!";
            errPass.style.color = "#ff0000";
            errPass.style.fontSize = "15px";
            nizGreske.push(pass);
        }
        else{
            var errPass = document.getElementById("errPass");
            errPass.innerHTML = "";
            document.getElementById("password").style.border = "1px solid green";
        }
        if(nizGreske.length == 0){
            return true;
        }
        else{
            return false;
        }
      

    }

