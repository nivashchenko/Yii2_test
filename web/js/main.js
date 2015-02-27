$(document).ready(function()
{
    getStatusAll();
    
    if ( "object" == typeof( $(".like") ) )
    {
        $(".like").each(function(e,x)
        {
            $("#" + x.id).bind("click", function(){
                var id = x.id;
                var status = ($("#" + x.id).html());
                
                changeStatus(id, status);
            });
        });
    }
});

function changeStatus(id, status)
{
    var sendParams = '{"id":"' + id + '", "status":"' + status + '"}'; 

    $.ajax({
        url: "/like",
        type: "POST",
        data: sendParams,
        contentType:"application/json; charset=utf-8"
      }).done(function(data) {
            $("#" + id).css('value', data);
            $("#" + id).html(data);
      });
    
}

function getStatusAll()
{
    $.ajax({
        url: "/like",
        type: "GET",
        data: '',
        contentType:"application/json; charset=utf-8"
      }).done(function(data) {
            $.each(data, function(n, obj)
            {
                if ( $("#" + obj.id) )
                {
                    $("#" + obj.id).css('value', obj.value);
                    $("#" + obj.id).html(obj.value);
                }
            });
      });
}

function getStatus(id)
{
    var data = $.get("/like/view?id=" + id);
    if ( "object" === typeof(data) 
            && data.length > 0 )
    {
        if ( $("#" + obj.id) )
        {
            $("#" + obj.id).css('value', obj.status);
        }
    }
}