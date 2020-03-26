if (typeof $.artjoker == 'undefined') $.artjoker = {};

$.artjoker =
    {

        init: function() {

            $(".chosen-select").chosen({width: "75%"});

            $('select#regions').change($.artjoker.addSubregionsSelect);
            $( "#register" ).submit(function( event ) {

                $('span#error_name').hide();
                $('span#error_email').hide();
                $('span#error_regions').hide();
                $('span#error_subregions').hide();
                $('span#error_subsubregions').hide();

                var error = false;
                var name = $.trim($('input#u_name').val());
                if(!name) {
                    error = true;
                    $('span#error_name').text('Required field');
                    $('span#error_name').show();
                }
                var email = $.trim( $('input#u_email').val());
                if(!email) {
                    error = true;
                    $('span#error_email').text('Required field');
                    $('span#error_email').show();
                }
                var region_code =  $.trim($('select#regions').val());

                if(!region_code) {
                    error = true;
                    $('span#error_regions').text('Required field');
                    $('span#error_regions').show();
                }
                var subregion_code =  $.trim($('select#subregions').val());
                if(!subregion_code) {
                    error = true;
                    $('span#error_subregions').text('Required field');
                    $('span#error_subregions').show();
                }
                var subsubregion_code =  $.trim($('select#subsubregions').val());
                if(!subsubregion_code) {
                    error = true;
                    $('span#error_subsubregions').text('Required field');
                    $('span#error_subsubregions').show();
                }

                if(error) {
                    event.preventDefault();
                }
            });

        },

        addSubregionsSelect: function() {
            var region_code =  $('select#regions').val();
            $.post('/register/getSubregions', { region_code: region_code}, null, 'html')
                .done(function(result)
                {
                    $(result).insertAfter($("#wrap_regions"));

                    $('select#subregions').change($.artjoker.addAddressSelect);
                    $(".chosen-select").chosen({width: "75%"});
                })
                .fail(function()
                {
                    alert('Error');
                });
            return true;
        },

        addAddressSelect: function() {
            var subregion_code =  $('select#subregions').val();

            $.post('/register/getAddresses', {subregion_code: subregion_code}, null, 'html')
                .done(function(result)
                {
                    $(result).insertAfter($("#wrap_subregions"));
                    $(".chosen-select").chosen({width: "75%"});
                })
                .fail(function()
                {
                    alert('Error');
                });

            return true;
        }
    };

$(document).ready(function() {
    $.artjoker.init();
});