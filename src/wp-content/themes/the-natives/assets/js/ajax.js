jQuery(document).ready(function($) {
    function loading(sel) {
        jQuery(sel).attr('disabled', true);
        jQuery(sel).attr('data-loading', jQuery(sel).html());
        jQuery(sel).html('<i class="fa fa-spinner" style="color: #3959f4;font-size:15px"></i>');
    }
    function unloading(sel) {
        var loading = jQuery(sel).attr('data-loading');
        if (loading) {
            jQuery(sel).html(loading);
        }
        jQuery(sel).attr('disabled', false);
    }
  
        // jQuery(document).delegate(".load_paging", "click", function() {
        //     var data_limit = jQuery(this).attr('data-limit');
        //     var data_paging = jQuery(this).attr('data-paging');
        //     jQuery('#brand-list').addClass('active_loading');
        //     jQuery("#brand-list").html('<div class="group_load"><div class="lds-circle"><div></div></div></div>');
        //     postbyurl('brand-list', hr.a_url + '?action=load_paging', 'data_limit=' + data_limit + '&data_paging=' + data_paging);
        // });

    jQuery('#fielter li').filter(function(index, item, select){

        jQuery(item).find('button').on('click', function(){
            var term_id = jQuery(this).attr('term_id');

            jQuery('#fielter li button').removeClass('active');
            jQuery(this).addClass('active');
            jQuery('#article_list').addClass('active_loading');
            jQuery("#article_list").html('<div class="container"><div class="lds-circle"><img src="/wp-content/themes/the-natives/assets/images/icon_loading.svg" alt="loading" ></div></div>');
            postbyurl('article_list', hr.a_url + '?action=article_show', 'term_id=' + term_id );
        })

    })

    jQuery(document).delegate("#article_list .pagination .arrow-page a", "click", function() {
        var data_page = jQuery(this).attr('data-page'),
            data_cat = jQuery(this).attr('data-cat');

        // loading(this);
        jQuery('#article_list').addClass('active_loading');
        jQuery("#article_list").html('<div class="container"><div class="lds-circle"><img src="/wp-content/themes/the-natives/assets/images/icon_loading.svg" alt="loading" ></div></div>');
        postbyurl('article_list', hr.a_url + '?action=load_pagination', 'data_page=' + data_page + '&data_cat=' + data_cat);
    });


    jQuery(document).delegate("#studies_list .pagination .arrow-page a", "click", function() {
        var data_page = jQuery(this).attr('data-page');

        // loading(this);
        jQuery('#studies_list').addClass('active_loading');
        jQuery("#studies_list").html('<div class="container"><div class="lds-circle"><img src="/wp-content/themes/the-natives/assets/images/icon_loading.svg" alt="loading" ></div></div>');
        postbyurl('studies_list', hr.a_url + '?action=studies_list', 'data_page=' + data_page );
    });



    // jQuery('.sec_content .content .click_tab').filter(function(index, item, select){

    //     jQuery(item).on('click', function(){
    //         var data_key = jQuery(this).attr('data-key');
    //         jQuery('#show_description').addClass('active_loading');
    //         jQuery("#show_description").html('<div class="container"><div class="lds-circle"><img src="/wp-content/themes/the-natives/assets/images/icon_loading.svg" alt="loading" ></div></div>');
    //         postbyurl('show_description', hr.a_url + '?action=load_des_casestudy_post', 'data_key=' + data_key );
           
    //     })

    // })


});