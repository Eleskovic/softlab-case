var $ = require('jquery')
require('./bootstrap.bundle')
require('./bootstrap.min.css')
require('./bootstrap-grid.min.css')
require('./bootstrap-reboot.min.css')
var css = require('./style.css')


$(document).ready(function () {
    console.log('App initiliazed')

    $('.categoryItem').on('click', function(e) {
        id = $(this).attr('data-id')
        $.ajax({
            method: 'GET',
            url: '/api/fs/explore?category=' + id,
            dataType: 'json',
            beforeSend: function () {
                $("#notice").attr('hidden', true)
                $("#venueList").removeAttr('hidden')
                $("#venueList").html('Fetching...')
            },
            success: function (response) {
                $("#venueList").removeAttr('hidden')
                $("#notice").attr('hidden', true)
                //$("#venueList").html(response.join('<br/>'))
                $("#venueList").html('<table class="table table-striped table-bordered"><tbody>')
                $.each(response, function (key,value) {
                    var item = '<tr>' +
                        '<td>'+ value + '</td>' +
                                '</tr>'

                    $("table tbody").append(item)
                })
                $("#venueList").append('</table></tbody>')
            }
        })
    })
})
