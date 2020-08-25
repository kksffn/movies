<?php
$limit = 5;

$page_count = ceil($movies_count / $limit);
$current_page = (int) app('request')->get('page') ?:1; //Do current_page uložíme aktuální stránku a tu vyznačíme třeba tučně.
//(app('request')->get('genre') OR app('request')->get('director')) ?
if(app('request')->segment(1) == 'search') {
    $searchString = app('request')->get('search');
    $url = (app('request')->segment(1).'/'.app('request')->segment(2)).
        "?search=".$searchString;
    $page=app('request')->get('page');
} elseif(app('request')->segment(1)){
     $url = app('request')->segment(1).'/'.app('request')->segment(2);
} else {
     $url='';
}
if(isset($searchString)) {
    $url .= "&";
} else {
    $url .= "?";
}
if (app('request')->get('orderby')) {
    $orderby = app('request')->get('orderby');
    if (app('request')->get('order')) {
        $order = app('request')->get('order');
    }else {
        $order ='asc';
    }
    $url .= "orderby=$orderby&order=$order&";
}
?>
@if( $page_count > 1)
    <p class="pagination">
        @for( $i = 1; $i <= $page_count; $i++)
            @if( $i == $current_page)
                <strong>{{ $i }}</strong>
            @else
                <a href="{{ url($url."page=$i") }}">{{ $i }}</a>
            @endif

        @endfor
    </p>
@endif

