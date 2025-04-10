<div class="main_header" style="background-color: black; padding: 15px 0; position: sticky; top: 0; z-index: 1000;">
    <div class="container">
        <div class="row small-gutters align-items-center">
            <div class="col-xl-3 col-lg-3 d-flex align-items-center">
                <div id="logo">
                    <a href="index.html">
                        <img src="{{ asset('frontend/img/jb.jpg') }}" alt="Logo" width="120" height="50" style="filter: brightness(0) invert(1);">
                    </a>
                </div>
            </div>
            <nav class="col-xl-6 col-lg-7">
                <div class="main-menu">
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; justify-content: center; font-family: 'Russo One', sans-serif;">
                        <li style="margin: 0 12px; position: relative;">
                            <a href="{{ route ('welcome')}}" style="color: white; font-size: 16px; text-transform: uppercase; text-decoration: none; position: relative; transition: 0.3s;">
                                Home
                                <span style="display: block; height: 2px; width: 0%; background: #b0b0b0; position: absolute; bottom: -5px; left: 0; transition: width 0.3s;"></span>
                            </a>
                        </li>
                        <li style="margin: 0 12px; position: relative;">
                            <a href="{{ route('belanja.index') }}" style="color: white; font-size: 16px; text-transform: uppercase; text-decoration: none; position: relative; transition: 0.3s;">
                                Shop
                                <span style="display: block; height: 2px; width: 0%; background: #b0b0b0; position: absolute; bottom: -5px; left: 0; transition: width 0.3s;"></span>
                            </a>
                        </li>

                        <li style="margin: 0 12px; position: relative;">
                            <a href="blog.html" style="color: white; font-size: 16px; text-transform: uppercase; text-decoration: none; position: relative; transition: 0.3s;">
                                Blog
                                <span style="display: block; height: 2px; width: 0%; background: #b0b0b0; position: absolute; bottom: -5px; left: 0; transition: width 0.3s;"></span>
                            </a>
                        </li>
                        <li style="margin: 0 12px; position: relative;">
                            <a href="{{ url ('contact')}}" style="color: white; font-size: 16px; text-transform: uppercase; text-decoration: none; position: relative; transition: 0.3s;">
                                Contact
                                <span style="display: block; height: 2px; width: 0%; background: #b0b0b0; position: absolute; bottom: -5px; left: 0; transition: width 0.3s;"></span>
                            </a>
                        </li>
                        <li style="margin: 0 12px; position: relative;">
                            <a href="about.html" style="color: white; font-size: 16px; text-transform: uppercase; text-decoration: none; position: relative; transition: 0.3s;">
                                About
                                <span style="display: block; height: 2px; width: 0%; background: #b0b0b0; position: absolute; bottom: -5px; left: 0; transition: width 0.3s;"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="col-xl-3 col-lg-2 d-flex align-items-center justify-content-end">
                <a class="phone_top" href="https://wa.me/6289539205569" style="color: white; font-weight: bold; font-size: 14px; text-decoration: none;" target="_blank">
                    <strong><span style="color: gray;">Need Help?</span> 0895-3920-5569</strong>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.main-menu ul li a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.querySelector('span').style.width = '100%';
        });
        link.addEventListener('mouseleave', function() {
            this.querySelector('span').style.width = '0%';
        });
    });
</script>
