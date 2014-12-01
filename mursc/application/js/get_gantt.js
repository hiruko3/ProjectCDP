function get_table()
{
    var lignes = document.getElementById('gantt_table').getElementsByTagName('tr');

    var developpers_lines = lignes.length - 1; // number of developpers

    var gantt_table = new Array();
    for (var i = 0; i < developpers_lines; i++) {
        gantt_table[i] = new Array();
    }

    var j = 1;
    while (lignes[j])
    {
        var cells = lignes[j].getElementsByTagName('td');
        for (var n = 0; n < cells.length; n++) {
            gantt_table[j-1].push(cells[n].innerText);
        }
        j++;
    }

return gantt_table;
}



function get_gantt() {

    var tab = new Array();
    tab = get_table();
    
    /*
    document.write("<br/>----------------- <br/>");
    document.write(tab[0]);
    document.write("<br/>----------------- <br/>");
    document.write(tab[1]);
    document.write("<br/>----------------- <br/>");
    document.write(tab[2]);
    */

    $.ajax({
        url: "save_gantt",
        type: "POST",
        data: {'data':JSON.stringify(tab)},
        cache: false,
        success: function(msg) {
        //alert("Save table");
        alert('Gantt Save !');
        }
    });
}
