
    $(document).ready(function(){
        $("#search").keyup(function(){
           var query = $(this).val();
       
           if (query != "") {
             $.ajax({
               url: 'index.php?page=searchDestinations',
               method: 'POST',
               dataType:'json',
               data: {
                   queryA:query,
                 
                   
               },
               success: function(data){
                   printDestinations(data);
  
                
               },
               error: function(xhr,status,msg){
                   console.log(xhr);
               }
             });
           } else {
            $.ajax({
                url: 'index.php?page=searchDestinations',
                method: 'POST',
                dataType:'json',
                data: {
                    queryA:query,
                },
                success: function(data){
                     (data);
   
                 
                },
                error: function(xhr,status,msg){
                    console.log(xhr);
                }
              });


         }
       });
        function printDestinations(data){
            var ispis="";
            for(let d of data){
                ispis+=`
                <div id="proba" class="col-md-3 shop_box"><a href="#"> 
                <img src="${d.slika}" class="img-responsive" alt="${d.alt}"/>
                    <span class="new-box">
                        <span class="new-label">New</span>
                    </span>
                <span class="sale-box">
                    <span class="sale-label">Sale!</span>
                </span>
                <div class="shop_desc">
                    <h3><a href="#">${d.naziv}</a></h3>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="actual">$${d.cena}</span><br>
                        <ul class="buttons">
                            <div class="clear"> </div>
                        </ul>
                </div>
            </a>
        </div>
                `;
            }

            $('#ispisSearch').html(ispis);
        }
        $("#buttonOrderASC").click(function(){
            var asc = $(this).val();
            console.log(asc);
            $.ajax({
                url: 'index.php?page=sortDestinationsASC',
                method: 'POST',
                dataType:'json',
                data: {
                    asc:asc,
                  
                    
                },
                success: function(data){
                    printDestinations(data);
    
                 
                },
                error: function(xhr,status,msg){
                    console.log(xhr);
                }
              });
    

        })
        $("#buttonOrderDESC").click(function(){
            var desc = $(this).val();
            console.log(desc);
            $.ajax({
                url: 'index.php?page=sortDestinationsDESC',
                method: 'POST',
                dataType:'json',
                data: {
                    desc:desc,
                  
                    
                },
                success: function(data){
                    printDestinations(data);
    
                 
                },
                error: function(xhr,status,msg){
                    console.log(xhr);
                }
              });
    

        })

      


     });
     
    





function proveraVesti(){
        
        var ime = document.getElementById("name").value;
        var prezime = document.getElementById("lastName").value;
        var email = document.getElementById("email").value;
     
        var reIme = /^[A-Z][a-z]{2,11}$/;
        var rePrezime = /^([A-Z][a-z]{2,15})+$/;
        var reEmail = /^\b[\w.-]+@[\w.-]+(\.[\w.-]+)*\.[A-Za-z]{2,4}\b$/;

        var nizGreske = [];
        if(!reIme.test(ime)){
            var errIme = document.getElementById("errName");
            errIme.innerHTML = "Please enter the correct name!";
            errIme.style.color = "#ff0000";
            errIme.style.fontSize = "15px";
            nizGreske.push(ime);
        }
        else{
            var errIme = document.getElementById("errNmae");
            errIme.innerHTML = "";

            document.getElementById("name").style.border = "1px solid green";
        }
        if(!rePrezime.test(prezime)){
            var errPrezime = document.getElementById("errLastName");
            errPrezime.innerHTML = "Please enter the correct last name!";
            errPrezime.style.color = "#ff0000";
            errPrezime.style.fontSize = "15px";
            nizGreske.push(prezime);
        }
        else{
            var errPrezime = document.getElementById("errLastName");
            errPrezime.innerHTML = "";
            document.getElementById("lastName").style.border = "1px solid green";
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
        if(nizGreske.length == 0){
            return true;
        }
        else{
            return false;
        }

    
   



}

