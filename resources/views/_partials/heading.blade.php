<?php
    $url ='';
    for ($i=0; $i <= 3;$i++){
        if (app('request')->segment($i)) {
            $url .=  "/". app('request')->segment($i);
        }
    }
    $url = $url . "?";
    if (app('request')->get('search')) {
        $url .= "search=".app('request')->get('search');
        $url = $url . "&";
    }
    if (app('request')->get('page')) {
        $url .= "page=" . app('request')->get('page')."&";
    }
    if (app('request')->get('order')) {
        if (app('request')->get('order') == 'asc') {
            $order = "desc";
        }else {
            $order = "asc";
        }
    }else {
        $order ='asc';
    }
?>
<th><a href="{{url($url."orderby=director&order=".$order)}}"> director</a> </th>
<th><a href="{{url($url."orderby=title&order=".$order)}}"> title</a> </th>
<th><a href="{{url($url."orderby=year&order=".$order)}}"> year</a> </th>
<th><a href="{{url($url."orderby=gross&order=".$order)}}"> gross</a> </th>
<th><a href="{{url($url."orderby=genre&order=".$order)}}"> genre</a> </th>
<th> edit </th>
