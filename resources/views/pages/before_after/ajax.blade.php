<?php
$i = 1;
$j = 1;
foreach($items as $item):
if ($j > 5) {
    $i = 1;
    $j = 1;
}
if ($i <= 2) {
    $class = 'before-after-box-50';
} else {
    $class = 'before-after-box-33';
}
?>
<div class="before-after-box {{ $class }}">
    <div class="image twentytwenty-container">
        <img src="/storage/{{ $item->before_images }}" alt="">
        <img src="/storage/{{ $item->after_images }}" alt="">
        <span class="label label-before">До</span>
        <span class="label label-after">После</span>
    </div>
    <div class="title">{{ $item->name }} {{ (DateTime::createFromFormat('Y-m-d', $item->done)->format('d.m.Y')) }}.
        Косметолог - {{ $item->doctor->name }}</div>
    <div class="desc">{{ $item->description }}</div>
</div>
<?php
$i++;
$j++;
endforeach;

