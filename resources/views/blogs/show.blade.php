@include('layouts.header')
<section class="content">
    <div>
        <ul class="breadcrump">
            <li><a href="">{{ __('title.home') }}</a></li>
            <li><a href="">{{ __('title.detail_blog') }}</a></li>
        </ul>
    </div>
</section>
<div class="detail">
    <div class="title">
        <h1>My cat is like the boss</h1>
    </div>
    <div class="author-function">
        <div class="author">
            <div class="avatar">
                <img src="{{ asset('/images/team-1.jpg') }}" alt="">
            </div>
            <div class="name">
                <h5>My name</h5>
                <p>05/09/2022</p>
            </div>
        </div>
        <div class="function">
            <div class="approved">
                <form action="">
                    <button>Not approved</button>
                </form>
            </div>
            <div class="delete">
                <form action="">
                    <button>Delete blog</button>
                </form>
            </div>
        </div>
    </div>
    <div class="image">
        <img src="{{ asset('/images/laptop-in-modern-office.png') }}" alt="">
    </div>
    <div class="description">
        <p>Because she is. At least in her mind. Cats are affectionately narcissistic in a very subtle. It's like
            somehow
            they just know that in ancient Egypt they were once worshipped as Gods and that is their self image that's
            natural to them. This is only my opinion based on the cats that I have lived with.</p>
    </div>
    <div class="related">
        <h3>Related</h3>
    </div>
    <div>
        <hr>
    </div>
    <div class="blog">
        <div class="row row-cols-1 row-cols-md-4">
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/Rectangle_82.png') }}" class="" alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet, adipiscing elit.</h5>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/Rectangle_82.png') }}" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet, adipiscing elit.</h5>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/Rectangle_82.png') }}" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet, adipiscing elit.</h5>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/Rectangle_82.png') }}" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet, adipiscing elit.</h5>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <h3>Comment</h3>
    <div>
        <hr>
    </div>
    <div class="comment">
        <div class="input">
            <img src="{{ asset('/images/team-1.jpg') }}" alt="">
            <form action="">
                <textarea name="" id="" cols="30" rows="10" placeholder="Comment"></textarea>
            </form>
            
        </div>
        <div class="list">
            <div class="avatar">
                <img src="{{ asset('/images/team-1.jpg') }}" alt="">
            </div>
            <div class="name">
                <h5>My name</h5>
                <p class="">Yes, it’s right</p>
                <p class="time">30 phút trước </p>
            </div>
        </div>

    </div>
</div>
<script src="{{ asset('resources/js/app.js') }}"></script>
@include('layouts.footer')
