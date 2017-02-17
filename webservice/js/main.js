$('#phepcong').click(
function()
            {
                $.ajax({
                    url : "server/ajax.php",
                    type : "get",
                    dateType:"text",
                    data : { 
                         soa : $('#soa').val(),
						 sob : $('#sob').val(),
						 pheptoan : $('#phepcong').val()
						 
						 
                    },
                    success : function (result){
                        
                        $('#result').html(result);
                    }
                });
            } 
);

$('#pheptru').click(
function()
            {
                $.ajax({
                    url : "server/ajax.php",
                    type : "get",
                    dateType:"text",
                    data : { 
                         soa : $('#soa').val(),
						 sob : $('#sob').val(),
						 pheptoan : $('#pheptru').val()
						 
						 
                    },
                    success : function (result){
                        
                        $('#result').html(result);
                    }
                });
            } 
);

$('#phepnhan').click(
function()
            {
                $.ajax({
                    url : "server/ajax.php",
                    type : "get",
                    dateType:"text",
                    data : { 
                         soa : $('#soa').val(),
						 sob : $('#sob').val(),
						 pheptoan : $('#phepnhan').val()
						 
						 
                    },
                    success : function (result){
                        
                        $('#result').html(result);
                    }
                });
            } 
);

$('#phepchia').click(
function()
            {
                $.ajax({
                    url : "server/ajax.php",
                    type : "get",
                    dateType:"text",
                    data : { 
                         soa : $('#soa').val(),
						 sob : $('#sob').val(),
						 pheptoan : $('#phepchia').val()
						 
						 
                    },
                    success : function (result){
                        
                        $('#result').html(result);
                    }
                });
            } 
);