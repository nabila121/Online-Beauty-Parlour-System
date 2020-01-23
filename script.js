var username=document.getElementById('b_name');
username.addEventListener('keyup',namevalidate);


function namevalidate(){
    var inputname=/^[A-Za-z][A-Za-z0-9_]*$/;
    var war1=document.getElementById('war1');
    var input=document.getElementById('b_name').value;
    if(inputname.test(input)){
        war1.style.display="none";
    }
    else{
        war1.style.display="inline";
    }
}

