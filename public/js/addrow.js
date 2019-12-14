$(document).ready(function()
{
    $('.btn_add').click(function() {
        /* Act on the event */
         var tenkh= $("#ten_kh").val();
         var diachi= $("#diachi").val();
         var sodt= $("#sodt").val();
         var loaixe= $("#loaixe").val();
         var tenxe= $("#tenxe").val();
         var doixe= $("#doixe").val();
         var mauxe= $("#mauxe").val();
         var sokhung= $("#sokhung").val();
         var somay= $("#somay").val();
         var giaban= $("#giaban").val();
         var duatruoc= $("#duatruoc").val();
         var conlai= $("#conlai").val();
        var markup = "<tr> <td>" + tenkh + "</td> <td>" + diachi + "</td> <td>" + sodt + "</td> <td>" + loaixe + "</td> <td>" + tenxe + "</td> <td>" + doixe + "</td>" + mauxe + "<td></td> <td>" + sokhung + "</td> <td>" + somay + "</td> <td>" + giaban + "</td> <td>" + duatruoc + "</td> <td>" + conlai + "</td></tr>";
        $(" table tbody").append(markup);
        return false;
    });  
});
