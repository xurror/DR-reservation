@extends('layouts.app')

@section('content')

<div class="container">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/payments">paymnents</a></li>
            <li class="breadcrumb-item active" aria-current="page">show payment</li>
        </ol>
    </nav>

    <form id="formmomo" method="GET" action="https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml" target="_top">
        <input name="idbouton" value="2" autocomplete="off" type="hidden">
        <input name="typebouton" value="PAIE" autocomplete="off" type="hidden">
        <input class="momo mount" placeholder="" name="_amount" value="1" id="montant" autocomplete="off" type="hidden">
        <input class="momo host" placeholder="" name="_tel" value="652741226" autocomplete="off" type="hidden">
        <input class="momo pwd" placeholder="" name="_clP" value="" autocomplete="off" type="hidden">
        <input name="_email" value="kaze.nasser@outlook.com" autocomplete="off" type="hidden">
        <input id="Button_Image" src="https://developer.mtn.cm/OnlineMomoWeb/console/uses/itg_img/buttons/MOMO_Checkout_EN.jpg" style="width : 250px; height: 100px;" name="submit" alt="OnloneMomo, le réflexe sécurité pour payer en ligne" autocomplete="off" type="image" border="0">
    </form>

@endsection
