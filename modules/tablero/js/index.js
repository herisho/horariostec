var pasoCounter = 0;

$.ajax({
   type: "GET",
   url: "scripts/checkcounters.php",
   data: 'tipo=paso',
   success: function (res) {
       var data = JSON.parse(res);
       pasoCounter = data.timestamp;
       console.log(pasoCounter);
   },
});

setInterval(function(){
   $.ajax({
       type: "GET",
       url: "scripts/checkcounters.php",
       data: 'tipo=paso',
       success: function (res) {
           var data = JSON.parse(res);
           console.log(data);
           if (data.timestamp > pasoCounter) {
                window.location.reload(1);
           }
       },
   });
}, 5000);