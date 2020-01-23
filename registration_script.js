
            var uname=document.getElementById('name');
            var email=document.getElementById('email');
            var pass=document.getElementById('pass');
            var confirm_pass=document.getElementById('confirm_pass');
            
            uname.addEventListener('keyup',namevalidate);
            email.addEventListener('keyup',emailvalidate);
            pass.addEventListener('keyup',passvalidate);
            confirm_pass.addEventListener('keyup',confirmpassvalidate);
            
            function namevalidate(){
                var uvalidchar=/^[A-Za-z_][A-Za-z0-9_-]*$/; ///valid character checking
                
                var userinput=document.getElementById('name').value;
                
                
                ///valid character checking
                if(uvalidchar.test(userinput)){
                    document.getElementById('war1').style.display="none";
                }
                else{
                    document.getElementById('war1').style.display="inline";
                    flag=1;
                }
            }
            
            function passvalidate(){
                var plength=/^.{6,}$/;///length checking
                
                var passinput=document.getElementById("pass").value;
                
                if(plength.test(passinput)){
                    document.getElementById('war3').style.display="none";
                }
                else{
                    document.getElementById('war3').style.display="inline";
                }
                
                
            }
            
            function emailvalidate(){
                var emailexp=/^([a-zA-Z0-9_.-]+)@([a-z0-9_.-]+)\.([a-z.]{2,6})$/;
                
                var useremail=document.getElementById("email").value;
                
                if(emailexp.test(useremail)){
                    document.getElementById("war2").style.display="none";
                }
                else{
                    document.getElementById("war2").style.display="inline";
                }
            }

            function confirmpassvalidate(){
                var confirm_pass=/^.{6,}$/;
                
                var passinput=document.getElementById("confirm_pass").value;
                
                if(confirm_pass.test(passinput)){
                    document.getElementById("war4").style.display="none";
                }
                else{
                    document.getElementById("war4").style.display="inline";
                }
            }
        