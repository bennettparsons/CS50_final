/* global _ */

/**
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 7
 *
 * Global JavaScript, if any.
 */
 

// $(document).ready(function() 
//     { 
//         $("#sorted").tablesorter({sortList: [[1,0]]} ); 
//     } 
// );

$("#MIDS").bind("click", function(){
    var max = 2;
    var checkboxes = $('input[type="checkbox"]');

    checkboxes.change(function(){
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
    });
});


// $("#MIDS").on("click", ":checkbox", function(event){
//   $(":checkbox:not(:checked)", this.MIDS).prop("disabled", function(){
//     return $("#MIDS".form).find(":checkbox:checked").length == 2;
//   });
// });


// sort table
$(document).ready(function() 
    { 
      $("#sorted").tablesorter({ 
        sortList: [[4,1]]

      }); 
    } 
    );

// execute when the DOM is fully loaded
$(function() {
    
    // configure typeahead
    // https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md
    $("#buy").typeahead({
        autoselect: true,
        highlight: true,
        minLength: 3
    },
    {
        source: search,
        templates: {
            empty: "no one found",
            suggestion: _.template("<p fontcolor='green'><%- firstname %> <%- lastname %>")
        }
    });
});

function search(query, cb)
{
    // get places matching query (asynchronously)
    var parameters = {
        geo: query
    };
    $.getJSON("search.php", parameters)
    .done(function(data, textStatus, jqXHR) {

        // call typeahead's callback with search results (i.e., places)
        cb(data);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {

        // log error to browser's console
        console.log(errorThrown.toString());
    });
}