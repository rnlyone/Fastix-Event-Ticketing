<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>FASTIX {{$title}}</title>
<link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('fonts/css/fontawesome-all.min.css')}}">
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

@if ($title == (': Scan Event' || ': Checkout'))
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endif

@if ($title == ": Checkout")
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-gH_jwK69uZGaqR1S"></script>
@endif

<style>
    #preview {
        width: 300px;
        height: 300px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

@laravelPWA

{{$customcss}}
</head>
