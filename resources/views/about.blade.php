@extends('layouts.main')

@section('content')
  <!-- About Section Start -->
  <section class="about">
    <h2><span>About</span> Us</h2>
    <div class="row">
      <div class="about-img">
        <img src="{{ asset('assets/images/bg_4.jpg') }}" alt="tentang kami" />
      </div>
      <div class="content">
        <h3>Coffee Live and Roastery</h3>
        <div class="row-text">
          <div class="col-text-1">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia, mollitia tempora! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi officia repellendus exercitationem, rem nostrum ea! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit odio veniam unde nam officiis ad fuga illum voluptates, quidem nulla. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum eos quam, omnis alias, magnam sequi quos in impedit vitae fugit error deleniti.</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus doloribus dolore placeat! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem alias voluptates impedit, soluta non inventore accusamus dolorem dicta accusantium vel commodi. Perspiciatis eum, expedita iste cupiditate soluta laborum error. Sit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam accusamus quidem quos accusantium et? Dolor soluta quaerat, ipsum porro eos quis iste necessitatibus molestiae exercitationem sapiente debitis corrupti consectetur voluptatum.</p>
          </div>

          <div class="col-text-2">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus doloribus dolore placeat! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem alias voluptates impedit, soluta non inventore accusamus dolorem dicta accusantium vel commodi. Perspiciatis eum, expedita iste cupiditate soluta laborum error. Sit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam accusamus quidem quos accusantium et? Dolor soluta quaerat, ipsum porro eos quis iste necessitatibus molestiae exercitationem sapiente debitis corrupti consectetur voluptatum. ipsum porro eos quis iste necessitatibus molestiae exercitationem sapiente debitis corrupti consectetur voluptatum.</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus doloribus dolore placeat! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem alias voluptates impedit, soluta non inventore..</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About Section End -->

  <!-- Gallery Section Start -->
  <section class="gallery">
    <h2>Gallery</h2>
    <div class="container">
      <div class="gallery-item gallery-item-1">
        <div class="gallery-content">
          <img src="{{ asset('assets/images/gallery/1.jpg') }}" class="gallery-image" />
        </div>
      </div>
      <div class="gallery-item gallery-item-2">
        <div class="gallery-content">
          <img src="{{ asset('assets/images/gallery/2.jpg') }}" class="gallery-image" />
        </div>
      </div>
      <div class="gallery-item gallery-item-3">
        <div class="gallery-content">
          <img src="{{ asset('assets/images/gallery/6.jpg') }}" class="gallery-image" />
        </div>
      </div>
      <div class="gallery-item gallery-item-4">
        <div class="gallery-content">
          <img src="{{ asset('assets/images/gallery/5.jpg') }}" class="gallery-image" />
        </div>
      </div>
      <div class="gallery-item gallery-item-5">
        <div class="gallery-content">
          <img src="{{ asset('assets/images/gallery/4.jpg') }}" class="gallery-image" />
        </div>
      </div>
      <div class="gallery-item gallery-item-6">
        <div class="gallery-content">
          <img src="{{ asset('assets/images/gallery/3.jpg') }}" class="gallery-image" />
        </div>
      </div>
    </div>
  </section>
  <!-- Gallery Section End -->

  <!-- Our Team Section Start -->
  <section class="team">
    <h2><span>Our</span> Team</h2>
    <div class="team-slider">
      <div class="slide-track">
        <div class="image">
          <img src="{{ asset('assets/images/team/team_1.jpeg') }}" alt="image" />
        </div>
        <div class="image">
          <img src="{{ asset('assets/images/team/team_2.png') }}" alt="image" />
        </div>
        <div class="image">
          <img src="{{ asset('assets/images/team/team_3.jpeg') }}" alt="image" />
        </div>
        <div class="image">
          <img src="{{ asset('assets/images/team/team_4.jpeg') }}" alt="image" />
        </div>
        <div class="image">
          <img src="{{ asset('assets/images/team/team_5.jpeg') }}" alt="image" />
        </div>
        <div class="image">
          <img src="{{ asset('assets/images/team/team_6.jpeg') }}" alt="image" />
        </div>
        <div class="image">
          <img src="{{ asset('assets/images/team/team_7.jpeg') }}" alt="image" />
        </div>
        <div class="image">
          <img src="{{ asset('assets/images/team/team_8.png') }}" alt="image" />
        </div>
        <div class="image">
          <img src="{{ asset('assets/images/team/team_9.jpeg') }}" alt="image" />
        </div>
        <div class="image">
          <img src="{{ asset('assets/images/team/team_10.jpeg') }}" alt="image" />
        </div>
      </div>
    </div>
  </section>
  <!-- Our Team Section End -->
@endsection