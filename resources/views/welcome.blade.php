@section('title')
Home
@endsection

@extends('layouts.default')
@section('content')
<a href="#content" class="skip"></a>
<!-- Banner -->
<section id="banner">
    <div class="content" id="content">
        <header style="padding: 3em;">
            <h2>{{config('app.name2')}}</h2>
            <p>We make web, mobile, and other apps.<br />
            Just apps. Lots of apps.</p>
        </header>
        <span style="display: inline-block;height: 18em;vertical-align: middle;width: 18em;"><img src="/images/logo.jpg" alt="Logo" width="300" height="300"/></span>
    </div>
    <a href="#one" class="goto-next scrolly">Next</a>
</section>

<!-- One -->
<section id="one" class="spotlight style1 bottom">
    <span class="image fit main"><img src="images/image1.jpeg" alt="Image 1" /></span>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="4u 12u$(medium)">
                    <header>
                        <h2>Who we are</h2>
                        <p>and why we're in this club</p>
                    </header>
                </div>
                <div class="4u 12u$(medium)">
                    <p>The {{config('app.name2')}}, or {{config('app.name')}} for short, is a 
                    group of students from Embry-Riddle Aeronautical University who wish to expand their programming knowledege through peer collaboration and self projects.</p>
                </div>
                <div class="4u$ 12u$(medium)">
                    <p>We intend on building strong programming foundations
                    so we can go into industry with a strong set of skills and
                    an advanced toolbelt that we can bring along.</p>
                </div>
            </div>
        </div>
    </div>
    <a href="#two" class="goto-next scrolly">Next</a>
</section>

<!-- Two -->
<section id="two" class="spotlight style2 right">
    <span class="image fit main"><img src="images/image2.jpeg" alt="Image 2" /></span>
    <div class="content">
        <header>
            <h2>Why we focus on apps</h2>
            <p>Apps are everywhere, even this website is an app</p>
        </header>
        <p>Applications are what just about everyone uses
        every single day. Apps allow us to have intuitive experiences with our phones,
        tablets, laptops, tv's, and even thermostats. Apps can range from a social
        network, a word processor, or even an app that connects to your home. There are endless
        possibilities for future apps.</p>
        <ul class="actions">
            <!--<li><a href="#" class="button">Learn More</a></li>-->
        </ul>
    </div>
    <a href="#three" class="goto-next scrolly">Next</a>
</section>

<!-- Three -->
<section id="three" class="spotlight style3 left">
    <span class="image fit main bottom"><img src="images/image3.jpeg" alt="Image 3" /></span>
    <div class="content">
        <header>
            <h2>Our Future</h2>
            <p>How we plan on improving ourselves</p>
        </header>
        <p>We plan on slowly building our skills by creating apps together, finding a 
        problem and designing a solution, and entering competitions to test our new
        skills.</p>
        <ul class="actions">
            <!--<li><a href="#" class="button">Learn More</a></li>-->
        </ul>
    </div>
    <a href="#four" class="goto-next scrolly">Next</a>
</section>

<!-- Four -->
<section id="four" class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h2>The Team</h2>
            <p>{{config('app.name2')}} is comprised of students from various backgrounds and majors from Embry-Riddle Prescott</p>
        </header>
        <div class="box alt">
            <div class="row uniform">
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="image">
                        <img src="/images/reagan.jpg" class="team" alt="Joshua Van Deren">
                    </span>
                    <h3>Reagan Sensmeier</h3>
                    <p>I'm an undergraduate Software Engineering student. In addition to programming, I enjoy computer aided design and animation and I hope to one day work for Pixar.</p>
                </section>
                <section class="4u 6u$(medium) 12u$(xsmall)">
                    <span class="image">
                        <img src="/images/grant.JPG" class="team" alt="Grant Savage">
                    </span>
                    <h3>Grant Savage</h3>
                    <p>Undergraduate studying Software Engineering with a focus in Cyber Security. I beleive apps are the future and want to put my creations into the hands of everyone.</p>
                </section>
                <section class="4u$ 6u(medium) 12u$(xsmall)">
                    <span class="image">
                        <img src="/images/josh.jpg" class="team" alt="Joshua Van Deren">
                    </span>
                    <h3>Joshua Van Deren</h3>
                    <p>Just your typical computerphile here. Always interested in making something unique and useful.</p>
                </section>
                <section class="4u 6u$(medium) 12u$(xsmall)">
                    <!--<span class="icon alt major fa-user"></span>
                    <h3>Team Member</h3>
                    <p>Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.</p>-->
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-user"></span>
                    <h3>Nicholas DiPinto</h3>
                    <p>I am an undergraduate student studying Software Engineering. I enjoy learning how to program mobile and web applications. I strive to find ways in which I can use my talents to benefit the lives of others.</p>
                </section>
                <section class="4u$ 6u$(medium) 12u$(xsmall)">
                    <!--<span class="icon alt major fa-user"></span>
                    <h3>Team Member</h3>
                    <p>Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.</p>-->
                </section>
            </div>
        </div>
        <footer class="major">
            <ul class="actions">
                <!--<li><a href="#" class="button">Learn More</a></li>-->
            </ul>
        </footer>
    </div>
</section>

<!-- Five -->
<section id="five" class="wrapper style2 special fade">
    <div class="container">
        <header>
            <h2>Join us if you're interested</h2>
            <p>We'll sign you up to our mailing list</p>
        </header>
        <form method="post" action="/email" class="container 50%">
            <div class="row uniform 50%">
                <div class="8u 12u$(xsmall)"><input type="email" name="email" id="email" placeholder="Your Email Address" required /></div>
                <div class="4u$ 12u$(xsmall)"><input type="submit" value="Sign Up" id="emailSubmit" class="fit special" /></div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
    <div class="content"><p>{{$quote}}</p></div>
</section>
@endsection

@section('script')
    @if(Auth::guest())
    <script>
        $.get('https://freegeoip.net/json/', function(data) {
          $.get('{{url('/loc')}}'+'?country='+data.country_name+'&state='+data.region_name+'&city='+data.city)
        });
    </script>
    @endif
@endsection