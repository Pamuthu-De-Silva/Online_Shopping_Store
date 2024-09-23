

var deletebttn= document.getElementById("delete");
deletebttn.addEventListener("click",function(){

    return  confirm('delete this from cart?');
});

var deleteallbttn= document.getElementById("deleteall");
deleteallbttn.addEventListener("click",function(){

    return confirm('delete all from cart?');
    
});