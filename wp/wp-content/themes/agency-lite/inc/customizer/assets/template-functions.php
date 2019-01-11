<?php 
function agency_lite_cat_list(){
    $agency_lite_cat_list = get_categories(
        array(
            'hide_empty' => '0',
            'exclude' => '1',
        )
    );
    $agency_lite_cat_list = array();
    $agency_lite_cat_list[''] = esc_html__('-- Choose --','agency-lite');
    foreach($agency_lite_cat_list as $agency_lite_cat_list){
        $agency_lite_cat_list_array[$agency_lite_cat_list->slug] = $agency_lite_cat_list->name;
    }
    return $agency_lite_cat_list_array;
}