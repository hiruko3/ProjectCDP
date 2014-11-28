$('#search_task_input').keyup(function() {

    var colonnes = {};

    $("#table_task thead th ").each(function(index, th)
    {
        colonnes[index] = $(th).text();
    }
    );

    var mot = $('#search_task_input').val().toLowerCase();

    $("#table_task tbody tr").each(function(index, tr)
    {
        if (mot[0]) {

            if (mot[0].length > 0)
            {
                $(tr).hide();
            }
            else
            {
                $(tr).show();
            }

            $("td", tr).each(function(index, td)
            {
                if (colonnes[index] in {'Name': true, 'Developer': true})
                {
                    if (mot.length > 0 && $(td).text().toLowerCase().indexOf(mot) >= 0)
                    {
                        $(tr).show();
                        return false;
                    }
                }
            });
        } else {
            $(tr).show();
            return false;
        }
    });
});

//////////////////////////////

$('#statut_filter').change(function() {

    var colonnes = {};

    $("#table_task thead th ").each(function(index, th)
    {
        colonnes[index] = $(th).text();
    }
    );

    var mot = $('#statut_filter').val().toLowerCase();

    $("#table_task tbody tr").each(function(index, tr)
    {
        if (mot[0].length > 0)
        {
            $(tr).hide();
        }
        else
        {
            $(tr).show();
        }

        if (mot === "no filter")
        {
            $(tr).show();
        }


        $("td", tr).each(function(index, td)
        {
            if (colonnes[index] in {'Status': true})
            {
                if ($(td).text().toLowerCase() === mot)
                {
                    $(tr).show();
                    return false;
                }
            }

        });
    });
});