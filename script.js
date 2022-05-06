$('form').submit(function(envent){
    event.preventDefault()

    var cin=document.getElementById("cin").value

    //make a post request by ajax

    $.post("script.php",{cin:cin},function(data){
        console.log(data)
    })
})