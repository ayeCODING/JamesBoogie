@extends('layouts.frontend')

@section('content')
<main class="bg_gray">

    <div class="container margin_60">
        <div class="main_title">
            <h2>Contact James Boogie</h2>
            <p>Euismod phasellus ac lectus fusce parturient cubilia a nisi blandit sem cras nec tempor adipiscing rcu ullamcorper ligula.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-support"></i>
                    <h2>Allaia Help Center</h2>
                    <a href="#0">+94 423-23-221</a> - <a href="#0">help@allaia.com</a>
                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-map-alt"></i>
                    <h2>Allaia Showroom</h2>
                    <div>6th Forrest Ray, London - 10001 UK</div>
                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-package"></i>
                    <h2>Allaia Orders</h2>
                    <a href="#0">+94 423-23-221</a> - <a href="#0">order@allaia.com</a>
                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
<div class="bg_white">
    <div class="container margin_60_35">
        <h4 class="pb-3">Drop Us a Line</h4>
        <div class="row">
            <div class="col-lg-4 col-md-6 add_bottom_25">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Name *">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" placeholder="Email *">
                </div>
                <div class="form-group">
                    <textarea class="form-control" style="height: 150px;" placeholder="Message *"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn_1 full-width" type="submit" value="Submit">
                </div>
            </div>
            <div class="col-lg-8 col-md-6 add_bottom_25">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9616685500505!2d107.62682587249252!3d-6.895188493103955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e71eca9559a3%3A0x144e5f33bc011b67!2sJames%20Boogie!5e0!3m2!1sid!2sid!4v1739767402990!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_white -->
</main>
@endsection
